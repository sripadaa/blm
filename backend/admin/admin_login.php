<?php
session_start();
include "../db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM admin 
          WHERE username='$username' AND password='$password'";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $_SESSION['admin'] = $username;
    header("Location: admin_dashboard.php");
} else {
    echo "Invalid admin credentials";
}
?>
