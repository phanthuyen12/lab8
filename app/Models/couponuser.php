<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class couponuser extends Model
{
    use HasFactory;
    protected $table= 'coupon_user';
    protected $fillable = [
        'coupon_id', 'user_id', 'used_at','status'
    ];
    public function discount()
    {
        return $this->belongsTo(Discount::class, 'coupon_id');
    }

    // Mỗi mã giảm giá có thể được sử dụng bởi nhiều người dùng
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
