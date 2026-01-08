<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reference;

class ReferenceSeeder extends Seeder
{
    public function run(): void
    {
        $companyId = 1; 
        // ===== GROUPS =====
        $groups = ['Напитки', 'Еда', 'Техника', 'Одежда'];

        foreach ($groups as $name) {
            Reference::create([
                'company_id' => $companyId,
                'name' => $name,
                'type' => 'group',
                'active' => true
            ]);
        }

        // ===== BRANDS =====
        $brands = ['Coca-Cola', 'Samsung', 'Apple', 'Nike'];

        foreach ($brands as $name) {
            Reference::create([
                'company_id' => $companyId,
                'name' => $name,
                'type' => 'brand',
                'active' => true
            ]);
        }

        // ===== UNITS =====
        $units = ['Шт', 'Кг', 'Литр', 'Упаковка'];

        foreach ($units as $name) {
            Reference::create([
                'company_id' => $companyId,
                'name' => $name,
                'type' => 'unit',
                'active' => true
            ]);
        }
    }
}
