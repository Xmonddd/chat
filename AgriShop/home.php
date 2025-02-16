<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="sidebar">
        <a href="home.php">Home</a>
        <a href="post.php">Post</a>
        <a href="buying.php">Buying</a>
        <a href="selling.php">Selling</a>
        <a href="#">Reels</a>
        <a href="logout.php">Log Out</a>
    </div>
    <div class="main-content">
        <div class="navbar">
            <span>Profile</span>
        </div>
        <div class="content-area">
            <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
            <p>This is your dashboard.</p>
        </div>
    </div>
</body>
</html>
