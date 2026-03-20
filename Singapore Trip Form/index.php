<?php
 $insert=false;
 if(isset($_POST['name'])){
 $server="localhost";
 $username="root";
 $password="";

 $conn=mysqli_connect($server,$username,$password);

 if(!$conn){
    die("Connection to this database failed due to ". mysqli_connect_error());
 }
 //echo "Success connect to the db";

 $name=$_POST['name'];
 $gender=$_POST['gender'];
 $age=$_POST['age'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $other=$_POST['desc'];

 $sql="INSERT INTO singapore_trip.trip_details(`name`, `age`, `gender`, `email`, `phone`, `other`, `date`) VALUES ('$name','$age','$gender','$email','$phone','$other', current_timestamp());";

 if($conn->query($sql)==true){
    //echo "Succesfully inserted";
    $insert=true;
 }
 else{
    echo "Error:$sql<br>$conn->error";
 }
 $conn->close();
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="../Singapore Trip Form/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <img src="bgimg.webp" alt="background">
    <div class="container">
        <h1>Welcome to Bharati Vidyapeeth ,IMED Singapore Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip.</p>
        <?php
        if($insert==true){
        echo "<P class='submitmsg'>Thanks for submitting your form. We are happy to see you joining us for the Singapore trip</P>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your name">
            <input type="text" name="age" id="age" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
           <button class="btn">Submit</button>
        </form>
    </div>
    
</body>
</html>