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

    ];
    public function Orderdetails()
    {
        return $this->hasMany(Orderdetails::class, 'order_detail_id');
    }

}
