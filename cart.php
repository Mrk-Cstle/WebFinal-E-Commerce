<!DOCTYPE html>
<html lang="en">

<?php include "assets/include/session.php" ?>
<?php include 'assets/include/nav.php'; ?>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="assets/css/templatemo.css" />
  <link rel="stylesheet" href="assets/css/custom.css" />

  <!-- Load fonts style after rendering the layout styles -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
  <link rel="stylesheet" href="assets/css/fontawesome.min.css" />

</head>

<body>
  <div class="container">
    <table id="cartTable" class="table my-3">
      <a href="emptycart.php" class="btn btn-sm btn-danger mt-2">Empty Cart</a>
      <thead>
        <tr class="text-center">
          <th>S.no</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th colspan="2">Action</th>

        </tr>
      </thead>

      <tbody>
        <?php
        if (isset($_SESSION['cart'])) :
          $i = 1;
          $totalPrice = 0; // Initialize total price variable

          foreach ($_SESSION['cart'] as $cart) :
            $itemPrice = $cart['price'];
            $itemQuantity = $cart['qty'];
            $subtotal = $itemPrice * $itemQuantity;
            $totalPrice += $subtotal;
        ?>
            <tr class=" text-center">
              <td><?php echo $i; ?> # </td>
              <td> Product <?= $cart['pro_id']; ?></td>
              <td>
                <?= $cart['qty']; ?>
              </td>
              <td><?= $cart['price']; ?></td>

              <td> <a class="btn btn-sm btn-danger removeCartItem" data-pro-id="<?= $cart['pro_id']; ?>">Remove</a></td>
            </tr>
        <?php
            $i++;
          endforeach;
          echo '<tr>
          <td colspan="3"></td>
          <td class="text-center"><strong>Total Price: ₱ ' . $totalPrice . '</strong></td>
          <td></td>
        </tr>';
        endif;
        ?>
      </tbody>

    </table>
  </div>
  <!-- jQuery AJAX code -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('.removeCartItem').click(function(event) {
        event.preventDefault();

        var product_id = $(this).data('pro-id');

        $.ajax({
          url: 'removecartitem.php',
          type: 'GET',
          data: {
            id: product_id
          },
          success: function(response) {
            // Handle success response
            console.log(response);
            $('body ').html(response);

            // Optionally, you can update the table or refresh the page after successful removal
            // Update table or refresh page logic goes here
          },
          error: function(xhr, status, error) {
            // Handle error
            console.log(error);
          }
        });
      });
    });
  </script>
</body>
<?php include 'footerS.php'; ?>

</html>