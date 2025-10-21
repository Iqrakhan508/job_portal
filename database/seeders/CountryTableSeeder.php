<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('country')->insert([
            'country_name'   => 'Pakistan',
            'country_status' => 1, // Active
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now(),
        ]);
    }
}
