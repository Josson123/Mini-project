<?php
session_start(); // Starting the session
$conn = new mysqli("localhost", "root", "", "bikerental");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginError = "";

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
            // Login successful, store user information in session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: profile.php'); // Redirect to profile page after successful login
            exit();
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bike Rental</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Login</h2>

        <?php if (!empty($loginError)): ?>
            <p style="color:red;"><?php echo $loginError; ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>

        <p class="mt-3">New User? <a href="New Profile.php">Sign Up</a></p>
    </div>
</body>
</html>
