<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EducationLevel;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $educationLevels = [
            ['name' => 'No Formal Education'],
            ['name' => 'Primary School'],
            ['name' => 'Middle School'],
            ['name' => 'High School'],
            ['name' => 'Secondary School'],
            ['name' => 'Intermediate'],
            ['name' => 'A-Levels'],
            ['name' => 'O-Levels'],
            ['name' => 'Diploma'],
            ['name' => 'Certificate'],
            ['name' => 'Associate Degree'],
            ['name' => 'Bachelor\'s Degree'],
            ['name' => 'Master\'s Degree'],
            ['name' => 'PhD'],
            ['name' => 'Post Graduate'],
            ['name' => 'Professional Certification'],
            ['name' => 'Technical Training'],
            ['name' => 'Vocational Training'],
            ['name' => 'Trade School'],
            ['name' => 'Apprenticeship'],
            ['name' => 'Online Course'],
            ['name' => 'Bootcamp'],
            ['name' => 'Workshop'],
            ['name' => 'Seminar'],
            ['name' => 'Continuing Education'],
            ['name' => 'Executive Education'],
            ['name' => 'MBA'],
            ['name' => 'EMBA'],
            ['name' => 'LLB'],
            ['name' => 'MD']
        ];

        foreach ($educationLevels as $level) {
            EducationLevel::create($level);
        }
    }
}