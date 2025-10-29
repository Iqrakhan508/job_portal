<?php
// Static data for demonstration (no database connection)
$search = isset($_GET['search']) ? $_GET['search'] : '';
$location = isset($_GET['location']) ? $_GET['location'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : '';
$job_type = isset($_GET['job_type']) ? $_GET['job_type'] : '';

// Sample jobs data
$allJobs = [
    [
        'job_id' => 1,
        'job_title' => 'Senior Web Developer',
        'company_name' => 'TechCorp Pakistan',
        'job_description' => 'We are looking for an experienced web developer to join our team. You will be responsible for developing and maintaining web applications using modern technologies.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 80,000 - 120,000',
        'experience_level' => '3-5 years',
        'posted_date' => '2025-01-15',
        'category' => 'Web Development'
    ],
    [
        'job_id' => 2,
        'job_title' => 'Digital Marketing Specialist',
        'company_name' => 'Digital Marketing Pro',
        'job_description' => 'Join our dynamic marketing team to create and execute digital marketing campaigns for our clients.',
        'job_location' => 'Islamabad, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 50,000 - 80,000',
        'experience_level' => '2-3 years',
        'posted_date' => '2025-01-14',
        'category' => 'Marketing'
    ],
    [
        'job_id' => 3,
        'job_title' => 'Mobile App Developer',
        'company_name' => 'PakSoft Solutions',
        'job_description' => 'Develop mobile applications for iOS and Android platforms using Flutter framework.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 70,000 - 100,000',
        'experience_level' => '2-4 years',
        'posted_date' => '2025-01-13',
        'category' => 'Mobile Development'
    ],
    [
        'job_id' => 4,
        'job_title' => 'Content Writer',
        'company_name' => 'EduTech Pakistan',
        'job_description' => 'Create engaging educational content for our online learning platform.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Part Time',
        'salary_range' => 'PKR 25,000 - 40,000',
        'experience_level' => '1-2 years',
        'posted_date' => '2025-01-12',
        'category' => 'Content Writing'
    ],
    [
        'job_id' => 5,
        'job_title' => 'Financial Analyst',
        'company_name' => 'Finance First',
        'job_description' => 'Analyze financial data and prepare reports for investment decisions.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 90,000 - 130,000',
        'experience_level' => '3-5 years',
        'posted_date' => '2025-01-11',
        'category' => 'Finance'
    ],
    [
        'job_id' => 6,
        'job_title' => 'Graphic Designer',
        'company_name' => 'Digital Marketing Pro',
        'job_description' => 'Create stunning visual content for marketing campaigns and social media.',
        'job_location' => 'Islamabad, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 45,000 - 70,000',
        'experience_level' => '2-3 years',
        'posted_date' => '2025-01-10',
        'category' => 'Design'
    ],
    [
        'job_id' => 7,
        'job_title' => 'Data Scientist',
        'company_name' => 'TechCorp Pakistan',
        'job_description' => 'Analyze large datasets and build machine learning models for business insights.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 100,000 - 150,000',
        'experience_level' => '3-5 years',
        'posted_date' => '2025-01-09',
        'category' => 'Data Science'
    ],
    [
        'job_id' => 8,
        'job_title' => 'Sales Manager',
        'company_name' => 'Finance First',
        'job_description' => 'Lead sales team and develop strategies to increase revenue and market share.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 60,000 - 90,000',
        'experience_level' => '4-6 years',
        'posted_date' => '2025-01-08',
        'category' => 'Sales'
    ],
    [
        'job_id' => 9,
        'job_title' => 'UI/UX Designer',
        'company_name' => 'PakSoft Solutions',
        'job_description' => 'Design user interfaces and experiences for web and mobile applications.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 55,000 - 85,000',
        'experience_level' => '2-4 years',
        'posted_date' => '2025-01-07',
        'category' => 'Design'
    ],
    [
        'job_id' => 10,
        'job_title' => 'DevOps Engineer',
        'company_name' => 'TechCorp Pakistan',
        'job_description' => 'Manage cloud infrastructure and implement CI/CD pipelines for software deployment.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 85,000 - 120,000',
        'experience_level' => '3-5 years',
        'posted_date' => '2025-01-06',
        'category' => 'DevOps'
    ]
];

// Filter jobs based on search criteria
$filteredJobs = array_filter($allJobs, function($job) use ($search, $location, $category, $job_type) {
    $matches = true;

if (!empty($search)) {
        $matches = $matches && (
            stripos($job['job_title'], $search) !== false ||
               stripos($job['company_name'], $search) !== false ||
            stripos($job['job_description'], $search) !== false
        );
}

if (!empty($location)) {
        $matches = $matches && stripos($job['job_location'], $location) !== false;
}

if (!empty($category)) {
        $matches = $matches && stripos($job['category'], $category) !== false;
}

if (!empty($job_type)) {
        $matches = $matches && $job['job_type'] === $job_type;
    }
    
    return $matches;
});

// Pagination
$jobsPerPage = 6;
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$totalJobs = count($filteredJobs);
$totalPages = ceil($totalJobs / $jobsPerPage);
$offset = ($currentPage - 1) * $jobsPerPage;
$paginatedJobs = array_slice($filteredJobs, $offset, $jobsPerPage);

// Get unique locations and categories for filters
$locations = array_unique(array_column($allJobs, 'job_location'));
$categories = array_unique(array_column($allJobs, 'category'));

// Page title
$pageTitle = 'All Jobs - PakJobs';

include 'includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">All Jobs</h1>
            <p class="page-subtitle">Find your perfect job opportunity</p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="search-filter-section">
        <div class="container">
            <div class="search-header text-center mb-4">
                <h3 class="search-title">Find Your Perfect Job</h3>
                <p class="search-subtitle">Search through thousands of opportunities</p>
            </div>
            
            <form method="GET" class="search-form">
                <div class="row g-4">
                    <div class="col-lg-5 col-md-6">
                        <div class="form-group">
                            <label for="search" class="form-label">
                                <i class="fas fa-search"></i> Keywords
                            </label>
                            <input type="text" id="search" name="search" class="form-control" placeholder="Job title, company, or keywords..." value="<?php echo htmlspecialchars($search); ?>">
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label for="location" class="form-label">
                                <i class="fas fa-map-marker-alt"></i> Location
                            </label>
                            <select id="location" name="location" class="form-control">
                                <option value="">All Locations</option>
                                <?php foreach ($locations as $loc): ?>
                                    <option value="<?php echo htmlspecialchars($loc); ?>" <?php echo $location === $loc ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($loc); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label for="category" class="form-label">
                                <i class="fas fa-briefcase"></i> Category
                            </label>
                            <select id="category" name="category" class="form-control">
                                <option value="">All Categories</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?php echo htmlspecialchars($cat); ?>" <?php echo $category === $cat ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($cat); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-6">
                        <div class="form-group">
                            <label for="job_type" class="form-label">
                                <i class="fas fa-clock"></i> Job Type
                            </label>
                            <select id="job_type" name="job_type" class="form-control">
                                <option value="">All Types</option>
                                <option value="Full Time" <?php echo $job_type === 'Full Time' ? 'selected' : ''; ?>>Full Time</option>
                                <option value="Part Time" <?php echo $job_type === 'Part Time' ? 'selected' : ''; ?>>Part Time</option>
                                <option value="Contract" <?php echo $job_type === 'Contract' ? 'selected' : ''; ?>>Contract</option>
                                <option value="Freelance" <?php echo $job_type === 'Freelance' ? 'selected' : ''; ?>>Freelance</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-lg-1 col-md-6">
                        <div class="form-group">
                            <label class="form-label">&nbsp;</label>
                            <button type="submit" class="btn-search w-100">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Jobs Section -->
    <section class="jobs-section">
        <div class="container">
                <div class="jobs-header">
                <h2><?php echo $totalJobs; ?> Jobs Found</h2>
                    <div class="jobs-count">
                    Showing <?php echo $offset + 1; ?>-<?php echo min($offset + $jobsPerPage, $totalJobs); ?> of <?php echo $totalJobs; ?> jobs
                    </div>
                </div>

            <?php if (count($paginatedJobs) > 0): ?>
                <div class="row g-4">
                    <?php foreach ($paginatedJobs as $job): ?>
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
                    <?php endforeach; ?>
                </div>
                
                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <nav aria-label="Jobs pagination">
                        <ul class="pagination">
                            <?php if ($currentPage > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage - 1])); ?>">Previous</a>
                                </li>
                            <?php endif; ?>
                            
                            <?php for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++): ?>
                                <li class="page-item <?php echo $i === $currentPage ? 'active' : ''; ?>">
                                    <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            
                            <?php if ($currentPage < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage + 1])); ?>">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
                <?php else: ?>
                <div class="no-jobs">
                        <i class="fas fa-search"></i>
                    <h3>No jobs found matching your criteria</h3>
                    <p>Try adjusting your search filters or browse all available jobs.</p>
                    <a href="jobs.php" class="btn btn-primary mt-3">Clear Filters</a>
                    </div>
                <?php endif; ?>
        </div>
    </section>

    <script>
        // Auto-submit form when filter selects change
        document.querySelectorAll('select[name="location"], select[name="category"], select[name="job_type"]').forEach(select => {
            select.addEventListener('change', function() {
                this.form.submit();
            });
        });
    </script>

<?php include 'includes/footer.php'; ?>