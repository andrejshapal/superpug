<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Keep Your Streak Going!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 30px auto;
            background-color: #ffffff;
            padding: 24px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: #ff6f3c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin-top: 20px;
        }
        .emoji {
            font-size: 36px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="emoji">🔥</div>
    <h2>You're on fire, {{ $profile->user->name }}!</h2>
    <p>You've built a great Streak {{$profile->streak_days}} in <strong>SuperPug</strong> — don't let it break now!</p>
    <p>Every step counts. Your consistency is your superpower 💪</p>
    <a href="https://superpug.app" class="btn">Keep it going</a>
    <p style="margin-top: 24px; font-size: 12px; color: #888;">Your Pug believes in you 🐾</p>
</div>
</body>
</html>
