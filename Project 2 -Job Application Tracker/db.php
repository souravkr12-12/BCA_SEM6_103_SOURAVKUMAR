<?php
//Database Connection
$server="localhost";
$username="root";
$password="";
$database="job-tracker";

$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("Connection to this database failed due to ". mysqli_connect_error());
}
//echo "Success connected to database";
?>