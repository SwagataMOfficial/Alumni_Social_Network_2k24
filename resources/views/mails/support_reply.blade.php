<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Reply</title>
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
        h2, h3 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Support Reply</h2>
        <p>Dear User,</p>
        <p>Your query:</p>
        <blockquote>{{ $query }}</blockquote>
        <p>has been answered by the AlumniJunction team:</p>
        <blockquote>{{ $reply }}</blockquote>
        <p>Thank you for reaching out to us.</p>
        <p>Best regards,<br>AlumniJunction Support Team</p>
    </div>
</body>
</html>
