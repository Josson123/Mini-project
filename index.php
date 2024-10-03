<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Bike Rental</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="profiles.html">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to Bike Rental</h1>
        <!-- Your form to check availability goes here -->
        <form action="check_availability.php" method="POST">
            <div class="form-group">
                <label for="pickup">Pickup Date:</label>
                <input type="date" class="form-control" id="pickup" name="pickup" required>
            </div>
            <div class="form-group">
                <label for="dropoff">Drop-off Date:</label>
                <input type="date" class="form-control" id="dropoff" name="dropoff" required>
            </div>
            <div class="form-group">
                <label for="bike_class">Bike Class:</label>
                <select class="form-control" id="bike_class" name="bike_class" required>
                    <option value="">Select Class</option>
                    <option value="mountain">Mountain</option>
                    <option value="road">Road</option>
                    <option value="hybrid">Hybrid</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Check Availability</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
