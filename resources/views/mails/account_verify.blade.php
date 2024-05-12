<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniJunction:Account Verification Successful</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1, p {
            text-align: center;
            color: #333;
        }
        .message {
            margin-top: 20px;
            color: #555;
            text-align: center;
        }
        .button-container {
            text-align: center;
            margin-top: 30px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .signature {
            text-align: center;
            margin-top: 30px;
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Account Verification Successful</h1>
        <p>Dear {{ $user->name }},</p>
        <p>Your account has been successfully verified. You are now a verified member of our community.</p>
        <p>Feel free to explore our platform and connect with other alumni.</p>
        <div class="message">
            <p>If you have any questions or need assistance, please don't hesitate to contact us.</p>
        </div>
        <div class="signature">
            <p>Best regards,<br>AlumniJunction Team</p>
        </div>
    </div>
</body>
</html>
