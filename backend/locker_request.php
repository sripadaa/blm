<?php
session_start();
include "db_connect.php";

$customer_id = $_SESSION['customer_id'];
$locker_size = $_POST['locker_size'];
$branch_name = $_POST['branch_name'];

// Find available locker
$query = "SELECT * FROM locker 
          WHERE locker_size='$locker_size' 
          AND branch_name='$branch_name'
          AND availability_status='Available'
          LIMIT 1";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $locker = mysqli_fetch_assoc($result);
    $locker_id = $locker['locker_id'];

    // Insert request
    $request_query = "INSERT INTO locker_request 
        (customer_id, locker_id, request_date, request_status)
        VALUES 
        ('$customer_id', '$locker_id', CURDATE(), 'Pending')";

    mysqli_query($conn, $request_query);

    echo "Locker request submitted. Waiting for approval.";
} else {
    echo "No locker available.";
}
?>
