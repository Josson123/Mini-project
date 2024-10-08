<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bike Rental System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bike Rental System</h1>
        <nav>
            <ul id="nav-list">
                <li><a href="index.html">Home</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="profile.html">Profile</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="login-form">
            <h2>Login</h2>
            <form action="insert.php" method="POST">

            
     <label for="username">Username</label>
     <input type="text" name="username" >
    <br>
     <label for="password">password</label>
     <input type="password" name="password" >
    <br>
      <label for="phoneno">Phone number</label>
     <input type="text" name="phoneno" >
     <br>
     <label for="email">email</label>
     <input type="email" name="email" >
    <br>
     <input type="submit" value="submit" name="submit">
     
            </form>
        </section>
    </main>

    <footer>
        <p>© 2024 Bike Rental System. All rights reserved.</p>
    </footer>

   <!---- <script src="scripts1.php"></script>-->
</body>
</html>
