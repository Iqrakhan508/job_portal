<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? '1000Jobs - Find Your Dream Job' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/public-style.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header style="background: white; padding: 1rem 0; border-bottom: 1px solid #ddd;">
        <nav class="navbar navbar-expand-lg" style="background: white;">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand" style="font-size: 1.8rem; font-weight: bold; color: #28a745;">
                    <i class="fas fa-briefcase"></i> 1000Jobs
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link" style="color: {{ request()->routeIs('home') ? '#28a745' : '#000' }} !important; font-weight: 500; margin: 0 1rem; border-bottom: {{ request()->routeIs('home') ? '2px solid #28a745' : 'none' }}; padding-bottom: 0.5rem;">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jobs') }}" class="nav-link" style="color: {{ request()->routeIs('jobs') ? '#28a745' : '#000' }} !important; font-weight: 500; margin: 0 1rem; border-bottom: {{ request()->routeIs('jobs') ? '2px solid #28a745' : 'none' }}; padding-bottom: 0.5rem;">
                                Government Jobs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('jobs.by.location') }}" class="nav-link" style="color: {{ request()->routeIs('jobs.by.location') ? '#28a745' : '#000' }} !important; font-weight: 500; margin: 0 1rem; border-bottom: {{ request()->routeIs('jobs.by.location') ? '2px solid #28a745' : 'none' }}; padding-bottom: 0.5rem;">
                                Jobs by Location
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('companies') }}" class="nav-link" style="color: {{ request()->routeIs('companies') ? '#28a745' : '#000' }} !important; font-weight: 500; margin: 0 1rem; border-bottom: {{ request()->routeIs('companies') ? '2px solid #28a745' : 'none' }}; padding-bottom: 0.5rem;">
                                Companies
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about') }}" class="nav-link" style="color: {{ request()->routeIs('about') ? '#28a745' : '#000' }} !important; font-weight: 500; margin: 0 1rem; border-bottom: {{ request()->routeIs('about') ? '2px solid #28a745' : 'none' }}; padding-bottom: 0.5rem;">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link" style="color: {{ request()->routeIs('contact') ? '#28a745' : '#000' }} !important; font-weight: 500; margin: 0 1rem; border-bottom: {{ request()->routeIs('contact') ? '2px solid #28a745' : 'none' }}; padding-bottom: 0.5rem;">
                                Contact
                            </a>
                        </li>
                    </ul>
                    
                    <div class="d-flex align-items-center">
                        <a href="{{ route('jobs') }}" style="color: #000 !important; text-decoration: none; font-weight: 500;">
                            <i class="fas fa-search" style="color: #3498db;"></i> Search Jobs
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">
                        <i class="fas fa-briefcase"></i> 1000Jobs
                    </h5>
                    <p>Pakistan's leading job portal connecting talented professionals with top companies.</p>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jobs') }}">All Jobs</a></li>
                        <li><a href="{{ route('companies') }}">Companies</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Disclaimer</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Job Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jobs', ['category' => 'Technology']) }}">Technology</a></li>
                        <li><a href="{{ route('jobs', ['category' => 'Marketing']) }}">Marketing</a></li>
                        <li><a href="{{ route('jobs', ['category' => 'Finance']) }}">Finance</a></li>
                        <li><a href="{{ route('jobs', ['category' => 'Healthcare']) }}">Healthcare</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('jobs') }}">Browse All Jobs</a></li>
                        <li><a href="{{ route('companies') }}">Company Directory</a></li>
                        <li><a href="{{ route('about') }}">Career Tips</a></li>
                        <li><a href="{{ route('contact') }}">Help Center</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2025 1000Jobs. All rights reserved. | Designed and Developed by <a href="mailto:kiqra8715@gmail.com?subject=Contact from 1000Jobs Website" style="color: #28a745; text-decoration: none; font-weight: 500;">Iqra Khan</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Page specific scripts can be added here -->
    @yield('scripts')
</body>
</html>
