<?php
session_start();

// security check
if (!isset($_SESSION['admin'])) {
    header("Location: ../../frontend/admin_login.html");
    exit();
}

// if session is valid, load dashboard UI
header("Location: ../../frontend/admin_dashboard.html");
?>
