<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\User;

use Illuminate\Support\Str;

class ApiController extends Controller
{
    //
    function get_categories(){
        $categories = Category::select('category_id', 'category_name', 'images', 'created_at', 'trangthai')
        ->get();
        if($categories){
            return response()->json([
                'success'=> true,
                'data'=>$categories
            ]);
        }else{
            return response()->json([
                'success'=> false,
                'data'=>'thất bại'
            ]);  
        }
       
    }
    function get_product_categories($id){
        
        $products = Product::select(
            'products.product_id',
            'products.product_name',
            'products.price',
            'products.img_product',
            'products.description',
            'products.stock_quantity',
            'products.created_at as product_created_at',
            'products.updated_at',
            'categories.category_name as category_name',
            'categories.created_at as category_created_at'
        )
        ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
        ->where('products.category_id', $id)  // Ensure this is the correct column
        ->get();
        if($products){
            return response()->json([
                'success'=> true,
                'data'=>$products
            ]);  
        }else{
            return response()->json([
                'success'=> false,
                'data'=>'xin vui lòng kiểm tra lại'
            ]);    
        }
     
      }
      function product_detail($id){
        
        $products = Product::where('product_id',$id)->get();
        if($products){
            return response()->json([
                'success'=> true,
                'data'=>$products
            ]);  
        }else{
            return response()->json([
                'success'=> false,
                'data'=>'xin vui lòng kiểm tra lại'
            ]);    
        }

      }
      function information_user(Request $request){
        $request->validate([
            'token' => 'required|string',
        ]);
        $token = $request->token;
        $user = User::where('token',$token)->get();
        if ($user){
            return response()->json([
                'success'=> true,
                'data'=>$user
            ]); 
    
        }else{
            return response()->json([
                'success'=> false,
                'data'=>'xin vui lòng kiểm tra lại token '
            ]);   
        }
       
      }
      function buy_products(Request $request){
        $request->validate([
            'token' => 'required|string',
            'id_product'=>'integer',
        ]);
        $token = $request->token;
        $user = User::select('user_id')->where('token',$token)->first();
        $iduser  = $user->user_id;
        if ($iduser){
            $status = 'đang phê duyệt';
            $full_name = $request->input('full_name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $province = $request->input('province');
            $district = $request->input('district');
            $commune = $request->input('commune');
            $shipping = $request->input('shipping');
            $quantity = $request->input('quantity');
            $id_products = $request->input('id_products');
    
            $order = Order::create([
                'user_id' => $iduser,
                'status' => $status,
                'madonhang' =>  Str::random(30)
            ]);
            
            $order_id = $order->order_id ;
            if ($order_id){
                $product = Product::select('product_name', 'price')->where('product_id', $id_products)->first();
                $name_product = $product->product_name;
                $price_product = $product->price;
                Orderdetails::create([
                    'order_id' => $order_id,
                    'full_name' => $full_name,
                    'email' => $email,
                    'phone' => $phone,
                    'province' => $province,
                    'district' => $district,
                    'commune' => $commune,
                    'shipping' => $shipping,
                    'product_name' => $name_product,
                    'product_price' => $price_product, // Giá sản phẩm tương ứng
                    'product_quantity' => $quantity,
                ]);
            return response()->json(['message' => $order->madonhang], 200);
            }  else {
                return response()->json(['message' => 'Thất bại, lỗi không xác định'], 500);
            }
        }
      }
      function get_order($madonhang){
        return Order::select(
                'orders.*',

                'order_details.*'
            )
            ->leftJoin('order_details', 'orders.order_id', '=', 'order_details.order_id')
            ->where('orders.madonhang', $madonhang)
            ->get();
    }
}
