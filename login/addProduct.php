<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

</head>

<body>
    <form id="createForm" action="addProdDb.php">
        <label for="prodName">Product Name: </label>
        <input type="text" name="prodName" id="prodName" />

        <label for="prodPrice">Price: </label>
        <input type="number" name="prodPrice" id="prodPrice" />

        <label for="prodImg">Product Image: </label>
        <input type="file" name="prodImg" id="prodImg" />

        <label for="prodDescrpition">Product Description: </label>
        <input type="text" name="prodDescrpition" id="prodDescrpition" />

        <input type="submit" value="Submit" />

    </form>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
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
    </script>
</body>

</html>