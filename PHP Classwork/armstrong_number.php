<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armstrong Number</title>
</head>
<body>
    <form method="post">
        <label for="number">Enter a number:</label>
        <input type="number" name="num">
        <input type="submit" name="submit" value="check Armstrong">

        <?php
        if(isset($_POST['submit'])){
            $num=$_POST['num'];
            $temp=$num;
            $sum=0;

            $digits=strlen($num);

            while($temp >0){
                $rem=$temp%10;
                $sum+=pow($rem,$digits);
                $temp=(int)$temp/10;
            }

            if($sum==$num){
                echo "<br>$num is an Armstrong number";
            }else{
                echo "<br>$num is not an Armstrong number";
            }
        }
        ?>
    </form>
</body>
</html>