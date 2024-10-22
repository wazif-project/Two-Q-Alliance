<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing companies
        Company::truncate();

        // First company - Maxis Communications
        Company::create([
            'name' => 'Maxis Communications',
            'email' => 'Alex@maxis.com',
            'website' => 'https://www.maxis.com.my/en/home/',
            'logo' => 'public/maxis-logo.png',
            'created_at' => Carbon::parse('2024-10-22 09:49:00'),
            'updated_at' => Carbon::parse('2024-10-22 09:49:00')
        ]);

        // Second company - Two Q Alliance
        Company::create([
            'name' => 'Two Q Alliance',
            'email' => 'wahida@2q.my',
            'website' => 'https://www.2q.my/',
            'logo' => 'public/2q-logo.png',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}