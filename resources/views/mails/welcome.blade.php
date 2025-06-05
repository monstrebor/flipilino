<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-width: 150px;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="logo">
            <img src="{{ asset('/img/education.jpeg') }}" alt="Company Logo">
        </div>
        <h1>Welcome, {{ $details['name'] }}!</h1>
        <p>Thank you for registering with us. Below are your login details:</p>
        <p><strong>Email:</strong> {{ $details['email'] }}</p>
        <p><strong>Password:</strong> {{ $details['password'] }}</p>
        <p>We recommend you change your password after logging in for the first time.</p>
        <p>Best regards,</p>
        <p>The Team</p>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
