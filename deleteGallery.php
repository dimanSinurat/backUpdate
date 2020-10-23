<?php
include('koneksi/conn.php');
$id = $_GET["id"];
$query = mysqli_query($conn, "DELETE FROM gallery WHERE id = $id");

if($query){
    header("location:manageGallery.php");
    echo "<script>alert('data berhasil dihapus)</script>";
} else {
    echo "<script>alert('data gagal dihapus)</script>";
}

?>