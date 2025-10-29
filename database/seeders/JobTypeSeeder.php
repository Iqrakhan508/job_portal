<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobType;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobTypes = [
            ['name' => 'Full Time'],
            ['name' => 'Part Time'],
            ['name' => 'Contract'],
            ['name' => 'Freelance'],
            ['name' => 'Internship'],
            ['name' => 'Temporary'],
            ['name' => 'Remote'],
            ['name' => 'Hybrid'],
            ['name' => 'On-site'],
            ['name' => 'Consultant'],
            ['name' => 'Volunteer'],
            ['name' => 'Seasonal'],
            ['name' => 'Project-based'],
            ['name' => 'Commission-based'],
            ['name' => 'Hourly'],
            ['name' => 'Salary'],
            ['name' => 'Fixed-term'],
            ['name' => 'Permanent'],
            ['name' => 'Probationary'],
            ['name' => 'Executive'],
            ['name' => 'Entry Level'],
            ['name' => 'Mid Level'],
            ['name' => 'Senior Level'],
            ['name' => 'Lead'],
            ['name' => 'Manager'],
            ['name' => 'Director'],
            ['name' => 'C-Level'],
            ['name' => 'Specialist'],
            ['name' => 'Generalist'],
            ['name' => 'Coordinator']
        ];

        foreach ($jobTypes as $jobType) {
            JobType::create($jobType);
        }
    }
}