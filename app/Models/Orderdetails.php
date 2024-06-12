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
        'product_name',
        'product_price',
        'product_quantity',

    ];
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
