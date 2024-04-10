<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderState::factory()->create(
            ['name' => 'Törölve']  
        );

        OrderState::factory()->create(
            ['name' => 'Megrendelve']  
        );

        OrderState::factory()->create(
            ['name' => 'Szállítás alatt']  
        );

        OrderState::factory()->create(
            ['name' => 'Félretéve']  
        );
    }
}
