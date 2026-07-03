<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: ../frontend/login.html");
    exit();
}
include "db_connect.php";

$customer_id = $_SESSION['customer_id'];

$query = "SELECT complaint_text, status
          FROM complaint
          WHERE customer_id='$customer_id'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    //echo "Type: ".$row['complaint_type']."<br>";
    echo "complaint: ".$row['description']."<br>";
    echo "Status: ".$row['status']."<br>";
    //echo "Remark: ".$row['admin_remark']."<hr>";
}
?>
