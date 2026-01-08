<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Filial;
use App\Models\User;


class CompanySeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::create([
            'name' => 'TIJORAT PRO',
            'active' => true
        ]);

        $filial = Filial::create([
            'company_id' => $company->id,
            'name' => 'TIJORAT PRO',
            'active' => true
        ]);

        // ✅ SUPER ADMIN
        User::updateOrCreate(
            ['email' => 'admin@tijorat.pro'],
            [
                'company_id' => $company->id,
                'filial_id' => $filial->id,
                'name' => 'Super Admin',
                'password' => Hash::make('123456'),
                'role' => 'admin',
                'active' => true
            ]
        );

        // ✅ MANAGER
        User::updateOrCreate(
            ['email' => 'manager@tijorat.pro'],
            [
                'company_id' => $company->id,
                'filial_id' => $filial->id,
                'name' => 'Manager',
                'password' => Hash::make('123456'),
                'role' => 'manager',
                'active' => true
            ]
        );

        // ✅ CASHIER
        User::updateOrCreate(
            ['email' => 'cashier@tijorat.pro'],
            [
                'company_id' => $company->id,
                'filial_id' => $filial->id,
                'name' => 'Cashier',
                'password' => Hash::make('123456'),
                'role' => 'cashier',
                'active' => true
            ]
        );

    }
}
