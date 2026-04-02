<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: ../frontend/login.html");
    exit();
}
include "./db_connect.php";

// assuming customer is logged in
$customer_id = $_SESSION['customer_id'];
//$_SESSION=$_SESSION['customer_id'];
//$customer_id=$_SESSION;

$query = "SELECT l.locker_number, lr.request_status
          FROM locker_request lr
          JOIN locker l ON lr.locker_id = l.locker_id
          WHERE lr.customer_id='$customer_id'";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Locker Request Status</title>
  <link rel="stylesheet" href="D:/xampp/htdocs/project/frontend/css">

</head>
<body>
  <h5 style="color: red;"><big><big><big><big>HI</big></big></big></big></h5>

<!-- SIDEBAR -->
<div class="navbar">
  <h2>Customer</h2>
  <a href="../../frontend/customer_dashboard.html">Dashboard</a>
  <a href="./view_locker_request_status.php">Request Status</a>
  <a href="./customer/view_locker_details.php">Locker Details</a>
  <a href="./logout.php">Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="content">

<h2>Your Locker Requests</h2>

<table>
<tr>
  <th>Locker Number</th>
  <th>Status</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>
  <td><?= $row['locker_number'] ?></td>
  <td>
    <?php
    if ($row['request_status'] == 'Approved') {
        echo "<span class='status-approved'>Approved</span>";
    } else {
        echo "<span class='status-pending'>Pending</span>";
    }
    ?>
  </td>
</tr>

<?php } ?>

</table>

</div>

</body>
</html>
