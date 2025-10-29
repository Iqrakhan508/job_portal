@extends('public.layout')

@section('content')
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Companies</h1>
            <p class="page-subtitle">Discover top companies hiring in Pakistan</p>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-filter-section">
        <div class="container">
            <div class="search-header text-center">
                <h2 class="search-title">Find Companies</h2>
                <p class="search-subtitle">Search through our directory of companies</p>
            </div>
            
            <form class="search-form" method="GET" action="{{ route('companies') }}">
                <div class="row g-3">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-search"></i> Company Name
                            </label>
                            <input type="text" name="search" class="form-control" 
                                   placeholder="e.g. TechCorp, Digital Solutions" 
                                   value="{{ $search }}">
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Location
                            </label>
                            <select name="location" class="form-control">
                                <option value="">All Locations</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->city_name }}" 
                                            {{ $location == $city->city_name ? 'selected' : '' }}>
                                        {{ $city->city_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-search"></i> Search
                            </label>
                            <button type="submit" class="btn-search w-100">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="companies-section" style="background-color: #f8f9fa; padding: 3rem 0;">
        <div class="container">
            <div class="row g-4">
                @forelse($companies as $company)
                    <div class="col-lg-4 col-md-6">
                        <div class="company-card" style="background: white; border-radius: 15px; padding: 2rem; box-shadow: 0 5px 20px rgba(0,0,0,0.1); height: 100%;">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div style="flex: 1;">
                                    <h5 class="fw-bold text-dark" style="font-size: 1.5rem; margin-bottom: 0.3rem;">{{ $company->name }}</h5>
                                    <p class="text-primary fw-semibold mb-0" style="color: #667eea; font-size: 0.95rem;">{{ $company->industry ?? 'Technology' }}</p>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="company-meta-item" style="color: #666; font-size: 0.95rem; margin-bottom: 0.5rem;">
                                    <i class="fas fa-users" style="color: #667eea; margin-right: 0.5rem;"></i>
                                    {{ $company->company_size ?? 'Not specified' }}
                                </div>
                                
                                <div class="company-meta-item" style="color: #666; font-size: 0.95rem; margin-bottom: 0.5rem;">
                                    <i class="fas fa-map-marker-alt" style="color: #667eea; margin-right: 0.5rem;"></i>
                                    {{ $company->location ?? 'Location not specified' }}
                                </div>
                            </div>
                            
                            <p class="text-muted mb-3" style="color: #999; font-size: 0.9rem; line-height: 1.6;">
                                {{ Str::limit($company->description ?? 'No description available', 150) }}
                            </p>
                            
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('jobs.company', $company->slug) }}" 
                                   class="btn btn-warning w-100" 
                                   style="background: rgb(44, 62, 80); color: white; border: none; padding: 0.8rem 2rem; border-radius: 50px; font-weight: 600; text-align: center;">
                                    View Jobs
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-companies">
                            <i class="fas fa-building"></i>
                            <h3>No companies found</h3>
                            <p>Try adjusting your search criteria or check back later for new companies.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            @if($companies->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $companies->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </section>
@endsection
