<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Technology'],
            ['name' => 'Healthcare'],
            ['name' => 'Finance'],
            ['name' => 'Education'],
            ['name' => 'Marketing'],
            ['name' => 'Sales'],
            ['name' => 'Human Resources'],
            ['name' => 'Engineering'],
            ['name' => 'Design'],
            ['name' => 'Customer Service'],
            ['name' => 'Operations'],
            ['name' => 'Administration'],
            ['name' => 'Legal'],
            ['name' => 'Media'],
            ['name' => 'Hospitality'],
            ['name' => 'Retail'],
            ['name' => 'Manufacturing'],
            ['name' => 'Construction'],
            ['name' => 'Transportation'],
            ['name' => 'Agriculture'],
            ['name' => 'Real Estate'],
            ['name' => 'Consulting'],
            ['name' => 'Non-Profit'],
            ['name' => 'Government'],
            ['name' => 'Security'],
            ['name' => 'Research'],
            ['name' => 'Quality Assurance'],
            ['name' => 'Project Management'],
            ['name' => 'Business Development'],
            ['name' => 'Data Analysis']
        ];

        foreach ($categories as $category) {
            JobCategory::create($category);
        }
    }
}