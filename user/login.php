<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
    input,
    button {
        margin: 25px;
    }
</style>

<body>
    <div class="container">
        <form method="post">

            <h1 class="text-center">Login</h1>
            <p class="text-center">Please fill this form to sign in the account.</p>


            <input type="text" placeholder="Enter Email" class="form-control" name="email" id="email" required>

            <input type="password" placeholder="Enter Password" class="form-control" name="password" id="password" required>

            <button type="submit" class="btn btn-primary" name="btn_signup">Sign Up</button>

        </form>
    </div>

    <?php
    if (isset($_POST['btn_signup'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = "SELECT * FROM `signup` WHERE email = '$email' and password = '$password'";

        $result = mysqli_query($conn, $select);

        if (mysqli_num_rows($result)) {
            $_SESSION['email'] = $email;
            echo "<script>window.location.href='index.php'</script>";
        } else {
            echo "<script>alert('Incorrect Email or Password')</script>";
        }
    }
    ?>
</body>

</html>