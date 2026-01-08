<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 🏢 Компания 1
        Product::factory()->count(3000)->create([
            'company_id' => 1,
            'type' => 'product'
        ]);

        Product::factory()->count(1000)->create([
            'company_id' => 1,
            'type' => 'service'
        ]);
    }
}
