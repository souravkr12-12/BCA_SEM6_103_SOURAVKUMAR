<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
        }

        .container{
            max-width: 600px;
            margin:50px auto;
            background: white;
            padding:30px;
            border-radius: 10px;
        }

        input,select,button{
            width:100%;
            padding:10px;
            margin-top: 10px;
        }

        button{
            background: #4e73df;
            color:white;
            border:none;
            cursor:pointer;
        }
    </style>
</head>
<body>
    <h2>Add Job Application</h2>
    <form method="post" action="save_job.php">
        <input type="text" name="company" placeholder="Company Name">
        <input type="text" name="job_role" placeholder="Job Role">
        <input type="text" name="job_location" placeholder="Location">

        <select name="job_source" id="job_source">
            <option >Source</option>
            <option>LinkedIn</option>
            <option >Company Website</option>
            <option>Indeed</option>
        </select>

        <select name="job_status" id="job_status">
            <option value="">Applied</option>
            <option value="">Interview</option>
            <option value="">Offer</option>
            <option value="">Rejected</option>
        </select>

        <input type="date" name="applied_date">

        <button name="save">Save Job</button>
    </form>
</body>
</html>