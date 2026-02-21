<?php
include "../db_connect.php";

$complaint_id = $_POST['complaint_id'];
$status = $_POST['status'];
$remark = $_POST['admin_remark'];

$query = "UPDATE complaint 
          SET status='$status', admin_remark='$remark'
          WHERE complaint_id='$complaint_id'";

if (mysqli_query($conn, $query)) {
    echo "Complaint updated successfully";
} else {
    echo "Error updating complaint";
}
?>
