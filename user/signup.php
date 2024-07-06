<?php
include "connection.php";
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
    .msg {
        color: red;
    }
</style>

<body>
    <form method="post" enctype="multipart/form-data" id="signup_form">

        <h1>Sign Up</h1>
        <p>Please fill in this form to create an account.</p>

        <input type="text" placeholder="Enter Name" name="name" class="form-control" id="name" required>
        <p id="name_msg" class="msg"></p>

        <input type="text" placeholder="Enter Number" name="number" class="form-control" id="number" required>
        <p id="number_msg" class="msg"></p>

        <input type="text" placeholder="Enter Address" name="address" class="form-control" id="address" required>
        <p id="address_msg" class="msg"></p>

        <input type="email" placeholder="Enter Email" name="email" class="form-control" id="email" required>
        <p id="email_msg" class="msg"></p>

        <input type="password" placeholder="Enter Password" name="password" class="form-control" id="password" required>
        <p id="password_msg" class="msg"></p>

        <input type="file" class="form-control" name="img" required>

        <button type="submit" class="btn btn-success" name="btn_signup">Sign Up</button>

    </form>

    <?php
    if (isset($_POST['btn_signup'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $img = $_FILES['img'];
        $filename = $_FILES['img']['name'];
        $temp_name = $img['tmp_name'];
        move_uploaded_file($temp_name, "Template_Img/$filename");

        $insert = "INSERT INTO signup(name, number, address, email, password, img) VALUES ('$name','$number','$address','$email','$password','$filename')";

        $result = mysqli_query($conn, $insert);

        if ($result) {
            echo "<script>alert('Successfully Registered')</script>";
            echo "<script>window.location.href='login.php'</script>";
        } else {
            echo "<script>alert('something went wrong')</script>";
        }
    }
    ?>

    <script>
        var signup_form = document.getElementById('signup_form');
        signup_form.addEventListener('submit', function(event) {
            if (!validation()) {
                event.preventDefault();
            } else {
                alert("Validation is true");
            }
        })


        function validation() {
            var name = document.getElementById('name').value;
            var number = document.getElementById('number').value;
            var address = document.getElementById('address').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            var name_msg = document.getElementById('name_msg');
            var number_msg = document.getElementById('number_msg');
            var address_msg = document.getElementById('address_msg');
            var email_msg = document.getElementById('email_msg');
            var password_msg = document.getElementById('password_msg');

            const small = /[a-z]/;
            const capital = /[A-Z]/;
            const number_Validation = /[\d]/;
            const special_C = /[~!@#$%^&*()_+]/;
            const email_Validation = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // Name Validation
            if (name === "") {
                name_msg.innerText = "Please enter name";
                return false;
            } else {
                name_msg.innerText = "";
            }

            // Number Validation
            if (number === "") {
                number_msg.innerText = "Please enter numbers";
                return false;
            } else if (number.length != 11) {
                number_msg.innerText = "Please enter 11 numbers";
                return false;
            } else {
                number_msg.innerText = "";
            }

            // Address Validation
            if (address === "") {
                address_msg.innerText = "Please enter address";
                return false;
            } else {
                address_msg.innerText = "";
            }

            // Email Validation
            if (!email_Validation.test(email)) {
                email_msg.innerText = "Invalid email format";
                return false;
            } else {
                email_msg.innerText = "";
            }

            // Password Validation
            var password_error = [];
            if (!small.test(password)) {
                password_error.push(" at least one small character");
            }
            if (!capital.test(password)) {
                password_error.push(" at least one capital character");
            }
            if (!number_Validation.test(password)) {
                password_error.push(" at least one number");
            }
            if (!special_C.test(password)) {
                password_error.push(" at least one special character");
            }
            if (password_error.length > 0) {
                password_msg.innerText = "Password must contain:" + password_error;
                return false;
            }
            return true;
        }
    </script>


</body>

</html>