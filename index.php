<?php
require 'Flight.php';
include($_SERVER['DOCUMENT_ROOT'] . '/goTrip/partials/_dbconnect.php');
session_start();

// Initialize Flight object
$flight = new Flight();

// Get popular destinations (this would typically come from a database)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTrip - Your Travel Companion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <?php include "partials/_nav.php" ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Find Your Perfect Trip</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="search.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="from" placeholder="From" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="to" placeholder="To" required>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="departure_date" required>
                        </div>
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="return_date">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">Search Flights</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Go - Trip special deals</h2>
        <div class="row">
            <div class="col-md-6 my-4">
                <!-- fetch all deals -->
                <?php $sql = "SELECT * FROM `featured_deals`;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <!-- card starts here -->

                    <div class="card" style="width: 18rem;">
                        <img src="/deals_images/deal1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['deal_location'] ?></h5>
                            <p class="card-text"><?php echo substr($row['deal_excerpt'], 0, 90) . "..."; ?></p>
                            <a href="thread.php" class="btn btn-primary">More Details</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <?php include "partials/_footer.php"; ?>
</body>

</html>