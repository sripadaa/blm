<?php
session_start();
include "db_connect.php";

$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['customer_id'] = $row['customer_id'];
    header("Location: ../frontend/customer_dashboard.html");
} else {
    echo "Invalid login";
}
?>
