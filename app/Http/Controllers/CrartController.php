<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;

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
    public function generateRandomCode($length = 6) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
    
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
    
        return $randomString;
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
        $totals_product = $request->input('totals_product');
        $totals_productkm = $request->input('totals_productkm');
        $products = json_decode($productsJSON);

        $order = Order::create([
            'user_id' => $user_id,
            'status' => $status,
            'madonhang' => md5(uniqid(mt_rand(), true)),
            'full_name' => $full_name,
            'email' => $email,
            'phone' => $phone,
            'province' => $province,
            'district' => $district,
            'commune' => $commune,
            'shipping' => $shipping,
            'totalamount'=>$totals_product,
            'totalamountsale'=>$totals_productkm,
            'code_pay'=>$this->generateRandomCode(),
        ]);
        
        $order_id = $order->order_id ;
        if ($order_id){
            foreach ($products as $product) {
                $Orderdetails = Orderdetails::create([
                    'order_id' => $order_id,

                    'product_name' => $product->name,
                    'product_price' => preg_replace("/[^0-9]/", "", $product->price),
                    'product_quantity' => $product->quantity,
                ]);
            }
            $name = "http://127.0.0.1:8000/order-client?token=".$order->madonhang;
            Mail::send('client/testmail', compact('name'), function($message) use ($order){
                $message->to($order->email); // Sử dụng biến $user để lấy email
                $message->subject('đơn hàng ngày'.Now()); // Thêm chủ đề cho email
                
            });
            return view('client/checkouttk',compact('order','Orderdetails'));
        }  else {
            return response()->json(['message' => 'Thất bại, lỗi không xác định'], 500);
        }
        
    }
    public function order_details($order_id)
    {
        // Join giữa bảng orders và order_details
        $order_details = DB::table('orders')
            ->join('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->where('orders.order_id', $order_id)
            ->select('orders.*', 'order_details.*')
            ->get();
    
        // Kiểm tra nếu không có dữ liệu được tìm thấy
        if ($order_details->isEmpty()) {
            return response()->json(['error' => 'Không tìm thấy chi tiết đơn hàng'], 404);
        }
    
        // Trả về dữ liệu JSON với UTF-8 encoding
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
        // Lấy các đơn hàng cùng với chi tiết đơn hàng của người dùng có id tương ứng
        $orders = Order::with('orderDetails')
            ->where('user_id', $id)
            ->get();
    
        // Kiểm tra nếu không có đơn hàng nào
        if ($orders->isEmpty()) {
            return response()->json(['error' => 'Không tìm thấy chi tiết đơn hàng'], 404);
        } else {
            return response()->json($orders)->header('Content-Type', 'application/json; charset=utf-8');
        }
    }
    function get_order_clients(Request $request){
        $token = $request->query('token');
        $orders = Order::with('orderDetails')
        ->where('madonhang', $token)
        ->get();


    // Kiểm tra nếu không có đơn hàng nào
    if ($orders->isEmpty()) {
        return response()->json(['error' => 'Không tìm thấy chi tiết đơn hàng'], 404);
    } else {
        return response()->json($orders)->header('Content-Type', 'application/json; charset=utf-8');
    }
      
    }
    function get_order_client(){
        return view('client/order-client');
    }
    
     
}
