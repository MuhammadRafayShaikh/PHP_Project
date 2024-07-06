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
<style>
    img {
        height: 100px;
    }
</style>

<body>
    <table class="table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $select = "SELECT * FROM `add_products`";
            $result = mysqli_query($conn, $select);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['p_name'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                    <td><img src="../P_Img/<?php echo $row['img'] ?>" alt=""></td>
                    <td><a href="editproduct.php?Id=<?php echo $row['id'] ?>" class="btn btn-warning">Edit</a></td>
                    </td>
                    <td><a href="deleteproduct.php?Id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    include "footer.php";
    ?>
</body>

</html>