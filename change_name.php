<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST['newUsername'];
    $email = $_SESSION['user']; // Use the logged-in user's email

    // Update the user's name in the database
    $sql = "UPDATE user SET name = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $newUsername, $email);

    if ($stmt->execute()) {
        // Update the session variable
        $_SESSION['userName'] = $newUsername; // Update the session for immediate use
        echo "<script>alert('Name updated successfully'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Failed to update name'); window.location.href='index.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
