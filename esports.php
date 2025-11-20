<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esports Jerseys - SportsHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
      /* Sidebar Styling */
      #sidebar {
        position: fixed;
        top: 0;
        right: -300px;
        width: 300px;
        height: 100%;
        background: #212529;
        color: #fff;
        transition: all 0.3s;
        padding: 20px;
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.5);
      }

      #sidebar.active {
        right: 0;
      }
    </style>
  </head>
  <body class="esportsB">
    <?php
    session_start();
    $isLoggedIn = isset($_SESSION['user']); // Check if the user is logged in
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php">SportsHub</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav m-auto">
            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="football.php">Football Jerseys</a></li>
            <li class="nav-item"><a class="nav-link" href="cricket.php">Cricket Jerseys</a></li>
            <li class="nav-item"><a class="nav-link active" href="esports.php">Esports Jerseys</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container my-2">
      <h1 class="text-center text-light">Esports Jerseys</h1>
      <p class="text-center text-light">Explore jerseys of your favorite esports teams and players.</p>
      <div class="row g-4">
        <?php
        include 'db.php';
        $query = "SELECT * FROM products WHERE catagory = 'esports'";
        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            ?>
            <div class="col-md-4">
              <div class="card">
                <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['title']; ?>">
                <div class="card-body d-flex flex-column justify-content-between align-items-center">
                  <h5 class="card-title text-center"><?php echo $row['title']; ?></h5>
                  <p class="card-text text-center">Price: <?php echo $row['price']; ?> BDT</p>
                  <div class="d-flex justify-content-center">
                    <button 
                      class="btn btn-buy" 
                      data-id="<?php echo $row['id']; ?>" 
                      data-title="<?php echo $row['title']; ?>" 
                      data-price="<?php echo $row['price']; ?>" 
                      data-image="<?php echo $row['image']; ?>">
                      Buy Now
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        } else {
          echo "<p class='text-center text-light'>No products available in this category.</p>";
        }

        $conn->close();
        ?>
      </div>
    </div>

    <!-- Sidebar -->
    <div id="sidebar">
      <h4>Product Details</h4>
      <img id="sidebar-image" src="" alt="" class="img-fluid mb-3">
      <h5 id="sidebar-title"></h5>
      <p id="sidebar-price"></p>
      <button class="btn w-100" id="checkout-button" style="background-color: white; color: black; border: 1px solid #ccc;">Checkout</button>

    </div>

    <!-- Checkout Confirmation Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="checkoutModalLabel">Confirm Your Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="checkoutForm" action="checkout.php" method="POST">
              <div class="mb-3">
                <label for="mobileNumber" class="form-label">Mobile Number</label>
                <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Enter your mobile number" required>
              </div>
              <input type="hidden" id="productTitle" name="productTitle">
              <input type="hidden" id="productPrice" name="productPrice">
              <input type="hidden" id="productImage" name="productImage">
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" form="checkoutForm" class="btn btn-primary">Confirm Order</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php
    include 'footer.php';
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Pass PHP session login status to JavaScript
      const isLoggedIn = <?php echo $isLoggedIn ? 'true' : 'false'; ?>;

      // JavaScript for Sidebar Interaction
      document.addEventListener("DOMContentLoaded", () => {
        const sidebar = document.getElementById("sidebar");
        const sidebarTitle = document.getElementById("sidebar-title");
        const sidebarPrice = document.getElementById("sidebar-price");
        const sidebarImage = document.getElementById("sidebar-image");
        const buyButtons = document.querySelectorAll(".btn-buy");
        const checkoutButton = document.getElementById("checkout-button");

        const productTitleInput = document.getElementById("productTitle");
        const productPriceInput = document.getElementById("productPrice");
        const productImageInput = document.getElementById("productImage");

        // Buy button functionality
        buyButtons.forEach(button => {
          button.addEventListener("click", function () {
            if (!isLoggedIn) {
              alert("Please log in first to purchase items!");
              return;
            }

            const title = this.getAttribute("data-title");
            const price = this.getAttribute("data-price");
            const image = this.getAttribute("data-image");

            // Populate sidebar with product info
            sidebarTitle.textContent = title;
            sidebarPrice.textContent = `Price: ${price} BDT`;
            sidebarImage.src = image;

            // Store product details in hidden inputs
            productTitleInput.value = title;
            productPriceInput.value = price;
            productImageInput.value = image;

            // Show the sidebar
            sidebar.classList.add("active");
          });
        });

        // Checkout button functionality
        checkoutButton.addEventListener("click", () => {
          const checkoutModal = new bootstrap.Modal(document.getElementById("checkoutModal"));
          checkoutModal.show();
        });

        // Close the sidebar when clicking outside of it
        document.addEventListener("click", (e) => {
          if (!sidebar.contains(e.target) && !e.target.classList.contains("btn-buy")) {
            sidebar.classList.remove("active");
          }
        });
      });
    </script>
  </body>
</html>
