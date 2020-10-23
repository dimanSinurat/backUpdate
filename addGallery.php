<?php
include('koneksi/conn.php');
include('header.html');

if(isset($_POST['submit'])){
    $caption = $_POST["caption"];
    $myphoto = "gallery/" . $_FILES["myphoto"]["name"];
    $tmp_name = $_FILES["myphoto"]["tmp_name"];

    move_uploaded_file($tmp_name, "../".$myphoto);

    $cek = mysqli_query($conn, "SELECT nama from gallery WHERE nama = '$myphoto' ");
   

    if(mysqli_num_rows($cek) > 0){
        echo "<script>alert('Foto sudah ada sebelumnya')</script>";
    } else {
        echo "<script>alert('Foto berhasil ditambah')</script>";
        $query = mysqli_query($conn, "INSERT INTO gallery (id, nama, caption) VALUES ('','$myphoto','$caption')");
        if ($query){
            echo 
            "<script>
            alert('Photo berhasil ditambah');
            </script>";
            header('location:dashboard.php');
        } else {
            echo 
            "<script>
            alert('Photo gagal ditambah');
            </script>";
        }
    }

    
}
?>

<style>
    button{
        width:auto;
        padding:10px;
        height:35px;
        background-color:black;
        color:white;
        border:none;
        border-radius:4px;
        letter-spacing: 3px;
        text-transform:uppercase;
        margin-top:10px;
    }
    .btn2{
        width:auto;
        padding:10px;
        height:35px;
        background-color:blue;
        color:white;
        border:none;
        border-radius:4px;
        letter-spacing: 3px;
        text-transform:uppercase;
        margin-top:10px;
    }
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
        <a href="manageGallery.php"><button class="btn2">Manage your Gallery</button></a>
        <h1>Add Gallery</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mt-5">
                <input type="file" class="input2" name="myphoto">
                <input type="text" class="input mt-3" placeholder="caption" name="caption">
                <button class="btn btn-primary mt-2" type="submit" name="submit">ADD</button>
            </div>

        </form>
    </div>

<?php include('footer.html'); ?>