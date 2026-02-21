<?php
session_start();
include "db_connect.php";

$customer_id = $_SESSION['customer_id'];

$query = "SELECT complaint_type, description, status, admin_remark
          FROM complaint
          WHERE customer_id='$customer_id'";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "Type: ".$row['complaint_type']."<br>";
    echo "Description: ".$row['description']."<br>";
    echo "Status: ".$row['status']."<br>";
    echo "Remark: ".$row['admin_remark']."<hr>";
}
?>
