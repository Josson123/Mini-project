<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <?php
       include("includes.php");
    ?>  
</head>
<body>
    <main class="container">
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
        <div class="alert alert-success mt-4" role="alert">
            Welcome, <?php echo $_SESSION['username']; ?>! You have successfully logged in.
        </div>
        <?php endif; ?>

        <!-- Other content of the page -->
        <section class="rental-form">
            <h2>Rent a Bike</h2>
            <form id="bike-form">
                <div class="mb-3">
                    <label for="pickup-date" class="form-label">Pickup Date:</label>
                    <input type="date" id="pickup-date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="dropoff-date" class="form-label">Drop-off Date:</label>
                    <input type="date" id="dropoff-date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="bike-class" class="form-label">Bike Class:</label>
                    <select id="bike-class" class="form-select" required>
                        <option value="standard">Standard</option>
                        <option value="mountain">Mountain</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <button type="button" class="btn btn-primary w-100" id="check-availability-btn">Check Availability</button>
            </form>

            <ul id="bikes-list" class="list-group mt-4"></ul>

            <!-- Book Now button hidden by default -->
            <button id="book-btn" class="btn btn-success w-100 mt-3" style="display:none;">Book Now</button>
        </section>
    </main>

    <script>
        // Check if user is logged in using session
        let isLoggedIn = <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ? 'true' : 'false'; ?>;

        document.addEventListener("DOMContentLoaded", () => {
            // Handle Check Availability button click
            document.getElementById('check-availability-btn').addEventListener('click', function() {
                // Here you would check the availability logic (placeholder)
                const availability = true; // Example: Always available for demonstration
                
                if (availability) {
                    document.getElementById('bikes-list').innerHTML = '<li class="list-group-item">Bike is available</li>';
                    document.getElementById('book-btn').style.display = 'block'; // Show Book Now button
                } else {
                    document.getElementById('bikes-list').innerHTML = '<li class="list-group-item">Bike is not available</li>';
                }
            });

            // Handle Book Now button click
            document.getElementById('book-btn').addEventListener('click', function() {
                if (!isLoggedIn) {
                    alert("Login to book bike");
                    return;
                }

                // If user is logged in, proceed with the booking (placeholder)
                alert("Booking confirmed!");
            });
        });
    </script>
</body>
</html>
