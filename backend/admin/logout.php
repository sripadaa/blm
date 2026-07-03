<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: ../../frontend/admin_login.html");
    exit();
}
session_destroy();
header("Location: ../../frontend/admin_login.html");
exit();
?>
