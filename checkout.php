<?php
session_start();
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_SESSION['user']; // Assuming user session contains logged-in user info
    $mobileNumber = $_POST['mobileNumber'];
    $productTitle = $_POST['productTitle'];
    $productPrice = $_POST['productPrice'];
    $productImage = $_POST['productImage'];

    // Insert order into the database
    $query = "INSERT INTO orders (user, mobile_number, product_title, product_price, product_image, order_date) 
              VALUES (?, ?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssss', $user, $mobileNumber, $productTitle, $productPrice, $productImage);

    if ($stmt->execute()) {
        echo "<script>alert('Order placed successfully! we will contact you with 2 hour'); window.location.href = 'football.php';</script>";
    } else {
        echo "<script>alert('Failed to place order. Please try again.'); window.location.href = 'football.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
