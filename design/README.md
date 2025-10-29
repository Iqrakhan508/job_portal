# PakJobs - Job Portal System

A complete job portal system built with PHP and MySQL, featuring a modern responsive design and comprehensive job management functionality.

## Features

### For Job Seekers
- **Modern Homepage**: Beautiful landing page with search functionality
- **Job Search & Filtering**: Advanced search with location, category, and job type filters
- **Job Details**: Comprehensive job information with application form
- **Application System**: Easy job application with resume upload
- **Responsive Design**: Mobile-friendly interface

### For Employers/Admins
- **Admin Panel**: Complete job management system
- **Job Management**: Add, edit, delete jobs
- **Application Tracking**: View and manage job applications
- **Statistics Dashboard**: Overview of jobs and applications
- **Secure Authentication**: Admin login system

### Technical Features
- **Database Integration**: MySQL database with proper relationships
- **File Upload**: Resume/CV upload functionality
- **Search & Pagination**: Efficient job search with pagination
- **Responsive Design**: Mobile-first approach
- **Modern UI**: Clean, professional design with animations

## Installation

### Prerequisites
- XAMPP/WAMP/LAMP server
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web browser

### Setup Instructions

1. **Download/Clone the Project**
   ```bash
   # Place all files in your web server directory
   # For XAMPP: C:\xampp\htdocs\job_portal
   ```

2. **Create Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `job_portal`
   - Set collation to `utf8_general_ci`

3. **Configure Database Connection**
   - Open `job_portal_config.php`
   - Update database credentials if needed:
   ```php
   $host = "localhost";
   $username = "root";
   $password = "";
   $database = "job_portal";
   ```

4. **Initialize Database**
   - Visit `http://localhost/job_portal/setup.php`
   - Click "Create Tables" to set up database structure
   - Click "Add Sample Data" to populate with sample jobs

5. **Access the Application**
   - **Homepage**: `http://localhost/job_portal/index.php`
   - **Admin Panel**: `http://localhost/job_portal/admin.php`
     - Username: `admin`
     - Password: `admin123`

## File Structure

```
job_portal/
├── index.php              # Homepage
├── jobs.php               # Job listings page
├── job_details.php        # Individual job details
├── admin.php              # Admin panel
├── setup.php              # Database setup
├── job_portal_config.php  # Database configuration
├── uploads/               # Resume uploads directory
└── README.md              # This file
```

## Database Schema

### Jobs Table
- `job_id` (Primary Key)
- `job_title`
- `company_name`
- `job_description`
- `job_requirements`
- `job_location`
- `job_type` (Full Time, Part Time, Contract, Freelance)
- `salary_range`
- `experience_level`
- `posted_date`
- `application_deadline`
- `is_active`
- `category`
- `skills_required`
- `benefits`
- `contact_email`
- `contact_phone`

### Job Applications Table
- `application_id` (Primary Key)
- `job_id` (Foreign Key)
- `applicant_name`
- `applicant_email`
- `applicant_phone`
- `resume_path`
- `cover_letter`
- `application_date`
- `status` (Pending, Under Review, Shortlisted, Rejected, Hired)

### Companies Table
- `company_id` (Primary Key)
- `company_name`
- `company_description`
- `company_website`
- `company_logo`
- `company_size`
- `industry`
- `founded_year`
- `headquarters`
- `contact_email`
- `contact_phone`
- `is_verified`
- `created_date`

## Usage

### For Job Seekers
1. Visit the homepage to browse featured jobs
2. Use the search bar to find specific jobs
3. Apply filters for location, category, and job type
4. Click on job titles to view detailed information
5. Fill out the application form and upload resume
6. Submit application

### For Administrators
1. Login to admin panel with credentials
2. **Manage Jobs Tab**: View all jobs, delete jobs
3. **View Applications Tab**: See all job applications
4. **Add New Job Tab**: Create new job postings
5. Monitor statistics and manage the portal

## Customization

### Design Customization
- Modify CSS styles in each PHP file
- Update color scheme by changing CSS variables
- Add your logo and branding
- Customize the layout and components

### Functionality Enhancement
- Add user registration/login system
- Implement email notifications
- Add job categories management
- Create company profiles
- Add job bookmarking feature

### Database Modifications
- Add new fields to existing tables
- Create additional tables for enhanced features
- Modify relationships between tables

## Security Considerations

### Production Deployment
- Change default admin credentials
- Implement proper password hashing
- Add CSRF protection
- Use prepared statements (already implemented)
- Validate and sanitize all inputs
- Implement proper file upload security
- Use HTTPS in production

### File Upload Security
- Resume uploads are stored in `uploads/resumes/` directory
- Only PDF, DOC, and DOCX files are allowed
- Files are renamed with unique identifiers
- Consider implementing virus scanning

## Browser Support

- Chrome (recommended)
- Firefox
- Safari
- Edge
- Mobile browsers (iOS Safari, Chrome Mobile)

## Troubleshooting

### Common Issues

1. **Database Connection Error**
   - Check database credentials in `job_portal_config.php`
   - Ensure MySQL service is running
   - Verify database `job_portal` exists

2. **File Upload Issues**
   - Check `uploads/resumes/` directory permissions
   - Ensure PHP file upload settings are enabled
   - Verify file size limits

3. **Page Not Loading**
   - Check web server is running
   - Verify file paths are correct
   - Check PHP error logs

4. **Admin Login Issues**
   - Default credentials: admin/admin123
   - Check session configuration
   - Clear browser cache

### Error Logs
- Check PHP error logs in your web server
- Enable error reporting for debugging
- Check MySQL error logs for database issues

## Support

For technical support or questions:
- Check the code comments for implementation details
- Review the database schema for data structure
- Test with sample data first
- Ensure all prerequisites are met

## License

This project is open source and available under the MIT License.

## Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues for bugs and feature requests.

---

**Note**: This is a demonstration project. For production use, implement additional security measures, user authentication, and proper error handling.
