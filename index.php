<?php
include 'component/connection.php';
include 'function.php';
$title = "Dashboard";


//product total count database
$produk_total = getTotalCount($connect, 'tb_produk', 'id_produk');
//supplier total count database
$supplier_total = getTotalCount($connect, 'tb_supplier', 'id_supplier');
//karyawan total count database
$karyawan_total = getTotalCount($connect, 'tb_karyawan', 'id_karyawan');


?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title> Dashboard | Retail</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
</head>

<body>
    <?php 
    include 'component/sidebar.php';
    ?>

    
    <div class="main--content">
    
    <?php 
    include 'component/header.php';
    ?>

        <!-- card -->
        <div class="card--container">
            <h3 class="main--title">Data</h3>
            <div class="card--wrapper">
                <div class="payment--card dark-red">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">1</span>
                            <span class="amount-value">Produk</span>
                        </div>
                        <i class="fas fa-archive"></i>
                    </div>
                    <span class="card-detail"><?php echo"$produk_total";?></span>
                </div>

                <div class="payment--card dark-green">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">2</span>
                            <span class="amount-value">Supplier</span>
                        </div>
                        <i class="fas fa-cart-plus"></i>
                    </div>
                    <span class="card-detail"><?php echo"$supplier_total";?></span>
                </div>

                <div class="payment--card dark-blue">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">3</span>
                            <span class="amount-value">Karyawan</span>
                        </div>
                        <i class="fas fa-user"></i>
                    </div>
                    <span class="card-detail"><?php echo"$karyawan_total";?></span>
                </div>

                <div class="payment--card dark-purple">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">4</span>
                            <span class="amount-value">Laba Kotor</span>
                        </div>
                        <i class="fas fa-book"></i>
                    </div>
                    <span class="card-detail">0</span>
                </div>

            </div>
        </div>

        <div class="card--container">
            <div class="card--chart">
                <div class="chart">
                    <h3 class="main--title">Statistik</h3>
                    <h3 class="main--title right" id="tahun">Tahun</h3>
                    <canvas id="lineChart"></canvas>
                </div>
            </div>
        </div>        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js"></script>
    <?php include "component/chart1.php";?>
        
    </div>

    <script src="script.js"></script>
</body>

</html>