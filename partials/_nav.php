<?php ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">GoTrip</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.php">flights</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">AboutUs</a>
        </li>
      </ul>
    </div>
    <?php if (isset($_SESSION['loggedin'])) {
      echo '<a class="btn btn-outline-success mr-3 " href="user_info/logout.php">Logout</a>';
    } else {
      echo '<a class="btn btn-outline-success mr-3 " href="user_info/login.php">Login</a>';
    } ?>
  </div>
</nav>