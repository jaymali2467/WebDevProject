<?php
session_start();

if (!isset($_SESSION['search_results'])) {
    header('Location: index.php');
    exit;
}
if (!isset($_SESSION['loggedin'])) {
    $_SESSION['noSearch'] = "123";
    header("location: user_info/login.php");
}

$searchResults = $_SESSION['search_results'];
unset($_SESSION['search_results']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTrip - Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include "partials/_nav.php"; ?>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Flight Search Results</h1>
        <?php if (empty($searchResults)): ?>
            <p class="text-center">No flights found matching your criteria. Please try a different search.</p>
        <?php else: ?>
            <div class="row">
                <?php foreach ($searchResults as $flight): ?>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $flight['airline']; ?></h5>
                                <p class="card-text">
                                    From: <?php echo $flight['from']; ?><br>
                                    To: <?php echo $flight['to']; ?><br>
                                    Date: <?php echo $flight['departure_date']; ?><br>
                                    Departure: <?php echo $flight['departure_time']; ?><br>
                                    Arrival: <?php echo $flight['arrival_time']; ?><br>
                                    Price: &#8377;<?php echo $flight['price']; ?>
                                </p>
                                <a href="#" class="btn btn-primary">Book Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "partials/_footer.php" ?>
</body>

</html>