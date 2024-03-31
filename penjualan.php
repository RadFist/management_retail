<?php
include 'component/connection.php';
include 'function.php';
session_start();
$dataPenjualan = getPenjualan($connect);
$title = "penjualan";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    
    
    <link rel="stylesheet" href="datatables/datatables.css">
    <script src="datatables/datatables.js"></script>
    <title><?= $title ?></title>
</head>

<body>
    <?php include 'component/sidebar.php'; ?>
    
    <div class="main--content">
        <?php include 'component/header.php'; ?>
        
        <div class="card--container">
            <!-- table start -->
            <div class="btn_penjualan">
                <a href="input_component/input_penjualan.php" class=" button btn m-3"><i class="fas fa-plus-square me-2"></i>Tambah Data</a>
                <button class=" button-rekap m-3 me-0 btn" onclick="pop_up()"><i class="fas fa-plus-square me-2"></i>Rekap Penjualan</button>
            </div>
            <table id="tableformat" class="table table-striped table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="col">produk</th>
                    <th scope="col">terjual</th>
                    <th scope="col">tanggal</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- loop start -->
                <?php  
        foreach ($dataPenjualan as $tampil):
            ?>
        <tr>
            <td><?= $tampil['produk']; ?></td>
            <td><?= $tampil['terjual']; ?></td>
            <td><?= $tampil['tanggal']; ?></td>
            <td>
                <a href="input_component/input_penjualan.php?edit_penjualan=<?= $tampil['id']?>" type="button"><i class="fa fa-pen"></i></a>
                <!-- delete -->
                <a href="logic/delete.php?delete_penjualan=<?= $tampil['id'] ?>"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php endforeach; ?>
        <!-- loop end -->
    </tbody>
</table>


<!-- table end -->
</div>

<!-- pop up box -->
<div class="pop-up-container" id="popbox">
    <button class="x_btn" onclick="close_pop()" type="button">
        <span class="x"></span>
        <span class="x"></span>
    </button>
    <div class="pop-content">
        <h4>peringatan!!</h4>
        <p>data disini akan dipindahkan apa anda yakin?</p>
        <a href="#" class=" button mb-3 btn ">lanjutkan</a>
      
    </div>
</div>

</div>

<script src="script.js"></script>
<script>
    $(document).ready(function()
    {
        $('#tableformat').DataTable({
            "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ]
        });
    })
</script>
</body>


<!-- table format -->
</html>