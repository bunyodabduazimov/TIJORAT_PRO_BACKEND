<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'company_id' => 1, // потом можно менять в сидере

            'type' => $this->faker->randomElement(['product', 'service']),

            'name' => $this->faker->words(3, true),
            'barcode' => $this->faker->ean13(),
            'sku' => strtoupper($this->faker->bothify('SKU-###??')),

            'group_id' => rand(1, 3),
            'unit_id' => rand(1, 3),
            'brand_id' => rand(1, 3),

            'min_quantity' => $this->faker->numberBetween(0, 20),
            'package' => $this->faker->randomElement(['box', 'pcs', 'kg']),
            'term' => $this->faker->dateTimeBetween('now', '+2 years'),
            'whole' => $this->faker->boolean(),

            'image' => 'product.png',
            'status' => true,
            'view' => $this->faker->numberBetween(0, 500),

            'description' => $this->faker->sentence(12),
        ];
    }
}
