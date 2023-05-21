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
    <table class="table my-3">
      <a href="emptycart.php" class="btn btn-sm btn-danger mt-2">Empty Cart</a>
      <thead>
        <tr class="text-center">
          <th>S.no</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>

      <tbody>
        <?php
        if (isset($_SESSION['cart'])) :
          $i = 1;
          foreach ($_SESSION['cart'] as $cart) :
        ?>
            <tr class="text-center">
              <td><?php echo $i; ?> # </td>
              <td> Product <?= $cart['pro_id']; ?></td>
              <td>
                <form action="update.php" method="post">
                  <input type="number" value="<?= $cart['qty']; ?>" name="qty" min="1">
                  <input type="hidden" name="upid" value="<?= $cart['pro_id']; ?>">
              </td>
              <td>
                <input type="submit" name="update" value="Update" class="btn btn-sm btn-warning">
                </form>
              </td>
              <td><a class="btn btn-sm btn-danger" href="removecartitem.php?id=<?= $cart['pro_id']; ?>">Remove</a></td>
            </tr>
        <?php
            $i++;
          endforeach;
        endif;
        ?>
      </tbody>
    </table>
  </div>
</body>
<?php include 'footerS.php'; ?>

</html>