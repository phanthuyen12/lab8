<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = [
        'code', 'discount', 'expiration_date', 'usage_limit', 'times_used','status'
    ];

    // Tăng số lần sử dụng mã giảm giá
    public function incrementUsage()
    {
        $this->times_used++;
        $this->save();
    }

    // Kiểm tra mã giảm giá có thể sử dụng được không
    public function isUsable()
    {
        return $this->times_used < $this->usage_limit && $this->expiration_date > now();
    }
 
}
