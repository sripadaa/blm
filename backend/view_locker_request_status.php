<?php
session_start();
include "db_connect.php";

// assuming customer is logged in
$customer_id = $_SESSION['customer_id'];

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
</head>
<body>

<h2>Your Locker Requests</h2>

<table border="1" cellpadding="8">
<tr>
  <th>Locker Number</th>
  <th>Status</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
<tr>
  <td><?= $row['locker_number'] ?></td>
  <td><?= $row['request_status'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
