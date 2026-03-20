<?php
// To find the greatest number in three given number 
$a = 10; $b = 25; $c = 15;

if ($a >= $b && $a >= $c)
    echo "Greatest is $a";
elseif ($b >= $a && $b >= $c)
    echo "Greatest is $b";
else
    echo "Greatest is $c";
?>