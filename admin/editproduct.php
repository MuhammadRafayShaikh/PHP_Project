<?php
include "../user/connection.php";
include "header.php";

?>
<style>
    img {
        height: 100px;
    }
</style>

<?php
$id = $_GET['Id'];
$select = "SELECT * FROM `add_products` WHERE id = $id";
$result = mysqli_query($conn, $select);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
    <h1>Edit Product</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prodcut Name</label>
            <input type="text" class="form-control" placeholder="Enter Product Name:" name="p_name" value="<?php echo $row['p_name'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prodcut Price</label>
            <input type="text" class="form-control" placeholder="Enter Product Price:" name="price" value="<?php echo $row['price'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prodcut Image</label>
            <input type="file" class="form-control" name="img" value="<?php echo $row['img'] ?>">
            <img src="../P_Img/<?php echo $row['img'] ?>" alt="">
        </div>
        <button type="submit" name="update_product" class="btn btn-primary">Update Player</button>
    </form>
</div>

<?php
if (isset($_POST['update_product'])) {
    $p_name = $_POST['p_name'];
    $price = $_POST['price'];
    $img = $_FILES['img'];
    $filename = $_FILES['img']['name'];
    $temp_name = $img['tmp_name'];
    move_uploaded_file($temp_name, "../P_Img/$filename");


    
    if ($filename == "") {
        $update = "UPDATE add_products SET p_name = '$p_name', price = '$price' where id = $id";
    } else {
        $update = "UPDATE add_products SET p_name = '$p_name', price = '$price', img='$filename' where id = $id ";
    }

    $result = mysqli_query($conn, $update);

    if ($result) {
        echo "<script>window.location.href='showproduct.php'</script>";
    } else {
        echo "<script>alert('Something went wrong')</script>";
    }
}
include "footer.php";
?>