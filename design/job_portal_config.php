<?php
// Job Portal Database Configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "job_portal";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8");

// Function to create job portal tables if they don't exist
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
    if ($conn->query($createJobsTable) === TRUE) {
        echo "Jobs table created successfully<br>";
    } else {
        echo "Error creating jobs table: " . $conn->error . "<br>";
    }
    
    if ($conn->query($createApplicationsTable) === TRUE) {
        echo "Applications table created successfully<br>";
    } else {
        echo "Error creating applications table: " . $conn->error . "<br>";
    }
    
    if ($conn->query($createCompaniesTable) === TRUE) {
        echo "Companies table created successfully<br>";
    } else {
        echo "Error creating companies table: " . $conn->error . "<br>";
    }
}

// Function to insert sample data
function insertSampleData($conn) {
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
        $stmt->execute();
    }
    
    // Sample jobs
    $jobs = [
        ['Senior Web Developer', 'TechCorp Pakistan', 'We are looking for an experienced web developer to join our team. You will be responsible for developing and maintaining web applications using modern technologies.', 'Bachelor degree in Computer Science, 3+ years experience in PHP, JavaScript, MySQL', 'Karachi, Pakistan', 'Full Time', 'PKR 80,000 - 120,000', '3-5 years', '2025-02-15', 'Web Development', 'PHP, JavaScript, MySQL, HTML, CSS', 'Health insurance, flexible hours, annual bonus'],
        ['Digital Marketing Specialist', 'Digital Marketing Pro', 'Join our dynamic marketing team to create and execute digital marketing campaigns for our clients.', 'Bachelor degree in Marketing, 2+ years experience in digital marketing, knowledge of SEO/SEM', 'Islamabad, Pakistan', 'Full Time', 'PKR 50,000 - 80,000', '2-3 years', '2025-02-20', 'Marketing', 'SEO, SEM, Social Media Marketing, Google Analytics', 'Remote work options, professional development'],
        ['Mobile App Developer', 'PakSoft Solutions', 'Develop mobile applications for iOS and Android platforms using Flutter framework.', 'Bachelor degree in Computer Science, 2+ years experience in mobile development, Flutter knowledge', 'Lahore, Pakistan', 'Full Time', 'PKR 70,000 - 100,000', '2-4 years', '2025-02-18', 'Mobile Development', 'Flutter, Dart, Firebase, REST APIs', 'Health insurance, flexible schedule'],
        ['Content Writer', 'EduTech Pakistan', 'Create engaging educational content for our online learning platform.', 'Bachelor degree in English/Journalism, excellent writing skills, 1+ years experience', 'Lahore, Pakistan', 'Part Time', 'PKR 25,000 - 40,000', '1-2 years', '2025-02-25', 'Content Writing', 'Content Writing, SEO, WordPress', 'Work from home, flexible hours'],
        ['Financial Analyst', 'Finance First', 'Analyze financial data and prepare reports for investment decisions.', 'Bachelor degree in Finance/Accounting, 3+ years experience in financial analysis', 'Karachi, Pakistan', 'Full Time', 'PKR 90,000 - 130,000', '3-5 years', '2025-02-22', 'Finance', 'Financial Analysis, Excel, SQL, Power BI', 'Health insurance, retirement plan, bonus']
    ];
    
    foreach ($jobs as $job) {
        $stmt = $conn->prepare("INSERT INTO jobs (job_title, company_name, job_description, job_requirements, job_location, job_type, salary_range, experience_level, application_deadline, category, skills_required, benefits) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $job[0], $job[1], $job[2], $job[3], $job[4], $job[5], $job[6], $job[7], $job[8], $job[9], $job[10], $job[11]);
        $stmt->execute();
    }
}

// Uncomment the lines below to create tables and insert sample data (run only once)
// createJobPortalTables($conn);
// insertSampleData($conn);
?>
