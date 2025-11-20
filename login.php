<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Start session and redirect
        session_start();
        $_SESSION['user'] = $email;
        header("Location: index.php");
    } else {
        echo "<script>alert('Invalid credentials'); window.location.href='index.php';</script>";
    }
}
?>
