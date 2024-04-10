<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::factory()->create([
            'name' => 'Budapesti bolt',
            'country' => 'Magyarország',
            'province' => 'Budapest',
            'city' => 'Budapest',
            'address' => 'Petőfi utca 16',
            'postal' => '1042',
        ]);
    }
}
