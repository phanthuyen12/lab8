<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function select_data(Request $request)
    {
        // Lấy danh sách các danh mục và số lượng sản phẩm tương ứng
        $categories = Category::select('category_id', 'category_name', 'images', 'created_at', 'trangthai')->withCount('products')
            ->get();
    
        return response()->json($categories);
    }
    public function update_trangthai(Request $request){
        {
            $categoryId = $request->input('id');
            $category = Category::find($categoryId);
    
            if ($category) {
                $category->trangthai = $category->trangthai == 0 ? 1 : 0;
                $category->save();
    
                return response()->json(['status' => $category->trangthai, 'message' => 'Cập nhật trạng thái thành công']);
            } else {
                return response()->json(['message' => 'Không tìm thấy danh mục'], 404);
            }
        }
    }
    
    
    public function get_category_id($id){
        $category = Category::find($id);
        return response()->json($category);
    }

    public function creates(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('category_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $category = new Category();
        $category->category_name  = $request->category_name;
        $category->images = $imageName;
        $category->save();

        return redirect()->back()->with('success', 'thành công');
    }

    public function delete_item(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|exists:categories,category_id',
            ]);
    
            $categoryId = $request->id;
            $category = Category::with('products')->find($categoryId);
    
            if (!$category) {
                return response()->json(['message' => 'Danh mục không tồn tại'], 404);
            }
    
            // Kiểm tra xem danh mục có sản phẩm không
            if ($category->products()->exists()) {
                return response()->json(['message' => 'Không thể xóa danh mục vì có sản phẩm trong danh mục này'], 422);
            }
    
            $imagePath = public_path('images/' . $category->images);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Xóa ảnh từ thư mục public
            }
    
            $category->delete();
    
            return response()->json(['message' => 'Xóa danh mục và ảnh thành công'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    
    
    public function update_category(Request $request){
        // Xác thực dữ liệu được gửi từ request nếu cần
        $request->validate([
            'id' => 'required|exists:categories,category_id',
            'name_category' => 'required|string|max:255',
            'category_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $categoryId = $request->id;
    
        // Tìm danh mục theo ID
        $category = Category::find($categoryId);
    
        // Nếu không tìm thấy danh mục, trả về thông báo lỗi
        if (!$category) {
            return response()->json(['message' => 'Danh mục không tồn tại'], 404);
        }
    
        // Lấy và lưu ảnh mới
        $image = $request->file('category_img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    
        // Cập nhật thông tin danh mục
        $category->category_name = $request->name_category;
        $category->images = $imageName;
        $category->save();
    
        // Xóa ảnh cũ nếu tồn tại
        $imagePath = public_path('images/' . $category->images);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Xóa ảnh từ thư mục public
        }
    
        // Trả về phản hồi cho client
        return redirect()->back()->with('success', 'thành công');
    }
}    
