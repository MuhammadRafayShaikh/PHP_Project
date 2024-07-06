<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $name = "Rafay";
    unset($name);  // Yahan $name variable ko unset (remove) kar diya gaya hai
    if (isset($name)) {
        echo "Variable 'name' is set";
    } else {
        echo "Variable 'name' is not set";
    }

    ?>
</body>

</html>