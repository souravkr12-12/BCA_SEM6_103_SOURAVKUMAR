<?php
// Write a program to check whether the given number is Armstrong or not.

$num = 153;
$sum = 0;
$temp = $num;

while ($temp != 0) {
    $digit = $temp % 10;
    $sum += $digit * $digit * $digit;
    $temp = (int)($temp / 10);
}

if ($sum == $num)
    echo "Armstrong Number";
else
    echo "Not Armstrong";
?>