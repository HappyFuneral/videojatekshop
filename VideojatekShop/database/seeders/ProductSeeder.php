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
            'code' => '8713439174168',
            'name' => 'Compact Gamepad GXT 24',
            'product_img' => '',
            'description' => 'péló',
            'price' => 12000,
            'releaseDate' => now(),
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 4,
            'publisher_id' => 19 
        ]);
        Product::create([
            'code' => '3307216100522',
            'name' => 'Far Cry New Dawn',
            'product_img' => 'kuki',
            'description' => '',
            'price' => 12000,
            'releaseDate' => now(),
            'tariff_number' => 95045000,
            'tariff_description' => 'Video game consoles and machines',
            'product_type_id' => 1,
            'publisher_id' => 18 
        ]);
    }
}
