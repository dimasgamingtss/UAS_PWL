<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProductsTableSeeder::class,
            UsersTableSeeder::class,
            // Tambahkan seeder lain di sini jika diperlukan
        ]);
    }
}

