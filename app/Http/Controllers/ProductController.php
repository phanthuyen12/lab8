<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function get_create_product(){
        $categorys = Category::select('category_id', 'category_name', 'images', 'created_at','trangthai')->get();

        return view("admin/create_product",compact("categorys"));
    }
    public function create_product(Request $request){
        // Xác thực dữ liệu từ request
        $request->validate([
            'img_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'name_products' => 'required|string',
            'price_product' => 'required|integer',
            'id_category' => 'required|integer', // Đảm bảo rằng 'id_category' là bắt buộc và phải là số nguyên
            'stock_quantity' => 'required|integer',
            'describe' => 'required|string',
        ]);
    
        // Xử lý ảnh sản phẩm
        $image = $request->file('img_product');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    
        // Tạo mới sản phẩm
        $product = new Product();
        $product->product_name	 = $request->name_products;
        $product->category_id = $request->id_category;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->describe;    
        $product->price = $request->price_product;
        $product->img_product = $imageName;
        $product->save();
    
        // Trả về phản hồi thành công
        return response()->json(['message' => 'Thành công'], 200);
    }
    public function product_management(Request $request){

        $products = Product::select('products.product_id', 'products.product_name', 'products.price', 'products.img_product', 'products.description', 'products.stock_quantity', 'products.created_at as product_created_at', 'products.updated_at', 'categories.category_name as category_name', 'categories.created_at as category_created_at')
        ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
        ->get();
    
        $categorys = Category::select('category_id', 'category_name', 'images', 'created_at', 'trangthai')->get();
        return view('admin/product_management', compact('products', 'categorys'));
    }
    
    public function get_product_id($id){
        // Tìm sản phẩm theo id
        $product = Product::find($id);
    
        // Kiểm tra xem sản phẩm có tồn tại không
        if(!$product) {
            // Nếu không tìm thấy sản phẩm, trả về phản hồi lỗi 404 Not Found
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
    
        // Nếu sản phẩm tồn tại, trả về thông tin sản phẩm
        return response()->json(['message' => $product], 200);
    }
    
    public function delete_product(Request $request){
        $request->validate([
            'id' => 'required|exists:products,product_id',
        ]);
    
        $id = $request->id;
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Sản phẩm không tồn tại'], 404);
        }
    
        $imagePath = public_path('images/' . $product->img_product);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Xóa ảnh từ thư mục public
        }
    
        $product->delete();

        return response()->json(['message' => 'Xóa sản phẩm và ảnh thành công'], 200);
    }
    public function product_detail($id){
        $product = Product::select('product_id', 'product_name', 'price', 'description', 'stock_quantity', 'img_product')
        ->where('product_id', $id)
        ->first();
        // print_r($product);
        return view('client/product-details', compact('product'));
}
    public function update_product(Request $request){
        $request->validate([

            'img_product' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
            'name_products' => 'required|string',
            'price_product' => 'required|integer',
            'id_category' => 'required|integer', // Đảm bảo rằng 'id_category' là bắt buộc và phải là số nguyên
            'stock_quantity' => 'required|integer',
            'describe' => 'required|string',
        ]);
        $id = $request->id;
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'.$id], 404);
        }
        $imagePath = public_path('images/' . $product->img_product);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Xóa ảnh từ thư mục public
        }
    

    
        // Xử lý ảnh sản phẩm
        $image = $request->file('img_product');
        
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    
        // Tạo mới sản phẩm
        
        $product->product_name = $request->name_products;
        $product->category_id  = $request->id_category;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->describe;    
        $product->price = $request->price_product;
        $product->img_product = $imageName;
        $product->save();
    
        // Trả về phản hồi thành công
        return response()->json(['message' => 'Thành công'], 200);
    }
    public function trangthai_product(Request $request){

    }
}
