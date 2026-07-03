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
?>

<!DOCTYPE html>
<html>
<head>
  <title>All Complaints</title>
  <link rel="stylesheet" href="../../frontend/css/style.css">
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <h2>Admin</h2>
  <a href="../../frontend/admin_dashboard.html">Dashboard</a>
  <a href="view_request.php">Locker Requests</a>
  <a href="view_all_complaints.php">Complaints</a>
  <a href="logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">

<h2>All Complaints</h2>

<table>
<tr>
  <th>ID</th>
  <th>Customer</th>
  <th>Type</th>
  <th>Status</th>
  <th>Date</th>
  <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<tr>
  <td><?= $row['complaint_id'] ?></td>
  <td><?= $row['name'] ?></td>
  <td><?= $row['complaint_type'] ?></td>

  <td>
    <?php
    if ($row['status'] == 'Resolved') {
        echo "<span class='status-approved'>Resolved</span>";
    } else {
        echo "<span class='status-pending'>Pending</span>";
    }
    ?>
  </td>

  <td><?= $row['complaint_date'] ?></td>

  <td>
    <?php if ($row['status'] == 'Pending') { ?>
      <a href="update_complaint.php?id=<?= $row['complaint_id'] ?>">
        Resolve
      </a>
    <?php } else { echo "Done"; } ?>
  </td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
