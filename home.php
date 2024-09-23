<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
    <header style="background-color: grey;">
        
        <nav class="navbar bg-body-tertiary"  class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.html">
                <img src="logo.png" alt="Logo" width="100" height="50" class="d-inline-block align-text-top">
              </a>
            </div>  
           <div class="container-fluid">
              <a class="navbar-brand" href="index.html">RevRides Rental</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                  <a class="nav-link" href="login.php">Login</a>
                  <a class="nav-link" href="profile.html">Profile</a>
                  <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
              </div>
            </div>
          </nav>  
            
        <!--<nav>
           <ul id="nav-list">
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html" id="login-nav">Login</a></li>
                 <li><a href="profile.html">Profile</a></li>
            </ul>
        </nav>-->
    </header>

    <main>
        <section class="rental-form">
            <h2>Rent a Bike</h2>
            <form id="bike-form">
                <div class="form-group">
                    <label for="pickup-date">Pickup Date:</label>
                    <input type="date" id="pickup-date" required>
                </div>
                <div class="form-group">
                    <label for="dropoff-date">Drop-off Date:</label>
                    <input type="date" id="dropoff-date" required>
                </div>
                <div class="form-group">
                    <label for="bike-class">Bike Class:</label>
                    <select id="bike-class" required>
                        <option value="standard">Standard</option>
                        <option value="mountain">Mountain</option>
                        <option value="premium">Premium</option>
                    </select>
                </div>
                <button type="submit">Check Availability</button>
            </form>

            <ul id="bikes-list"></ul>

            <button id="book-btn" class="hidden">Book Now</button>
        </section>
    </main>

    <footer>
        <p>© 2024 Bike Rental System. All rights reserved.</p>
    </footer>

    <script src="scripts1.js"></script>
</body>
</html>
