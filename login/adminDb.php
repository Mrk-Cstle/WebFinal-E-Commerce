<?php
session_start();
include 'include/dbConnection.php';

$userName = $_POST['userName'];
$password = $_POST['password'];




$loginQuery = "SELECT * FROM  login WHERE user='$userName' AND password='$password' ";

$result = mysqli_query($conn, $loginQuery);

if (mysqli_num_rows($result) == 1) {
    // set session variables
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user'] = $row['user'];
    $_SESSION['logged_in'] = true;

    if (isset($_SESSION['logged_in'])  == true) {
        // user is logged in
        header("location:adminHome.php");
    } else {
        // redirect to login page
        header("location:Login.php");
    }
} else {
    // handle invalid login
    header("location:Login.php");
}
