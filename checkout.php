<?php
include "assets/include/session.php";
include 'assets/include/nav.php';

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

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/templatemo.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

  <!-- Load fonts style after rendering the layout styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="assets/css/fontawesome.min.css" />

  <!-- Import SweetAlert2 library -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
        <h4 class="resText text-center text-info p-2">Complete your order!</h4>
        <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"><b>Product(s) : </b><?= $ProdnameString; ?></h6>
          <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
          <h5><b>Total Amount Payable : </b>Php <?= number_format($totalPrice, 2) ?></h5>
        </div>
        <form action="" method="post" id="placeOrder">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
          </div>
          <div class="form-group">
            <input type="number" name="phone" class="form-control" placeholder="Enter Phone" required>
          </div>
          <div class="form-group">
            <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
          </div>
          <h6 class="text-center lead">Select Payment Mode</h6>
          <div class="form-group">
            <select name="pmode" class="form-control">
              <option value="" selected disabled>-Select Payment Mode-</option>
              <option value="cod">Cash On Delivery</option>
            </select>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-block">
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {
      // Function to send form data to the server
      function submitFormData(formData) {
        $.ajax({
          url: 'placeorder.php',
          method: 'post',
          data: formData,
          dataType: 'json', // Set the response data type as JSON
          success: function() {
            // Clear the form inputs


            // Redirect to the success page
            window.location.href = 'success.php';
          },
          error: function() {
            // Display error message using SweetAlert
            window.location.href = 'shop.php'
          }

        });

      }

      // Sending Form data to the server
      $("#placeOrder").submit(function(e) {
        e.preventDefault();

        // Retrieve form data
        var formData = $(this).serializeArray();

        // Add cart session data to form data
        var cartData = <?php echo json_encode($_SESSION['cart']); ?>;
        formData.push({
          name: 'cartData',
          value: JSON.stringify(cartData)
        });

        // Call the function to submit form data
        submitFormData(formData);
      });
    });
  </script>

</body>

</html>