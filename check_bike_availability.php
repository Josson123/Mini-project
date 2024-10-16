<?php
// This script will query the database and return the available bikes in the form of HTML cards.
// include("includes.php"); // Include your DB connection here
session_start();
$conn = new mysqli("localhost", "root", "", "bikerental");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];
    $bike_class = $_POST['bike_class'];

    // SQL query to check available bikes
    $sql = "SELECT bike_no, bike_name, bike_class, bike_img, price FROM bike WHERE booking_status = 0 AND bike_class = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $bike_class); // bind bike_class to the SQL query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // For each available bike, create a card
            echo '<div class="col-md-6 col-lg-4 mb-4"> 
                    <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden;"> 
                        <img src="' . $row['bike_img'] . '" class="card-img-top" alt="' . $row['bike_name'] . '" style="height: 100px; object-fit: cover;"> 
                        <div class="card-body d-flex flex-column"> 
                            <h5 class="card-title">' . $row['bike_name'] . '</h5>
                            <p class="card-text mb-2">Class: ' . $row['bike_class'] . '</p> 
                            <p class="card-text mb-4">Price: $' . $row['price'] . '</p> 
                            <button class="btn btn-success mt-auto book-now-btn" 
                                    data-bike-no="' . $row['bike_no'] . '"
                                    data-bike-name="' . $row['bike_name'] . '"
                                    data-bike-class="' . $row['bike_class'] . '"
                                    data-bike-price="' . $row['price'] . '"
                                    data-pickup-date="' . $pickup_date . '"
                                    data-dropoff-date="' . $dropoff_date . '">Book Now</button> 
                        </div>
                    </div>
                </div>';
        }
    } else {
        echo '<p>No bikes available for the selected dates and class.</p>';
    }

    $stmt->close();
    $conn->close();
}
?>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        // Add event listeners to Book Now buttons
        const bookNowButtons = document.querySelectorAll('.book-now-btn');
        bookNowButtons.forEach(button => {
            button.addEventListener('click', function() {
                const bikeNo = this.getAttribute('data-bike-no');
                const bikeName = this.getAttribute('data-bike-name');
                const bikeClass = this.getAttribute('data-bike-class');
                const bikePrice = this.getAttribute('data-bike-price');
                const pickupDate = this.getAttribute('data-pickup-date');
                const dropoffDate = this.getAttribute('data-dropoff-date');

                // Redirect to invoice.php with the necessary data
                window.location.href = `invoice.php?bike_no=${bikeNo}&bike_name=${bikeName}&bike_class=${bikeClass}&bike_price=${bikePrice}&pickup_date=${pickupDate}&dropoff_date=${dropoffDate}`;
            });
        });
    });
</script>
