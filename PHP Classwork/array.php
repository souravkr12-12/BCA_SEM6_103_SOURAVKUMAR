<?php

// Student Array
$student = array(
    "Student Name" => "Sourav Kumar",
    "Roll Number" => "101"
);

// Employee Array
$employee = array(
    "Emp Name" => "Rahul Sharma",
    "Emp ID" => "E102"
);

// Product Array
$product = array(
    "Product Name" => "Laptop",
    "Price" => "50000"
);

echo "<h3>Student Details</h3>";
foreach($student as $key => $value){
    echo $key . " : " . $value . "<br>";
}

echo "<h3>Employee Details</h3>";
foreach($employee as $key => $value){
    echo $key . " : " . $value . "<br>";
}

echo "<h3>Product Details</h3>";
foreach($product as $key => $value){
    echo $key . " : " . $value . "<br>";
}

?>