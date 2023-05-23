<?php
include 'include/session.php';
include 'include/dbConnection.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM orders WHERE pro_id='$id'");
header('location:order.php');
