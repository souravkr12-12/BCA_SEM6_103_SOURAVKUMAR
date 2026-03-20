<?php
// Write a program to multiply a user given number with the given matrix.
$matrix = [[1,2],[3,4]];
$num = 2;

for ($i=0;$i<2;$i++) {
    for ($j=0;$j<2;$j++) {
        echo $matrix[$i][$j] * $num . " ";
    }
    echo "<br>";
}
?>