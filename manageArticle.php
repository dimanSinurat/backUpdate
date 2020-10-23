<?php
include('koneksi/conn.php');
include('header.html');

$query = mysqli_query($conn, "SELECT * FROM categories");
?>

<style>
     a{
        text-decoration:none;
        color:#fff;
    }
    li{
        background-color:#888;
        margin-bottom:10px;
        padding:20px;
    }
    li:hover{
        background: linear-gradient(to right, green,white);
    }
</style>

    <div class="container">
        <div class="mt-3">
            <h1>Manage Article</h1>

        <ul class="list-group mt-5">
        <?php while($row = mysqli_fetch_assoc($query)) : ?>
           <a href="listArticle.php?id=<?= $row["category"] ?>">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $row["category"] ?>
                </li>
           </a>
            <?php endwhile; ?>
           
        </ul>

        </div>
            


    </div>

<?php include('footer.html'); ?>