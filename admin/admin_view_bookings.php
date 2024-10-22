<?php
session_start();

// Check if admin is logged in, if not redirect to admin_login.php
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Database connection
$conn = new mysqli("localhost", "root", "", "bikerental");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Function to get bookings based on filters
function getBookings($conn, $dateFilter = '', $monthFilter = '', $yearFilter = '') {
    $query = "SELECT * FROM booking WHERE 1=1"; // Start with all records
    $params = [];

    // Date filter
    if ($dateFilter != '') {
        $query .= " AND DATE(booking_date) = ?";
        $params[] = $dateFilter;
    } 
    
    // Month and year filter
    if ($monthFilter != '' && $yearFilter != '') {
        $query .= " AND MONTH(booking_date) = ? AND YEAR(booking_date) = ?";
        $params[] = $monthFilter;
        $params[] = $yearFilter;
    } 
    
    // Year filter (allow filtering by year only)
    if ($yearFilter != '' && $monthFilter == '') {
        $query .= " AND YEAR(booking_date) = ?";
        $params[] = $yearFilter;
    }

    // Prepare the statement
    $stmt = $conn->prepare($query);
    
    if ($params) {
        // Bind parameters dynamically
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    }

    $stmt->execute();
    return $stmt->get_result();
}



// Get today's date
$todayDate = date("Y-m-d");

// Initialize filter variables
$dateFilter = $monthFilter = $yearFilter = "";

// If the form is submitted for specific filters
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['date'])) {
        $dateFilter = $_POST['date'];
    }
    if (!empty($_POST['month']) && !empty($_POST['year'])) {
        $monthFilter = $_POST['month'];
        $yearFilter = $_POST['year'];
    } elseif (!empty($_POST['year']) && empty($_POST['month'])) {
        // Set year filter only if month is not set
        $yearFilter = $_POST['year'];
    }
}

// Fetch bookings based on filters or show today's bookings by default
$bookings = getBookings($conn, $dateFilter ?: $todayDate, $monthFilter, $yearFilter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Bookings</title>
    <!-- Include Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Bookings</h1>

        
        <!-- Filter form -->
<form method="POST" class="row g-3">
    <div class="col-md-4">
        <label for="date" class="form-label">Filter by Date:</label>
        <input type="date" id="date" name="date" class="form-control">
    </div>
    <div class="col-md-4">
        <label for="month" class="form-label">Filter by Month and Year:</label>
        <input type="number" id="month" name="month" class="form-control" placeholder="Month (1-12)" min="1" max="12">
        <input type="number" id="year" name="year" class="form-control mt-2" placeholder="Year">
    </div>
    <div class="col-md-4">
        <label for="yearOnly" class="form-label">Filter by Year Only:</label>
        <input type="number" id="yearOnly" name="year" class="form-control" placeholder="Year">
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary mt-3">Filter</button>
    </div>
</form>



        <!-- Bookings Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Booking No</th>
                    <th>User Name</th>
                    <th>Bike ID</th>
                    <th>Booking Date</th>
                    <th>Pickup Date</th>
                    <th>Dropoff Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($bookings->num_rows > 0): ?>
                    <?php while ($row = $bookings->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['booking_no']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['bike_no']; ?></td>
                            <td><?php echo $row['booking_date']; ?></td>
                            <td><?php echo $row['pickup_date']; ?></td>
                            <td><?php echo $row['dropoff_date']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">No bookings found for the selected filters.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
