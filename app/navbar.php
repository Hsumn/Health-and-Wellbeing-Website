<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="mainpage.php">
    <img class="logo1" src="../img/cherry-blossom.png" alt="mainpage.php">
    </a>
    <a class="navbar-brand me-auto" href="mainpage.php" id="oncanvas">Better Ahead</a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <i class="offcanvas-title" id="offcanvasNavbarLabel">Better Ahead</i>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" aria-current="page" href="homepage.php">Home</a>
          </li>
          <?php if (!isset($_SESSION['userID'])): ?>
           <li class="nav-item">
             <a class="nav-link mx-lg-2" href="Registration.php">Register</a>
          </li>
          <?php endif; ?>

          <?php if (!isset($_SESSION['userID'])): ?>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="loginform.php">Login</a>
          </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link mx-lg-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Show More
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="gethelp.php">Get Help</a></li>
              <li><a class="dropdown-item" href="../chart.html">Chart</a></li>
              <li><a class="dropdown-item" href="aboutus.php">About Us</a></li>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  
</nav>
</body>
</html>