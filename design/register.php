<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PakJobs</title>
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
            padding: 2rem 0;
        }

        .register-container {
            background: white;
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }

        .register-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .register-header h1 {
            color: #333;
            margin-bottom: 0.5rem;
            font-size: 2rem;
        }

        .register-header p {
            color: #666;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
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
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid #eee;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
        }

        .form-group.full-width {
            grid-column: 1/-1;
        }

        .register-btn {
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
            margin-bottom: 1rem;
        }

        .register-btn:hover {
            background: #5a6fd8;
        }

        .divider {
            text-align: center;
            margin: 1.5rem 0;
            color: #666;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #ddd;
        }

        .divider span {
            background: white;
            padding: 0 1rem;
        }

        .social-register {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .social-btn {
            flex: 1;
            padding: 0.8rem;
            border: 2px solid #eee;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            text-decoration: none;
            color: #333;
        }

        .social-btn:hover {
            border-color: #667eea;
            background: #f8f9ff;
        }

        .login-link {
            text-align: center;
            margin-top: 2rem;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .back-link {
            text-align: center;
            margin-top: 1rem;
        }

        .back-link a {
            color: white;
            text-decoration: none;
            font-weight: 500;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .success-message {
            background: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }

        .error-message {
            background: #f8d7da;
            color: #721c24;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: none;
        }

        .terms-checkbox {
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .terms-checkbox input[type="checkbox"] {
            margin-top: 0.2rem;
        }

        .terms-checkbox label {
            font-size: 0.9rem;
            color: #666;
            line-height: 1.4;
        }

        .terms-checkbox a {
            color: #667eea;
            text-decoration: none;
        }

        .terms-checkbox a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .register-container {
                margin: 1rem;
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1><i class="fas fa-user-plus"></i> Join PakJobs</h1>
            <p>Create your account and start your career journey</p>
        </div>

        <div class="success-message" id="successMessage">
            <i class="fas fa-check-circle"></i> Account created successfully! You can now log in.
        </div>

        <div class="error-message" id="errorMessage">
            <i class="fas fa-exclamation-circle"></i> Please fill in all required fields correctly.
        </div>

        <form id="registerForm">
            <div class="form-row">
                <div class="form-group">
                    <label for="firstName">First Name *</label>
                    <input type="text" id="firstName" name="firstName" required>
                </div>
                
                <div class="form-group">
                    <label for="lastName">Last Name *</label>
                    <input type="text" id="lastName" name="lastName" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required>
                </div>
                
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password *</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="location">Location</label>
                    <select id="location" name="location">
                        <option value="">Select Location</option>
                        <option value="Karachi">Karachi</option>
                        <option value="Lahore">Lahore</option>
                        <option value="Islamabad">Islamabad</option>
                        <option value="Rawalpindi">Rawalpindi</option>
                        <option value="Faisalabad">Faisalabad</option>
                        <option value="Multan">Multan</option>
                        <option value="Peshawar">Peshawar</option>
                        <option value="Quetta">Quetta</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="experience">Experience Level</label>
                    <select id="experience" name="experience">
                        <option value="">Select Experience</option>
                        <option value="Fresh Graduate">Fresh Graduate</option>
                        <option value="0-1 years">0-1 years</option>
                        <option value="1-3 years">1-3 years</option>
                        <option value="3-5 years">3-5 years</option>
                        <option value="5-10 years">5-10 years</option>
                        <option value="10+ years">10+ years</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="skills">Skills (comma separated)</label>
                <input type="text" id="skills" name="skills" placeholder="e.g., PHP, JavaScript, MySQL">
            </div>
            
            <div class="terms-checkbox">
                <input type="checkbox" id="terms" name="terms" required>
                <label for="terms">
                    I agree to the <a href="#" onclick="alert('Terms and Conditions coming soon!')">Terms and Conditions</a> 
                    and <a href="#" onclick="alert('Privacy Policy coming soon!')">Privacy Policy</a> *
                </label>
            </div>
            
            <button type="submit" class="register-btn">
                <i class="fas fa-user-plus"></i> Create Account
            </button>
        </form>

        <div class="divider">
            <span>Or register with</span>
        </div>

        <div class="social-register">
            <a href="#" class="social-btn" onclick="alert('Google registration coming soon!')">
                <i class="fab fa-google"></i> Google
            </a>
            <a href="#" class="social-btn" onclick="alert('LinkedIn registration coming soon!')">
                <i class="fab fa-linkedin"></i> LinkedIn
            </a>
        </div>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Sign in here</a></p>
        </div>

        <div class="back-link">
            <a href="index.php"><i class="fas fa-arrow-left"></i> Back to Homepage</a>
        </div>
    </div>

    <script>
        // Registration form handling
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            const terms = document.getElementById('terms').checked;
            
            // Validation
            if (!firstName || !lastName || !email || !password || !confirmPassword) {
                showError('Please fill in all required fields.');
                return;
            }
            
            if (password !== confirmPassword) {
                showError('Passwords do not match.');
                return;
            }
            
            if (password.length < 6) {
                showError('Password must be at least 6 characters long.');
                return;
            }
            
            if (!terms) {
                showError('Please accept the Terms and Conditions.');
                return;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showError('Please enter a valid email address.');
                return;
            }
            
            // Show success message
            showSuccess();
            
            // Reset form
            this.reset();
            
            // In a real application, you would send the data to a server
            console.log('Registration data:', {
                firstName, lastName, email, password,
                phone: document.getElementById('phone').value,
                location: document.getElementById('location').value,
                experience: document.getElementById('experience').value,
                skills: document.getElementById('skills').value
            });
        });

        function showError(message) {
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.textContent = message;
            errorDiv.style.display = 'block';
            
            const successDiv = document.getElementById('successMessage');
            successDiv.style.display = 'none';
            
            setTimeout(() => {
                errorDiv.style.display = 'none';
            }, 5000);
        }

        function showSuccess() {
            const successDiv = document.getElementById('successMessage');
            successDiv.style.display = 'block';
            
            const errorDiv = document.getElementById('errorMessage');
            errorDiv.style.display = 'none';
            
            setTimeout(() => {
                successDiv.style.display = 'none';
            }, 5000);
        }

        // Password confirmation validation
        document.getElementById('confirmPassword').addEventListener('input', function() {
            const password = document.getElementById('password').value;
            const confirmPassword = this.value;
            
            if (password !== confirmPassword && confirmPassword.length > 0) {
                this.style.borderColor = '#dc3545';
            } else {
                this.style.borderColor = '#eee';
            }
        });
    </script>
</body>
</html>
