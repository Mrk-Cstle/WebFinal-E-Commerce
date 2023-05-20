<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

</head>

<body>
    <form>
        <label for="name">Product Name: </label>
        <input type="text" name="prodName" id="name" />

        <label for="price">Price: </label>
        <input type="number" name="prodPrice" id="price" />

        <label for="file">Product Image: </label>
        <input type="file" name="prodImg" id="file" accept="image/jpeg" />

        <label for="descrpition">Product Description: </label>
        <input type="text" name="prodDescrpition" id="descrpition" />

        <input type="submit" value="Submit" />

    </form>



    <script src=" https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle form submission
            $('#createForm').submit(function(event) {
                // Prevent default form submission
                event.preventDefault();

                // Get the input values
                var name = $('#name').val();
                var price = $('#price').val();
                var file = $('#file').val();
                var description = $('#description').val();


                // Make AJAX request
                $.ajax({
                    url: 'addProdDb.php', // URL of the server-side script
                    type: 'POST',
                    data: {
                        name: name,
                        price: price,
                        file: file,
                        decription: description
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
    </script>
</body>

</html>