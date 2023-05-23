<?php

include 'dbConnection.php';

//for prod list

$getProd = "SELECT * FROM  product ORDER BY product_id DESC";
$resultProd = mysqli_query($conn, $getProd);

$getOrders = "SELECT * FROM  orders ORDER BY date DESC";
$resultGetOrders = mysqli_query($conn, $getOrders);
