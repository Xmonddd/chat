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
        <a href="#">Home</a>
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

<?php
$conn = new mysqli("localhost", "root", "", "agrishop");
$sql = "SELECT * FROM posts WHERE category='selling' ORDER BY created_at DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<p>" . htmlspecialchars($row['description']) . "</p>";
    echo "<img src='" . htmlspecialchars($row['file_path']) . "' width='200'>";
    echo "</div>";
}
$conn->close();
?>
