<?php
include "db.php";
if(isset($_POST['register'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);

    $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
    if(mysqli_query($conn, $sql)){
        echo "<script>
                alert('Registration successfully!Please login.');
                window.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
                alert('Something went wrong!');
              </script>";
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
     *{
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
     }

     body{
        background: linear-gradient(135deg, #667eea, #764ba2);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
     }

     form{
        background: #ffffff;
        padding: 30px;
        width: 320px;
        border: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
     }
     h2{
        text-align: center;
        margin-bottom: 20px;
        color:#333;
     }

     label{
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color:#555;
     }

     input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

     input:focus {
            outline: none;
            border-color: #667eea;
        }

    button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

    button:hover {
            background: #5a67d8;
        }

     .error {
            color: red;
            font-size: 13px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form id="registerForm" method="post">
        <h2>CREATE YOUR ACCOUNT</h2>
        <div class="error" id="errorMsg"></div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Enter Your name">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password">

        <button type="submit" name="register">Register</button>

    </form>
    <script>
        document.getElementById("registerForm").addEventListener("submit",function(e){
        let name=document.getElementById("name").value.trim();
        let email=document.getElementById("email").value.trim();
        let password=document.getElementById("password").value.trim();
        let errorMsg=document.getElementById("errorMsg");
        
        errorMsg.textContent="";
        if(name===""||email===""||password===""){
            errorMsg.textContent="All field are required!";
            e.preventDefault();
            return;
        }

        if(password.length<6){
            errorMsg.textContent="Password must be at least 6 character long!";
            e.preventDefault();
        }
    });
    </script>
</form>
</body>
</html>