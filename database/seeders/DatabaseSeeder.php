<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CountrySeeder::class,
            CitySeeder::class,
            JobCategorySeeder::class,
            JobTypeSeeder::class,
            EducationLevelSeeder::class,
            SkillSeeder::class,
            // CompanySeeder::class,  // ⚠️ TEMPORARILY DISABLED
            // JobSeeder::class,      // ⚠️ TEMPORARILY DISABLED
            MultiplePositionSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}