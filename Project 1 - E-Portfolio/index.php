<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Portfolio - Welcome</title>
    <style>
        body {
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f0f2f5;
        }
        .topbar {
            background: #1a1a2e;
            color: white;
            padding: 15px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border: 1px solid white;
            border-radius: 4px;
            margin-left: 10px;
        }
        .topbar a:hover {
            background: white;
            color: #1a1a2e;
        }
        .hero {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            text-align: center;
            padding: 120px 20px;
        }
        .hero h1 {
            margin: 0;
            font-size: 3.2rem;
        }
        .hero p {
            font-size: 1.3rem;
            margin: 20px 0 40px;
        }
        .btn-big {
            background: white;
            color: #4e54c8;
            padding: 14px 40px;
            font-size: 1.2rem;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-big:hover {
            background: #f0f0f0;
        }
    </style>
</head>
<body>

<div class="topbar">
    <div>My Portfolio</div>
    <div>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    </div>
</div>

<div class="hero">
    <h1>Welcome to My Portfolio</h1>
    <p>Show your projects, skills and creativity in one beautiful place</p>
    <a href="register.php" class="btn-big">Get Started</a>
</div>

</body>
</html>