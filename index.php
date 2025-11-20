<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="SportsHub - Your ultimate destination for sports merchandise and news.">
  <meta name="keywords" content="sports, jerseys, football, cricket, esports">
  <meta name="author" content="Your Name">
  <title>SportsHub</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Parkinsans:wght@300..800&family=Protest+Revolution&display=swap" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css?v=1.0">
  <style>
  .custom-offcanvas {
    background-color: #5c2d38;
    color: white;
  }

  .btn-black {
    background-color: black;
    color: white;
    border: none;
  }

  .btn-black:hover {
    background-color: #333;
    color: white;
  }

  .btn-link {
    font-size: 14px;
    padding: 0;
  }

  .form-label {
    color: #fff;
  }

  .form-control {
    background-color: #4b2331;
    color: white;
    border: 1px solid #ddd;
  }

  .form-control:focus {
    background-color: #4b2331;
    color: white;
    border-color: white;
    box-shadow: none;
  }
</style>
</head>
<body>

 <!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.html">SportsHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="football.php">Football Jerseys</a></li>
        <li class="nav-item"><a class="nav-link" href="cricket.php">Cricket Jerseys</a></li>
        <li class="nav-item"><a class="nav-link" href="esports.php">Esports Jerseys</a></li>
      </ul>
      <button class="btn btn-login" data-bs-toggle="offcanvas" data-bs-target="#loginOffcanvas" aria-controls="loginOffcanvas">Login</button>
    </div>
  </div>
</nav>

<!-- Login Offcanvas -->
<div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="loginOffcanvas" aria-labelledby="loginOffcanvasLabel">
  <div class="offcanvas-header">
    <h5 id="loginOffcanvasLabel" class="text-white">Login</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="login.php" method="POST">
      <div class="mb-3">
        <label for="loginEmail" class="form-label text-white">Email address</label>
        <input type="email" class="form-control" name="loginEmail" required>
      </div>
      <div class="mb-3">
        <label for="loginPassword" class="form-label text-white">Password</label>
        <input type="password" class="form-control" name="loginPassword" required>
      </div>
      <button type="submit" class="btn btn-black">Login</button>
      <!-- Register Button -->
      <button type="button" class="btn btn-dark text-white text-decoration-none" onclick="switchToRegister()">Register</button>

    </form>
  </div>
</div>

<!-- Registration Offcanvas -->
<div class="offcanvas offcanvas-end custom-offcanvas" tabindex="-1" id="registerOffcanvas" aria-labelledby="registerOffcanvasLabel">
  <div class="offcanvas-header">
    <h5 id="registerOffcanvasLabel" class="text-white">Register</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <form action="register.php" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label text-white">Name</label>
        <input type="text" class="form-control" name="name" required>
      </div>
      <div class="mb-3">
        <label for="registerEmail" class="form-label text-white">Email address</label>
        <input type="email" class="form-control" name="registerEmail" required>
      </div>
      <div class="mb-3">
        <label for="registerPassword" class="form-label text-white">Password</label>
        <input type="password" class="form-control" name="registerPassword" required>
      </div>
      <div class="mb-3">
        <label for="confirmPassword" class="form-label text-white">Confirm Password</label>
        <input type="password" class="form-control" name="confirmPassword" required>
      </div>
      <button type="submit" class="btn btn-black">Register</button>
    </form>
  </div>
</div>

  <!-- Carousel -->
  <section class="main">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/jersey/fcbH.jpg.webp" class="d-block w-100" alt="Football Jerseys">
          <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1>Get Your Favourite Football Team Jersey</h1>
            <p>More than 100+ club and national team jerseys are available</p>
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/jersey/bdcH.jpg" class="d-block w-100" alt="Cricket Jerseys">
          <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1>Get Your Favourite Cricket Team Jersey</h1>
            <p>Explore and get your favourite cricket team jersey from SportsHub</p>
            
          </div>
        </div>
        <div class="carousel-item">
          <img src="./img/jersey/newsH.jpeg" class="d-block w-100" alt="Sports News">
          <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1>You can find sports news</h1>
            <p>Football, Cricket, Basketball, Rugby, Hockey, Ice Hockey, and more</p>
            <a href="https://www.espn.com" target="_blank" class="btn btn1 primary">Discover</a>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Footer -->
  <?php
include 'footer.php';
?>
  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Custom JS -->
  <script src="script.js"></script>
  <script>
  function switchToRegister() {
    // Close the Login Offcanvas
    const loginOffcanvas = document.getElementById('loginOffcanvas');
    const bsLoginOffcanvas = bootstrap.Offcanvas.getInstance(loginOffcanvas);
    bsLoginOffcanvas.hide();

    // Open the Register Offcanvas
    const registerOffcanvas = new bootstrap.Offcanvas(document.getElementById('registerOffcanvas'));
    registerOffcanvas.show();
  }
</script>
</body>
</html>