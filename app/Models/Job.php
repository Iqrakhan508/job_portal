<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'category_id',
        'education_level_id',
        'country_id',
        'city_id',
        'job_type_id',
        'title',
        'slug',
        'description',
        'responsibilities',
        'requirements',
        'image',
        'min_experience_months',
        'salary_min',
        'salary_max',
        'currency',
        'vacancies',
        'is_remote',
        'posting_date',
        'last_apply_date',
        'is_active'
    ];

    protected $casts = [
        'posting_date' => 'date',
        'last_apply_date' => 'date',
        'is_remote' => 'boolean',
        'is_active' => 'boolean',
        'salary_min' => 'decimal:2',
        'salary_max' => 'decimal:2',
    ];

    // Auto-generate slug from title
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($job) {
            if (empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
        
        static::updating(function ($job) {
            if ($job->isDirty('title') && empty($job->slug)) {
                $job->slug = Str::slug($job->title);
            }
        });
    }

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function category()
    {
        return $this->belongsTo(JobCategory::class, 'category_id');
    }

    public function educationLevel()
    {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'city_id');
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_skills', 'job_id', 'skill_id');
    }

    // Accessors
    public function getFormattedSalaryAttribute()
    {
        if ($this->salary_min && $this->salary_max) {
            return $this->currency . ' ' . number_format($this->salary_min) . ' - ' . number_format($this->salary_max);
        } elseif ($this->salary_min) {
            return $this->currency . ' ' . number_format($this->salary_min) . '+';
        }
        return 'Not specified';
    }

    public function getExperienceYearsAttribute()
    {
        return round($this->min_experience_months / 12, 1);
    }
}
