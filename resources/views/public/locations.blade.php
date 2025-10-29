@extends('public.layout')

@section('content')
    <!-- Hero Section -->
    <section style="background: #2c3e50; padding: 3rem 0;">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 style="color: white; font-size: 2.5rem; font-weight: bold; margin-bottom: 1rem;">Browse Jobs by City</h1>
                    <p style="color: white; font-size: 1.1rem;">Select a city to view available job opportunities</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Locations Section -->
    <section class="py-5" style="background-color: var(--bg-light);">
        <div class="container">
            <!-- <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-dark">Browse Jobs by City</h2>
                    <p class="lead text-muted">Select a city to view available job opportunities</p>
                </div>
            </div> -->
            
            <div class="row g-4">
                @forelse($cities as $city)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="location-card" onclick="window.location.href='{{ route('jobs.location', $city->slug) }}'" style="background: white; border-radius: 12px; padding: 2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-left: 4px solid #007bff;
 cursor: pointer; transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="fw-bold mb-0" style="font-size: 1.25rem; color: #343a40;">
                                    <i class="fas fa-map-marker-alt" style="color: #28a745;"></i> {{ $city->city_name }}
                                </h5>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <span class="badge" style="background-color: #d4edda; color: #28a745; padding: 0.5rem 1rem; border-radius: 20px; font-size: 0.9rem; font-weight: 600;">
                                    {{ $city->jobs_count }} {{ $city->jobs_count == 1 ? 'Job' : 'Jobs' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-map-marker-alt text-muted" style="font-size: 4rem;"></i>
                        <h3 class="mt-3 text-muted">No locations available</h3>
                        <p class="text-muted">Check back later for job opportunities!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <style>
        .location-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.15) !important;
        }
    </style>
@endsection

