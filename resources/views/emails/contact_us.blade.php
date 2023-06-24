<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Reply</title>
    <style>
        /* Email Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #4c68d7;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #fff;
            padding: 20px;
        }

        .footer {
            background-color: #f5f5f5;
            color: #888;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Contact Us Reply</h1>
    </div>
    <div class="content">
        <p>Dear {{ $first_name }}  {{ $last_name }},</p>
        <p>Thank you for reaching out to us. We appreciate your interest and would like to provide you with the
            following response:</p>
        <blockquote>
            {!! html_entity_decode($content) !!}
        </blockquote>
        <p>If you have any further questions or concerns, please don't hesitate to contact us.</p>
        <p>Thank you again for contacting us.</p>
        <p>Best regards,</p>
        <p>Pronoor Technologies Team</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Pronoor Technologies. All rights reserved.</p>
    </div>
</div>
</body>
</html>
