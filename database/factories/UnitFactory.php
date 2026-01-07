<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => 1,
            'name' => $this->faker->randomElement(['Piece','Kg','Liter','Box']),
            'short' => $this->faker->randomElement(['pcs','kg','l','box']),
            'active' => true
        ];
    }
}
