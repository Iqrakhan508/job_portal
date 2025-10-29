<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sleek Jobs Board</title>
    <link rel="stylesheet" href="style.css">

    <style>
        
/* General Body and Font Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f7f6;
    color: #333;
}

.container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

/* --- Header & Navigation --- */
.header {
    background-color: #fff;
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.header .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Left-aligned section: Logo */
.nav-left {
    display: flex;
    align-items: center;
}

.logo {
    font-size: 24px;
    font-weight: bold;
    color: #369c2a; /* Green color for the logo */
    text-decoration: none;
}

/* Center-aligned navigation links */
.nav-center-links {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    flex-grow: 1; /* Pushes content to the center */
    gap: 30px;
}

.nav-center-links a {
    text-decoration: none;
    color: #555;
    font-weight: bold; /* Make link text bold */
    position: relative; /* For the animated underline */
    padding-bottom: 5px; /* Add space for the line */
}

/* Hover effect for the underline */
.nav-center-links a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 0;
    height: 2px;
    background-color: #369c2a;
    transition: width 0.3s ease-in-out;
}

.nav-center-links a:hover::after {
    width: 100%;
}

/* Active/selected link styling */
.nav-center-links li.selected a {
    color: #369c2a; /* Green text color for selected item */
}

.nav-center-links li.selected a::after {
    width: 100%; /* Line is always visible for the selected item */
}

/* Right-aligned section: Search link */
.search-link {
    text-decoration: none;
    color: #555;
    font-weight: bold;
    font-size: 16px;
    display: flex;
    align-items: center;
    transition: color 0.3s;
}

.search-link:hover {
    color: #3498db;
}

.search-icon {
    margin-right: 5px;
}

/* --- Hero Section --- */
.hero-section {
    background-color: #2c3e50;
    color: #fff;
    text-align: center;
    padding: 100px 0;
}

.hero-section h1 {
    font-size: 48px;
    margin-bottom: 10px;
}

.search-form {
    display: flex;
    justify-content: center;
    margin-top: 30px;
}

.search-input {
    width: 400px;
    padding: 15px 20px;
    border: none;
    border-radius: 5px 0 0 5px;
    font-size: 16px;
}

.search-btn {
    padding: 15px 30px;
    border: none;
    background-color: #3498db;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
}

.search-btn:hover {
    background-color: #2980b9;
}

/* --- JOB LISTINGS SECTION --- */
.jobs-section-new {
    padding: 50px 0;
    background-color: #f4f7f6;
}

.jobs-section-new h2 {
    text-align: center;
    margin-bottom: 40px;
    color: #2c3e50;
    font-size: 32px;
}

.job-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}

.job-card-new {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    padding: 25px 30px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: transform 0.2s ease-in-out;
    border-left: 5px solid #3498db;
    position: relative;
}

.job-card-new:hover {
    transform: translateY(-5px);
}

.job-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.job-title-new {
    font-size: 28px;
    color: #333;
    margin: 0;
    font-weight: bold;
}

.job-description {
    font-size: 14px;
    color: #777;
    margin: 0 0 15px 0;
    line-height: 1.5;
}

/* New container for bottom meta information */
.job-meta-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
}

/* Job type and date buttons */
.job-meta-buttons {
    display: flex;
    gap: 10px;
}

.meta-btn-job-type {
    display: inline-block;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    color: #369c2a;
    background-color: #e6f6e4;
    border: 1px solid #c8e6c9;
}

.meta-btn-date {
    display: inline-block;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: bold;
    color: #ffa037;
    background-color: #fff4e8;
    border: 1px solid #ffdbb5;
}

/* View Details Button */
.view-details-btn {
    background-color: #1a56db;
    color: #fff;
    border: none;
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 11px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    margin-left: 30px;
}

.view-details-btn:hover {
    background-color: #1545b6;
}

/* New Location Button */
.job-location-btn {
    display: flex;
    align-items: center;
    background-color: #f4f7f6;
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    color: #555;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.job-location-btn span {
    margin-right: 5px;
}


/* --- Footer Styles --- */
.main-footer {
    background-color: #2c3e50; /* Same dark color as the hero section */
    color: #f4f7f6;
    padding: 50px 0;
}

.main-footer .container {
    display: flex;
    flex-wrap: wrap; /* Allows columns to wrap on smaller screens */
    justify-content: space-between;
    gap: 30px;
}

.footer-col-1 {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    flex-basis: 30%; /* Give the first column more space */
}

.footer-logo {
    font-size: 32px;
    font-weight: bold;
    color: #369c2a; /* Green logo color */
    text-decoration: none;
    margin-bottom: 10px;
}

.footer-tagline {
    font-size: 14px;
    color: #bbb;
    margin-bottom: 20px;
}

.footer-social-icons a {
    font-size: 24px;
    margin-right: 15px;
    text-decoration: none;
    transition: transform 0.2s ease;
}

.footer-social-icons a:hover {
    transform: scale(1.1);
}

.footer-col-2,
.footer-col-3,
.footer-col-4 {
    flex-basis: 20%;
}

.footer-col-2 h4,
.footer-col-3 h4,
.footer-col-4 h4 {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #fff;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 10px;
}

.footer-links a {
    text-decoration: none;
    color: #bbb;
    font-size: 14px;
    transition: color 0.2s ease;
}

.footer-links a:hover {
    color: #369c2a; /* Green on hover */
}

