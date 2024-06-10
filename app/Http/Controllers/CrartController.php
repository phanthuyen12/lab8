<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CrartController extends Controller
{
    //
    function cart_get(){
        return view('client/cart');
    }
    function get_user_checkout_success(){
        return view('client/checkouttk');
    }
    function get_user_checkout(){
        $user = session()->get('user');
        return view('client/checkout',compact('user'));
    }
    function order_manager(){
        $orders = Order::leftJoin('users', 'orders.user_id', '=', 'users.user_id')
        ->select('orders.*', 'users.full_name as user_name', 'users.email as user_email')
        ->get();
    

        return view("admin/order",compact("orders"));
    }
    function check_out(Request $request){
        // dd($request->all());
        $user_id = $request->input('user_id');
        $status = 'đang phê duyệt';
        $full_name = $request->input('full_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $province = $request->input('province');
        $district = $request->input('district');
        $commune = $request->input('commune');
        $shipping = $request->input('shipping');
        $productsJSON = $request->input('products');
        $products = json_decode($productsJSON);

        $order = Order::create([
            'user_id' => $user_id,
            'status' => $status,
            'madonhang' =>  Str::random(30)
        ]);
        
        $order_id = $order->order_id ;
        if ($order_id){
            foreach ($products as $product) {
                $Orderdetails = Orderdetails::create([
                    'order_id' => $order_id,
                    'full_name' => $full_name,
                    'email' => $email,
                    'phone' => $phone,
                    'province' => $province,
                    'district' => $district,
                    'commune' => $commune,
                    'shipping' => $shipping,
                    'product_name' => $product->name,
                    'product_price' => $product->price, // Giá sản phẩm tương ứng
                    'product_quantity' => $product->quantity,
                ]);
            }
            
            return view('client/checkouttk',compact('order','Orderdetails'));
        }  else {
            return response()->json(['message' => 'Thất bại, lỗi không xác định'], 500);
        }
        
    }
    public function order_details($order_id){
        // echo "Dữ liệu ".$order_id;
        $order_details = Order::where('order_id', $order_id)->get();
    
        // Kiểm tra nếu không có dữ liệu được tìm thấy
        if (!$order_details) {
            return response()->json(['error' => 'Không tìm thấy chi tiết đơn hàng'], 404);
        }
    
        // Chuyển đổi dữ liệu thành UTF-8 trước khi trả về JSON
        // $order_details = json_encode($order_details, JSON_UNESCAPED_UNICODE);
        return response()->json($order_details)->header('Content-Type', 'application/json; charset=utf-8');
    }
    public function update_order($id){
        $order = Order::where('order_id', $id)  
        ->update(['status'=>'xác nhận đơn hàng']);
        if($order){
            return response()->json(['thành công' => 'cập nhật thành công'], 200);
    
         }else{
            
                return response()->json(['error' => 'Không tìm thấy chi tiết đơn hàng'], 404);
        
             }
     }
    public function get_history(){
        $user = session()->get('user');
        // print_r($user);
        return view('client/history',compact('user'));
    }
    public function order_user($id)
     {
         $orders = DB::table('orders')
             ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
             ->where('orders.user_id', $id)
             ->get();
     
         if ($orders->isEmpty()) {
             return response()->json(['error' => 'Không tìm thấy chi tiết đơn hàng'], 404);
         } else {
             return response()->json($orders)->header('Content-Type', 'application/json; charset=utf-8');
         }
     }
     
}
