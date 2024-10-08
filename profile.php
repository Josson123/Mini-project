<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login to see profile');</script>";
    echo "<script>window.location.href='login.php';</script>";  // Redirect to login page
    exit();
}

include("includes.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">My Profile</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mt-3">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>Your Name</td> <!-- You can add the name from the session or database -->
                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td><?php echo $_SESSION['username']; ?></td> <!-- Display the username -->
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>your@email.com</td>
                                </tr>
                                <tr>
                                    <th>Bio:</th>
                                    <td>This is a brief description about me.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-5">
                            <a href="edit-profile.php" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
