<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::factory()->create(
            ['name' => 'Videójáték']  
        );

        ProductType::factory()->create(
            ['name' => 'Kontroller']  
        );

        ProductType::factory()->create(
            ['name' => 'Konzol']  
        );

        ProductType::factory()->create(
            ['name' => 'Tartozékok']  
        );
        
    }
}
