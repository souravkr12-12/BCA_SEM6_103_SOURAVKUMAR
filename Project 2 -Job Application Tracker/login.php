<?php
session_start();
include "db.php";

$error="";
$success="";
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query="SELECT * FROM users WHERE email='$email'";
  $result=mysqli_query($conn,$query);

  if(mysqli_num_rows($result)==1){
     $user=mysqli_fetch_assoc($result);
   
    //password Verify
    if(password_verify($password,$user['password'])){
      $_SESSION['user_id']=$user['id'];
      $success="Login Successful!";
    }else {
      $error="Invalid password";
    }
  } else{
    $error="User not found";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Job Application Tracker-Login</title>
    <style>
      *{
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
      }

      body{
        background:linear-gradient(135deg,#4e73df,#1cc88a);
        height:100vh;
        display:flex;
        justify-content: center;
        align-items: center;
      }

      .login-container{
        background: white;
        padding:30px;
        width:350px;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      }

      h2{
        text-align: center;
        margin-bottom: 5px;
      }

      .subtitle{
        text-align: center;
        color:#777;
        margin-bottom: 20px;
      }

      label{
        display: block;
        margin-top:10px;
        font-weight: bold;
      }

      input{
        width:100%;
        padding:10px;
        margin-top: 5px;
        border-radius: 5px;
        border:1px solid #ccc;
      }

      input:focus{
        outline:none;
        border-color: #4e73df;
      }

      button{
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background: #4e73df;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
      }

      button:hover{
        background: #2e59d9;
      }

    .error {
       color: red;
       text-align: center;
       margin-top: 10px;
     }

    .register-link {
      text-align: center;
      margin-top: 15px;
   }

   .register-link a {
      color: #4e73df;
      text-decoration: none;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Job Application Tracker</h2>
        <p class="subtitle">Login to your account</p>
        <form id="loginForm" method="post">
            <label for="email">Email</label>
            <input type="email" id="email" name="email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            <button type="submit" name="login">Login</button>
            <p class="error" id="errorMsg">
              <?php echo $error; ?>
            </p>
            <?php
         if($success != ""){ ?>
         <script>
        alert("<?php echo $success; ?>");
         window.location.href = "dashboard.php";
       </script>
       <?php } ?>
        </form>
        
        <p class="register-link">
            New User?<a href="register.php">Register here</a>
        </p>
    </div>
</body>
</html>