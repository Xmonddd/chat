<?php
session_start();
include "database.php"; // Ensure database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Both fields are required!'); window.location='index.php';</script>";
        exit();
    }

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Store user data in session
        $_SESSION['username'] = $user['username'];
        $_SESSION['fullname'] = $user['fullname']; // Store full name
        $_SESSION['profile_pic'] = $user['profile_pic'] ?? 'default.jpg'; // Store profile pic (if applicable)

        header("Location: home.php");
        exit();
    } else {
        echo "<script>alert('Invalid login credentials'); window.location='index.php';</script>";
    }
}

$conn->close();
?>
