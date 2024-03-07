<?php
$produk_total = 0;
$supplier_total = 0;
$karyawan_total = 0;
$stock_total = 0;


function getTotalCount($connect, $table, $column) {
    $query = "SELECT COUNT($column) as total FROM $table";
    $sql = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($sql);

    return $result['total'];
}

//product total count database
$produk_total = getTotalCount($connect, 'tb_produk', 'id_produk');
//supplier total count database
$supplier_total = getTotalCount($connect, 'tb_supplier', 'id_supplier');
//karyawan total count database
$karyawan_total = getTotalCount($connect, 'tb_karyawan', 'id_karyawan');

?>