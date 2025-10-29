<?php
// Static data for demonstration (no database connection)
$featuredJobs = [
    [
        'job_id' => 1,
        'job_title' => 'Senior Web Developer',
        'company_name' => 'TechCorp Pakistan',
        'job_description' => 'We are looking for an experienced web developer to join our team. You will be responsible for developing and maintaining web applications using modern technologies.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 80,000 - 120,000',
        'posted_date' => '2025-01-15'
    ],
    [
        'job_id' => 2,
        'job_title' => 'Digital Marketing Specialist',
        'company_name' => 'Digital Marketing Pro',
        'job_description' => 'Join our dynamic marketing team to create and execute digital marketing campaigns for our clients.',
        'job_location' => 'Islamabad, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 50,000 - 80,000',
        'posted_date' => '2025-01-14'
    ],
    [
        'job_id' => 3,
        'job_title' => 'Mobile App Developer',
        'company_name' => 'PakSoft Solutions',
        'job_description' => 'Develop mobile applications for iOS and Android platforms using Flutter framework.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 70,000 - 100,000',
        'posted_date' => '2025-01-13'
    ],
    [
        'job_id' => 4,
        'job_title' => 'Content Writer',
        'company_name' => 'EduTech Pakistan',
        'job_description' => 'Create engaging educational content for our online learning platform.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Part Time',
        'salary_range' => 'PKR 25,000 - 40,000',
        'posted_date' => '2025-01-12'
    ],
    [
        'job_id' => 5,
        'job_title' => 'Financial Analyst',
        'company_name' => 'Finance First',
        'job_description' => 'Analyze financial data and prepare reports for investment decisions.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 90,000 - 130,000',
        'posted_date' => '2025-01-11'
    ],
    [
        'job_id' => 6,
        'job_title' => 'Graphic Designer',
        'company_name' => 'Digital Marketing Pro',
        'job_description' => 'Create stunning visual content for marketing campaigns and social media.',
        'job_location' => 'Islamabad, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 45,000 - 70,000',
        'posted_date' => '2025-01-10'
    ]
];

// Static statistics
$totalJobs = 150;
$totalCompanies = 25;
$totalApplications = 500;

// Page title
$pageTitle = 'PakJobs - Find Your Dream Job';

include 'includes/header.php';
?>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="hero-title">Find Your Dream Job</h1>
                    <p class="hero-subtitle">Discover thousands of opportunities from top companies across Pakistan</p>
                    
                    <form class="search-form" action="jobs.php" method="GET">
                        <div class="row g-2">
                            <div class="col-md-8">
                                <input type="text" name="search" class="form-control search-input" placeholder="Job title, company, or keywords...">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn search-btn w-100">
                                    <i class="fas fa-search"></i> Search Jobs
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $totalJobs; ?></div>
                        <div class="stat-label">Active Jobs</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $totalCompanies; ?></div>
                        <div class="stat-label">Companies</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number"><?php echo $totalApplications; ?></div>
                        <div class="stat-label">Applications</div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Cities</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Jobs Section -->
    <section class="py-5" style="background-color: var(--bg-light);">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 fw-bold text-dark">Featured Jobs</h2>
                    <p class="lead text-muted">Latest job opportunities from top companies</p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php 
                if (count($featuredJobs) > 0):
                    foreach ($featuredJobs as $job): 
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="job-card">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="fw-bold text-dark"><?php echo htmlspecialchars($job['job_title']); ?></h5>
                                    <p class="text-primary fw-semibold mb-0"><?php echo htmlspecialchars($job['company_name']); ?></p>
                                </div>
                                <span class="job-type-badge"><?php echo $job['job_type']; ?></span>
                            </div>
                            
                            <div class="mb-3">
                                <div class="job-meta-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php echo htmlspecialchars($job['job_location']); ?>
                                </div>
                                
                                <?php if (!empty($job['salary_range'])): ?>
                                    <div class="job-meta-item">
                                        <i class="fas fa-dollar-sign"></i>
                                        <?php echo htmlspecialchars($job['salary_range']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="job-meta-item">
                                    <i class="fas fa-clock"></i>
                                    <?php echo date('M j, Y', strtotime($job['posted_date'])); ?>
                                </div>
                            </div>
                            
                            <p class="text-muted mb-3">
                                <?php echo htmlspecialchars(substr($job['job_description'], 0, 150)) . '...'; ?>
                            </p>
                            
                            <a href="job_details.php?id=<?php echo $job['job_id']; ?>" class="btn btn-primary w-100">
                                View Details
                            </a>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else:
                ?>
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-briefcase text-muted" style="font-size: 4rem;"></i>
                        <h3 class="mt-3 text-muted">No jobs available</h3>
                        <p class="text-muted">Check back later for new job opportunities!</p>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row mt-5">
                <div class="col-12 text-center">
                    <a href="jobs.php" class="btn btn-warning btn-lg px-4">
                        View All Jobs
                    </a>
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
                    <div class="category-card" onclick="window.location.href='jobs.php?category=Technology'">
                        <div class="category-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="category-name">Technology</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='jobs.php?category=Marketing'">
                        <div class="category-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="category-name">Marketing</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='jobs.php?category=Finance'">
                        <div class="category-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="category-name">Finance</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='jobs.php?category=Healthcare'">
                        <div class="category-icon">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <div class="category-name">Healthcare</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='jobs.php?category=Education'">
                        <div class="category-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="category-name">Education</div>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="category-card" onclick="window.location.href='jobs.php?category=Design'">
                        <div class="category-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <div class="category-name">Design</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Ready to Start Your Career?</h2>
                    <p class="cta-subtitle">Join thousands of professionals who found their dream jobs through PakJobs</p>
                    
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <a href="jobs.php" class="cta-btn cta-btn-primary">
                            <i class="fas fa-search"></i> Browse Jobs
                        </a>
                        <a href="register.php" class="cta-btn cta-btn-secondary">
                            <i class="fas fa-user-plus"></i> Create Account
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
