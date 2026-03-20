<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Square of number</title>
</head>
<body>

    <form method=post>
        <label for="number">Enter Any Number: </label>
        <input type="number" name="num">
        <input type="submit" name="submit" value="Find Square">

        <?php
    //Write a program to square of a number using user input 
    if(isset($_POST['submit'])){
        $num=$_POST['num'];
        $square=$num*$num;

        echo "<br><br>Square of $num is: $square";
        
    }
    ?>
    </form>
</body>
</html>