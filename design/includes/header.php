<?php
// Common header for all pages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'PakJobs - Find Your Dream Job'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a href="index.php" class="navbar-brand logo">
                    <i class="fas fa-briefcase"></i> PakJobs
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="jobs.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'jobs.php') ? 'active' : ''; ?>">All Jobs</a>
                        </li>
                        <li class="nav-item">
                            <a href="companies.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'companies.php') ? 'active' : ''; ?>">Companies</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'about.php') ? 'active' : ''; ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'contact.php') ? 'active' : ''; ?>">Contact</a>
                        </li>
                    </ul>
                    
                    <div class="d-flex gap-2">
                        <a href="jobs.php" class="btn btn-outline-light">
                            <i class="fas fa-search"></i> Find Jobs
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
