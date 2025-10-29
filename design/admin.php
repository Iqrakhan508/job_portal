<?php
// Simple authentication (in production, use proper authentication)
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    if (isset($_POST['admin_login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Simple hardcoded admin credentials (change in production)
        if ($username === 'admin' && $password === 'admin123') {
            $_SESSION['admin_logged_in'] = true;
        } else {
            $login_error = 'Invalid credentials';
        }
    }
    
    if (!isset($_SESSION['admin_logged_in'])) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Login - PakJobs</title>
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
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .login-container {
                    background: white;
                    padding: 3rem;
                    border-radius: 15px;
                    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
                    width: 100%;
                    max-width: 400px;
                }

                .login-header {
                    text-align: center;
                    margin-bottom: 2rem;
                }

                .login-header h1 {
                    color: #333;
                    margin-bottom: 0.5rem;
                }

                .login-header p {
                    color: #666;
                }

                .form-group {
                    margin-bottom: 1.5rem;
                }

                .form-group label {
                    display: block;
                    margin-bottom: 0.5rem;
                    font-weight: 500;
                    color: #555;
                }

                .form-group input {
                    width: 100%;
                    padding: 0.8rem;
                    border: 2px solid #eee;
                    border-radius: 8px;
                    font-size: 1rem;
                    transition: border-color 0.3s;
                }

                .form-group input:focus {
                    outline: none;
                    border-color: #667eea;
                }

                .login-btn {
                    width: 100%;
                    padding: 1rem;
                    background: #667eea;
                    color: white;
                    border: none;
                    border-radius: 8px;
                    font-size: 1rem;
                    font-weight: 500;
                    cursor: pointer;
                    transition: background 0.3s;
                }

                .login-btn:hover {
                    background: #5a6fd8;
                }

                .error-message {
                    background: #f8d7da;
                    color: #721c24;
                    padding: 1rem;
                    border-radius: 8px;
                    margin-bottom: 1rem;
                }

                .back-link {
                    text-align: center;
                    margin-top: 2rem;
                }

                .back-link a {
                    color: #667eea;
                    text-decoration: none;
                }

                .back-link a:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class="login-container">
                <div class="login-header">
                    <h1><i class="fas fa-shield-alt"></i> Admin Login</h1>
                    <p>PakJobs Administration Panel</p>
                </div>

                <?php if (isset($login_error)): ?>
                    <div class="error-message"><?php echo $login_error; ?></div>
                <?php endif; ?>

                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    
                    <button type="submit" name="admin_login" class="login-btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                </form>

                <div class="back-link">
                    <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Website</a>
                </div>
            </div>
        </body>
        </html>
        <?php
        exit();
    }
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: admin.php');
    exit();
}

// Handle job operations
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_job'])) {
        $job_title = $_POST['job_title'];
        $company_name = $_POST['company_name'];
        $job_description = $_POST['job_description'];
        $job_requirements = $_POST['job_requirements'];
        $job_location = $_POST['job_location'];
        $job_type = $_POST['job_type'];
        $salary_range = $_POST['salary_range'];
        $experience_level = $_POST['experience_level'];
        $category = $_POST['category'];
        $skills_required = $_POST['skills_required'];
        $benefits = $_POST['benefits'];
        $application_deadline = $_POST['application_deadline'];
        $contact_email = $_POST['contact_email'];
        $contact_phone = $_POST['contact_phone'];

        $insertQuery = "INSERT INTO jobs (job_title, company_name, job_description, job_requirements, job_location, job_type, salary_range, experience_level, category, skills_required, benefits, application_deadline, contact_email, contact_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ssssssssssssss", $job_title, $company_name, $job_description, $job_requirements, $job_location, $job_type, $salary_range, $experience_level, $category, $skills_required, $benefits, $application_deadline, $contact_email, $contact_phone);
        
        if ($stmt->execute()) {
            $message = '<div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">Job added successfully!</div>';
        } else {
            $message = '<div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">Error adding job: ' . $conn->error . '</div>';
        }
    }
    
    if (isset($_POST['delete_job'])) {
        $job_id = $_POST['job_id'];
        $deleteQuery = "DELETE FROM jobs WHERE job_id = ?";
        $stmt = $conn->prepare($deleteQuery);
        $stmt->bind_param("i", $job_id);
        
        if ($stmt->execute()) {
            $message = '<div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">Job deleted successfully!</div>';
        } else {
            $message = '<div style="background: #f8d7da; color: #721c24; padding: 1rem; border-radius: 8px; margin-bottom: 2rem;">Error deleting job: ' . $conn->error . '</div>';
        }
    }
}

