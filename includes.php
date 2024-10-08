

 <style>
        header {
            background-color: #343a40;
            padding: 20px 0;
        }
        header .navbar-brand {
            color: white;
            font-weight: bold;
        }
        header .navbar-nav .nav-link {
            color: white;
        }
        header .navbar-nav .nav-link:hover {
            color: #ffc107;
        }
        main {
            margin-top: 50px;
        }
        .rental-form {
            max-width: 600px;
            margin: auto;
            padding: 30px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .rental-form h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #343a40;
        }
        .form-group {
            margin-bottom: 15px;
        }
        footer {
            background-color: #343a40;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>

<?php session_start(); ?>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">RevRides Rental</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="home.php">Home</a>
                    <a class="nav-link" href="profile.php">Profile</a>
                    <?php
                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<a class="nav-link" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-link" href="login.php">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>


    <?php 
            // Other included functionality here

          // Logout functionality
           if (isset($_GET['logout'])) {
           session_start();
           session_unset();
           session_destroy();
           echo "<script>alert('Logout successful');</script>";
           header("Location: home.php");
           exit();
           }
    ?>

    <footer>
        <p>© 2024 RevRides Rental. All rights reserved.</p>
    </footer>
