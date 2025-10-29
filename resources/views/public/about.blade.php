@extends('public.layout')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">About 1000Jobs</h1>
            <p class="page-subtitle">Connecting talent with opportunity across Pakistan</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="about-content">
                <h2>Our Mission</h2>
                <p>1000Jobs is Pakistan's leading job portal dedicated to connecting talented professionals with top companies across the country. We believe that everyone deserves the opportunity to find meaningful work that matches their skills and aspirations.</p>
                
                <p>Founded with the vision of transforming Pakistan's job market, we provide a comprehensive platform where job seekers can discover opportunities and employers can find the perfect candidates for their organizations.</p>
                
                <h2>What We Offer</h2>
                <p>Our platform offers a wide range of features designed to make job searching and hiring more efficient and effective:</p>
                
                <ul class="list-unstyled">
                    <li><i class="fas fa-check text-primary me-2"></i> Comprehensive job listings across all industries</li>
                    <li><i class="fas fa-check text-primary me-2"></i> Advanced search and filtering capabilities</li>
                    <li><i class="fas fa-check text-primary me-2"></i> Company profiles and insights</li>
                    <li><i class="fas fa-check text-primary me-2"></i> Career resources and guidance</li>
                    <li><i class="fas fa-check text-primary me-2"></i> Mobile-friendly platform for on-the-go access</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-dark">Our Impact</h2>
                    <p class="lead text-muted">Numbers that speak for themselves</p>
                </div>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">50,000+</div>
                    <div class="stat-label">Job Seekers</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number">1,000+</div>
                    <div class="stat-label">Companies</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number">25,000+</div>
                    <div class="stat-label">Jobs Posted</div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-number">15,000+</div>
                    <div class="stat-label">Successful Placements</div>
                </div>
            </div>
        </div>
    </section>
@endsection
