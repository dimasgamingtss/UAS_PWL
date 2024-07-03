<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        Product::create(['name' => 'Dimsum Ayam', 'price' => 17000, 'stock' => 100]);
        Product::create(['name' => 'Dimsum Udang', 'price' => 17000, 'stock' => 100]);
        Product::create(['name' => 'Ekado', 'price' => 18000, 'stock' => 100]);
        Product::create(['name' => 'Lumpia Udang', 'price' => 17000, 'stock' => 100]);
        Product::create(['name' => 'Kuotie', 'price' => 20000, 'stock' => 100]);
    }
}

