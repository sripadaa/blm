<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: ../frontend/login.html");
    exit();
}
include "../db_connect.php";

$query = "SELECT * FROM locker";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Locker Details</title>
  <link rel="stylesheet" href="../../frontend/css/style.css">
</head>
<body>

<div class="sidebar">
  <h2>Customer</h2>
  <a href="../../frontend/customer_dashboard.html">Dashboard</a>
  <a href="view_locker_details.php">Locker Details</a>
  <a href="logout.php">Logout</a>
</div>

<div class="content">

<h1>Locker Details</h1>

<table>
<tr>
  <th>Locker No</th>
  <th>Type</th>
  <th>Dimensions</th>
  <th>Capacity</th>
  <th>Allowed Items</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?= $row['locker_number'] ?></td>
  <td><?= $row['type'] ?></td>
  <td><?= $row['dimensions'] ?></td>
  <td><?= $row['capacity'] ?></td>
  <td><?= $row['allowed_items'] ?></td>
</tr>
<?php } ?>

</table>

</div>

</body>
</html>
