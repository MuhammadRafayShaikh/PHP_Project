<?php
include "../user/connection.php";
include "header.php";
?>

<?php
$id = $_GET['Id'];
$delete = "DELETE FROM `add_products` WHERE id = $id";
$result = mysqli_query($conn, $delete);
// if ($result) {
// } else {
//     echo "<script>alert('something went wrong')</script>";
// }
?>

<?php
include "footer.php";
?>