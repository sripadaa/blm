<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../../frontend/admin_login.html");
    exit();
}
include "../db_connect.php";

$query = "SELECT cp.complaint_id, c.name, cp.complaint_type, 
          cp.status, cp.complaint_date
          FROM complaint cp
          JOIN customer c ON cp.customer_id = c.customer_id";

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    echo "ID: ".$row['complaint_id']." | ";
    echo "Customer: ".$row['name']." | ";
    echo "Type: ".$row['complaint_type']." | ";
    echo "Status: ".$row['status']." | ";
    echo "Date: ".$row['complaint_date']."<br>";
}
?>
