@extends('public.layout')

@section('title', $pageTitle)

@section('content')
<!-- Job Details Section -->
<section class="job-details-section">
    <div class="container">
        <a href="{{ route('jobs') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i> Back to Jobs
        </a>

        <!-- Job Title -->
        <div class="job-title-section">
            <h1 class="job-title">{{ $job->title }}</h1>
        </div>

        <!-- Job Content -->
        <div class="job-content">
            <!-- Main Content -->
            <div class="job-main">
                <div class="job-description">
                    <h3 class="section-title">Job Description</h3>
                    <p>{!! htmlspecialchars_decode($job->description) !!}</p>
                    @if(!empty($job->image))
                        @php
                            $imageRel = (strpos($job->image, 'job_images/') === 0) ? $job->image : 'job_images/' . $job->image;
                            $exists = \Illuminate\Support\Facades\Storage::disk('public')->exists($imageRel);
                            $publicUrl = $exists ? \Illuminate\Support\Facades\Storage::url($imageRel) : null;
                        @endphp
                        @if($exists)
                            <p><img src="{{ $publicUrl }}" alt="Job Image" style="max-width:100%;height:auto;border-radius:6px;border:1px solid #e5e6e7;"></p>
                        @endif
                    @endif

                </div>

                @if($job->requirements)
                <div class="job-requirements">
                    <h3 class="section-title">Requirements</h3>
                    <p>{!! htmlspecialchars_decode($job->requirements) !!}</p>
                </div>
                @endif

                @if($job->skills->count() > 0)
                <div class="skills-section">
                    <h3 class="section-title">Required Skills</h3>
                    <div class="skills-tags">
                        @foreach($job->skills as $skill)
                        <span class="skill-tag">{{ $skill->name }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($job->benefits)
                <div class="benefits-section">
                    <h3 class="section-title">Benefits</h3>
                    <ul class="benefits-list">
                        @php
                            $benefits = explode(', ', $job->benefits);
                        @endphp
                        @foreach($benefits as $benefit)
                        <li>{{ trim($benefit) }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="job-sidebar">
                <div class="job-info-card">
                    <h4>{{ $job->company->name ?? 'Company Not Specified' }}</h4>
                    <p class="text-muted">{{ $job->category->name ?? 'Not specified' }}</p>
                    
                    <h5 class="job-info-title">Job Information</h5>
                    <div class="job-detail">
                        <strong>Job Type:</strong> {{ $job->jobType->name ?? 'Not specified' }}
                    </div>
                    <div class="job-detail">
                        <strong>Experience:</strong> {{ $job->experience_level ?? 'Not specified' }}
                    </div>
                    <div class="job-detail">
                        <strong>Location:</strong> {{ $job->city->city_name ?? 'Not specified' }}, {{ $job->country->country_name ?? 'Not specified' }}
                    </div>
                    @if($job->salary_min && $job->salary_max)
                    <div class="job-detail">
                        <strong>Salary:</strong> ${{ number_format($job->salary_min) }} - ${{ number_format($job->salary_max) }}
                    </div>
                    @endif
                    <div class="job-detail">
                        <strong>Posted:</strong> {{ $job->created_at->format('M j, Y') }}
                    </div>
                    @if($job->application_deadline)
                    <div class="job-detail">
                        <strong>Deadline:</strong> {{ \Carbon\Carbon::parse($job->application_deadline)->format('M j, Y') }}
                    </div>
                    @endif
                    
                    {{-- Related Jobs Section Removed --}}
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Job Details Section */
.job-details-section {
    padding: 2rem 0;
    background-color: #f8f9fa;
    min-height: 100vh;
}

.back-btn {
    display: inline-flex;
    align-items: center;
    color: var(--primary-color);
    text-decoration: none;
    font-weight: 500;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
}

.back-btn:hover {
    color: var(--secondary-color);
    text-decoration: none;
}

.back-btn i {
    margin-right: 0.5rem;
}

/* Job Title Section */
.job-title-section {
    background: rgb(44, 62, 80);
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 2rem;
}

.job-title {
    color: white;
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
    line-height: 1.2;
}

/* Job Content */
.job-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 2rem;
}

/* Main Content */
.job-main {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.section-title {
    color: #333;
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 1px solid #007bff;
}

.job-description,
.job-requirements,
.skills-section,
.benefits-section {
    margin-bottom: 2rem;
}

.job-description p,
.job-requirements p {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
    margin: 0;
}

/* Skills Tags */
.skills-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.skill-tag {
    background: #e9ecef;
    color: #495057;
    padding: 0.4rem 0.8rem;
    border-radius: 15px;
    font-size: 0.85rem;
    font-weight: 500;
    display: inline-block;
    border: 1px solid #dee2e6;
}

/* Benefits List */
.benefits-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.benefits-list li {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
    margin-bottom: 0.5rem;
    padding-left: 1.2rem;
    position: relative;
}

.benefits-list li:before {
    content: "✓";
    position: absolute;
    left: 0;
    color: #007bff;
    font-weight: bold;
    font-size: 0.9rem;
}

/* Sidebar */
.job-sidebar {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.job-info-card {
    background: white;
    padding: 1.5rem;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.job-info-card h4 {
    color: #333;
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.3rem;
}

.job-info-card .text-muted {
    color: #666;
    font-size: 1rem;
    margin: 0 0 1.5rem 0;
    font-weight: 400;
}

.job-info-title {
    color: #333;
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 1rem;
}

.job-detail {
    margin-bottom: 0.7rem;
    color: #333;
    font-size: 1rem;
    line-height: 1.5;
}

.job-detail strong {
    color: #333;
    font-weight: 600;
}

/* Responsive Design */
@media (max-width: 768px) {
    .job-content {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
    
    .job-title {
        font-size: 2rem;
    }
    
    .job-main,
    .job-title-section {
        padding: 1.5rem;
    }
    
    .company-info,
    .job-info,
    .related-jobs {
        padding: 1rem;
    }
}

@media (max-width: 576px) {
    .job-details-section {
        padding: 1rem 0;
    }
    
    .job-title {
        font-size: 1.8rem;
    }
    
    .job-main,
    .job-title-section {
        padding: 1rem;
    }
    
    .company-info,
    .job-info,
    .related-jobs {
        padding: 0.8rem;
    }
}
</style>
@endsection
