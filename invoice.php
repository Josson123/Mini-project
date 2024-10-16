<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bikerental");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the data is coming from check_bike_availability.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bike_no = $_POST['bike_no'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];

    // Fetch bike details
    $query = "SELECT * FROM bike WHERE bike_no = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $bike_no);
    $stmt->execute();
    $result = $stmt->get_result();
    $bike = $result->fetch_assoc();

    // Calculate number of days
    $pickup = new DateTime($pickup_date);
    $dropoff = new DateTime($dropoff_date);
    $interval = $pickup->diff($dropoff);
    $num_days = $interval->days;

    // Calculate total price
    $total_price = $num_days * $bike['price'];
}

// If the booking confirmation button is pressed
if (isset($_POST['confirm_booking'])) {
    $bike_no = $_POST['bike_no'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];

    // Update bike status to booked
    $update_query = "UPDATE bike SET booking_status = 1 WHERE bike_no = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("i", $bike_no);
    $stmt->execute();

    // Insert into booking table
    $insert_query = "INSERT INTO booking (pickup_date, dropoff_date, mail, bike_no) 
                     VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("sssi", $pickup_date, $dropoff_date, $_SESSION['email'], $bike_no);
    $stmt->execute();

     // Redirect to booking success page
     header("Location: booking_success.php");
     exit;
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
            <img src="images/<?php echo htmlspecialchars($bike['bike_img']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($bike['bike_number']); ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($bike['bike_name']); ?></h5>
                <p class="card-text">Class: <?php echo htmlspecialchars($bike['bike_class']); ?></p>
                <p class="card-text">Brand: <?php echo htmlspecialchars($bike['brand']); ?></p>
                <p class="card-text">Price per day: $<?php echo htmlspecialchars($bike['price']); ?></p>
                <p class="card-text">Total Rent for <?php echo $num_days; ?> days: <strong>$<?php echo $total_price; ?></strong></p>
            </div>
        </div>

        <!-- Confirm Booking Button -->
        <form method="POST" action="invoice.php">
            <!-- Hidden inputs to pass the bike and booking details -->
            <input type="hidden" name="bike_no" value="<?php echo $bike_no; ?>">
            <input type="hidden" name="pickup_date" value="<?php echo $pickup_date; ?>">
            <input type="hidden" name="dropoff_date" value="<?php echo $dropoff_date; ?>">
            <button type="submit" name="confirm_booking" class="btn btn-success mt-4 w-100">Confirm Booking</button>
        </form>

        <!-- Success message will be shown here after booking confirmation -->
         <?php //if (isset($_POST['confirm_booking'])): ?>
          <!--<div class="alert alert-success mt-4">Booking confirmed, thank you for choosing RevRides Rental!</div>-->
        <?php //endif; ?>
    </main>
</body>
</html>
