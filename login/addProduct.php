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

<style>
.backR {
    background-color: lightyellow;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}
.prodName {
    padding: 12px 0px 10px 10px;
    font-family: Arial, Helvetica, sans-serif;
    width: 40%;
    margin-left: 50px;
}

.prodInput {
    padding: 6px 0 10px 10px;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 12px;
    width: 30%;
    margin-left: 50px;
}

.prodPrice {
    padding: 6px 0 10px 10px;
    font-family: Arial, Helvetica, sans-serif;
    border-radius: 12px;
    width: 17%;
    margin-left: 50px;
}

.prodUpload {
    margin-bottom: 20px;
    margin-left: 50px;
    font-family: Arial, Helvetica, sans-serif;
}

p {
    margin-left: 50px;
    margin-bottom: 50px;
    font-size: 20px;
    font-weight: bolder;
    font-family: Arial, Helvetica, sans-serif;
    
}

.imgPath {
    display: static;
    width: auto;
}

tr, th{
    column-gap: 40px;
    border: 1px solid black;
    text-align: center;
    justify-content: center;
}

td {
    padding-top: 20px;
    font-family: 'poppins' ,sans-serif;
    border: 1px solid black;
    text-align: center;
    justify-content: center;
}

#align {
    padding-top: 90px;
    text-align: center;
    justify-content: center;
}

h3 {
    margin-left: 60px;
    display: flex;
}

img {
    width: auto;
    height: 200px;
}

</style>

<body>
    <?php
    include 'include/nav.php'; ?>
    <?php if (isset($_GET['error'])) : ?>
    <?php endif ?>
    <div class="backR">
    <form action="addProdDb.php" method="POST" enctype="multipart/form-data">

        <label class="prodName d-flex" for="prodName">Product Name: </label>
        <input class="prodInput d-flex" type="text" name="prodName" id="prodName" />

        <label class="prodName d-flex" for="brand">Brand: </label>
        <input class="prodInput d-flex" type="text" name="brand" id="brand" />

        <label class="prodName d-flex" for="prodPrice">Price: </label>
        <input class="prodPrice d-flex" type="number" name="prodPrice" id="prodPrice" />

        <label class="prodName d-flex" for="my_image">Product Image: </label>
        <input class="prodInput d-flex" type="file" name="my_image">

        <label class="prodName d-flex" for="prodDescrpition">Product Description: </label>
        <input class="prodInput d-flex" type="text" name="prodDescrpition" id="prodDescrpition" />

        <input class="prodUpload d-flex mt-4" type="submit" name="submit" value="Upload">
        <p><?php echo $_GET['error']; ?></p>

    </form>

    <div>
        <?php
        include 'include/selectDb.php';
        ?>
        <h3>Product List</h3>
        <table class="table table-hover">
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
                        <td id="imgPath"><img src="uploads/<?= $row['file_path'] ?>"></td>
                        <td id="align"><?php echo $row['fname']; ?></td>
                        <td id="align"><?php echo $row['brand']; ?></td>
                        <td id="align"><?php echo $row['price']; ?></td>
                        <td id="align"><?php echo $row['info']; ?></td>
                        <td id="align"><a href="createStaffDelete.php?id=<?php echo $row['product_id']; ?>">Remove</a></td>

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