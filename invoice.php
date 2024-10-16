<?php
session_start();
include("db_connection.php");

if (isset($_GET['bike_no'], $_GET['pickup_date'], $_GET['dropoff_date'])) {
    $bike_no = $_GET['bike_no'];
    $pickup_date = $_GET['pickup_date'];
    $dropoff_date = $_GET['dropoff_date'];

    // Fetch bike details
    $query = "SELECT * FROM bike WHERE bike_no = $bike_no";
    $result = $conn->query($query);
    $bike = $result->fetch_assoc();

    // Calculate number of days
    $pickup = new DateTime($pickup_date);
    $dropoff = new DateTime($dropoff_date);
    $interval = $pickup->diff($dropoff);
    $num_days = $interval->days;

    // Calculate total price
    $total_price = $num_days * $bike['price'];
}

if (isset($_POST['confirm_booking'])) {
    // Update bike status to booked
    $update_query = "UPDATE bike SET booking_status = 1 WHERE bike_no = $bike_no";
    $conn->query($update_query);

    // Insert into booking table
    $insert_query = "INSERT INTO booking (pickup_date, dropoff_date, mail, bike_no) 
                     VALUES ('$pickup_date', '$dropoff_date', '{$_SESSION['email']}', $bike_no)";
    $conn->query($insert_query);

    // Show success message
    echo "<script>alert('Bike booked successfully, Thank you for choosing RevRides Rental'); window.location.href = 'home.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container mt-5">
        <h2>Invoice</h2>
        <div class="card">
            <img src="images/<?php echo $bike['bike_img']; ?>" class="card-img-top" alt="<?php echo $bike['bike_number']; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $bike['bike_number']; ?></h5>
                <p class="card-text">Class: <?php echo $bike['bike_class']; ?></p>
                <p class="card-text">Brand: <?php echo $bike['brand']; ?></p>
                <p class="card-text">Price per day: $<?php echo $bike['price']; ?></p>
                <p class="card-text">Total Rent for <?php echo $num_days; ?> days: <strong>$<?php echo $total_price; ?></strong></p>
            </div>
        </div>

        <!-- Confirm Booking Button -->
        <form method="POST">
            <button type="submit" name="confirm_booking" class="btn btn-success mt-4 w-100">Confirm Booking</button>
        </form>
    </main>
</body>
</html>
