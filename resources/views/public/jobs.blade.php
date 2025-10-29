@extends('public.layout')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            @if(isset($cityModel))
                <h1 class="page-title">Latest Jobs in {{ $cityModel->city_name }} {{date('Y')}}</h1>
                <p class="page-subtitle">{!! $cityModel->city_description ?? 'No description available for this city.' !!}</p>
            @else
                <h1 class="page-title">Find Your Perfect Job</h1>
                <p class="page-subtitle">Browse through thousands of job opportunities</p>
            @endif
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="search-filter-section">
        <div class="container">
            <div class="search-header text-center">
                <h2 class="search-title">Search Jobs</h2>
                <p class="search-subtitle">Find the perfect opportunity that matches your skills and interests</p>
            </div>
            
            <form class="search-form" method="GET" action="{{ route('jobs') }}">
                <div class="row g-3 align-items-end">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-search"></i> Job Title or Keywords
                            </label>
                            <input type="text" name="search" class="form-control" 
                                   placeholder="e.g. Web Developer, Marketing Manager" 
                                   value="{{ $search }}">
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Location
                            </label>
                            <select name="location" class="form-control">
                                <option value="">All Locations</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->slug ?? $city->city_name }}" 
                                            {{ ($location == $city->slug || $location == $city->city_name) ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-briefcase"></i> Category
                            </label>
                            <select name="category" class="form-control">
                                <option value="">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->slug ?? $cat->name }}" 
                                            {{ ($category == $cat->slug || $category == $cat->name) ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-clock"></i> Job Type
                            </label>
                            <select name="job_type" class="form-control">
                                <option value="">All Types</option>
                                <option value="Full Time" {{ $job_type == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                <option value="Part Time" {{ $job_type == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                                <option value="Contract" {{ $job_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="Freelance" {{ $job_type == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <button type="submit" class="btn-search w-100">
                            <i class="fas fa-search"></i> Search Jobs
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Jobs Section -->
    <section class="jobs-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
                    <div class="jobs-header mb-4">
                        <h2>{{ isset($cityModel) ? 'Jobs in ' . $cityModel->city_name : 'Job Opportunities' }}</h2>
                        <p class="jobs-count">{{ $jobs->total() }} jobs found</p>
                    </div>
                    
                    <div class="row g-4">
                @forelse($jobs as $job)
                    <div class="col-lg-6 col-md-6">
                        <div class="job-card-new" style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-left: 4px solid #007bff; position: relative; height: 280px; display: flex; flex-direction: column;">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold mb-0" style="font-size: 1.25rem; color: #343a40; line-height: 1.3; max-width: 70%; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">{{ $job->title }}</h5>
                                <span class="badge" style="background-color: #ffeeba; color: #ffc107; padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 500; white-space: nowrap;">
                                    {{ $job->created_at->diffForHumans() }}
                                </span>
                            </div>
                            
                            <p class="text-muted" style="font-size: 0.95rem; color: #6c757d; line-height: 1.5; margin-bottom: auto; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; height: 72px;">
                                {{ strip_tags($job->description) }}
                            </p>
                            
                            <div class="d-flex flex-wrap align-items-center gap-2" style="margin-top: 1rem;">
                                <span class="badge" style="background-color: #d4edda; color: #28a745; padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">
                                    {{ $job->jobType->name ?? 'Full Time' }}
                                </span>
                                <span class="badge" style="background-color: #f4f7f6; color: #3D3D3D; padding: 0.4rem 0.8rem; border-radius: 20px; font-size: 0.85rem; font-weight: 500;">
                                    <i class="fas fa-map-marker-alt" style="color: #dc3545;"></i> {{ $job->city->city_name ?? 'Not specified' }}
                                </span>
                                <a href="{{ route('job.details', [$job->id, $job->slug]) }}" style="background: #3498db; color: white; font-size: 0.95rem; font-weight: 600; margin-left: auto; text-decoration: none; white-space: nowrap; padding: 0.5rem 1.2rem; border-radius: 20px; border: 1px solid #e0e0e0;">
                                    Job Details →
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-jobs">
                            <i class="fas fa-briefcase"></i>
                            <h3>No jobs found</h3>
                            <p>Try adjusting your search criteria or check back later for new opportunities.</p>
                        </div>
                    </div>
                @endforelse
                    </div>
                    
                    <!-- Pagination -->
                    @if($jobs->hasPages())
                        <div class="d-flex justify-content-center mt-5">
                            {{ $jobs->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
