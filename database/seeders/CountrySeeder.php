<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pakistan and India countries
        Country::create([
            'country_name' => 'Pakistan',
            'country_status' => 1
        ]);

        Country::create([
            'country_name' => 'India',
            'country_status' => 1
        ]);
    }
}