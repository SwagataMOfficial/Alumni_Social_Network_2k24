<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlumniJunction:Account Banned</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Hello {{ $user->name }},</p>
        <p>We regret to inform you that your account has been permanently banned from AlumniJunction.</p>
        <p>If you have any further questions or concerns, please don't hesitate to contact us.</p>
        <p>Thanks,<br>
        AlumniJunction Team</p>
    </div>
</body>
</html>
