<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$pid = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($pid <= 0) {
    header("Location: dashboard.php");
    exit;
}

// Fetch project (only if belongs to current user)
$sql = "SELECT * FROM projects WHERE id = $pid AND user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) !== 1) {
    header("Location: dashboard.php");
    exit;
}

$project = mysqli_fetch_assoc($result);

$message = "";

// -------------------------- UPDATE PROJECT --------------------------
if (isset($_POST['edit_project'])) {
    $title       = mysqli_real_escape_string($conn, trim($_POST['title']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    $project_link = mysqli_real_escape_string($conn, trim($_POST['project_link']));
    $project_img = $project['project_image'];   // keep old if no new upload

    if (!empty($_FILES['project_image']['name'])) {
        $ext = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, array('jpg','jpeg','png','gif'))) {
            $project_img = time() . "_" . basename($_FILES['project_image']['name']);
            move_uploaded_file($_FILES['project_image']['tmp_name'], "uploads/" . $project_img);
        }
    }

    $update_sql = "UPDATE projects SET 
                   title = '$title',
                   description = '$description',
                   project_image = '$project_img',
                   project_link = '$project_link'
                   WHERE id = $pid AND user_id = $user_id";

    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Project updated successfully!'); window.location='dashboard.php';</script>";
        exit;
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Project</title>
    <style>
        body {
            margin:0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f9;
            color: #333;
        }
        .navbar {
            background: #1a1a2e;
            color: white;
            padding: 14px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 4px;
        }
        .navbar a:hover { background: #16213e; }
        .container { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            padding: 30px;
        }
        h2 { margin-top: 0; color: #2c3e50; }
        .form-group { margin-bottom: 20px; }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1rem;
        }
        textarea { height: 140px; resize: vertical; }
        .btn {
            padding: 12px 28px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.05rem;
            margin-right: 12px;
        }
        .btn-primary   { background: #4e54c8; color: white; }
        .btn-primary:hover   { background: #3f44a8; }
        .btn-secondary { background: #95a5a6; color: white; }
        .btn-secondary:hover { background: #7f8c8d; }
        .current-img {
            max-width: 220px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
        .message { color: #c0392b; font-weight: bold; }
    </style>
</head>
<body>

<div class="navbar">
    <div>Edit Project</div>
    <a href="dashboard.php">Back to Dashboard</a>
</div>

<div class="container">
    <div class="card">
        <h2>Edit: <?php echo htmlspecialchars($project['title']); ?></h2>

        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" value="<?php echo htmlspecialchars($project['title']); ?>" required>
            </div>
            <div class="form-group">
                <textarea name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea>
            </div>
            <div class="form-group">
                <input type="url" name="project_link" value="<?php echo htmlspecialchars($project['project_link']); ?>" placeholder="Live Demo / GitHub Link (optional)">
            </div>
            <div class="form-group">
                <label>Current Project Image:</label><br>
                <?php if (!empty($project['project_image'])): ?>
                    <img src="uploads/<?php echo htmlspecialchars($project['project_image']); ?>" alt="Current" class="current-img">
                <?php else: ?>
                    <p>No image uploaded yet.</p>
                <?php endif; ?>
                <br><br>
                <label>Upload New Image (optional):</label>
                <input type="file" name="project_image" accept="image/*">
            </div>
            <button type="submit" name="edit_project" class="btn btn-primary">Update Project</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

</body>
</html>