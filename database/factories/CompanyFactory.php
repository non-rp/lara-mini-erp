<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => 'Company ' . $this->faker->unique()->randomNumber(3),
            'slug' => $this->faker->unique()->slug(),
            'is_active' => true,
        ];
    }
}
