 <?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
    exit;
}

$user_id=$_SESSION['user_id'];
$user_query=mysqli_query($conn,"SELECT name FROM users WHERE id=$user_id");

$user=mysqli_fetch_assoc($user_query);

//analytics queries
$total=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS c FROM job_applications WHERE user_id='$user_id'"))['c'];

$applied = mysqli_fetch_assoc(mysqli_query($conn,
 "SELECT COUNT(*) AS c FROM job_applications WHERE user_id='$user_id' AND job_status='Applied'"))['c'];
$interview = mysqli_fetch_assoc(mysqli_query($conn,
 "SELECT COUNT(*) AS c FROM job_applications WHERE user_id='$user_id' AND job_status='Interview'"))['c'];

$rejected = mysqli_fetch_assoc(mysqli_query($conn,
 "SELECT COUNT(*) AS c FROM job_applications WHERE user_id='$user_id' AND job_status='Rejected'"))['c'];

$offer = mysqli_fetch_assoc(mysqli_query($conn,
 "SELECT COUNT(*) AS c FROM job_applications WHERE user_id='$user_id' AND job_status='Offer'"))['c'];
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard|Job Application Tracker</title>
    <style>
    *{
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }

    body{
        margin:0;
        background: #f4f6f9;
    }

    .navbar{
       background:#4e73df;
       color:white;
       padding:15px 30px;
       display:flex;
       justify-content:space-between;
       align-items:center;
     }

.navbar a{
  color:white;
  text-decoration:none;
  font-weight:bold;
}

.container{
  padding:30px;
}

h2{
  margin-top:0;
}

.cards{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
  gap:20px;
  margin-top:20px;
}

.card{
  background:white;
  padding:25px;
  border-radius:10px;
  box-shadow:0 5px 15px rgba(0,0,0,0.1);
  text-align: center;
}

.card h3{
  margin:0;
  color:#555;
}

.card p{
  font-size:28px;
  margin:10px 0 0;
  color:#4e73df;
}

.actions{
  margin-top:30px;
}

.actions a{
  display:inline-block;
  margin-right:15px;
  padding:12px 20px;
  background:#1cc88a;
  color:white;
  border-radius:5px;
  text-decoration:none;
  font-weight: bold;
}

.action a.view{
  background: #36b9cc;
}

.actions a.logout{
  background:#e74a3b;
}
    </style>
</head>
<body>
    <div class="navbar">
        <div><strong>Job Application Tracker</strong></div>
        <div>
            Welcome,  <?php echo $user['name'];?>|
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <div class="container">
        <h2>Your Dashboard</h2>
        <p>Track and analyze your job applications</p>
        <div class="cards">
            <div class="card">
                <h3>Total Applications</h3>
                <p><?php echo $total; ?></p>
            </div>

            <div class="card">
                <h3>Applied</h3>
                <p><?php echo $applied; ?></p>
            </div>

            <div class="card">
                <h3>Interview</h3>
                <p><?php echo $interview; ?></p>
            </div>

            <div class="card">
                <h3>Rejected</h3>
                <p><?php echo $rejected; ?></p>
            </div>

            <div class="card">
              <h3>Offer</h3>
              <p><?php echo $offer;?> </p>
            </div>
        </div>

        <div class="actions">
            <a href="add_job.php">Add Job</a>
            <a href="job_list.php" class="view">View Jobs</a>
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </div>
</body>
</html>