<?php
// Static data for demonstration (no database connection)
$companies = [
    [
        'company_id' => 1,
        'company_name' => 'TechCorp Pakistan',
        'company_description' => 'Leading technology company in Pakistan specializing in software development and IT solutions.',
        'company_website' => 'https://techcorp.pk',
        'industry' => 'Technology',
        'founded_year' => 2010,
        'headquarters' => 'Karachi',
        'company_size' => '500-1000 employees'
    ],
    [
        'company_id' => 2,
        'company_name' => 'PakSoft Solutions',
        'company_description' => 'Software development and IT services company focused on mobile and web applications.',
        'company_website' => 'https://paksoft.com',
        'industry' => 'Software',
        'founded_year' => 2015,
        'headquarters' => 'Lahore',
        'company_size' => '100-500 employees'
    ],
    [
        'company_id' => 3,
        'company_name' => 'Digital Marketing Pro',
        'company_description' => 'Digital marketing and advertising agency helping businesses grow online.',
        'company_website' => 'https://digitalpro.pk',
        'industry' => 'Marketing',
        'founded_year' => 2018,
        'headquarters' => 'Islamabad',
        'company_size' => '50-100 employees'
    ],
    [
        'company_id' => 4,
        'company_name' => 'Finance First',
        'company_description' => 'Financial services and banking solutions provider across Pakistan.',
        'company_website' => 'https://financefirst.pk',
        'industry' => 'Finance',
        'founded_year' => 2005,
        'headquarters' => 'Karachi',
        'company_size' => '1000+ employees'
    ],
    [
        'company_id' => 5,
        'company_name' => 'EduTech Pakistan',
        'company_description' => 'Educational technology platform revolutionizing learning in Pakistan.',
        'company_website' => 'https://edutech.pk',
        'industry' => 'Education',
        'founded_year' => 2020,
        'headquarters' => 'Lahore',
        'company_size' => '50-100 employees'
    ],
    [
        'company_id' => 6,
        'company_name' => 'HealthCare Plus',
        'company_description' => 'Leading healthcare provider with hospitals and clinics across major cities.',
        'company_website' => 'https://healthcareplus.pk',
        'industry' => 'Healthcare',
        'founded_year' => 2012,
        'headquarters' => 'Karachi',
        'company_size' => '500-1000 employees'
    ]
];

// Function to get job count per company (static data)
function getJobCount($companyName) {
    $jobCounts = [
        'TechCorp Pakistan' => 15,
        'PakSoft Solutions' => 8,
        'Digital Marketing Pro' => 12,
        'Finance First' => 20,
        'EduTech Pakistan' => 6,
        'HealthCare Plus' => 18
    ];
    return isset($jobCounts[$companyName]) ? $jobCounts[$companyName] : 0;
}

// Page title
$pageTitle = 'Companies - PakJobs';

include 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies - PakJobs</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            text-decoration: none;
            color: white;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #ffd700;
        }

        .header-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-primary {
            background: #ffd700;
            color: #333;
        }

        .btn-primary:hover {
            background: #ffed4e;
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline:hover {
            background: white;
            color: #667eea;
        }

        /* Page Header */
        .page-header {
            background: white;
            padding: 2rem 0;
            border-bottom: 1px solid #eee;
        }

        .page-title {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #666;
            font-size: 1.1rem;
        }

        /* Companies Grid */
        .companies-section {
            padding: 3rem 0;
        }

        .companies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .company-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .company-card:hover {
            transform: translateY(-5px);
        }

        .company-header {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .company-logo {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 1rem;
        }

        .company-info h3 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 0.3rem;
        }

        .company-industry {
            color: #667eea;
            font-weight: 500;
            font-size: 0.9rem;
        }

        .company-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .company-meta {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 0.9rem;
        }

        .meta-item i {
            margin-right: 0.5rem;
            color: #667eea;
            width: 16px;
        }

        .company-actions {
            display: flex;
            gap: 1rem;
        }

        .action-btn {
            flex: 1;
            padding: 0.8rem 1rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s;
        }

        .view-jobs-btn {
            background: #667eea;
            color: white;
        }

        .view-jobs-btn:hover {
            background: #5a6fd8;
        }

        .visit-website-btn {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .visit-website-btn:hover {
            background: #667eea;
            color: white;
        }

        /* No Companies */
        .no-companies {
            text-align: center;
            padding: 4rem 2rem;
            color: #666;
        }

        .no-companies i {
            font-size: 4rem;
            color: #ddd;
            margin-bottom: 1rem;
        }

        .no-companies h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-menu {
                flex-direction: column;
                gap: 1rem;
            }

            .companies-grid {
                grid-template-columns: 1fr;
            }

            .company-meta {
                grid-template-columns: 1fr;
            }

            .company-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
   

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title">Companies</h1>
            <p class="page-subtitle">Discover top companies hiring in Pakistan</p>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="companies-section">
        <div class="container">
            <?php if (count($companies) > 0): ?>
                <div class="row g-4">
                    <?php foreach ($companies as $company): 
                        $jobCount = getJobCount($company['company_name']);
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="company-card">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="fw-bold text-dark"><?php echo htmlspecialchars($company['company_name']); ?></h5>
                                        <p class="text-primary fw-semibold mb-0"><?php echo htmlspecialchars($company['industry']); ?></p>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="company-meta-item">
                                        <?php echo htmlspecialchars($company['company_size']); ?>
                                    </div>

                                    <div class="company-meta-item">
                                        Founded <?php echo $company['founded_year']; ?>
                                    </div>

                                    <div class="company-meta-item">
                                        <?php echo htmlspecialchars($company['headquarters']); ?>
                                    </div>

                                    <div class="company-meta-item">
                                        <?php echo $jobCount; ?> active jobs
                                    </div>
                                </div>

                                <p class="text-muted mb-3">
                                    <?php echo htmlspecialchars(substr($company['company_description'], 0, 150)) . '...'; ?>
                                </p>

                                <a href="jobs.php?company=<?php echo urlencode($company['company_name']); ?>" class="btn btn-primary w-100">
                                    View Jobs
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="no-companies">
                    <i class="fas fa-building"></i>
                    <h3>No companies found</h3>
                    <p>Check back later for company listings!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
