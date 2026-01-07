<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        Unit::factory()->count(4)->create(['company_id' => 1]);
        Unit::factory()->count(4)->create(['company_id' => 2]);
    }
}
