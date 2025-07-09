<?php

namespace Database\Factories;

use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Product>
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
            //
            'id' => (string)Str::uuid(),
            'name' => fake()->word,
            'description' => fake()->sentence,
            'details' => fake()->paragraph,
            'price' => fake()->numberBetween(1000, 50000),
            'image' => fake()->imageUrl(),
            'inStock' => fake()->boolean,
            'rating' => fake()->randomFloat(2, 0, 5),
        ];
    }
}
