<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Đảm bảo tên bảng chính xác là 'categories'

    protected $primaryKey = 'category_id';

    protected $fillable = [
        'created_at',
        'updated_at',
        'images',
        'name_category'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}

