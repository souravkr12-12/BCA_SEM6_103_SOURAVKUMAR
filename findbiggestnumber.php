<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php program</title>
</head>
<body>
    <?php
     /*Write a program to find the biggest number and Smallest number in an array
      without using any array functions */
       $numbers=array(12,25,78,96,84,10);
       $biggest=$numbers[0];
       $smallest=$numbers[0];

       echo "Your array element is: ";

       for($i=1;$i<count($numbers); $i++){
        if($numbers[$i]>$biggest){
            $biggest=$numbers[$i];
        }
        if($numbers[$i]<$smallest){
            $smallest=$numbers[$i];
        }
        echo "<br>";
        echo $numbers[$i];
       }
        
       echo "<br><br>Biggest number in the array is: ".$biggest;
       echo "<br>Smallest number in the array is: ".$smallest;
    ?>
</body>
</html>