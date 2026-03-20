<?php
include 'config.php';

$message = "";

if(isset($_POST['register'])) {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $photo = "";

    if(!empty($_FILES['photo']['name'])) {
        $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        if(in_array($ext, ['jpg','jpeg','png','gif'])) {
            $photo = time() . "_" . basename($_FILES['photo']['name']);
            move_uploaded_file($_FILES['photo']['tmp_name'], "uploads/" . $photo);
        }
    }

    $sql = "INSERT INTO users (name, email, password, profile_photo) 
            VALUES ('$name', '$email', '$pass', '$photo')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('Registration successful! Now login.'); window.location='login.php';</script>";
        exit;
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <style>
        body {font-family:Arial; background:#f0f2f5; margin:0; padding:30px;}
        .form-box {
            max-width:420px;
            margin:0 auto;
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
            background:#4e54c8;
            color:white;
            border:none;
            font-size:1.1rem;
            cursor:pointer;
        }
        button:hover {background:#3f44a8;}
        .message {color:red; text-align:center;}
        .center {text-align:center; margin-top:20px;}
    </style>
</head>
<body>

<div class="form-box">
    <h2>Create Account</h2>

    <?php if($message) echo "<p class='message'>$message</p>"; ?>

    <form method="post" enctype="multipart/form-data">
        <input type="text"     name="name"      placeholder="Full Name"      required>
        <input type="email"    name="email"     placeholder="Email"          required>
        <input type="password" name="password"  placeholder="Password"       required>
        <input type="file"     name="photo"     accept="image/*">
        <button name="register">Register</button>
    </form>

    <div class="center">
        Already have account? <a href="login.php">Login here</a>
    </div>
</div>

</body>
</html>