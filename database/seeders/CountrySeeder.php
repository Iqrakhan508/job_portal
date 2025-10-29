<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pakistan and India countries
        country::create([
            'country_name' => 'Pakistan',
            'country_status' => 1
        ]);

        country::create([
            'country_name' => 'India',
            'country_status' => 1
        ]);
    }
}