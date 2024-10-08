
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <?php
 include("includes.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">My Profile</h5>
                    </div>
                    <div class="card-body">
                            <table class="table table-borderless mt-3">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>Your Name</td>
                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td>Your Username</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>your@email.com</td>
                                </tr>
                                <tr>
                                    <th>Bio:</th>
                                    <td>This is a brief description about me.</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center mt-5">
                            <a href="edit-profile.html" class="btn btn-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>