<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Publisher;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Publisher::create([
            'name' => 'Microsoft'
        ]);

        Publisher::create([
            'name' => 'Sony Interactive'
        ]);

        Publisher::create([
            'name' => 'KOEI TECMO'
        ]);

        Publisher::create([
            'name' => 'Capcom'
        ]);

        Publisher::create([
            'name' => 'Bandai Namco Entertainment'
        ]);

        Publisher::create([
            'name' => 'NEOWIZ'
        ]);

        Publisher::create([
            'name' => 'ASUS'
        ]);

        Publisher::create([
            'name' => 'Logitech'
        ]);

        Publisher::create([
            'name' => 'Warner Bros Global Publishing'
        ]);

        Publisher::create([
            'name' => 'Universal Music Group'
        ]);

        Publisher::create([
            'name' => 'Stockfish Records'
        ]);

        Publisher::create([
            'name' => 'ECM Records'
        ]);

        Publisher::create([
            'name' => '2L Records'
        ]);

        Publisher::create([
            'name' => 'DeLock'
        ]);

        Publisher::create([
            'name' => 'EQUIP'
        ]);

        Publisher::create([
            'name' => 'ROLINE'
        ]);

        Publisher::create([
            'name' => 'Etalon Film Kiadó'
        ]);

        Publisher::create([
            'name' => 'Ubisoft'
        ]);

        Publisher::create([
            'name' => 'Trust'
        ]);
    }
}
