<?php
include "db.php";

$user_id=$_POST['id'];
$status=$_POST['job_status'];

mysqli_query($conn, "UPDATE job_applications SET job_status='$status' WHERE id='$user_id'");
header("location:job_list.php");
?>