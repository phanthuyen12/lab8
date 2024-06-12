<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\User;
use Illuminate\Support\Facades\DB; // Đừng quên import Query Builder

use Illuminate\Support\Str;

class ApiController extends Controller
{
    //
    function get_categories(){
        try{
        $categories = Category::select('category_id', 'category_name', 'images', 'created_at', 'trangthai')
        ->get();
        $mappedCategories = $categories->map(function($category) {
            return [
                'id' => $category->category_id,
                'name' => $category->category_name,
                'image' => $category->images,
                'created_at' => $category->created_at,
                'status' => $category->trangthai
            ];
        });

            return response()->json([
                'success'=> true,
                'data'=>$mappedCategories
            ],201);
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ],500);
        }
       
    }
    function get_product_categories($id){
        try{
            // Lấy dữ liệu từ cơ sở dữ liệu
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
            ->where('products.category_id', $id)
            ->get();
    
            // Chuyển đổi tên các trường
            $mappedProducts = $products->map(function($product) {
                return [
                    'id' => $product->product_id,
                    'name' => $product->product_name,
                    'price' => $product->price,
                    'image' => $product->img_product,
                    'description' => $product->description,
                    'stock_quantity' => $product->stock_quantity,
                    'product_created_at' => $product->product_created_at,
                    'updated_at' => $product->updated_at,
                    'category_name' => $product->category_name,
                    'category_created_at' => $product->category_created_at
                ];
            });
    
            // Trả về phản hồi JSON với các trường đã được ánh xạ
            return response()->json([
                'success'=> true,
                'data' => $mappedProducts
            ], 200);  
    
        } catch(\Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ], 500);
        }
    }
    
    function product_detail($id){
        try {
            // Lấy dữ liệu từ cơ sở dữ liệu
            $products = Product::where('product_id', $id)->get();
    
            // Chuyển đổi tên các trường
            $mappedProducts = $products->map(function($product) {
                return [
                    'id' => $product->product_id,
                    'name' => $product->product_name,
                    'price' => $product->price,
                    'image' => $product->img_product,
                    'description' => $product->description,
                    'stock_quantity' => $product->stock_quantity,
                    'created_at' => $product->created_at,
                    'updated_at' => $product->updated_at,
                ];
            });
    
            // Trả về phản hồi JSON với các trường đã được ánh xạ
            return response()->json([
                'success' => true,
                'data' => $mappedProducts
            ], 201);  
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ], 500);
        }
    }
    
    function information_user(Request $request) {
        try {
            // Xác thực dữ liệu đầu vào
            $request->validate([
                'token' => 'required|string',
            ]);
    
            // Lấy token từ yêu cầu
            $token = $request->token;
    
            // Lấy dữ liệu người dùng từ cơ sở dữ liệu
            $users = User::where('token', $token)->get();
    
            // Chuyển đổi tên các trường
            $mappedUsers = $users->map(function($user) {
                return [
                    'id' => $user->user_id,
                    'name' => $user->full_name,
                    'mail' => $user->email,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                    'province' => $user ->provincestore,
                    'districts'=> $user->districtstore,
                    'communes'=> $user->communestore,
                    // Thêm các trường khác nếu cần thiết
                ];
            });
    
            // Trả về phản hồi JSON với các trường đã được ánh xạ
            return response()->json([
                'success' => true,
                'data' => $mappedUsers
            ], 201);
    
        } catch(\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ], 500);
        }
    }
    
      function buy_products(Request $request){
        try{
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
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ],500);
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
    function get_province(){
        try {
            $province = DB::table('province')->get();
            return response()->json([
                'success' => true,
                'data' => $province
            ],201); 
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ],500);
        }
    }
    function get_district($id){
        try{
            $district  =DB::table('district')->where('_province_id',$id)->get();
            return response()->json([
                'success' => true,
                'data' => $district
            ],201); 
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ],500);
        }
    }
    function get_Ward($id){
        try{
        $Ward = DB::table('ward')->where('_district_id',$id)->get();
        return response()->json([
            'success' => true,
            'data' => $Ward
        ],201); 
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
            ],500);
        }
    }
    function get_street($id){
        try{
            $street = DB::table('street')->where('_district_id',$id)->get();
            return response()->json([
                'success' => true,
                'data' => $street
            ],201); 
            }catch(\Exception $e){
                return response()->json([
                    'success' => false,
                    'error' => $e->getMessage()  // Xuất ra thông báo lỗi của mã
                ],500);
            }
    }
    
}
