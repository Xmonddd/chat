<?php 
include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $province = $_POST['province'];
    $city = $_POST['city'];

    $sql = "INSERT INTO users (fullname, username, password, province, city) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fullname, $username, $password, $province, $city);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful! You can now login.'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Error in registration!'); window.location='register.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form action="register.php" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>

            <!-- Province Dropdown -->
            <label for="province">Select Province:</label>
            <select id="province" name="province" required>
                <option value="">-- Select Province --</option>
                <option value="Zambales">Zambales</option>
                
            </select>

            <!-- City Dropdown (Dynamic based on Province) -->
            <label for="city">Select City:</label>
            <select id="city" name="city" required>
                <option value="">-- Select City --</option>
            </select>

            <button type="submit">Register</button>
        </form>
        <a href="index.php">Back to login</a>
    </div>

    <script>
        const cityData = {
            "Zambales": ["Olongapo City", "Subic", "Castillejos"]
            
        };

        document.getElementById("province").addEventListener("change", function() {
            const province = this.value;
            const citySelect = document.getElementById("city");
            
            citySelect.innerHTML = '<option value="">-- Select City --</option>'; // Reset City Dropdown

            if (province in cityData) {
                cityData[province].forEach(city => {
                    let option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            }
        });
    </script>
</body>
</html>
