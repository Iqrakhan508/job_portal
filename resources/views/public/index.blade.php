@extends('public.layout')

@section('content')
    <!-- Hero Section -->
    <section style="background: #2c3e50; padding: 4rem 0; min-height: 400px; display: flex; align-items: center;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 style="color: white; font-size: 3.5rem; font-weight: bold; margin-bottom: 1.5rem;">Find Your Dream Job</h1>
                    <p style="color: rgba(255,255,255,0.95); font-size: 1.3rem; margin-bottom: 2rem;">Explore thousands of opportunities from top companies.</p>
                    
                    <form action="{{ route('jobs') }}" method="GET">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="d-flex shadow-lg" style="border-radius: 5px; overflow: hidden; background: white;">
                                    <input type="text" name="search" class="form-control border-0" placeholder="Job title or keyword" style="padding: 1.2rem 2rem; font-size: 1.1rem; flex: 1;">
                                    <button type="submit" class="btn" style="background: #3498db; color: white; border: none; padding: 1.2rem 3rem; font-size: 1.1rem; font-weight: 600; border-radius: 0;">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- City Filter Links -->
    <section class="py-4" style="background: linear-gradient(135deg, #e3f2fd 0%, #f3e5f5 100%); border-bottom: 1px solid #e0e0e0;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3">
                        <a href="{{ route('jobs', ['location' => 'Lahore']) }}" class="city-filter-link">
                            Jobs in Lahore
                        </a>
                        <a href="{{ route('jobs', ['location' => 'Karachi']) }}" class="city-filter-link">
                            Jobs in Karachi
                        </a>
                        <a href="{{ route('jobs', ['location' => 'Islamabad']) }}" class="city-filter-link">
                            Jobs in Islamabad
                        </a>
                        <a href="{{ route('jobs', ['location' => 'Rawalpindi']) }}" class="city-filter-link">
                            Jobs in Rawalpindi
                        </a>
                        <a href="{{ route('jobs', ['location' => 'Faisalabad']) }}" class="city-filter-link">
                            Jobs in Faisalabad
                        </a>
                        <a href="{{ route('jobs') }}" class="city-filter-link">
                            Jobs in Pakistan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section class="py-5" style="background-color: var(--bg-light);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 col-xl-10">
            <div class="row">
                <div class="col-12 text-center mb-5">
                            <h2 class="display-4 fw-bold text-dark">Recent Job Openings</h2>
                           
                </div>
            </div>
            
            <div class="row g-4">
                @forelse($featuredJobs as $job)
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
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-briefcase text-muted" style="font-size: 4rem;"></i>
                        <h3 class="mt-3 text-muted">No jobs available</h3>
                        <p class="text-muted">Check back later for new job opportunities!</p>
                    </div>
                @endforelse
            </div>
            
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="{{ route('jobs') }}" class="btn btn-warning btn-lg px-4">
                        View All Jobs
                    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-dark">Browse by Category</h2>
                    <p class="lead text-muted">Find jobs in your field of expertise</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='{{ route('jobs', ['category' => 'Technology']) }}'">
                        <div class="category-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="category-name">Technology</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='{{ route('jobs', ['category' => 'Marketing']) }}'">
                        <div class="category-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="category-name">Marketing</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='{{ route('jobs', ['category' => 'Finance']) }}'">
                        <div class="category-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="category-name">Finance</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='{{ route('jobs', ['category' => 'Healthcare']) }}'">
                        <div class="category-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <div class="category-name">Healthcare</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='{{ route('jobs', ['category' => 'Education']) }}'">
                        <div class="category-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="category-name">Education</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='{{ route('jobs', ['category' => 'Design']) }}'">
                        <div class="category-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="category-name">Design</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
@endsection
