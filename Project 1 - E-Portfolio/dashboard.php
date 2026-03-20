<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$name    = $_SESSION['name'];
$photo   = !empty($_SESSION['profile_photo']) ? 'uploads/' . $_SESSION['profile_photo'] : 'https://via.placeholder.com/160?text=You';

// -------------------------- ADD PROJECT --------------------------
if (isset($_POST['add_project'])) {
    $title       = mysqli_real_escape_string($conn, trim($_POST['title']));
    $description = mysqli_real_escape_string($conn, trim($_POST['description']));
    $project_link = mysqli_real_escape_string($conn, trim($_POST['project_link']));
    $project_img = "";

    if (!empty($_FILES['project_image']['name'])) {
        $ext = strtolower(pathinfo($_FILES['project_image']['name'], PATHINFO_EXTENSION));
        if (in_array($ext, array('jpg','jpeg','png','gif'))) {
            $project_img = time() . "_" . basename($_FILES['project_image']['name']);
            move_uploaded_file($_FILES['project_image']['tmp_name'], "uploads/" . $project_img);
        }
    }

    $sql = "INSERT INTO projects (user_id, title, description, project_image, project_link)
            VALUES ($user_id, '$title', '$description', '$project_img', '$project_link')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Project added successfully!'); window.location='dashboard.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}

// -------------------------- DELETE PROJECT --------------------------
if (isset($_GET['delete'])) {
    $pid = (int)$_GET['delete'];
    $sql = "DELETE FROM projects WHERE id = $pid AND user_id = $user_id";
    mysqli_query($conn, $sql);
    echo "<script>alert('Project deleted!'); window.location='dashboard.php';</script>";
    exit;
}

