<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="home.php">Home</a>
        <a href="post.php">Post</a>
        <a href="buying.php" class="active">Buying</a>
        <a href="selling.php">Selling</a>
        <a href="#">Reels</a>
        <a href="logout.php">Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="navbar">
            <span>Profile</span>
        </div>

        <!-- Posts Container -->
        <div class="posts">
            <?php
            $conn = new mysqli("localhost", "root", "", "agrishop");
            $sql = "SELECT posts.*, users.fullname, users.profile_pic, users.province, users.city 
                    FROM posts 
                    JOIN users ON posts.username = users.username 
                    WHERE posts.category='buying' 
                    ORDER BY posts.created_at DESC";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<img src='" . htmlspecialchars($row['profile_pic']) . "' width='50' class='profile-pic'>";
                echo "<p><strong>" . htmlspecialchars($row['fullname']) . "</strong></p>";
                echo "<div class='post-header'>";
                echo "<p class='location'><i class='fa-solid fa-map-marker-alt'></i> " . htmlspecialchars($row['province']) . ", " . htmlspecialchars($row['city']) . "</p>";  // SHOW LOCATION
                echo "<span class='time' data-time='" . $row['created_at'] . "'></span>"; // Time ago
                echo "</div>";
                echo "<p class='description'>" . htmlspecialchars($row['description']) . "</p>";
                echo "<img src='" . htmlspecialchars($row['file_path']) . "' class='post-image'>";
                echo "<div class='actions'>";
                echo "<span class='like'>👍 Like</span>";
                echo "<span class='comment'>💬 Comment</span>";
                echo "</div>";
                echo "</div>";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
