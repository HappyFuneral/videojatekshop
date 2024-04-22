<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Kontroller',
            'product_img' => '',
            'title' => 'Kontrollerr',
            'description' => 'péló',
            'price' => 12000,
            'releaseDate' => now(),
            'product_type_id' => 2,
            'publisher_id' => 1 
        ]);
        Product::create([
            'name' => 'Kontroller 2',
            'product_img' => 'kuki',
            'description' => '',
            'title' => 'Kontroller',
            'price' => 12000,
            'releaseDate' => now(),
            'product_type_id' => 2,
            'publisher_id' => 1 
        ]);
    }
}
