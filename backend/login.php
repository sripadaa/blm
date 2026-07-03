<?php
session_start();

/*if (!isset($_SESSION['customer_id'])) {
    header("Location: ../../frontend/login.html");
    exit();
}*/
include "db_connect.php";


$email = $_POST['email'];
$password = md5($_POST['password']);

$query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['customer_id'] = $row['customer_id'];  // 🔥 IMPORTANT
    $_SESSION['customer_name'] = $row['name'];       // optional

    header("Location: ../frontend/customer_dashboard.html");
} else {
    echo "Invalid login";
}
?>
