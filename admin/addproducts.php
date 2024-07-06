<?php
include "../user/connection.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>ADD Player</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Name</label>
                <input type="text" class="form-control" placeholder="Enter Product Name:" name="p_name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Product Price</label>
                <input type="text" class="form-control" placeholder="Enter Product Price:" name="price">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Prodcut Image</label>
                <input type="file" class="form-control" name="img">
            </div>
            <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
        </form>
    </div>

    <?php
    if (isset($_POST['add_product'])) {
        $p_name = $_POST['p_name'];
        $price = $_POST['price'];
        $img = $_FILES['img'];
        $filename = $_FILES['img']['name'];
        $temp_name = $img['tmp_name'];
        move_uploaded_file($temp_name, "../P_Img/$filename");

        $insert = "INSERT INTO add_products(p_name, price, img) VALUES ('$p_name','$price','$filename')";

        $result = mysqli_query($conn, $insert);

        if ($result) {
            echo "<script>alert('Successfull')</script>";
            echo "<script>window.location.href='showproduct.php'</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }
    }
    ?>
    <?php include "footer.php"?>
</body>

</html>