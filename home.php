
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <?php
       include("includes.php")

     ?>  

        <main class="container">
         \<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
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
                <button type="submit" class="btn btn-primary w-100">Check Availability</button>
            </form>

            <ul id="bikes-list" class="list-group mt-4"></ul>

            <button id="book-btn" class="btn btn-success w-100 mt-3 hidden">Book Now</button>
        </section>
    </main>

    <script >
         
        // Simulating user login status using localStorage (replace this logic with your backend login session)
        let isLoggedIn = localStorage.getItem("isLoggedIn") === "true";

        document.addEventListener("DOMContentLoaded", () => {
            updateNav();

            document.getElementById('login-link').addEventListener('click', function(e) {
                if (isLoggedIn) {
                    // Log out logic
                    localStorage.setItem("isLoggedIn", "false");
                    isLoggedIn = false;
                    updateNav();
                    e.preventDefault(); // Prevent redirect if logging out
                }
            });
        });

        function updateNav() {
            const loginLink = document.getElementById('login-link');
            const profileLink = document.getElementById('profile-link');

            if (isLoggedIn) {
                loginLink.innerHTML = 'Logout';
                loginLink.href = '#'; // Prevent navigation on logout
                profileLink.classList.remove('disabled');
                profileLink.setAttribute('aria-disabled', 'false');
            } else {
                loginLink.innerHTML = 'Login';
                loginLink.href = 'login.php'; // Link to the login page
                profileLink.classList.add('disabled');
                profileLink.setAttribute('aria-disabled', 'true');
            }
        }
    
    </script>
</body>
</html>
