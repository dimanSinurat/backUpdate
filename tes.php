<?php
include('php/koneksi.php');
$query = mysqli_query($conn, "SELECT * FROM categories");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $ar = [1,11,3,4,5,6,7,9];
        echo $ar[2]
    ?>
</body>
</html>