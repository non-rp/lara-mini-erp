<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => 'Product ' . $this->faker->unique()->randomNumber(3),
            'sku' => $this->faker->unique()->slug(),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->text(),
        ];
    }
}
