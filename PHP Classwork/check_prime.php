<?php

// Given number
$num = 17;

// Assume number is prime
$flag = 0;

// Check divisibility
for($i = 2; $i <= $num/2; $i++)
{
    if($num % $i == 0)
    {
        $flag = 1;
        break;
    }
}

// Check result
if($flag == 0 && $num != 1)
{
    echo $num . " is a Prime Number";
}
else
{
    echo $num . " is Not a Prime Number";
}

?>