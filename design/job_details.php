<?php
// Static data for demonstration (no database connection)
$job_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Sample job data
$jobs = [
    1 => [
        'job_id' => 1,
        'job_title' => 'Senior Web Developer',
        'company_name' => 'TechCorp Pakistan',
        'job_description' => 'We are looking for an experienced web developer to join our team. You will be responsible for developing and maintaining web applications using modern technologies. The ideal candidate should have strong programming skills and experience with web development frameworks.',
        'job_requirements' => 'Bachelor degree in Computer Science, 3+ years experience in PHP, JavaScript, MySQL, HTML, CSS. Experience with frameworks like Laravel or CodeIgniter is preferred.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 80,000 - 120,000',
        'experience_level' => '3-5 years',
        'posted_date' => '2025-01-15',
        'application_deadline' => '2025-02-15',
        'category' => 'Web Development',
        'skills_required' => 'PHP, JavaScript, MySQL, HTML, CSS, Laravel',
        'benefits' => 'Health insurance, flexible hours, annual bonus, professional development opportunities',
        'contact_email' => 'hr@techcorp.pk',
        'contact_phone' => '+92-21-1234567'
    ],
    2 => [
        'job_id' => 2,
        'job_title' => 'Digital Marketing Specialist',
        'company_name' => 'Digital Marketing Pro',
        'job_description' => 'Join our dynamic marketing team to create and execute digital marketing campaigns for our clients. You will be responsible for managing social media accounts, creating content, and analyzing campaign performance.',
        'job_requirements' => 'Bachelor degree in Marketing, 2+ years experience in digital marketing, knowledge of SEO/SEM, social media platforms, and Google Analytics.',
        'job_location' => 'Islamabad, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 50,000 - 80,000',
        'experience_level' => '2-3 years',
        'posted_date' => '2025-01-14',
        'application_deadline' => '2025-02-20',
        'category' => 'Marketing',
        'skills_required' => 'SEO, SEM, Social Media Marketing, Google Analytics, Content Creation',
        'benefits' => 'Remote work options, professional development, creative freedom, modern workspace',
        'contact_email' => 'careers@digitalpro.pk',
        'contact_phone' => '+92-51-9876543'
    ],
    3 => [
        'job_id' => 3,
        'job_title' => 'Mobile App Developer',
        'company_name' => 'PakSoft Solutions',
        'job_description' => 'Develop mobile applications for iOS and Android platforms using Flutter framework. You will work with our development team to create innovative mobile solutions.',
        'job_requirements' => 'Bachelor degree in Computer Science, 2+ years experience in mobile development, Flutter knowledge, experience with REST APIs and Firebase.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 70,000 - 100,000',
        'experience_level' => '2-4 years',
        'posted_date' => '2025-01-13',
        'application_deadline' => '2025-02-25',
        'category' => 'Mobile Development',
        'skills_required' => 'Flutter, Dart, REST APIs, Firebase, Git',
        'benefits' => 'Flexible working hours, health insurance, learning budget, team events',
        'contact_email' => 'jobs@paksoft.com',
        'contact_phone' => '+92-42-5555555'
    ],
    4 => [
        'job_id' => 4,
        'job_title' => 'Content Writer',
        'company_name' => 'EduTech Pakistan',
        'job_description' => 'Create engaging educational content for our online learning platform. You will write articles, create course materials, and develop educational resources for students.',
        'job_requirements' => 'Bachelor degree in English or related field, 1+ years experience in content writing, excellent grammar and writing skills, knowledge of educational content creation.',
        'job_location' => 'Lahore, Pakistan',
        'job_type' => 'Part Time',
        'salary_range' => 'PKR 25,000 - 40,000',
        'experience_level' => '1-2 years',
        'posted_date' => '2025-01-12',
        'application_deadline' => '2025-02-28',
        'category' => 'Content Writing',
        'skills_required' => 'Content Writing, SEO Writing, Educational Content, Research Skills',
        'benefits' => 'Flexible schedule, remote work options, creative freedom',
        'contact_email' => 'content@edutech.pk',
        'contact_phone' => '+92-42-4444444'
    ],
    5 => [
        'job_id' => 5,
        'job_title' => 'Financial Analyst',
        'company_name' => 'Finance First',
        'job_description' => 'Analyze financial data and prepare reports for investment decisions. You will work with senior management to provide financial insights and recommendations.',
        'job_requirements' => 'Bachelor degree in Finance or Accounting, 3+ years experience in financial analysis, knowledge of financial modeling and Excel.',
        'job_location' => 'Karachi, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 90,000 - 130,000',
        'experience_level' => '3-5 years',
        'posted_date' => '2025-01-11',
        'application_deadline' => '2025-03-01',
        'category' => 'Finance',
        'skills_required' => 'Financial Analysis, Excel, Financial Modeling, Investment Analysis',
        'benefits' => 'Competitive salary, health insurance, professional development, bonus opportunities',
        'contact_email' => 'hr@financefirst.pk',
        'contact_phone' => '+92-21-7777777'
    ],
    6 => [
        'job_id' => 6,
        'job_title' => 'Graphic Designer',
        'company_name' => 'Digital Marketing Pro',
        'job_description' => 'Create stunning visual content for marketing campaigns and social media. You will design graphics, logos, and marketing materials for various clients.',
        'job_requirements' => 'Bachelor degree in Graphic Design or related field, 2+ years experience in graphic design, proficiency in Adobe Creative Suite.',
        'job_location' => 'Islamabad, Pakistan',
        'job_type' => 'Full Time',
        'salary_range' => 'PKR 45,000 - 70,000',
        'experience_level' => '2-3 years',
        'posted_date' => '2025-01-10',
        'application_deadline' => '2025-03-05',
        'category' => 'Design',
        'skills_required' => 'Adobe Photoshop, Illustrator, InDesign, Brand Design, UI/UX',
        'benefits' => 'Creative environment, modern equipment, flexible hours, team collaboration',
        'contact_email' => 'design@digitalpro.pk',
        'contact_phone' => '+92-51-8888888'
    ]
];

