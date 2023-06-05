<?php
// Start session
session_start();

// Unset session variables
unset($_SESSION['doctor_id']);
unset($_SESSION['doctor_name']);
unset($_SESSION['doctor_email']);
unset($_SESSION['doctor_license']);
unset($_SESSION['doctor_specialty']);

// Destroy session
session_destroy();

// Redirect to login page
header("Location: login.php");
?>
