<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $faker = Faker::create();

        //
        for ($i = 0; $i < 100; $i++) {
            Product::create([
                "name_products" => $faker->name,
                "price_product" => $faker->randomNumber(4), // Giả sử giá sản phẩm là một số ngẫu nhiên có 4 chữ số
                "img_product" => $faker->imageUrl(),
                "id_category" => $faker->numberBetween(1, 100), // Giả sử có 100 danh mục, chọn ngẫu nhiên một danh mục
            ]);
        }
    }
}
