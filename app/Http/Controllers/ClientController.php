<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //
    public function index(){
        $product_item = Product::select('products.product_id', 'products.product_name', 'products.price', 'products.img_product', 'products.description', 'products.stock_quantity', 'products.created_at as product_created_at', 'products.updated_at', 'categories.category_name as category_name', 'categories.created_at as category_created_at')
        ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')->limit(6)
        ->get();
    
        return view("client/index",compact('product_item'));
    }
    public function login_user(){
        return view("client/login");
    }
    public function register_user(){
        return view("client/register");
    }
    public function user_user(){
        $user = session('user');
        
        return view("client/user",compact("user"));

    }
    public function get_shop(){
        return view('client/shop');
    }
    public function search_category(){
        $categories = DB::table('categories')
            ->leftJoin('products', 'categories.category_id', '=', 'products.category_id')
            ->select('categories.category_id', 'categories.category_name', 'categories.created_at', DB::raw('COUNT(products.product_id) as product_count'))
            ->where('categories.trangthai', 0) // Thêm điều kiện lấy danh mục có trạng thái = 1
            ->groupBy('categories.category_id', 'categories.category_name', 'categories.created_at')
            ->get();
        
        if ($categories->isEmpty()) {
            return response()->json(['message' => 'Không tìm thấy danh mục'], 404)
                             ->header('Content-Type', 'application/json; charset=utf-8');
        } else {
            return response()->json($categories)
                             ->header('Content-Type', 'application/json; charset=utf-8');
        }
    }
    
    public function get_all_product(){
        $products = DB::table('products')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('categories.trangthai', '!=', 1) // Lấy những sản phẩm có danh mục không có trạng thái bằng 1
            ->select('products.*')
            ->get();
        
        if ($products->isEmpty()) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404)
                             ->header('Content-Type', 'application/json; charset=utf-8');
        } else {
            return response()->json($products)
                             ->header('Content-Type', 'application/json; charset=utf-8');
        }
    }
    
    public function search_category_products($id){
        // echo 'xin chào'.$id;
        $product =DB::table('products')->where('category_id',$id)->get();
        if ($product){
            return response()->json($product)->header('Content-Type', 'application/json; charset=utf-8');

        }else{
            return response()->json(['message'=>'Ko tìm thấy'])->header('Content-Type', 'application/json; charset=utf-8');

        }
    }
}
