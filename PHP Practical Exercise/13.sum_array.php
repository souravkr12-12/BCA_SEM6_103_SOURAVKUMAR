<?php
// Write a program to find out the sum of the array.
$arr = [1,2,3,4,5];
$sum = 0;

foreach ($arr as $val) {
    $sum += $val;
}

echo "Sum = $sum";
?>