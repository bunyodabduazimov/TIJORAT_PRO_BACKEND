<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => 1,
            'name' => ucfirst($this->faker->word()),
            'country' => $this->faker->country(),
            'active' => true
        ];
    }
}
