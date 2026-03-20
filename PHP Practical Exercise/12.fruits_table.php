<?php
// Write a program to display fruit names and their values within a table.
$fruits = ["Apple", "Banana", "Mango"];

echo "<table border='1'>";
foreach ($fruits as $fruit) {
    echo "<tr><td>$fruit</td></tr>";
}
echo "</table>";
?>