<?php
include "assets/include/session.php";
include 'assets/include/nav.php';
include "assets/include/dbConnection.php";
// Assuming you have an array representing the cart items

$cart = $_SESSION['cart'];

// Compute the total amount
$totalPrice = 0;
$productNames = array();
$prices = array();
$quantities = array();

foreach ($cart as $item) {
    $productName = $item['pro_id'];
    $price = $item['price'];
    $quantity = $item['qty'];

    // Calculate the total price
    $totalPrice += $price * $quantity;

    // Prepare the product details for insertion
    $productNames[] = $productName;
    $prices[] = $price;
    $quantities[] = $quantity;
}

// Convert arrays to comma-separated strings
$productNamesString = implode(", ", $productNames);
$pricesString = implode(", ", $prices);
$quantitiesString = implode(", ", $quantities);

$ProdnameString = '';

foreach ($productNames as $productName) {
    $ProdnameString .= $productName . '<br>';
}

$ProdnameString = rtrim($ProdnameString, '<br>');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $numphone = $_POST['phone'];
    $address = $_POST['address'];
    $pmode = $_POST['pmode'];
// Prepare and execute the query to save all products in a single row
$query = "INSERT INTO orders (productName, price, qty, total, name, email, phone, address) 
VALUES ('$productNamesString', '$pricesString', '$quantitiesString', '$totalPrice', '$name',  '$email',  '$numphone', '$address')";
if (mysqli_query($conn, $query)) {
    // Clear the cart after successful checkout
    $_SESSION['cart'] = array();

    echo "Order placed successfully!";
} else {
    echo "Error inserting order: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

