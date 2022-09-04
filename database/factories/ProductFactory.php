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
    public function definition()
    {
        return [
            'name' => fake()->title(),
            'slug' => fake()->slug(),
            'price' => fake()->numberBetween($min = 1000, $max = 9000),
            'limit' => 1,
            'category_id' => fake()->randomElement($array = array (1,2,3,4,5)),
        ];
    }
}
