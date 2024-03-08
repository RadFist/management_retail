<?php
include 'component/connection.php';
include 'function.php';

$dataKaryawan = getAllData($connect,"tb_karyawan");
$title = "Karyawan";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <title>Karyawan</title>

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
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telp</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        
        <?php  
        foreach ($dataKaryawan as $tampil):
        ?>
        
        <tr>
            <td><?= $tampil['Nama']; ?></td>
            <td><?= $tampil['alamat']; ?></td>
            <td><?= $tampil['np']; ?></td>
            <td><?= $tampil['jenis_kelamin']; ?></td>
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