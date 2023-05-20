<?php
// Retrieve the data from the AJAX request
$pName = $_POST['pname'];
$price = $_POST['price'];
$file = $_POST['file'];
$description = $_POST['description'];

// Perform database operations here
include "include/dbConnection.php";
$uploadQuery = "INSERT INTO product (fname, price,file_path, info ) VALUES ('$pName','$price','$file' ,'$description')";

$filename = $_FILES["$pName"]["name"];
$tempname = $_FILES["$pName"]["tmp_name"];
$folder = "prodImage/" . $filename;

if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}

mysqli_query($conn, $uploadQuery);

// Connect to the database, execute queries, etc.

// Return a response
if ($name && $email && $phone) {
    // Data is created successfully
    $response = "Record created successfully!";
} else {
    // Error occurred during creation
    $response = "Failed to create record!";
}

// Send the response back to the AJAX request
echo $response;





// Now let's move the uploaded image into the folder: image