$result = mysqli_query($conn, "SELECT * FROM projects WHERE user_id = $user_id ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - <?php echo htmlspecialchars($name); ?></title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #1a1a1a;
            color: #e8e8e8;
        }

        /* ── Navbar ── */
        .navbar {
            background: #111111;
            padding: 0 32px;
            height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f97316;
            box-shadow: 0 2px 16px rgba(0,0,0,0.5);
        }
        .navbar .brand {
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: #f97316;
            text-transform: uppercase;
        }
        .navbar a {
            color: #cccccc;
            text-decoration: none;
            margin-left: 10px;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            border: 1px solid transparent;
            transition: all 0.2s;
        }
        .navbar a:hover {
            color: #f97316;
            border-color: #f97316;
            background: rgba(249,115,22,0.08);
        }
        .navbar a.logout {
            background: #f97316;
            color: #111;
            border-color: #f97316;
        }
        .navbar a.logout:hover { background: #ea6c0a; border-color: #ea6c0a; }

        /* ── Layout ── */
        .container { max-width: 1100px; margin: 36px auto; padding: 0 22px; }

        /* ── Profile Header ── */
        .profile-header {
            text-align: center;
            margin-bottom: 40px;
            padding: 36px 20px;
            background: #222222;
            border-radius: 16px;
            border: 1px solid #2e2e2e;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #f97316;
            box-shadow: 0 0 0 6px rgba(249,115,22,0.15), 0 6px 24px rgba(0,0,0,0.4);
        }
        .profile-header h2 {
            margin: 18px 0 4px;
            font-size: 1.7rem;
            color: #ffffff;
            font-weight: 700;
        }
        .profile-header p {
            color: #f97316;
            margin: 0;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        /* ── Card ── */
        .card {
            background: #222222;
            border-radius: 12px;
            border: 1px solid #2e2e2e;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            margin-bottom: 32px;
            padding: 28px 32px;
        }
        .card h3 {
            margin: 0 0 22px;
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            border-left: 4px solid #f97316;
            padding-left: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* ── Form ── */
        .form-group { margin-bottom: 16px; }
        input[type="text"],
        input[type="url"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid #3a3a3a;
            border-radius: 8px;
            font-size: 0.96rem;
            font-family: inherit;
            color: #e8e8e8;
            background: #1a1a1a;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        input::placeholder, textarea::placeholder { color: #666; }
        input:focus, textarea:focus {
            outline: none;
            border-color: #f97316;
            box-shadow: 0 0 0 3px rgba(249,115,22,0.18);
            background: #1f1f1f;
        }
        textarea { height: 110px; resize: vertical; }

        /* ── Buttons ── */
        .btn {
            padding: 11px 26px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.96rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            transition: transform 0.15s, box-shadow 0.15s, opacity 0.15s;
        }
        .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(0,0,0,0.35); }
        .btn-primary { background: #f97316; color: #111111; }
        .btn-primary:hover { background: #fb923c; }
        .btn-warning { background: #fbbf24; color: #111; }
        .btn-danger  { background: #ef4444; color: white; }

        /* ── Section heading ── */
        .section-title {
            margin: 42px 0 20px;
            font-size: 1.1rem;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #2e2e2e;
        }
        .section-title span.badge {
            background: #f97316;
            color: #111;
            font-size: 0.8rem;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 20px;
        }

        /* ── Project Grid ── */
        .project-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(310px, 1fr));
            gap: 24px;
        }
        .project-card {
            background: #222222;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #2e2e2e;
            box-shadow: 0 4px 16px rgba(0,0,0,0.3);
            transition: transform 0.22s, box-shadow 0.22s, border-color 0.22s;
        }
        .project-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(249,115,22,0.2);
            border-color: #f97316;
        }
        .project-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        .project-body { padding: 18px 20px 20px; }
        .project-body h4 {
            margin: 0 0 8px;
            font-size: 1.1rem;
            font-weight: 700;
            color: #ffffff;
        }
        .project-body p {
            margin: 0 0 14px;
            color: #999;
            font-size: 0.91rem;
            line-height: 1.55;
        }
        .actions { display: flex; flex-wrap: wrap; gap: 8px; }
        .actions a {
            text-decoration: none;
            font-size: 0.83rem;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 6px;
            transition: opacity 0.2s, transform 0.15s;
        }
        .actions a:hover { opacity: 0.85; transform: translateY(-1px); }

        /* ── Empty state ── */
        .empty-state {
            text-align: center;
            color: #555;
            padding: 70px 20px;
            font-size: 1.05rem;
            background: #222;
            border-radius: 12px;
            border: 1px dashed #333;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="brand">⚡ Dashboard</div>
    <div>
        <a href="portfolio.php">View My Portfolio</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<div class="container">

    <div class="profile-header">
        <img src="<?php echo htmlspecialchars($photo); ?>" alt="Profile">
        <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
        <p>Manage your projects below</p>
    </div>

    <div class="card">
        <h3>Add New Project</h3>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" name="title" placeholder="Project Title *" required>
            </div>
            <div class="form-group">
                <textarea name="description" placeholder="Short description *" required></textarea>
            </div>
            <div class="form-group">
                <input type="url" name="project_link" placeholder="Live Demo / GitHub Link (optional)">
            </div>
            <div class="form-group">
                <input type="file" name="project_image" accept="image/*">
            </div>
            <button type="submit" name="add_project" class="btn btn-primary">Add Project</button>
        </form>
    </div>

    <h3 class="section-title">My Projects <span class="badge"><?php echo mysqli_num_rows($result); ?></span></h3>

    <?php if (mysqli_num_rows($result) == 0): ?>
        <div class="empty-state">No projects yet. Add your first one above! 🚀</div>
    <?php else: ?>
    <div class="project-grid">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="project-card">
            <?php if (!empty($row['project_image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($row['project_image']); ?>" alt="Project">
            <?php endif; ?>
            <div class="project-body">
                <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                <p><?php echo nl2br(htmlspecialchars(substr($row['description'], 0, 120))) . (strlen($row['description']) > 120 ? '...' : ''); ?></p>
                <div class="actions">
                    <?php if (!empty($row['project_link'])): ?>
                        <a href="<?php echo htmlspecialchars($row['project_link']); ?>" target="_blank" style="background:#27ae60; color:white;">Live Demo</a>
                    <?php endif; ?>
                    <a href="edit_project.php?id=<?php echo $row['id']; ?>" style="background:#f39c12; color:white;">Edit</a>
                    <a href="?delete=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Really delete this project?');"
                       style="background:#e74c3c; color:white;">Delete</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

</div>

</body>
</html>