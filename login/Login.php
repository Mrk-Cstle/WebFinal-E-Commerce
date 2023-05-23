<?php

include 'include/dbConnection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    // Perform database query to check login credentials
    $loginQuery = "SELECT * FROM login WHERE user = '$userName' AND password = '$password'";
    $result = mysqli_query($conn, $loginQuery);

    if (mysqli_num_rows($result) == 1) {
        // Valid login credentials
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user'] = $row['user'];
        $_SESSION['logged_in'] = true;
        session_start();
        header("location: addProduct.php");
        exit;
    } else {
        // Invalid login credentials
        $error = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Log.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <title>RRMM | Login</title>
</head>

<div class="box">
    <div class="container">
        <div class="top">
            <header>Login</header>
            <form id="myForm" method="POST" action="">
                <?php if (isset($error)) { ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php } ?>
                <div class="input-field">
                    <input type="text" class="input" placeholder="Username" name="userName">
                    <i class='bx bx-user'></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" name="password">
                    <i class='bx bx-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>


</body>

</html>