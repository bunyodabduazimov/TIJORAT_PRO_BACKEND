<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => 1,
            'name' => $this->faker->word(),
            'active' => true
        ];
    }
}
