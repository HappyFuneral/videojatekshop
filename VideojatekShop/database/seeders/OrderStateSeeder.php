<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OrderState;

class OrderStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderState::factory()->create(
            ['state' => 'Törölve']  
        );

        OrderState::factory()->create(
            ['state' => 'Megrendelve']  
        );
        OrderState::factory()->create(
            ['state' => 'Megerősítve']  
        );

        OrderState::factory()->create(
            ['state' => 'Szállítás alatt']  
        );

        OrderState::factory()->create(
            ['state' => 'Félretéve']  
        );

        OrderState::factory()->create(
            ['state' => 'Kézbesítve']  
        );
    }
}
