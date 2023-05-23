<?php
include "include/dbConnection.php";
session_start();
// Retrieve the data from the AJAX request

// Perform database operations here
$pName = $_POST['prodName'];
$price = $_POST['prodPrice'];
$brand = $_POST['brand'];
$description = $_POST['prodDescrpition'];

if (isset($_POST['submit']) && isset($_POST['prodName']) && isset($_FILES['my_image'])) {


    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";



    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 1250000) {
            $em = "Sorry, your file is too large.";
            header("Location: addProduct.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $uploadQuery = "INSERT INTO product (fname, price,file_path, info,brand ) VALUES ('$pName','$price','$new_img_name' ,'$description', '$brand')";
                mysqli_query($conn, $uploadQuery);

                header("Location: view.php");
            } else {
                $em = "You can't upload files of this type";
                header("Location: addProduct.php?error=$em");
            }
        }
    } else {
        $em = "unknown error occurred!";
        header("Location: addProduct.php?error=$em");
    }
} else {
    header("Location: addProduct.php");
}



// Connect to the database, execute queries, etc.

// Return a response
