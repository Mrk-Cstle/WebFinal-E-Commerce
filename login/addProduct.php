<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico" />

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/templatemo.css" />
    <link rel="stylesheet" href="../assets/css/custom.css" />

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="assets/css/fontawesome.min.css" />

</head>

<body>
    <?php
    include 'include/nav.php'; ?>
    <?php if (isset($_GET['error'])) : ?>
        <p><?php echo $_GET['error']; ?></p>
    <?php endif ?>
    <form action="addProdDb.php" method="POST" enctype="multipart/form-data">

        <label for="prodName">Product Name: </label>
        <input type="text" name="prodName" id="prodName" />

        <label for="brand">Brand: </label>
        <input type="text" name="brand" id="brand" />

        <label for="prodPrice">Price: </label>
        <input type="number" name="prodPrice" id="prodPrice" />

        <label for="my_image">Product Image: </label>
        <input type="file" name="my_image">

        <label for="prodDescrpition">Product Description: </label>
        <input type="text" name="prodDescrpition" id="prodDescrpition" />

        <input type="submit" name="submit" value="Upload">

    </form>


    <div>
        <?php
        include 'include/selectDb.php';
        ?>
        <h3>Product List</h3>
        <table>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Description</th>
            </tr>
            <?php
            if (mysqli_num_rows($resultProd) > 0) {

                while ($row  = $resultProd->fetch_assoc()) {

            ?>

                    <tr>
                        <td><img src="uploads/<?= $row['file_path'] ?>"></td>
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['brand']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['info']; ?></td>
                        <td><a href="createStaffDelete.php?id=<?php echo $row['product_id']; ?>">Remove</a></td>

                    </tr>




            <?php
                }
                echo "</table>";
            } else {
                echo "<tr><td>" . "0 result" . "</td><td></table>";
            }
            ?>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- <script>
        $(document).ready(function() {
            // Handle form submission
            $('#createForm').submit(function(event) {
                // Prevent default form submission
                event.preventDefault();

                // Get the input values
                var pname = $('#prodName').val()
                var price = $('#prodPrice').val();
                var file = $('#prodImg').val();
                var description = $('#prodDescrpition').val();


                // Make AJAX request
                $.ajax({
                    url: 'addProdDb.php', // URL of the server-side script
                    type: 'POST',
                    data: {
                        pname: pname,
                        price: price,
                        file: file,
                        description: description
                    }, // Data to be sent to the server
                    success: function(response) {
                        // Handle success response
                        console.log(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(error);
                    }
                });
            });
        });
    </script> -->
</body>

</html>