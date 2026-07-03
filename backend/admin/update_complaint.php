<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../../frontend/admin_login.html");
    exit();
}
include "../db_connect.php";

$id = $_GET['id'];

$query = "UPDATE complaint SET status='Resolved' WHERE complaint_id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: view_all_complaints.php");
} else {
    echo "Error updating";
}
?>
