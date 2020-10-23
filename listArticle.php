<?php
include('koneksi/conn.php');
include('header.html');
$category = $_GET["id"];
$query = mysqli_query($conn, "SELECT title,id FROM article WHERE category = '$category'");


?>
<style>
    table{
        border-collapse:collapse;
        padding:10px;
        width:100%;
    }
    table th{
        padding:10px;
        background-color:lavender;
        text-transform:uppercase;
    }
    table td{
        padding:10px;
        border:1px solid lavender;
    }
    .warning{
        width:auto;
        height:35px;
        background-color:orange;
        color:white;
        border:none;
        border-radius:4px;
        letter-spacing: 1px;
        text-transform:uppercase;
        padding:10px;
    }
    .danger{
        width:auto;
        height:35px;
        background-color:red;
        color:white;
        border:none;
        border-radius:4px;
        letter-spacing: 1px;
        text-transform:uppercase;
        padding:10px;
    }
</style>

    <div class="container">
        <div class="mt-3">
            <h1><a href="manageArticle.php" style="color:#000;text-decoration:none;">Manage Article / </a><?= $category ?></h1>


            <table class="table">
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($query)) : ?>
                        <tr>
                            <td><?= $row["title"] ?></td>
                            <td><a href="editArticle.php?go=<?= $row["id"]?>"><button class="warning"> <i class="fas fa-edit"></i> EDIT</button></a></td>
                            <td><a href="deleteArticle.php?go=<?= $row["id"]?>"><button class="danger"> <i class="fas fa-trash"></i> DELETE</button></a></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('footer.html'); ?>