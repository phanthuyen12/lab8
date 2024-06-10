<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $primaryKey= 'order_detail_id';
    protected $fillable = [
       'order_id',
        'full_name',
        'email',
        'phone',
        'province',
        'district',
        'commune',
        'shipping' ,
        'product_name',
        'product_price',
        'product_quantity',

    ];
    public function Order()
    {
        return $this->hasMany(Order::class, 'order_id');
    }
}
