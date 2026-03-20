<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Series</title>
</head>
<body>

    <form method=post>
        <label for="number">Enter Any Number: </label>
        <input type="number" name="num">
        <input type="submit" name="submit" value="Find Fibonacci">

        <?php
    //Write a program in PHP to print Fibonacci series. 
    if(isset($_POST['submit'])){
        $num=$_POST['num'];
       $a=0;
       $b=1;
       echo "<br> Fibonacci Series of $num is :<br> ";
       echo $a ." ";
       echo $b ." ";
       for($i=3;$i<=$num;$i++){
         $c=$a+$b;
         echo $c ." ";
         $a=$b;
         $b=$c;
       }
    }
    ?>
    </form>
</body>
</html>