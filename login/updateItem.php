<?php
include "include/dbConnection.php";

// Function to update the item in the database
function updateItem($conn, $itemId, $name, $brand, $price, $info)
{
    // Perform the necessary database update query
    // Replace 'your_table_name' with your actual table name
    $updateQuery = "UPDATE product SET fname = '$name', brand = '$brand', price = '$price', info = '$info' WHERE product_id = $itemId";
    // Execute the query
    mysqli_query($conn, $updateQuery);
}

// Check if the form is submitted
if (isset($_POST['update'])) {
    $itemId = $_POST['itemId'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $info = $_POST['info'];

    // Call the updateItem function to update the item in the database
    updateItem($conn, $itemId, $name, $brand, $price, $info);

    // Redirect to the page after updating the item
    header("Location: addProduct.php");
    exit();
}
?>