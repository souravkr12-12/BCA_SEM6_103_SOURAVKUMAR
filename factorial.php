<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial number</title>
</head>
<body>

    <form method=post>
        <label for="number">Enter Any Number: </label>
        <input type="number" name="num">
        <input type="submit" name="submit" value="Find Factorial">

        <?php
    //Write a program to print factorial of a number using user input 
    if(isset($_POST['submit'])){
        $num=$_POST['num'];
        $fact=1;
        for($i=1;$i<=$num;$i++){
         $fact*=$i;
        }

        echo "<br><br>Factorial  of $num is: " .$fact;
        
    }
    ?>
    </form>
</body>
</html>