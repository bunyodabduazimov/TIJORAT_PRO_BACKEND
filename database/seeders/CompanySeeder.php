<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::create([
            'name' => 'TIJORAT PRO',
            'active' => true
        ]);

        Company::create([
            'name' => 'TEST COMPANY',
            'active' => true
        ]);
    }
}
