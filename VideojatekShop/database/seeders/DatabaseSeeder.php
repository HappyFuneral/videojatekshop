<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        $this->call([
            ProductTypeSeeder::class,
            PublisherSeeder::class,
            PlatformSeeder::class,
            ProductSeeder::class,
            OrderStateSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            StorageSeeder::class,
            StorageProductSeeder::class,
        ]);
    }
}
