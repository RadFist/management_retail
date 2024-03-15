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
    COALESCE(r.jumlah_restok+p.jumlah, p.jumlah) AS total_stock
    FROM tb_produk p
    LEFT JOIN tb_restok r ON r.id_produk = p.id_produk;";
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
?>