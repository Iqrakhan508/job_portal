<?php
// Create job portal tables if they don't exist
function createJobPortalTables($conn) {
    // Create jobs table
    $createJobsTable = "
    CREATE TABLE IF NOT EXISTS jobs (
        job_id INT AUTO_INCREMENT PRIMARY KEY,
        job_title VARCHAR(255) NOT NULL,
        company_name VARCHAR(255) NOT NULL,
        job_description TEXT NOT NULL,
        job_requirements TEXT NOT NULL,
        job_location VARCHAR(255) NOT NULL,
        job_type ENUM('Full Time', 'Part Time', 'Contract', 'Freelance') NOT NULL,
        salary_range VARCHAR(100),
        experience_level VARCHAR(100),
        posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        application_deadline DATE,
        is_active BOOLEAN DEFAULT TRUE,
        category VARCHAR(100),
        skills_required TEXT,
        benefits TEXT,
        contact_email VARCHAR(255),
        contact_phone VARCHAR(50)
    )";
    
    // Create job applications table
    $createApplicationsTable = "
    CREATE TABLE IF NOT EXISTS job_applications (
        application_id INT AUTO_INCREMENT PRIMARY KEY,
        job_id INT NOT NULL,
        applicant_name VARCHAR(255) NOT NULL,
        applicant_email VARCHAR(255) NOT NULL,
        applicant_phone VARCHAR(50),
        resume_path VARCHAR(500),
        cover_letter TEXT,
        application_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        status ENUM('Pending', 'Under Review', 'Shortlisted', 'Rejected', 'Hired') DEFAULT 'Pending',
        FOREIGN KEY (job_id) REFERENCES jobs(job_id) ON DELETE CASCADE
    )";
    
    // Create companies table
    $createCompaniesTable = "
    CREATE TABLE IF NOT EXISTS companies (
        company_id INT AUTO_INCREMENT PRIMARY KEY,
        company_name VARCHAR(255) NOT NULL UNIQUE,
        company_description TEXT,
        company_website VARCHAR(255),
        company_logo VARCHAR(500),
        company_size VARCHAR(100),
        industry VARCHAR(100),
        founded_year INT,
        headquarters VARCHAR(255),
        contact_email VARCHAR(255),
        contact_phone VARCHAR(50),
        is_verified BOOLEAN DEFAULT FALSE,
        created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    // Execute table creation queries
    $results = [];
    
    if ($conn->query($createJobsTable) === TRUE) {
        $results[] = "Jobs table created successfully";
    } else {
        $results[] = "Error creating jobs table: " . $conn->error;
    }
    
    if ($conn->query($createApplicationsTable) === TRUE) {
        $results[] = "Applications table created successfully";
    } else {
        $results[] = "Error creating applications table: " . $conn->error;
    }
    
    if ($conn->query($createCompaniesTable) === TRUE) {
        $results[] = "Companies table created successfully";
    } else {
        $results[] = "Error creating companies table: " . $conn->error;
    }
    
    return $results;
}

// Function to insert sample data
function insertSampleData($conn) {
    $results = [];
    
    // Sample companies
    $companies = [
        ['TechCorp Pakistan', 'Leading technology company in Pakistan', 'https://techcorp.pk', 'Technology', '2010', 'Karachi', '500-1000'],
        ['PakSoft Solutions', 'Software development and IT services', 'https://paksoft.com', 'Software', '2015', 'Lahore', '100-500'],
        ['Digital Marketing Pro', 'Digital marketing and advertising agency', 'https://digitalpro.pk', 'Marketing', '2018', 'Islamabad', '50-100'],
        ['Finance First', 'Financial services and banking solutions', 'https://financefirst.pk', 'Finance', '2005', 'Karachi', '1000+'],
        ['EduTech Pakistan', 'Educational technology platform', 'https://edutech.pk', 'Education', '2020', 'Lahore', '50-100']
    ];
    
    foreach ($companies as $company) {
        $stmt = $conn->prepare("INSERT INTO companies (company_name, company_description, company_website, industry, founded_year, headquarters, company_size) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $company[0], $company[1], $company[2], $company[3], $company[4], $company[5], $company[6]);
        if ($stmt->execute()) {
            $results[] = "Company '{$company[0]}' added successfully";
        } else {
            $results[] = "Error adding company '{$company[0]}': " . $stmt->error;
        }
    }
    
    // Sample jobs
    $jobs = [
        ['Senior Web Developer', 'TechCorp Pakistan', 'We are looking for an experienced web developer to join our team. You will be responsible for developing and maintaining web applications using modern technologies.', 'Bachelor degree in Computer Science, 3+ years experience in PHP, JavaScript, MySQL', 'Karachi, Pakistan', 'Full Time', 'PKR 80,000 - 120,000', '3-5 years', '2025-02-15', 'Web Development', 'PHP, JavaScript, MySQL, HTML, CSS', 'Health insurance, flexible hours, annual bonus'],
        ['Digital Marketing Specialist', 'Digital Marketing Pro', 'Join our dynamic marketing team to create and execute digital marketing campaigns for our clients.', 'Bachelor degree in Marketing, 2+ years experience in digital marketing, knowledge of SEO/SEM', 'Islamabad, Pakistan', 'Full Time', 'PKR 50,000 - 80,000', '2-3 years', '2025-02-20', 'Marketing', 'SEO, SEM, Social Media Marketing, Google Analytics', 'Remote work options, professional development'],
        ['Mobile App Developer', 'PakSoft Solutions', 'Develop mobile applications for iOS and Android platforms using Flutter framework.', 'Bachelor degree in Computer Science, 2+ years experience in mobile development, Flutter knowledge', 'Lahore, Pakistan', 'Full Time', 'PKR 70,000 - 100,000', '2-4 years', '2025-02-18', 'Mobile Development', 'Flutter, Dart, Firebase, REST APIs', 'Health insurance, flexible schedule'],
        ['Content Writer', 'EduTech Pakistan', 'Create engaging educational content for our online learning platform.', 'Bachelor degree in English/Journalism, excellent writing skills, 1+ years experience', 'Lahore, Pakistan', 'Part Time', 'PKR 25,000 - 40,000', '1-2 years', '2025-02-25', 'Content Writing', 'Content Writing, SEO, WordPress', 'Work from home, flexible hours'],
        ['Financial Analyst', 'Finance First', 'Analyze financial data and prepare reports for investment decisions.', 'Bachelor degree in Finance/Accounting, 3+ years experience in financial analysis', 'Karachi, Pakistan', 'Full Time', 'PKR 90,000 - 130,000', '3-5 years', '2025-02-22', 'Finance', 'Financial Analysis, Excel, SQL, Power BI', 'Health insurance, retirement plan, bonus'],
        ['Graphic Designer', 'Digital Marketing Pro', 'Create stunning visual content for marketing campaigns and social media.', 'Bachelor degree in Design, 2+ years experience in graphic design, proficiency in Adobe Creative Suite', 'Islamabad, Pakistan', 'Full Time', 'PKR 45,000 - 70,000', '2-3 years', '2025-02-28', 'Design', 'Photoshop, Illustrator, InDesign, Figma', 'Creative freedom, modern workspace'],
        ['Data Entry Specialist', 'TechCorp Pakistan', 'Accurate data entry and database management for our growing company.', 'High school diploma, fast typing skills, attention to detail', 'Karachi, Pakistan', 'Part Time', 'PKR 20,000 - 35,000', '0-1 years', '2025-03-01', 'Administrative', 'Data Entry, MS Office, Typing', 'Flexible schedule, training provided'],
        ['Customer Support Representative', 'Finance First', 'Provide excellent customer service via phone, email, and chat.', 'Bachelor degree preferred, excellent communication skills, customer service experience', 'Karachi, Pakistan', 'Full Time', 'PKR 35,000 - 55,000', '1-2 years', '2025-02-26', 'Customer Service', 'Communication, Problem Solving, CRM', 'Health benefits, career growth'],
        ['UI/UX Designer', 'PakSoft Solutions', 'Design intuitive user interfaces and user experiences for web and mobile applications.', 'Bachelor degree in Design, 3+ years experience in UI/UX design, portfolio required', 'Lahore, Pakistan', 'Full Time', 'PKR 60,000 - 90,000', '3-4 years', '2025-02-24', 'Design', 'Figma, Sketch, Adobe XD, Prototyping', 'Design team collaboration, latest tools'],
        ['Business Analyst', 'EduTech Pakistan', 'Analyze business processes and recommend improvements for our educational platform.', 'Bachelor degree in Business Administration, 2+ years experience in business analysis', 'Lahore, Pakistan', 'Full Time', 'PKR 55,000 - 80,000', '2-3 years', '2025-02-27', 'Business', 'Business Analysis, Process Improvement, Documentation', 'Professional development, flexible hours']
    ];
    
    foreach ($jobs as $job) {
        $stmt = $conn->prepare("INSERT INTO jobs (job_title, company_name, job_description, job_requirements, job_location, job_type, salary_range, experience_level, application_deadline, category, skills_required, benefits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $job[0], $job[1], $job[2], $job[3], $job[4], $job[5], $job[6], $job[7], $job[8], $job[9], $job[10], $job[11]);
        if ($stmt->execute()) {
            $results[] = "Job '{$job[0]}' added successfully";
        } else {
            $results[] = "Error adding job '{$job[0]}': " . $stmt->error;
        }
    }
    
    return $results;
}

// Handle form submission
$setup_results = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create_tables'])) {
        $setup_results = createJobPortalTables($conn);
    }
    
    if (isset($_POST['insert_sample_data'])) {
        $setup_results = array_merge($setup_results, insertSampleData($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PakJobs Setup - Database Initialization</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .setup-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .setup-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .setup-header h1 {
            color: #333;
            margin-bottom: 1rem;
            font-size: 2.5rem;
        }

        .setup-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .setup-section {
            margin-bottom: 3rem;
            padding: 2rem;
            border: 2px solid #f0f0f0;
            border-radius: 10px;
        }

        .setup-section h2 {
            color: #333;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .setup-section p {
            color: #666;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .setup-btn {
            background: #667eea;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            margin-right: 1rem;
        }

        .setup-btn:hover {
            background: #5a6fd8;
        }

        .setup-btn.secondary {
            background: #6c757d;
        }

        .setup-btn.secondary:hover {
            background: #5a6268;
        }

        .results {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1rem;
            max-height: 300px;
            overflow-y: auto;
        }

        .result-item {
            padding: 0.5rem 0;
            border-bottom: 1px solid #dee2e6;
            font-size: 0.9rem;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .success {
            color: #28a745;
        }

        .error {
            color: #dc3545;
        }

        .info {
            color: #17a2b8;
        }

        .next-steps {
            background: #e8f2ff;
            padding: 2rem;
            border-radius: 10px;
            margin-top: 2rem;
        }

        .next-steps h3 {
            color: #667eea;
            margin-bottom: 1rem;
        }

        .next-steps ul {
            color: #555;
            padding-left: 1.5rem;
        }

        .next-steps li {
            margin-bottom: 0.5rem;
        }

        .next-steps a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .next-steps a:hover {
            text-decoration: underline;
        }

        .warning {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
        }

        .warning i {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="setup-container">
            <div class="setup-header">
                <h1><i class="fas fa-cogs"></i> PakJobs Setup</h1>
                <p>Initialize your job portal database and add sample data</p>
            </div>

            <div class="warning">
                <i class="fas fa-exclamation-triangle"></i>
                <strong>Important:</strong> Make sure you have created a database named 'job_portal' in your MySQL server before running this setup.
            </div>

            <!-- Database Tables Setup -->
            <div class="setup-section">
                <h2><i class="fas fa-database"></i> Database Tables</h2>
                <p>Create the necessary database tables for the job portal. This includes tables for jobs, applications, and companies.</p>
                
                <form method="POST">
                    <button type="submit" name="create_tables" class="setup-btn">
                        <i class="fas fa-plus-circle"></i> Create Tables
                    </button>
                </form>

                <?php if (!empty($setup_results) && isset($_POST['create_tables'])): ?>
                    <div class="results">
                        <h4>Setup Results:</h4>
                        <?php foreach ($setup_results as $result): ?>
                            <div class="result-item <?php echo strpos($result, 'Error') !== false ? 'error' : 'success'; ?>">
                                <?php echo htmlspecialchars($result); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Sample Data Setup -->
            <div class="setup-section">
                <h2><i class="fas fa-seedling"></i> Sample Data</h2>
                <p>Add sample companies and jobs to get started. This will populate your job portal with realistic data for testing and demonstration.</p>
                
                <form method="POST">
                    <button type="submit" name="insert_sample_data" class="setup-btn">
                        <i class="fas fa-download"></i> Add Sample Data
                    </button>
                </form>

                <?php if (!empty($setup_results) && isset($_POST['insert_sample_data'])): ?>
                    <div class="results">
                        <h4>Sample Data Results:</h4>
                        <?php foreach ($setup_results as $result): ?>
                            <div class="result-item <?php echo strpos($result, 'Error') !== false ? 'error' : 'success'; ?>">
                                <?php echo htmlspecialchars($result); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Next Steps -->
            <div class="next-steps">
                <h3><i class="fas fa-arrow-right"></i> Next Steps</h3>
                <ul>
                    <li><a href="index.php">Visit the Job Portal Homepage</a> to see your new job portal in action</li>
                    <li><a href="admin.php">Access the Admin Panel</a> to manage jobs and applications (Username: admin, Password: admin123)</li>
                    <li><a href="jobs.php">Browse All Jobs</a> to see the job listings</li>
                    <li>Customize the design and content to match your brand</li>
                    <li>Add your own companies and job postings</li>
                </ul>
            </div>

            <!-- Database Info -->
            <div class="setup-section">
                <h2><i class="fas fa-info-circle"></i> Database Information</h2>
                <p>Current database configuration:</p>
                <div class="results">
                    <div class="result-item info">
                        <strong>Database:</strong> job_portal
                    </div>
                    <div class="result-item info">
                        <strong>Host:</strong> localhost
                    </div>
                    <div class="result-item info">
                        <strong>Username:</strong> root
                    </div>
                    <div class="result-item info">
                        <strong>Tables Created:</strong> jobs, job_applications, companies
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
