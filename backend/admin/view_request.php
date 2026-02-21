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
</head>
<body>

<h2>Locker Requests</h2>

<table border="1" cellpadding="8">
<tr>
  <th>Request ID</th>
  <th>Customer</th>
  <th>Locker</th>
  <th>Status</th>
  <th>Action</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?= $row['request_id'] ?></td>
  <td><?= $row['name'] ?></td>
  <td><?= $row['locker_number'] ?></td>
  <td><?= $row['request_status'] ?></td>
  <td>
    <?php if ($row['request_status'] == 'Pending') { ?>
      <a href="approve_request.php?request_id=<?= $row['request_id'] ?>&locker_id=<?= $row['locker_id'] ?>">
        Approve
      </a>
    <?php } else { echo "Approved"; } ?>
  </td>
</tr>
<?php } ?>

</table>

</body>
</html>
