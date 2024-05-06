<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Platform::factory()->create(
            ['name' => 'PC']  
        );

        Platform::factory()->create(
            ['name' => 'Xbox 360']  
        );

        Platform::factory()->create(
            ['name' => 'Xbox One']  
        );

        Platform::factory()->create(
            ['name' => 'Play Station 4']  
        );

        Platform::factory()->create(
            ['name' => 'Play Station 5']  
        );

        Platform::factory()->create(
            ['name' => 'Nintendo Switch']  
        );
    }
}
