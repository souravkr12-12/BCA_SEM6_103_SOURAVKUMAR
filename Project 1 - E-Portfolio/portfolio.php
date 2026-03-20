<?php
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$name    = $_SESSION['name'];
$photo   = !empty($_SESSION['profile_photo']) ? 'uploads/' . $_SESSION['profile_photo'] : 'https://via.placeholder.com/220?text=Profile';

$result = mysqli_query($conn, "SELECT * FROM projects WHERE user_id = $user_id ORDER BY id DESC");
$project_count = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($name); ?> - Portfolio</title>
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
            padding: 0 40px;
            height: 64px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #f97316;
            box-shadow: 0 2px 16px rgba(0,0,0,0.5);
        }
        .navbar .brand {
            font-size: 1.1rem;
            font-weight: 800;
            color: #f97316;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .navbar a {
            color: #cccccc;
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-left: 8px;
            border: 1px solid transparent;
            transition: all 0.2s;
        }
        .navbar a:hover {
            color: #f97316;
            border-color: #f97316;
            background: rgba(249,115,22,0.08);
        }
        .navbar a.logout { background: #f97316; color: #111; border-color: #f97316; }
        .navbar a.logout:hover { background: #ea6c0a; }

        /* ── Hero ── */
        .hero {
            background: #111111;
            color: white;
            text-align: center;
            padding: 80px 20px 70px;
            position: relative;
            overflow: hidden;
            border-bottom: 1px solid #2a2a2a;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -60px; left: 50%;
            transform: translateX(-50%);
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(249,115,22,0.12) 0%, transparent 65%);
            pointer-events: none;
        }
        .hero img {
            width: 190px;
            height: 190px;
            border-radius: 50%;
            border: 4px solid #f97316;
            object-fit: cover;
            margin-bottom: 22px;
            box-shadow: 0 0 0 8px rgba(249,115,22,0.12), 0 8px 32px rgba(0,0,0,0.5);
            position: relative;
        }
        .hero h1 {
            margin: 0;
            font-size: 2.8rem;
            font-weight: 900;
            letter-spacing: -0.5px;
            color: #ffffff;
            position: relative;
        }
        .hero h1 span { color: #f97316; }
        .hero p {
            font-size: 1.1rem;
            margin: 12px 0 0;
            color: #888;
            position: relative;
            letter-spacing: 0.3px;
        }

        /* ── Stats bar ── */
        .stats-bar {
            background: #1e1e1e;
            border-bottom: 1px solid #2a2a2a;
            padding: 14px 0;
            text-align: center;
            font-size: 0.92rem;
            color: #777;
        }
        .stats-bar strong { color: #f97316; font-size: 1.05rem; }

        /* ── Container ── */
        .container { max-width: 1200px; margin: 48px auto; padding: 0 26px; }

        /* ── Section heading ── */
        .section-heading {
            text-align: center;
            margin-bottom: 38px;
        }
        .section-heading h2 {
            font-size: 1.5rem;
            font-weight: 900;
            color: #ffffff;
            margin: 0 0 8px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .section-heading h2 span { color: #f97316; }
        .section-heading p { color: #666; margin: 0; font-size: 0.95rem; }

        /* ── Grid ── */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
            gap: 28px;
        }

        /* ── Project Card ── */
        .project-card {
            background: #222222;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #2e2e2e;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            transition: transform 0.24s, box-shadow 0.24s, border-color 0.24s;
        }
        .project-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(249,115,22,0.22);
            border-color: #f97316;
        }
        .project-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
        }
        .project-body { padding: 22px 24px 24px; }
        .project-body h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            font-weight: 700;
            color: #ffffff;
        }
        .project-body p {
            margin: 0 0 18px;
            color: #888;
            line-height: 1.6;
            font-size: 0.93rem;
        }

        /* ── Button ── */
        .btn {
            display: inline-block;
            padding: 10px 24px;
            background: #f97316;
            color: #111111;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 800;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
            transition: background 0.2s, transform 0.15s;
        }
        .btn:hover { background: #fb923c; transform: translateY(-2px); }

        /* ── Empty state ── */
        .empty {
            text-align: center;
            font-size: 1.1rem;
            color: #555;
            margin: 80px 0;
            line-height: 2;
            background: #222;
            border-radius: 12px;
            border: 1px dashed #333;
            padding: 60px 20px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div class="brand">🎨 <?php echo htmlspecialchars($name); ?>'s Portfolio</div>
    <div>
        <a href="dashboard.php">← Dashboard</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

<div class="hero">
    <img src="<?php echo htmlspecialchars($photo); ?>" alt="Profile Photo">
    <h1><span><?php echo htmlspecialchars($name); ?></span></h1>
    <p>Creative projects &amp; experiments</p>
</div>

<div class="stats-bar">
    <strong><?php echo $project_count; ?></strong> project<?php echo $project_count != 1 ? 's' : ''; ?> showcased
</div>

<div class="container">
    <?php if ($project_count == 0): ?>
        <div class="empty">No projects added yet.<br>Go to Dashboard and start adding! 🚀</div>
    <?php else: ?>
    <div class="section-heading">
        <h2>My <span>Projects</span></h2>
        <p>A showcase of my work and experiments</p>
    </div>
    <div class="grid">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="project-card">
            <?php if (!empty($row['project_image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($row['project_image']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
            <?php endif; ?>
            <div class="project-body">
                <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                <?php if (!empty($row['project_link'])): ?>
                    <a href="<?php echo htmlspecialchars($row['project_link']); ?>" target="_blank" class="btn">View Project →</a>
                <?php endif; ?>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>

</body>
</html>