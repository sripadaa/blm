<?php
include "db_connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = md5($_POST['password']);

$query = "INSERT INTO customer (name, email, phone, address, password)
          VALUES ('$name', '$email', '$phone', '$address', '$password')";

if (mysqli_query($conn, $query)) {
    echo "Registration Successful";
} else {
    echo "Error";
}
?>
