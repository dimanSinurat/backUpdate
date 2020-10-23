<?php
require('koneksi.php');

$nama = "Yadiman Aprianto";

$result = mysqli_query($conn, "SELECT * FROM categories LIMIT 4");
if ($result === false){
    echo "not connected";
}

$article = mysqli_query($conn, "SELECT * FROM article ORDER BY id DESC");
$articleDua = mysqli_query($conn, "SELECT * FROM article ORDER BY id DESC");
$sideCategory = mysqli_query($conn, "SELECT * FROM article LIMIT 3 ");
$about = mysqli_query($conn, "SELECT * FROM about");
$aboutList = mysqli_fetch_assoc($about);

$disclaimer = mysqli_query($conn, "SELECT * FROM disclaimer");
$disclaimerList = mysqli_fetch_assoc($disclaimer);

$banner = mysqli_query($conn, "SELECT * FROM bannerText");
$bannerList = mysqli_fetch_assoc($banner);

?>