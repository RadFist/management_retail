<?php


function getTotalCount($connect, $table, $column) {
    $query = "SELECT COUNT($column) as total FROM $table";
    $sql = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($sql);

    return $result['total'];
}

 function getAllData($connect,$table){
    $query = "SELECT * FROM $table";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}

 function getproductData($connect){
    $query = "SELECT  p.*,
    COALESCE(SUM(r.jumlah_restok)+p.jumlah, p.jumlah) AS total_stock,
    k.kategori as kategori
    FROM tb_produk p
    LEFT JOIN tb_restok r ON r.id_produk = p.id_produk
    LEFT JOIN tb_kategori k ON k.id_kategori = p.id_kategori
    GROUP by p.id_produk";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}
 function getAllSupplier($connect){
    $query = "SELECT `id_supplier`, `Nama` FROM `tb_supplier`";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}

function getAllProduct($connect){
    $query = "SELECT `id_produk`, `nama_produk` FROM `tb_produk`";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}

function getAllKategori($connect){
    $query = "SELECT * FROM `tb_kategori`";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}

 function getAllDatabyid($connect,$table,$column,$id){
    $query = "SELECT * FROM $table WHERE $column = $id";
    $sql = mysqli_query($connect,$query);
    $result = mysqli_fetch_assoc($sql);
    return $result;
}

function total_laba_kotor($connect){
    $query = "SELECT SUM(COALESCE((r.jumlah_restok + p.jumlah), p.jumlah) * p.harga) AS total
    FROM tb_produk p
    LEFT JOIN tb_restok r ON r.id_produk = p.id_produk;";
    $sql = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($sql);
    return $result['total'];
}


function getDataStockIn($connect){
    $query = "SELECT  r.id_restok as id,
    r.jumlah_restok AS jumlah,
    r.tanggal AS tanggal,
    p.nama_produk AS produk,
    s.nama AS nama
FROM tb_restok r
JOIN tb_produk p ON r.id_produk = p.id_produk
JOIN tb_supplier s ON r.id_supplier = s.id_supplier
    ";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}


function getPenjualan($connect){
    $query = "SELECT  j.id_penjualan as id,
    j.id_produk as id_produk,
    p.nama_produk AS produk,
    j.penjualan as terjual,
    j.tanggal AS tanggal
FROM tb_penjualan_harian j
JOIN tb_produk p ON j.id_produk = p.id_produk
    ";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}
function getRecord($connect){
    $query = "SELECT  r.id_rekap as id,
    r.id_produk as id_produk,
    k.Nama as karyawan,
    p.nama_produk AS produk,
    r.terjual as terjual,
    r.tanggal AS tanggal
FROM tb_rekap_penjualan r
JOIN tb_produk p ON r.id_produk = p.id_produk
JOIN tb_karyawan k ON r.id_karyawan = k.id_karyawan
    ";
    $sql = mysqli_query($connect,$query);
    $result = array();

    while ($row = mysqli_fetch_assoc($sql)) {
        $result[] = $row;
    }

    return $result;
}
?>