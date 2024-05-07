<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StorageProduct;


class StorageProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (\App\Models\Storage::all() as $storage){
            foreach (\App\Models\Product::all() as $product){
                StorageProduct::factory()->create(
                [
                    'storage_id' => $storage->id,
                    'product_id' => $product->id,
                    'quantity' => 10
                ]
                );
            }
        }
    }
}
