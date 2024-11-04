<?php

/**
 * signup
 * @package gotrip
 * 
 */
$login = false;
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include($_SERVER['DOCUMENT_ROOT'] . '/goTrip/partials/_dbconnect.php');
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM user_data WHERE user_name = '$username';";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num === 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['user_password'])) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_name'] = $username;
        header("location: /gotrip/index.php");
      } else {
        $showError = true;
      }
    }
  } else {
    $showError = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
    crossorigin="anonymous" />

  <title>Login</title>
</head>

<body>

  <?php
  if (isset($_SESSION['signedUP'])) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have successfully signed in now you can login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  if ($showError) {

    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Invalid username or password.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
  }
  if (isset($_SESSION['noSearch'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Wait!</strong> Login Before using search....
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
  ?>

  <!-- // Form for signup -->
  <div class="container align-center my-4">
    <h2>Login</h2>
    <form action="/gotrip/user_info/login.php" method="POST">
      <div class="form-group col-md-4">
        <label for="username">Username</label>
        <input
          type="text"
          class="form-control"
          id="username"
          name="username" />
      </div>
      <div class="form-group col-md-4">
        <label for="userPassword1">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          name="password" />
      </div>
      <h8>New here: <a href="signup.php">Register <br></a></h8>
      <button type="submit" class="btn btn-primary btn-success mt-3">Login</button>
    </form>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script
    src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>