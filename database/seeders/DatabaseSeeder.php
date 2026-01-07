<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            GroupSeeder::class,
            BrandSeeder::class,
            UnitSeeder::class,
            ProductSeeder::class
        ]);
    }
}
