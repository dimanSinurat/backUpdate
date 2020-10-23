<?php
include('koneksi/conn.php');

$id = $_GET["go"];
echo "<script>confirm('yakin ingin menghapus?')</script>";
$query = mysqli_query($conn, "DELETE FROM article WHERE id = $id");

if($query){
    echo "<script>alert('Data berhasil dihapus')</script>";
    header("location:manageArticle.php");
    
} else {
    echo "<script>alert('Data gagal dihapus')</script>";
}

?>
