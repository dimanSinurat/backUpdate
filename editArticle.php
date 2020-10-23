<?php
include('koneksi/conn.php');
include('header.html');

$go = $_GET["go"];
$query = mysqli_query($conn, "SELECT * FROM article WHERE id = $go");
$view = mysqli_fetch_assoc($query);

$category = mysqli_query($conn, "SELECT * FROM categories");


if (isset($_POST['edit'])){

    $title  = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];

    $thumb = "img/adaHakcipta/" . $_FILES["thumb"]["name"];
    $tmp_name = $_FILES["thumb"]["tmp_name"];

    move_uploaded_file($tmp_name, "../".$thumb);

    $article = $_POST["article"];
    $dates = date('Y-m-d');
    $comment = "tes";
    $nameHidden = $_POST["nameHidden"];
   
    if ($thumb == "img/adaHakcipta/" ){
        // foto lama
        $edit = "UPDATE article SET picture = '$nameHidden', title = '$title', author = '$author', category = '$category', comment = '$comment', date = '$dates', text = '$article' WHERE id = $go";
        mysqli_query($conn, $edit);
        echo 
        "<script> alert('Data berhasil diedit'); </script>";
        header("location:manageArticle.php");
    } else {
        // foto baru
        $edit = "UPDATE article SET picture = '$thumb', title = '$title', author = '$author', category = '$category', comment = '$comment', date = '$dates', text = '$article' WHERE id = $go";
        mysqli_query($conn, $edit);
        echo 
        "<script> alert('Data dan foto berhasil diedit'); </script>";
        header("location:manageArticle.php");
    }

    
}

?>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
    button{
        width:100px;
        height:35px;
        background-color:black;
        color:white;
        border:none;
        border-radius:4px;
        letter-spacing: 3px;
        text-transform:uppercase;
        margin-top:10px;
    }
</style>

    <div class="container">
        <h1 class="mt-5">Edit article</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Title</label>
            <input type="text" class="input" value="<?= $view["title"] ?>" name="title">

            <label for="">Author</label>
            <input type="text" class="input"  value="<?= $view["author"]; ?>" name="author">

            <label for="category" >Category</label>
            <select name="category" id="" class="input2">
                    <option  value="<?= $view["category"]; ?>"><?= $view["category"]; ?></option>
                <?php while($row = mysqli_fetch_assoc($category)) : ?>
                    <option value="<?= $row["category"] ?>"><?= $row["category"] ?></option>
                <?php endwhile; ?>
            </select>
            <br>
            <label for="">Thumbnail</label>
            <div style="width:300px; height:300px; overflow:hidden;">
                <img src="../<?= $view["picture"] ?>" alt="" style="width:100%;">
            </div>
            <input type="hidden" value="<?= $view["picture"] ?>" name="nameHidden">
            <input type="file" class="input2" placeholder="title" name="thumb"><br>
            
            <label for="isi">Article</label>
            <textarea name="article" id="isi" cols="30" rows="10" class="ckeditor"><?= $view["text"] ?></textarea>
            <button type="submit" name="edit" class="btn btn-primary mt-2">POST</button>
        </form>
    </div>

<?php include('footer.html'); ?>