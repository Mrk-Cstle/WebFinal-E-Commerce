<?php
include 'include/session.php';
include 'include/dbConnection.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM product WHERE product_id='$id'");
header('location:addProduct.php');
