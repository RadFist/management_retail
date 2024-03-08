<?php
include 'component/connection.php';
include 'function.php';

$dataProduk = getAllData($connect,"tb_produk");
$title = "produk";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>produk</title>

</head>
<body>

    <?php 
    include 'component/sidebar.php';
    ?>


    <div class="main--content">
    
    <?php 
    include 'component/header.php';
    ?>

    <!-- table start -->
    <a href="#"><i class="fas fa-plus-square me-2"></i>Tambah Data</a>
    <table id="tableformat" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">produk</th>
            <th scope="col">jumlah</th>
            <th scope="col">harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        
        <?php  
        foreach ($dataProduk as $tampil):
        ?>
        
        <tr>
            <td><?= $tampil['nama_produk']; ?></td>
            <td> Rp.<?= $tampil['jumlah']; ?></td>
            <td><?= $tampil['harga']; ?></td>
            <td>
                <a class="me-2 edit link-light" href="#" type="button"><i class="fa fa-pen" aria-hidden="true"></i></a>
                <!-- delete -->
                <a href="#"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>

    </tbody>
    </table>
<!-- table end -->

    </div>
    
    
 <script src="script.js"></script>
</body>

</html>