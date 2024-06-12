<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use App\Models\couponuser;

class DiscountController extends Controller
{
    //
    function create(){
        $discount = Discount::get();
        return view('admin/discountcode',compact('discount'));
    }
    function create_discount(Request $request) {
        try {
            // Xác thực dữ liệu đầu vào
            $validatedData = $request->validate([
                'code' => 'required|string|unique:coupons,code|max:50',
                'discount' => 'required|integer|min:0|max:100',
                'expiration_date' => 'required|date|after:today',
                'usage_limit' => 'required|integer|min:1',
            ]);
    
            // Tạo mã giảm giá mới
            $coupon = Discount::create([
                'code' => $validatedData['code'],
                'discount' => $validatedData['discount'],
                'expiration_date' => $validatedData['expiration_date'],
                'usage_limit' => $validatedData['usage_limit'],
                'times_used' => 0,
                'status' =>0,
            ]);
    
            return redirect()->back()->with('success', 'tạo thành công');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
    public function updatestatuscode(Request $request){
        $discount = Discount::find($request->id);
        if ($discount) {
            $discount->status = !$discount->status; // Toggle status
            $discount->save();
            return response()->json(['status' => $discount->status]);
        }
        return response()->json(['error' => 'Mã giảm giá không tồn tại.'], 404);
    }
    public function validateCoupon(Request $request, $code)
{
    $coupon = Discount::where('code', $code)->first();
    $coupon_id = $coupon->id;
    $coupon_status = $coupon->status;
    if($coupon_status == 1){
        return response()->json(['valid' => false, 'message' => 'Mã giảm giá đã đóng.']);

    }
    if (!$coupon) {
        return response()->json(['valid' => false, 'message' => 'Mã giảm giá không tồn tại.']);
    }

    if ($coupon->expiration_date < now()) {
        return response()->json(['valid' => false, 'message' => 'Mã giảm giá đã hết hạn.']);
    }

    if ($coupon->times_used >= $coupon->usage_limit) {
        return response()->json(['valid' => false, 'message' => 'Mã giảm giá đã sử dụng hết.']);
    }
    $user = auth()->user();
    if(!$user){
        return response()->json(['valid' => false, 'message' => 'vui lòng đăng nhập mới dùng được mã']);

    }
    
    $user_id = $user->user_id;
    $sql =  couponuser::where('user_id',$user_id)
    ->where('coupon_id', $coupon_id)
    ->first();

    if ($sql) {
        return response()->json(['valid' => false, 'message' => 'Bạn đã sử dụng mã giảm giá này rồi.']);
    }
  
    return response()->json(['valid' => true, 'discount' => $coupon->discount]);
}
public function applyCoupon(Request $request, $code)
{
    $coupon = Discount::where('code', $code)->first();
    $coupon_id = $coupon->id;

    if (!$coupon) {
        return response()->json(['success' => false, 'message' => 'Mã giảm giá không tồn tại.']);
    }

    if (!$coupon->isUsable()) {
        return response()->json(['success' => false, 'message' => 'Mã giảm giá không khả dụng.']);
    }

    $discount = $coupon->discount;
    $totalAmount = $request->input('total_amount');
    $totalAmountAfterDiscount = $totalAmount - ($totalAmount * $discount / 100);

    // Tăng số lần sử dụng
    $coupon->incrementUsage();
    $user = auth()->user();
    $user_id = $user->user_id;
    $couponuser = couponuser::create([
        'coupon_id'=>$coupon_id,
        'user_id'=>$user_id,
        'used_at'=>now()


    ]);
    if($couponuser){
        return response()->json(['success' => true, 'total_amount_after_discount' => $totalAmountAfterDiscount]);

    }else{
        return response()->json(['success' => false, 'message' => 'Mã giảm giá không khả dụng.']);

    }

}
}