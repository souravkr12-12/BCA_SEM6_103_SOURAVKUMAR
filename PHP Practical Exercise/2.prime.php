<?php
//check whether the given number is prime or not
$num = 7;
$flag = true;

if ($num <= 1) {
    $flag = false;
}

for ($i = 2; $i <= $num/2; $i++) {
    if ($num % $i == 0) {
        $flag = false;
        break;
    }
}

if ($flag)
    echo "$num is Prime";
else
    echo "$num is Not Prime";
?>