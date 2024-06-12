<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'user_id',
        'status',
        'madonhang',
        'full_name',
        'email',
        'phone',
        'province',
        'district',
        'commune',
        'totalamount',
        'totalamountsale',
        'shipping',
        'code_pay',

    ];

    public function orderDetails()
    {
        return $this->hasMany(Orderdetails::class, 'order_id', 'order_id');
    }

}
