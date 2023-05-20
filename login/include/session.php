<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    // user is logged in
} else {
    // redirect to login page or display error message
    header("location:index.php");
    session_destroy();
}
