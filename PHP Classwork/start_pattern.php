<?php
// To print a star pattern
$n=15;
for($i=1;$i<=$n;$i+=2){
    for($j=1;$j<=$i;$j++){
        echo " * ";
    }
    echo "<br>";
}
for($i=$n;$i>=1;$i-=2){
    for($j=1;$j<=$i;$j++){
        echo " * ";
    }
    echo "<br>";
}
?>