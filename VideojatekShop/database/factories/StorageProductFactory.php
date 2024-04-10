<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StorageProduct>
 */
class StorageProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /*
            'code' => fake() -> creditCardNumber(),
            'storage_id' => fake(1),
            'product_id' => fake()
            */
        ];
    }
}
