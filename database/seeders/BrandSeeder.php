<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::factory()->count(5)->create(['company_id' => 1]);
        Brand::factory()->count(5)->create(['company_id' => 2]);
    }
}
