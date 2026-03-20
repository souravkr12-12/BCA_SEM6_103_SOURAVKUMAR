<?php
// Write a program to fetch the two values and perform the arithmetic action based on user selection.
$a = 10;
$b = 5;
$op = "add"; // add, sub, mul, div

switch($op) {
    case "add": echo $a + $b; break;
    case "sub": echo $a - $b; break;
    case "mul": echo $a * $b; break;
    case "div": echo $a / $b; break;
}
?>