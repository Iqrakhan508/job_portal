<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            // Programming Languages
            ['name' => 'PHP'],
            ['name' => 'JavaScript'],
            ['name' => 'Python'],
            ['name' => 'Java'],
            ['name' => 'C#'],
            ['name' => 'TypeScript'],
            
            // Web Development
            ['name' => 'HTML'],
            ['name' => 'CSS'],
            ['name' => 'Laravel'],
            ['name' => 'React'],
            ['name' => 'Vue.js'],
            ['name' => 'Angular'],
            ['name' => 'Node.js'],
            ['name' => 'Django'],
            ['name' => 'ASP.NET'],
            ['name' => 'Bootstrap'],
            ['name' => 'Tailwind CSS'],
            ['name' => 'jQuery'],
            
            // Mobile Development
            ['name' => 'Flutter'],
            ['name' => 'React Native'],
            ['name' => 'Android'],
            ['name' => 'iOS'],
            
            // Databases
            ['name' => 'MySQL'],
            ['name' => 'PostgreSQL'],
            ['name' => 'MongoDB'],
            ['name' => 'SQL Server'],
            ['name' => 'Oracle'],
            ['name' => 'Firebase'],
            
            // Cloud & DevOps
            ['name' => 'AWS'],
            ['name' => 'Azure'],
            ['name' => 'Docker'],
            ['name' => 'Kubernetes'],
            ['name' => 'Git'],
            ['name' => 'Linux'],
            
            // Design & UI/UX
            ['name' => 'UI/UX Design'],
            ['name' => 'Figma'],
            ['name' => 'Adobe Photoshop'],
            ['name' => 'Adobe Illustrator'],
            
            // Digital Marketing
            ['name' => 'SEO'],
            ['name' => 'Google Analytics'],
            ['name' => 'Social Media Marketing'],
            ['name' => 'Content Writing'],
            
            // Data Science
            ['name' => 'Machine Learning'],
            ['name' => 'Data Analysis'],
            ['name' => 'Excel'],
            
            // Other Important Skills
            ['name' => 'Project Management'],
            ['name' => 'Agile'],
            ['name' => 'RESTful API'],
            ['name' => 'GraphQL'],
            ['name' => 'Cybersecurity'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}