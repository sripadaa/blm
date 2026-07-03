<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("Location: ../frontend/login.html");
    exit();
}

//header("Location: ../frontend/login.html");
session_destroy();
?>
