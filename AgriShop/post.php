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

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="category">Select Category:</label>
    <select name="category" required>
        <option value="selling">Selling</option>
        <option value="buying">Buying</option>
    </select>

    <label for="description">Description:</label>
    <textarea name="description" required></textarea>

    <label for="file">Upload Image/Video:</label>
    <input type="file" name="file" accept="image/*,video/*" required>

    <button type="submit" name="submit">Post</button>
</form>