<?php
// Create the login web page using session.

session_start();

if(isset($_POST['login'])){
    if($_POST['user']=="admin" && $_POST['pass']=="123"){
        $_SESSION['user'] = "admin";
        echo "Login Successful";
    } else {
        echo "Invalid Login";
    }
}
?>

<form method="post">
    Username: <input type="text" name="user"><br>
    Password: <input type="password" name="pass"><br>
    <input type="submit" name="login">
</form>