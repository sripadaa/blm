<?php
session_start();
include "db_connect.php";

$customer_id = $_SESSION['customer_id'];
$complaint_type = $_POST['complaint_type'];
$description = $_POST['description'];

$query = "INSERT INTO complaint 
(customer_id, complaint_type, description, status, complaint_date)
VALUES 
('$customer_id', '$complaint_type', '$description', 'Pending', CURDATE())";

if (mysqli_query($conn, $query)) {
    echo "Complaint registered successfully";
} else {
    echo "Error submitting complaint";
}
?>
