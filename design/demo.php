<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PakJobs - Job Portal Demo</title>
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

        .demo-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            text-align: center;
        }

        .demo-header h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .demo-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .demo-links {
            background: white;
            padding: 3rem 0;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .demo-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s;
        }

        .demo-card:hover {
            transform: translateY(-5px);
        }

        .demo-card i {
            font-size: 3rem;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .demo-card h3 {
            color: #333;
            margin-bottom: 1rem;
        }

        .demo-card p {
            color: #666;
            margin-bottom: 1.5rem;
        }

        .demo-btn {
            background: #667eea;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s;
            display: inline-block;
        }

        .demo-btn:hover {
            background: #5a6fd8;
        }

        .features-section {
            background: #f8f9fa;
            padding: 3rem 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .feature-item {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .feature-item i {
            font-size: 2.5rem;
            color: #667eea;
            margin-bottom: 1rem;
        }

        .feature-item h4 {
            color: #333;
            margin-bottom: 1rem;
        }

        .feature-item p {
            color: #666;
        }

        .note {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            color: #856404;
            padding: 1rem;
            border-radius: 8px;
            margin: 2rem 0;
            text-align: center;
        }

        .note i {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <div class="demo-header">
        <div class="container">
            <h1><i class="fas fa-briefcase"></i> PakJobs</h1>
            <p>Complete Job Portal System - Demo Version</p>
        </div>
    </div>

    <div class="demo-links">
        <div class="container">
            <h2 style="text-align: center; color: #333; margin-bottom: 1rem;">Browse the Job Portal</h2>
            <p style="text-align: center; color: #666; font-size: 1.1rem;">Click on any link below to explore different sections</p>
            
            <div class="note">
                <i class="fas fa-info-circle"></i>
                <strong>Note:</strong> This is a demo version with static data. No database connection required!
            </div>

            <div class="links-grid">
                <div class="demo-card">
                    <i class="fas fa-home"></i>
                    <h3>Homepage</h3>
                    <p>Modern landing page with featured jobs, search functionality, and statistics</p>
                    <a href="index.php" class="demo-btn">View Homepage</a>
                </div>

                <div class="demo-card">
                    <i class="fas fa-search"></i>
                    <h3>All Jobs</h3>
                    <p>Browse all available jobs with advanced filtering options by location, category, and job type</p>
                    <a href="jobs.php" class="demo-btn">Browse Jobs</a>
                </div>

                <div class="demo-card">
                    <i class="fas fa-file-alt"></i>
                    <h3>Job Details</h3>
                    <p>View detailed job information with application form and resume upload functionality</p>
                    <a href="job_details.php?id=1" class="demo-btn">View Job Details</a>
                </div>

                <div class="demo-card">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Admin Panel</h3>
                    <p>Complete admin panel for managing jobs and applications (Username: admin, Password: admin123)</p>
                    <a href="admin.php" class="demo-btn">Admin Panel</a>
                </div>
            </div>
        </div>
    </div>

    <div class="features-section">
        <div class="container">
            <h2 style="text-align: center; color: #333; margin-bottom: 1rem;">Key Features</h2>
            <p style="text-align: center; color: #666; font-size: 1.1rem;">Professional job portal with modern design and functionality</p>

            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-mobile-alt"></i>
                    <h4>Responsive Design</h4>
                    <p>Mobile-first design that works perfectly on all devices</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-search"></i>
                    <h4>Advanced Search</h4>
                    <p>Filter jobs by location, category, job type, and keywords</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-upload"></i>
                    <h4>Resume Upload</h4>
                    <p>Easy job application with resume/CV upload functionality</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-chart-bar"></i>
                    <h4>Admin Dashboard</h4>
                    <p>Complete admin panel with statistics and job management</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-palette"></i>
                    <h4>Modern UI/UX</h4>
                    <p>Beautiful gradient design with smooth animations</p>
                </div>

                <div class="feature-item">
                    <i class="fas fa-code"></i>
                    <h4>Clean Code</h4>
                    <p>Well-structured PHP code with proper security measures</p>
                </div>
            </div>
        </div>
    </div>

    <div style="background: #2c3e50; color: white; padding: 2rem 0; text-align: center;">
        <div class="container">
            <h3>Ready to Use Job Portal</h3>
            <p style="margin-top: 1rem; opacity: 0.8;">Professional job portal system built with PHP and modern web technologies</p>
            <div style="margin-top: 2rem;">
                <a href="index.php" style="background: #ffd700; color: #333; padding: 1rem 2rem; border-radius: 25px; text-decoration: none; font-weight: bold; margin-right: 1rem;">Start Exploring</a>
                <a href="admin.php" style="background: transparent; color: white; padding: 1rem 2rem; border: 2px solid white; border-radius: 25px; text-decoration: none; font-weight: bold;">Admin Panel</a>
            </div>
        </div>
    </div>
</body>
</html>
