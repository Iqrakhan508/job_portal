<?php
// Common footer for all pages
?>
    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">
                        <i class="fas fa-briefcase"></i> PakJobs
                    </h5>
                    <p>Pakistan's leading job portal connecting talented professionals with top companies.</p>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="jobs.php">All Jobs</a></li>
                        <li><a href="companies.php">Companies</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Job Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="jobs.php?category=Technology">Technology</a></li>
                        <li><a href="jobs.php?category=Marketing">Marketing</a></li>
                        <li><a href="jobs.php?category=Finance">Finance</a></li>
                        <li><a href="jobs.php?category=Healthcare">Healthcare</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-3">Resources</h5>
                    <ul class="list-unstyled">
                        <li><a href="jobs.php">Browse All Jobs</a></li>
                        <li><a href="companies.php">Company Directory</a></li>
                        <li><a href="about.php">Career Tips</a></li>
                        <li><a href="contact.php">Help Center</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4">
            
            <div class="row">
                <div class="col-12 text-center">
                    <p class="mb-0">&copy; 2025 PakJobs. All rights reserved. | Built with ❤️ for Pakistan</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Page specific scripts can be added here -->
    <?php if (isset($additionalJS)) echo $additionalJS; ?>
</body>
</html>
