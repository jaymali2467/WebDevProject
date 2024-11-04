<?php
require_once 'Flight.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $departureDate = $_POST['departure_date'];
    $returnDate = $_POST['return_date'] ?? null;

    $flight = new Flight();
    $searchResults = $flight->searchFlights($from, $to, $departureDate, $returnDate);

    $_SESSION['search_results'] = $searchResults;
    header('Location: results.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}