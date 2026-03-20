<?php
session_start();
include "db.php";
if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
    exit;
}

if(isset($_POST['save'])){
    $user_id=$_SESSION['user_id'];

    $company=$_POST['company'];
    $role=$_POST['job_role'];
    $location=$_POST['job_location'];
    $source=$_POST['job_source'];
    $status=$_POST['job_status'];
    $date=$_POST['applied_date'];

    $query="INSERT INTO job_applications(user_id,company,job_role,job_location,job_source,job_status,applied_date) VALUES('$user_id','$company','$role', '$location','$source','$status','$date')";
    mysqli_query($conn,$query);
    header("location:job_list.php");
}
?>