<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Table</title>
</head>
<body>
    <form method="post">
        <label for="num">Enter Any Number</label>
        <input type="num" name="num">
        <input type="submit" name="submit" value="Show Table">

        <?php
        echo "<br>";
         if(isset($_POST['submit'])){
            $num=$_POST['num'];
            for($i=1;$i<=10;$i++){
                echo $num*$i;
                echo " ";
            }
         }
        ?>
    </form>
</body>
</html>