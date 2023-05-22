<?php
session_start();
include 'dbConnection.php';
// Check if product is coming or not
if (isset($_GET['pro_id'])) {
  $proid = $_GET['pro_id'];

  // Retrieve the price of the product from the database using $proid
  // Replace 'your_database_credentials' with your actual database connection details


  // Prepare and execute the query to retrieve the price
  $query = "SELECT price FROM product WHERE fname = '$proid'";
  $result = mysqli_query($conn, $query);

  // Fetch the price from the result
  $row = mysqli_fetch_assoc($result);
  $price = $row['price'];

  // Close the database connection
  mysqli_close($conn);

  // If session cart is not empty
  if (!empty($_SESSION['cart'])) {
    // Using "array_column()" function, we get the product id existing in the session cart array
    $acol = array_column($_SESSION['cart'], 'pro_id');

    // Now we compare whether the id already exists with "in_array()" function
    if (in_array($proid, $acol)) {
      // Updating quantity if item already exists
      $_SESSION['cart'][$proid]['qty'] += 1;
      $_SESSION['cart'][$proid]['price'] += $price;
    } else {
      // If item doesn't exist in the session cart array, we add a new item with price
      $item = [
        'pro_id' => $proid,
        'qty' => 1,
        'price' => $price
      ];

      $_SESSION['cart'][$proid] = $item;
    }
  } else {
    // If cart is completely empty, then store item in session cart with price
    $item = [
      'pro_id' => $proid,
      'qty' => 1,
      'price' => $price
    ];

    $_SESSION['cart'][$proid] = $item;
  }
  if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $cartItem) {
      $itemPrice = $cartItem['price'];
      $itemQuantity = $cartItem['qty'];
      $subtotal = $itemPrice * $itemQuantity;
      $totalPrice += $subtotal;
    }
  }

  // Output the total price
  echo "Total Price: $" . $totalPrice;
}
