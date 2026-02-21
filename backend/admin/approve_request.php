<?php
session_start();
include "../db_connect.php";

// Admin security check
if (!isset($_SESSION['admin'])) {
    header("Location: ../../frontend/admin_login.html");
    exit();
}

$request_id = $_GET['request_id'];
$locker_id  = $_GET['locker_id'];

// Update request status
mysqli_query($conn,
"UPDATE locker_request 
 SET request_status='Approved' 
 WHERE request_id='$request_id'");

// Update locker availability
mysqli_query($conn,
"UPDATE locker 
 SET availability_status='Assigned' 
 WHERE locker_id='$locker_id'");

// Redirect back
header("Location: view_request.php");
?>
