







<?php
session_start();
if (!isset($_SESSION['user'])) {
    $isLoggedIn = false;
} else {
    $isLoggedIn = true;

    // Fetch the user name from the database
    include 'db.php';
    $email = $_SESSION['user'];
    $sql = "SELECT name FROM user WHERE email='$email'";
    $result = $conn->query($sql);
    $userName = $result->num_rows > 0 ? $result->fetch_assoc()['name'] : 'User';
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>
<body>

  <!-- Navbar -->
<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand text-white" href="index.php">SportsHub</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link text-white active" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="football.php">Football Jerseys</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="cricket.php">Cricket Jerseys</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="esports.php">Esports Jerseys</a></li>
      </ul>
      <!-- User Icon -->
      <i class="bi bi-person-square nav-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" style="cursor: pointer; font-size: 28px; color: white;"></i>
    </div>
  </div>
</nav>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="background-color: #000; color: #fff;">
  <div class="offcanvas-header d-flex flex-column align-items-center">
    <!-- Centered Icon -->
    <i class="bi bi-person-circle" style="font-size: 50px; color: #fff;"></i>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="filter: invert(1);"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column align-items-center mt-4">
    <!-- User Information -->
    <h6 class="mb-2">Welcome, <?php echo htmlspecialchars($userName); ?>!</h6>
    <p class="mb-4">Email: <?php echo htmlspecialchars($email); ?></p>
    <!-- Change Name Button -->
    <button class="btn mb-3" data-bs-toggle="modal" data-bs-target="#changeNameModal" style="background-color: #fff; color: #000; border: 1px solid #ccc;">Change Username</button>
    
    <!-- Spacer to push Logout button to the bottom -->
    <div class="flex-grow-1"></div>

    <!-- Logout Button -->
    <form method="post" action="logout.php" class="w-100">
      <button class="btn btn-danger w-100">Logout</button>
    </form>
  </div>
</div>


<!-- Modal for Changing Name -->
<div class="modal fade" id="changeNameModal" tabindex="-1" aria-labelledby="changeNameModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changeNameModalLabel">Change Username</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form to Update Username -->
        <form method="post" action="change_name.php">
          <div class="mb-3">
            <label for="newUsername" class="form-label">New Username</label>
            <input type="text" class="form-control" id="newUsername" name="newUsername" placeholder="Enter your new username" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
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
          <p>More than 50+ club and national team jerseys are available</p>
          
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/jersey/bdcH.jpg" class="d-block w-100" alt="Cricket Jerseys">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <h1>Get Your Favourite Cricket Team Jersey</h1>
          <p>Explore and get your favourite cricket team jersey from SportsHub</p>
         <!-- <a href="cricket.php" class="btn btn1 primary">Let’s Explore</a>  Redirect to cricket.php -->
        </div>
      </div>
      <div class="carousel-item">
        <img src="./img/jersey/newsH.jpeg" class="d-block w-100" alt="Sports News">
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
          <h1>You can find sports news</h1>
          <p>Football, Cricket, Basketball, Rugby, Hockey, Ice Hockey, and more</p>
          <a href="https://www.espn.com" target="_blank" class="btn btn1 primary">Discover</a> <!-- Redirect to ESPN -->
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
  <!-- Footer -->
  <footer class="bg-dark text-light py-4">
    <div class="container">
      <div class="row row-cols-1 row-cols-md-4 g-4">
        <div class="col">
          <h3 class="footerlogo">SportsHub</h3>
          <p>Welcome to SportsHub, your ultimate destination for authentic sports merchandise and updates. From football to esports jerseys, we have it all.</p>
          <p><i class="bi bi-telephone-fill"></i> +880 1700 000 000</p>
          <p><i class="bi bi-envelope-fill"></i> support@sportshub.com</p>
        </div>
        <div class="col">
          <h4>Quick Links</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-light">Home</a></li>
            <li><a href="#" class="text-decoration-none text-light">Shop</a></li>
            <li><a href="#" class="text-decoration-none text-light">Featured Jerseys</a></li>
            <li><a href="#" class="text-decoration-none text-light">New Arrivals</a></li>
            <li><a href="#" class="text-decoration-none text-light">Contact Us</a></li>
          </ul>
        </div>
        <div class="col">
          <h4>Explore</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-light">Football Jerseys</a></li>
            <li><a href="#" class="text-decoration-none text-light">Cricket Jerseys</a></li>
            <li><a href="#" class="text-decoration-none text-light">Esports Jerseys</a></li>
            <li><a href="#" class="text-decoration-none text-light">Custom Merchandise</a></li>
          </ul>
        </div>
        <div class="col">
          <h4>Categories</h4>
          <ul class="list-unstyled">
            <li><a href="#" class="text-decoration-none text-light">Football</a></li>
            <li><a href="#" class="text-decoration-none text-light">Cricket</a></li>
            <li><a href="#" class="text-decoration-none text-light">Basketball</a></li>
            <li><a href="#" class="text-decoration-none text-light">Rugby</a></li>
          </ul>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <p>2023 © SportsHub. All Rights Reserved.</p>
      </div>
    </div>
  </footer>





  <!-- Bootstrap Bundle JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>






























