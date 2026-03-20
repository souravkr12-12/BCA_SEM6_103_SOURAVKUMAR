<?php

// Number of lines
$n = 5;

// Starting number
$num = 1;

// Loop for rows
for($i = 1; $i <= $n; $i++)
{
    // Loop for columns
    for($j = 1; $j <= $i; $j++)
    {
        echo $num . " ";
        $num++;
    }

    // Move to next line
    echo "<br>";
}

?>