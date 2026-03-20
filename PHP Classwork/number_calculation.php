<?php

// Generate a random number between 1 and 100
$number = rand(1,100);

// Calculate the square of the number
$square = $number * $number;

// Calculate the double of the number
$double = $number * 2;

// Calculate the square root of the square
$sqrt_square = sqrt($square);

// Calculate the square root of the double
$sqrt_double = sqrt($double);

// Find the maximum value between both square roots
$max_value = max($sqrt_square, $sqrt_double);

// Display results
echo "Random Number: " . $number . "<br>";
echo "Square of Number: " . $square . "<br>";
echo "Double of Number: " . $double . "<br>";
echo "Square Root of Square: " . $sqrt_square . "<br>";
echo "Square Root of Double: " . $sqrt_double . "<br>";
echo "Maximum Value from both Square Roots: " . $max_value;

?>