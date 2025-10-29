<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .header {
            background: #28a745;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            margin: -30px -30px 30px -30px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            margin: 20px 0;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-left: 4px solid #28a745;
            border-radius: 4px;
        }
        .field-label {
            font-weight: bold;
            color: #28a745;
            margin-bottom: 5px;
            font-size: 14px;
            text-transform: uppercase;
        }
        .field-value {
            color: #333;
            font-size: 15px;
        }
        .message-box {
            background: #fff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 4px;
            margin-top: 10px;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📧 New Contact Form Submission</h1>
        </div>
        
        <div class="content">
            <p>You have received a new message from the 1000Jobs contact form.</p>
            
            <div class="field">
                <div class="field-label">Name</div>
                <div class="field-value">{{ $name }}</div>
            </div>
            
            <div class="field">
                <div class="field-label">Email Address</div>
                <div class="field-value">{{ $email }}</div>
            </div>
            
            <div class="field">
                <div class="field-label">Subject</div>
                <div class="field-value">{{ $subject }}</div>
            </div>
            
            <div class="field">
                <div class="field-label">Message</div>
                <div class="message-box">{{ $message }}</div>
            </div>
        </div>
        
        <div class="footer">
            <p>This email was sent from the contact form at 1000Jobs.com</p>
            <p>You can reply directly to this email to respond to {{ $name }}</p>
        </div>
    </div>
</body>
</html>

