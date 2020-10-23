<?php
include('koneksi/conn.php');
include('header.html');
$id = $_GET["id"];
$view = mysqli_query($conn, "SELECT * FROM gallery WHERE id = $id");
$bongkarView = mysqli_fetch_assoc($view);

if(isset($_POST['submit'])){
    $namaHidden = $_POST["namaHidden"];
    $caption = $_POST["caption"];
    $myphoto = "gallery/" . $_FILES["myphoto"]["name"];
    $tmp_name = $_FILES["myphoto"]["tmp_name"];

    move_uploaded_file($tmp_name, "../".$myphoto);

    $cek = mysqli_query($conn, "SELECT nama from gallery WHERE nama = '$myphoto' ");
   

    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Foto sudah ada sebelumnya')</script>";
    } else {
        if ($myphoto == "gallery/" ){
            echo "<script>alert('Caption berhasil diedit')</script>";
            $query = mysqli_query($conn, "UPDATE gallery SET nama = '$namaHidden',caption = '$caption' WHERE id = $id");
            header("location:manageGallery.php");
        
        } else {
            echo "<script>alert('Foto berhasil ditambah')</script>";
            $query = mysqli_query($conn, "UPDATE gallery SET nama = '$myphoto',caption = '$caption' WHERE id = $id");
            header("location:manageGallery.php");
        }

    }

    
}
?>
    <style>
         .input{
        display: block;
    width: 90%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    margin-bottom:10px;
    }
    .input2{
        display: inline-block;
    width: 30%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    margin-bottom:10px;
    }
    </style>

    <div class="container mt-5">
        
        <h1><a href="manageGallery.php" style="color:black;text-decoration:none;">Add Gallery </a>/ <a href="manageGallery.php" style="color:black;text-decoration:none;">Manage Gallery </a>/  Edit </h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-5">
                <div style="width:300px; height:300px; overflow:hidden;">
                    <img src="../<?= $bongkarView["nama"] ?>" alt="" style="width:100%;">
                </div>
                <input type="hidden" value="<?= $bongkarView["nama"] ?>" name="namaHidden">
                <input type="file" class="input2" name="myphoto" value="<?= $bongkarView["nama"] ?>">
                <input type="text" class="input" placeholder="caption" name="caption" value="<?= $bongkarView["caption"] ?>">
                <button class="btn btn-primary mt-2" type="submit" name="submit">ADD</button>
            </div>

        </form>
    </div>

<?php include('footer.html'); ?>