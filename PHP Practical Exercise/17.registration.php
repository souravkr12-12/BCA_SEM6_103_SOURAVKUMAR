<!DOCTYPE html>
<html>
<body>
<!--  Write the program to get the registration page information in HTML and show that information using PHP.
 -->
<form method="post">
    Name: <input type="text" name="name"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit">
</form>

<?php
if ($_POST) {
    echo "Name: " . $_POST['name'] . "<br>";
    echo "Email: " . $_POST['email'];
}
?>

</body>
</html>