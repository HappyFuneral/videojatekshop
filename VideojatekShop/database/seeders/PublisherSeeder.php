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
            'name' => 'Ubisoft'
        ]);

        Publisher::create([
            'name' => 'Trust'
        ]);

        Publisher::create([
            'name' => 'CD PROJEKT RED'
        ]);

        Publisher::create([
            'name' => 'Nintendo'
        ]);

        Publisher::create([
            'name' => 'From Software'
        ]);

        Publisher::create([
            'name' => 'CD PROJEKT RED'
        ]);
    }
}
