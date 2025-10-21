<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('skill_id');
            $table->timestamps();
            
            // Foreign key constraints
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            
            // Unique constraint to prevent duplicate job-skill combinations
            $table->unique(['job_id', 'skill_id']);
            
            // Indexes for better performance
            $table->index('job_id');
            $table->index('skill_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_skills');
    }
};