// Get all jobs
$jobsQuery = "SELECT * FROM jobs ORDER BY posted_date DESC";
$jobs = $conn->query($jobsQuery);

// Get job applications
$applicationsQuery = "SELECT ja.*, j.job_title, j.company_name FROM job_applications ja JOIN jobs j ON ja.job_id = j.job_id ORDER BY ja.application_date DESC";
$applications = $conn->query($applicationsQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - PakJobs</title>
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

        /* Header */
        .admin-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .admin-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .admin-logo {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .admin-nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .admin-nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .admin-nav a:hover {
            color: #ffd700;
        }

        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 0.5rem 1rem;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 5px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        /* Main Content */
        .admin-content {
            padding: 2rem 0;
        }

        .admin-tabs {
            display: flex;
            margin-bottom: 2rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .tab-btn {
            flex: 1;
            padding: 1rem;
            background: white;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .tab-btn.active {
            background: #667eea;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        /* Forms */
        .admin-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #555;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #eee;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .submit-btn {
            background: #667eea;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-btn:hover {
            background: #5a6fd8;
        }

        /* Tables */
        .admin-table {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            background: #667eea;
            color: white;
            padding: 1rem 2rem;
            font-size: 1.2rem;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            font-weight: 500;
            color: #555;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        .view-btn {
            background: #28a745;
            color: white;
            text-decoration: none;
            margin-right: 0.5rem;
        }

        .view-btn:hover {
            background: #218838;
        }

        /* Stats */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #667eea;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }

            .admin-tabs {
                flex-direction: column;
            }

            table {
                font-size: 0.9rem;
            }

            th, td {
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Admin Header -->
    <header class="admin-header">
        <div class="container">
            <div class="admin-header-content">
                <div class="admin-logo">
                    <i class="fas fa-shield-alt"></i> PakJobs Admin
                </div>
                
                <nav class="admin-nav">
                    <a href="index.php"><i class="fas fa-home"></i> Website</a>
                    <a href="admin.php?logout=1" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Admin Content -->
    <div class="container">
        <div class="admin-content">
            <?php echo $message; ?>

            <!-- Stats -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $jobs->num_rows; ?></div>
                    <div class="stat-label">Total Jobs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $applications->num_rows; ?></div>
                    <div class="stat-label">Applications</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $conn->query("SELECT COUNT(*) as count FROM jobs WHERE is_active = TRUE")->fetch_assoc()['count']; ?></div>
                    <div class="stat-label">Active Jobs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $conn->query("SELECT COUNT(*) as count FROM job_applications WHERE status = 'Pending'")->fetch_assoc()['count']; ?></div>
                    <div class="stat-label">Pending Applications</div>
                </div>
            </div>

            <!-- Tabs -->
            <div class="admin-tabs">
                <button class="tab-btn active" onclick="showTab('jobs')">Manage Jobs</button>
                <button class="tab-btn" onclick="showTab('applications')">View Applications</button>
                <button class="tab-btn" onclick="showTab('add-job')">Add New Job</button>
            </div>

            <!-- Jobs Tab -->
            <div id="jobs" class="tab-content active">
                <div class="admin-table">
                    <div class="table-header">All Jobs</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Posted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $jobs->data_seek(0); // Reset result pointer
                            while ($job = $jobs->fetch_assoc()): 
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($job['job_title']); ?></td>
                                    <td><?php echo htmlspecialchars($job['company_name']); ?></td>
                                    <td><?php echo htmlspecialchars($job['job_location']); ?></td>
                                    <td><?php echo $job['job_type']; ?></td>
                                    <td><?php echo date('M j, Y', strtotime($job['posted_date'])); ?></td>
                                    <td>
                                        <a href="job_details.php?id=<?php echo $job['job_id']; ?>" class="view-btn">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this job?')">
                                            <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                                            <button type="submit" name="delete_job" class="action-btn delete-btn">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Applications Tab -->
            <div id="applications" class="tab-content">
                <div class="admin-table">
                    <div class="table-header">Job Applications</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Applicant</th>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th>Email</th>
                                <th>Applied Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $applications->data_seek(0); // Reset result pointer
                            while ($application = $applications->fetch_assoc()): 
                            ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($application['applicant_name']); ?></td>
                                    <td><?php echo htmlspecialchars($application['job_title']); ?></td>
                                    <td><?php echo htmlspecialchars($application['company_name']); ?></td>
                                    <td><?php echo htmlspecialchars($application['applicant_email']); ?></td>
                                    <td><?php echo date('M j, Y', strtotime($application['application_date'])); ?></td>
                                    <td>
                                        <span style="padding: 0.3rem 0.8rem; border-radius: 15px; font-size: 0.8rem; font-weight: 500; background: #e8f2ff; color: #667eea;">
                                            <?php echo $application['status']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if (!empty($application['resume_path'])): ?>
                                            <a href="<?php echo $application['resume_path']; ?>" target="_blank" class="view-btn">
                                                <i class="fas fa-file"></i> Resume
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Add Job Tab -->
            <div id="add-job" class="tab-content">
                <div class="admin-form">
                    <h2 style="margin-bottom: 2rem; color: #333;">Add New Job</h2>
                    <form method="POST">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="job_title">Job Title *</label>
                                <input type="text" id="job_title" name="job_title" required>
                            </div>
                            <div class="form-group">
                                <label for="company_name">Company Name *</label>
                                <input type="text" id="company_name" name="company_name" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="job_location">Location *</label>
                                <input type="text" id="job_location" name="job_location" required>
                            </div>
                            <div class="form-group">
                                <label for="job_type">Job Type *</label>
                                <select id="job_type" name="job_type" required>
                                    <option value="">Select Type</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                    <option value="Contract">Contract</option>
                                    <option value="Freelance">Freelance</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="salary_range">Salary Range</label>
                                <input type="text" id="salary_range" name="salary_range" placeholder="e.g., PKR 50,000 - 80,000">
                            </div>
                            <div class="form-group">
                                <label for="experience_level">Experience Level</label>
                                <input type="text" id="experience_level" name="experience_level" placeholder="e.g., 2-3 years">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" id="category" name="category" placeholder="e.g., Technology, Marketing">
                            </div>
                            <div class="form-group">
                                <label for="application_deadline">Application Deadline</label>
                                <input type="date" id="application_deadline" name="application_deadline">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="job_description">Job Description *</label>
                            <textarea id="job_description" name="job_description" required placeholder="Describe the role and responsibilities..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="job_requirements">Job Requirements *</label>
                            <textarea id="job_requirements" name="job_requirements" required placeholder="List the required qualifications and skills..."></textarea>
                        </div>

                        <div class="form-group">
                            <label for="skills_required">Required Skills</label>
                            <input type="text" id="skills_required" name="skills_required" placeholder="e.g., PHP, JavaScript, MySQL (comma separated)">
                        </div>

                        <div class="form-group">
                            <label for="benefits">Benefits & Perks</label>
                            <textarea id="benefits" name="benefits" placeholder="List benefits and perks offered..."></textarea>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact_email">Contact Email</label>
                                <input type="email" id="contact_email" name="contact_email">
                            </div>
                            <div class="form-group">
                                <label for="contact_phone">Contact Phone</label>
                                <input type="tel" id="contact_phone" name="contact_phone">
                            </div>
                        </div>

                        <button type="submit" name="add_job" class="submit-btn">
                            <i class="fas fa-plus"></i> Add Job
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Remove active class from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-btn');
            tabButtons.forEach(button => {
                button.classList.remove('active');
            });

            // Show selected tab content
            document.getElementById(tabName).classList.add('active');

            // Add active class to clicked button
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