.footer-bottom {
    text-align: center;
    padding-top: 30px;
    margin-top: 30px;
    border-top: 1px solid #444;
}

.footer-bottom p {
    font-size: 14px;
    color: #999;
}

        </style>
</head>
<body>

    <header class="header">
        <nav class="container">
            <div class="nav-left">
                <a href="#" class="logo">1000Jobs</a>
            </div>
            
            <ul class="nav-center-links">
                <li class="selected"><a href="#">Home</a></li>
                <li><a href="#">Jobs in Pakistan</a></li>
                <li><a href="#">Government Jobs</a></li>
                <li><a href="#">Jobs by Location</a></li>
                <li><a href="#">Companies</a></li>
            </ul>

            <a href="#" class="search-link">
                <span class="search-icon">🔍</span> Search Jobs
            </a>
        </nav>
    </header>

    <section class="hero-section">
        <div class="container">
            <h1>Find Your Dream Job</h1>
            <p>Explore thousands of opportunities from top companies.</p>
            <form class="search-form">
                <input type="text" placeholder="Job title or keyword" class="search-input">
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>
    </section>

    <section class="jobs-section-new">
        <div class="container">
            <h2>Recent Job Openings</h2>
            <div class="job-grid">
                
                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Data Entry WORK</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Seeking a detail-oriented individual for data entry tasks.
                        <br> Strong typing skills and attention to accuracy are a must.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Part Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Lahore, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Content Creator</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Looking for a creative content creator to produce engaging
                        <br> material for social media channels.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Karachi, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Senior Web Designer</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Design and develop user-friendly websites.
                        <br> Knowledge of Figma and responsive design is essential.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Islamabad, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Social Media Manager</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Manage social media accounts, create content calendars,
                        <br> and analyze performance metrics.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Part Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Faisalabad, Pakistan
                        </div>
                    </div>
                </div>
                
                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Graphic Designer</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Create stunning visual content for marketing campaigns.
                        <br> Proficiency in Adobe Creative Suite required.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Part Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Multan, Pakistan
                        </div>
                    </div>
                </div>
                
                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Customer Support</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Answer customer inquiries via email and chat.
                        <br> Must have excellent communication and problem-solving skills.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Peshawar, Pakistan
                        </div>
                    </div>
                </div>
                
                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Junior SEO Specialist</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Assist in implementing SEO strategies and keyword research.
                        <br> Ideal for a recent graduate.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Rawalpindi, Pakistan
                        </div>
                    </div>
                </div>
                
                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Video Editor</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Edit video content for various platforms, including YouTube.
                        <br> Must be proficient with professional editing software.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Part Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Quetta, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Virtual Assistant</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Provide administrative support to clients remotely.
                        <br> Excellent organizational skills are a must.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Bahawalpur, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Mobile App Developer</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Develop and maintain mobile applications for iOS and Android.
                        <br> Experience with Flutter or React Native is required.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Hyderabad, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Data Scientist</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Analyze complex data sets to identify trends and insights.
                        <br> Proficiency in Python or R and machine learning is key.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Sialkot, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Project Manager</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Oversee project lifecycles from initiation to completion.
                        <br> Strong leadership and communication skills are essential.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Gujranwala, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Copywriter</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Write clear and concise copy for advertisements and web content.
                        <br> A knack for creative storytelling is a plus.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Part Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Sukkur, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">QA Tester</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Test software applications to identify bugs and ensure quality.
                        <br> Detail-oriented and analytical skills are highly valued.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Sargodha, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">HR Specialist</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Manage recruitment, onboarding, and employee relations.
                        <br> Strong interpersonal and communication skills are a must.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Full Time</span>
                            <span class="meta-btn-date">Today</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Bahawalpur, Pakistan
                        </div>
                    </div>
                </div>

                <div class="job-card-new">
                    <div class="job-header">
                        <h3 class="job-title-new">Accountant</h3>
                        <button class="view-details-btn">View Job Details</button>
                    </div>
                    <p class="job-description">
                        Manage financial records, prepare reports, and ensure compliance.
                        <br> Proficiency with accounting software is essential.
                    </p>
                    <div class="job-meta-footer">
                        <div class="job-meta-buttons">
                            <span class="meta-btn-job-type">Part Time</span>
                            <span class="meta-btn-date">Yesterday</span>
                        </div>
                        <div class="job-location-btn">
                            <span>📍</span> Lahore, Pakistan
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container">
            <div class="footer-col-1">
                <a href="#" class="footer-logo">1000Jobs</a>
                <p class="footer-tagline">Find your dream job, today.</p>
                <div class="footer-social-icons">
                    <a href="#">📘</a>
                    <a href="#">🐦</a>
                    <a href="#">📸</a>
                    <a href="#">💼</a>
                </div>
            </div>

            <div class="footer-col-2">
                <h4>Job Categories</h4>
                <ul class="footer-links">
                    <li><a href="#">Jobs in Pakistan</a></li>
                    <li><a href="#">Government Jobs</a></li>
                    <li><a href="#">Jobs by Location</a></li>
                    <li><a href="#">Companies</a></li>
                </ul>
            </div>

            <div class="footer-col-3">
                <h4>Legal & Info</h4>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Disclaimer</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>

            <div class="footer-col-4">
                <h4>Other Pages</h4>
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Sitemap</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 1000Jobs. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>











