<?php
// Database connection details (same as in login.php)
session_start();

// Create a connection
$conn = new mysqli("localhost", "root", "", "bikerental");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginError = "";
$loginSuccess = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query using parameterized statements
    $stmt = $conn->prepare("SELECT user_name, password FROM user WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Login successful
            $loginSuccess = "Login successful!";
        } else {
            // Incorrect password
            $loginError = "Incorrect password.";
        }
    } else {
        // Username not found
        $loginError = "Username not found.";
    }

    $stmt->close();
}
//header("location:home.php");
$conn->close();

//exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bike Rental</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="register-container">
        <h2>Login</h2>

        <?php if (!empty($loginError)): ?>
            <p style="color:red;"><?php echo $loginError; ?></p>
        <?php elseif (!empty($loginSuccess)): ?>
            <p style="color:green;"><?php echo $loginSuccess; ?></p>
        <?php endif; ?>

        <form action="home.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <p>New User? <a href="New Profile.php">Sign Up</a></p>
    </div>
</body>
</html>