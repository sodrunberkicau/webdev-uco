<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
    
        return [
            'name' => fake()->name,
            'description' => fake()->text,
            'image' => "https://picsum.photos/id/" . fake()->numberBetween(1, 100) . "/200",
            'price' => fake()->numberBetween(50000, 1000000)
        ];
    }
}
