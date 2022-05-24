<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
            'product_name' => $this->faker->name(),
            'product_stock' => $this->faker->numberBetween(10,100),
            'product_cost' => $this->faker->numberBetween(100,200),
            'product_price' => $this->faker->numberBetween(200,500),
        ];
    }


}
