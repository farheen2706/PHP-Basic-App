<?php
session_start();
include 'db_connect.php';

$username_email = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username_email' OR email='$username_email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid password";
    }
} else {
    echo "User not found";
}

$conn->close();
?>