$job = isset($jobs[$job_id]) ? $jobs[$job_id] : null;

if (!$job) {
    header('Location: jobs.php');
    exit;
}

// Related jobs (same category)
$relatedJobs = array_filter($jobs, function($j) use ($job) {
    return $j['category'] === $job['category'] && $j['job_id'] !== $job['job_id'];
});
$relatedJobs = array_slice($relatedJobs, 0, 3);

// Page title
$pageTitle = $job['job_title'] . ' - ' . $job['company_name'] . ' - PakJobs';

include 'includes/header.php';
?>

    <!-- Job Details Section -->
    <section class="job-details-section">
        <div class="container">
            <a href="jobs.php" class="back-btn">
                <i class="fas fa-arrow-left"></i> Back to Jobs
            </a>

            <!-- Job Title -->
            <div class="job-title-section">
                <h1 class="job-title"><?php echo htmlspecialchars($job['job_title']); ?></h1>
            </div>

            <!-- Job Content -->
            <div class="job-content">
    <!-- Main Content -->
                <div class="job-main">
                <div class="job-description">
                        <h3 class="section-title">Job Description</h3>
                    <p><?php echo nl2br(htmlspecialchars($job['job_description'])); ?></p>
                </div>

                <div class="job-requirements">
                        <h3 class="section-title">Requirements</h3>
                    <p><?php echo nl2br(htmlspecialchars($job['job_requirements'])); ?></p>
                </div>

                <div class="skills-section">
                        <h3 class="section-title">Required Skills</h3>
                    <div class="skills-tags">
                        <?php 
                            $skills = explode(', ', $job['skills_required']);
                        foreach ($skills as $skill): 
                        ?>
                                <span class="skill-tag"><?php echo htmlspecialchars(trim($skill)); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="benefits-section">
                        <h3 class="section-title">Benefits</h3>
                        <ul class="benefits-list">
                            <?php 
                            $benefits = explode(', ', $job['benefits']);
                            foreach ($benefits as $benefit): 
                            ?>
                                <li><?php echo htmlspecialchars(trim($benefit)); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="job-sidebar">
                    <div class="company-info">
                        <h4><?php echo htmlspecialchars($job['company_name']); ?></h4>
                        <p class="text-muted"><?php echo htmlspecialchars($job['category']); ?></p>
                    </div>
                    
                    <div class="job-info">
                        <h5 class="mb-3">Job Information</h5>
                        <div class="mb-2">
                            <strong>Job Type:</strong> <?php echo $job['job_type']; ?>
                        </div>
                        <div class="mb-2">
                            <strong>Experience:</strong> <?php echo htmlspecialchars($job['experience_level']); ?>
                        </div>
                        <div class="mb-2">
                            <strong>Location:</strong> <?php echo htmlspecialchars($job['job_location']); ?>
                    </div>
                        <div class="mb-2">
                            <strong>Salary:</strong> <?php echo htmlspecialchars($job['salary_range']); ?>
                    </div>
                        <div class="mb-2">
                            <strong>Posted:</strong> <?php echo date('M j, Y', strtotime($job['posted_date'])); ?>
                        </div>
                        <?php if (!empty($job['application_deadline'])): ?>
                            <div class="mb-2">
                                <strong>Deadline:</strong> <?php echo date('M j, Y', strtotime($job['application_deadline'])); ?>
                    </div>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (!empty($relatedJobs)): ?>
        <div class="related-jobs">
                            <h5 class="mb-3">Related Jobs</h5>
            <?php foreach ($relatedJobs as $relatedJob): ?>
                                <div class="related-job-card">
                                    <h6><?php echo htmlspecialchars($relatedJob['job_title']); ?></h6>
                                    <p><?php echo htmlspecialchars($relatedJob['company_name']); ?> • <?php echo htmlspecialchars($relatedJob['job_location']); ?></p>
                                    <a href="job_details.php?id=<?php echo $relatedJob['job_id']; ?>" class="btn btn-sm btn-primary">View Details</a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>