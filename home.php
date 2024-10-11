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

        <!-- Form Section -->
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

            <!-- Cards Section -->
            <div id="bikes-list" class="row mt-4"></div>
        </section>
    </main>

    <script>
        // Check if user is logged in using session
        let isLoggedIn = <?php echo isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ? 'true' : 'false'; ?>;

        document.addEventListener("DOMContentLoaded", () => {
            // Handle Check Availability button click
            document.getElementById('check-availability-btn').addEventListener('click', function() {
                // Simulate bike availability and display cards
                const bikes = [
                    { name: 'Mountain Bike', class: 'Mountain', price: '$10/day', img: 'bike1.jpg' },
                    { name: 'Standard Bike', class: 'Standard', price: '$8/day', img: 'bike2.jpg' },
                    { name: 'Premium Bike', class: 'Premium', price: '$15/day', img: 'bike3.jpg' }
                ];

                const bikeListDiv = document.getElementById('bikes-list');
                bikeListDiv.innerHTML = ''; // Clear previous results

                bikes.forEach(bike => {
                    const card = `
                   <div class="col-md-6 col-lg-4 mb-4"> 
                        <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden;"> 
                             <img src="${bike.img}" class="card-img-top" alt="${bike.name}" style="height: 250px; object-fit: cover;"> 
                             <div class="card-body d-flex flex-column"> 
                              <h5 class="card-title">${bike.name}</h5>
                              <p class="card-text mb-2">Class: ${bike.class}</p> 
                              <p class="card-text mb-4">Price: $${bike.price}</p> 
                              <button class="btn btn-success mt-auto book-now-btn" data-bike="${bike.name}">Book Now</button> 
                              </div>
                        </div>
                   </div


                    `;
                    bikeListDiv.innerHTML += card;
                });

                // Handle Book Now button click for each card
                document.querySelectorAll('.book-now-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        if (!isLoggedIn) {
                            alert("Login to book bike");
                        } else {
                            const bikeName = this.getAttribute('data-bike');
                            alert("Booking confirmed for " + bikeName);
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
