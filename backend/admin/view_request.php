<?php
session_start();
include "../db_connect.php";

if (!isset($_SESSION['admin'])) {
    header("Location: ../../frontend/admin_login.html");
    exit();
}

$query = "SELECT lr.request_id, lr.locker_id, c.name,
          l.locker_number, lr.request_status
          FROM locker_request lr
          JOIN customer c ON lr.customer_id = c.customer_id
          JOIN locker l ON lr.locker_id = l.locker_id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Locker Requests</title>
  <link rel="stylesheet" href="../../frontend/css/style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
  <h2>Admin Panel</h2>
  <div>
    <a href="../../frontend/admin_dashboard.html">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>
</div>

<h2 style="text-align:center; margin-top:20px;">Locker Requests</h2>

<table>
<tr>
  <th>Request ID</th>
  <th>Customer</th>
  <th>Locker</th>
  <th>Status</th>
  <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { 

  // STATUS BADGE LOGIC
  if ($row['request_status'] == 'Approved') {
      $status = "<span class='status-approved'>Approved</span>";
  } else {
      $status = "<span class='status-pending'>Pending</span>";
  }
?>

<tr>
  <td><?= $row['request_id'] ?></td>
  <td><?= $row['name'] ?></td>
  <td><?= $row['locker_number'] ?></td>
  <td><?= $status ?></td>
  <td>
    <?php if ($row['request_status'] == 'Pending') { ?>
      <a class="btn"
         href="approve_request.php?request_id=<?= $row['request_id'] ?>&locker_id=<?= $row['locker_id'] ?>"
         onclick="return confirm('Approve this request?')">
         Approve
      </a>
    <?php } else { echo "Approved"; } ?>
  </td>
</tr>

<?php } ?>

</table>

</body>
</html>
