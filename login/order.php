<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/templatemo.css" />
    <link rel="stylesheet" href="../assets/css/custom.css" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />

    <style>
        table,
        th,
        td {
            border-collapse: collapse;
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }

        .orderList {
            text-align: center;
            padding-top: 15px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
        }

        .backR {
            background-color: lightyellow;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        tr,
        th {
            column-gap: 40px;
            border: 1px solid black;
            text-align: center;
            justify-content: center;
        }

        td {
            padding-top: 20px;
            font-family: 'poppins', sans-serif;
            border: 1px solid black;
            text-align: center;
            justify-content: center;
        }

        #align {
            padding-top: 60px;
            text-align: center;
            justify-content: center;
        }


    </style>
</head>

<body class="backR">
    <?php
    include 'include/nav.php';
    include 'include/selectDb.php';
    ?>
    <table class="table">
        <h1 class="orderList">Order List</h1>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
        <?php
        if ($resultGetOrders->num_rows > 0) {
            while ($row = $resultGetOrders->fetch_assoc()) {
                $productNameArray = explode(", ", $row['productName']);
                $qtyArray = explode(", ", $row['qty']);
                $priceArray = explode(", ", $row['price']);

                // Check if the arrays have the same number of elements
                if (count($productNameArray) === count($qtyArray) && count($productNameArray) === count($priceArray)) {
                    $rowCount = count($productNameArray);

                    // Iterate through the products, quantities, and prices
                    for ($i = 0; $i < $rowCount; $i++) {
                        $productName = $productNameArray[$i];
                        $qty = $qtyArray[$i];
                        $price = $priceArray[$i];
        ?>
                        <tr>
                            <?php if ($i === 0) { ?>
                                <td id="align" rowspan="<?php echo $rowCount; ?>"><?php echo $row['name']; ?></td>
                                <td id="align" rowspan="<?php echo $rowCount; ?>"><?php echo $row['email']; ?></td>
                                <td id="align" rowspan="<?php echo $rowCount; ?>"><?php echo $row['phone']; ?></td>
                                <td id="align" rowspan="<?php echo $rowCount; ?>"><?php echo $row['address']; ?></td>
                            <?php } ?>
                            <td><?php echo $productName; ?></td>
                            <td><?php echo $qty; ?></td>
                            <td><?php echo $price; ?></td>
                            <?php if ($i === 0) { ?>
                                <td id="align" rowspan="<?php echo $rowCount; ?>"><?php echo $row['total']; ?></td>
                                <td id="align" rowspan="<?php echo $rowCount; ?>"><?php echo $row['date']; ?></td>
                            <?php } ?>
                        </tr>
        <?php
                    }
                }
            }
            echo "</table>";
        } else {
            echo "<tr><td colspan='9'>0 result</td></tr></table>";
        }
        ?>
    </table>
</body>

</html>