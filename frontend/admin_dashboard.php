<?php
session_start();

// 🔐 SESSION CHECK
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.html");
    exit();
}

// 🔌 DATABASE CONNECTION
include "../backend/db_connect.php";

// 📊 TOTAL LOCKERS
$locker_query = "SELECT COUNT(*) as total_lockers FROM locker";
$locker_result = mysqli_query($conn, $locker_query);
$locker_data = mysqli_fetch_assoc($locker_result);

// 📩 PENDING REQUESTS
$request_query = "SELECT COUNT(*) as pending_requests 
                  FROM locker_request 
                  WHERE request_status='Pending'";
$request_result = mysqli_query($conn, $request_query);
$request_data = mysqli_fetch_assoc($request_result);

// 🛠 TOTAL COMPLAINTS
$complaint_query = "SELECT COUNT(*) as total_complaints FROM complaint";
$complaint_result = mysqli_query($conn, $complaint_query);
$complaint_data = mysqli_fetch_assoc($complaint_result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Dashboard - ABC Bank</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <h2>Admin</h2>
  <a href="admin_dashboard.php">Dashboard</a>
  <a href="../backend/admin/view_request.php">Locker Requests</a>
  <a href="../backend/admin/view_all_complaints.php">Complaints</a>
  <a href="../backend/admin/logout.php">Logout</a>
</div>

<!-- MAIN CONTENT -->
<div class="content">

  <h1>ABC Bank</h1>
  <p>Admin Dashboard</p>

  <h2>Admin Control Panel</h2>

  <!-- 📊 STATS -->
  <div class="dashboard">

    <div class="card">
      <h3>Total Lockers</h3>
      <p><?= $locker_data['total_lockers'] ?></p>
    </div>

    <div class="card">
      <h3>Pending Requests</h3>
      <p><?= $request_data['pending_requests'] ?></p>
    </div>

    <div class="card">
      <h3>Total Complaints</h3>
      <p><?= $complaint_data['total_complaints'] ?></p>
    </div>

  </div>

  <!-- ⚡ ACTION CARDS -->
  <div class="dashboard">

    <div class="card">
      <h3>Locker Requests</h3>
      <a href="../backend/admin/view_request.php">View</a>
    </div>

    <div class="card">
      <h3>Complaints</h3>
      <a href="../backend/admin/view_all_complaints.php">View</a>
    </div>

  </div>

</div>

</body>
</html>
