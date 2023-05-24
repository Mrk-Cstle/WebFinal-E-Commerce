<!DOCTYPE html>
<html lang="en">
    
<?php
    include 'include/selectDb.php';

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

    // Retrieve the item to be edited from the database
    if (isset($_GET['edit_id'])) {
        $editId = $_GET['edit_id'];
        // Replace 'your_table_name' with your actual table name
        $editQuery = "SELECT * FROM product WHERE product_id = $editId";
        $editResult = mysqli_query($conn, $editQuery);

        if (mysqli_num_rows($editResult) > 0) {
            $editRow = mysqli_fetch_assoc($editResult);
        }
    }
    ?>
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

    #Edititem {
        text-align: center;
        justify-content: center;
        margin-bottom: 10px;
        margin-left: 10px;
    }

    #Edit {
        justify-content: center;
        text-align: center;
        margin-bottom: 10px;
    }

    #New {
        margin-bottom: 10px;
        width: 25%;
        border-radius: 12px;
    }

    #newPrice {
        margin-bottom: 10px;
        width: 10%;
        margin-right: 285px;
        border-radius: 12px;
    }

    .imgPath {
        display: static;
        width: auto;
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
        padding-top: 50px;
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
            <?php if (isset($_GET['error'])) : ?>
                <p><?php echo $_GET['error']; ?></p>
            <?php endif ?>

        </form>



        <div>
   
        <?php
    // Display the form for editing if an item is being edited
    if (isset($editRow)) {
        ?>
        <h3 id="Edititem">Edit Item</h3>
        <form id="Edit" method="POST" action="updateItem.php">
            <input id="New" type="hidden" name="itemId" value="<?php echo $editRow['product_id']; ?>">
            <input id="New" type="text" name="name" value="<?php echo $editRow['fname']; ?>" placeholder="Product Name" required /><br />
            <input id="New" type="text" name="brand" value="<?php echo $editRow['brand']; ?>" placeholder="Brand" required /><br />
            <input id="newPrice" type="number" name="price" value="<?php echo $editRow['price']; ?>" placeholder="Price" required /><br />
            <textarea id="New" name="info" placeholder="Description" required><?php echo $editRow['info']; ?></textarea><br />
            <input type="submit" name="update" value="Update" class="btn btn-primary" />
        </form>
        <?php
        }
        ?>
    <h3>Product List</h3>
    <table class="table table-hover">
        <tr>
            <th>Image</th>
            <th>Product Name</th>
            <th>Brand</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($resultProd) > 0) {
            while ($row  = mysqli_fetch_assoc($resultProd)) {
                ?>

                <tr>
                    <td id="imgPath"><img src="uploads/<?= $row['file_path'] ?>"></td>
                    <td id="align"><?php echo $row['fname']; ?></td>
                    <td id="align"><?php echo $row['brand']; ?></td>
                    <td id="align"><?php echo $row['price']; ?></td>
                    <td id="align"><?php echo $row['info']; ?></td>
                    <td id="align">
                        <a class="btn btn-sm btn-dark m-2 w-75" href="?edit_id=<?php echo $row['product_id']; ?>">Edit</a>
                        <a class="btn btn-sm btn-dark" href="createStaffDelete.php?id=<?php echo $row['product_id']; ?>">Remove</a>
                    </td>
                </tr>

                <?php
            }
            echo "</table>";
        } else {
            echo "<tr><td colspan='6'>" . "0 results" . "</td></tr>";
        }
        ?>
    </table>

    
    </div>
</div>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
    function editItem(itemId) {
        // Send an AJAX request to fetch the edit form
        $.ajax({
            url: 'addProduct.php',
            type: 'POST',
            data: { id: itemId },
            success: function(response) {
                // Display the edit form in a modal or a specific area of the page
                $('#editModal').html(response);
                $('#editModal').modal('show');
            }
        });
    }
    </script>
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