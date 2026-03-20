<?php
// Accept any number from 1 - 10 and print the numbers from 1 - 10 other than the user given number using continue.
$skip = 5;

for ($i = 1; $i <= 10; $i++) {
    if ($i == $skip)
        continue;
    echo $i . " ";
}
?>