<?php
include 'config.php';

$message = "";

if(isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($_POST['password'], $row['password'])) {
            $_SESSION['user_id']     = $row['id'];
            $_SESSION['name']        = $row['name'];
            $_SESSION['profile_photo'] = $row['profile_photo'];
            echo "<script>alert('Login successful!'); window.location='dashboard.php';</script>";
            exit;
        } else {
            $message = "Wrong password";
        }
    } else {
        $message = "Email not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <style>
        body {font-family:Arial; background:#f0f2f5; margin:0; padding:30px;}
        .form-box {
            max-width:380px;
            margin:80px auto;
            background:white;
            padding:40px;
            border-radius:8px;
            box-shadow:0 4px 12px rgba(0,0,0,0.15);
        }
        h2 {text-align:center; color:#333;}
        input, button {
            width:100%;
            padding:12px;
            margin:10px 0;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        }
        button {
            background:#28a745;
            color:white;
            border:none;
            font-size:1.1rem;
            cursor:pointer;
        }
        button:hover {background:#218838;}
        .message {color:red; text-align:center;}
        .center {text-align:center; margin-top:20px;}
    </style>
</head>
<body>

<div class="form-box">
    <h2>Login</h2>

    <?php if($message) echo "<p class='message'>$message</p>"; ?>

    <form method="post">
        <input type="email"    name="email"     placeholder="Email"     required>
        <input type="password" name="password"  placeholder="Password"  required>
        <button name="login">Login</button>
    </form>

    <div class="center">
        New here? <a href="register.php">Create account</a>
    </div>
</div>

</body>
</html>