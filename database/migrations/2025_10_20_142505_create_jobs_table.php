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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('job_type_id');
            $table->string('title', 255);
            $table->string('slug', 255)->unique();
            $table->text('description');
            $table->text('responsibilities')->nullable();
            $table->text('requirements')->nullable();
            $table->integer('min_experience_months')->default(0);
            $table->decimal('salary_min', 10, 2)->nullable();
            $table->decimal('salary_max', 10, 2)->nullable();
            $table->string('currency', 10)->default('PKR');
            $table->integer('vacancies')->default(1);
            $table->tinyInteger('is_remote')->default(0);
            $table->date('posting_date');
            $table->date('last_apply_date');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
            
            // Fulltext index for search
            $table->fullText(['title', 'description']);
            
            // Foreign key constraints
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('set null');
            $table->foreign('country_id')->references('country_id')->on('country')->onDelete('cascade');
            $table->foreign('city_id')->references('city_id')->on('city')->onDelete('cascade');
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
