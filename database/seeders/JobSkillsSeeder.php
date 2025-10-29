<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
use App\Models\Skill;

class JobSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all jobs and skills
        $jobs = Job::all();
        $skills = Skill::all();

        if ($jobs->count() == 0 || $skills->count() == 0) {
            $this->command->info('No jobs or skills found. Please run job and skill seeders first.');
            return;
        }

        $this->command->info('Adding skills to jobs...');

        foreach ($jobs as $job) {
            // Assign 3-5 random skills to each job
            $randomSkills = $skills->random(rand(3, 5));
            
            foreach ($randomSkills as $skill) {
                // Check if relationship already exists
                $exists = DB::table('job_skills')
                    ->where('job_id', $job->id)
                    ->where('skill_id', $skill->id)
                    ->exists();

                if (!$exists) {
                    DB::table('job_skills')->insert([
                        'job_id' => $job->id,
                        'skill_id' => $skill->id,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
            
            $this->command->info("Added skills to job: {$job->title}");
        }

        $totalJobSkills = DB::table('job_skills')->count();
        $this->command->info("Total job-skill relationships created: {$totalJobSkills}");
    }
}
