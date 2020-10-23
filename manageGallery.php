<?php
include('koneksi/conn.php');
include('header.html');
$query = mysqli_query($conn, "SELECT * FROM gallery");
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
        <h1 class="mt-5"><a href="addGallery.php" style="color:black;text-decoration:none;">Add Gallery </a> / Manage Gallery</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Edit Caption</th>
                    <th>Delete Image</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td style="width:90%;"><a href="../<?= $row["nama"] ?>"><?= $row["nama"] ?></a></td>
                        <td><a href="editGallery.php?id=<?= $row["id"] ?>"><button class="warning">EDIT</button></a></td>
                        <td><a href="deleteGallery.php?id=<?= $row["id"] ?>"><button class="danger">DELETE</button></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        
    </div>

<?php include('footer.html'); ?>