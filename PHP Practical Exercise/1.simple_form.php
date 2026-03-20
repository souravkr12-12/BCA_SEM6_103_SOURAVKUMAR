<!DOCTYPE html>
<html>
<body>
<!-- create a simple html form and accept the user name and display the name through php echo statement -->
<form method="post">
    Enter your name: <input type="text" name="name">
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    echo "Your name is: " . $name;
}
?>

</body>
</html>