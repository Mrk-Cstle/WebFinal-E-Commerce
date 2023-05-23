<?php
// Check if a session is already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    // User is not logged in, redirect to login page or display error message
    header("Location: ../index.php");
    exit();
}
