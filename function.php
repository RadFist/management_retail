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

 function getAllDatabyid($connect,$table,$column,$id){
    $query = "SELECT * FROM $table WHERE $column = $id";
    $sql = mysqli_query($connect,$query);
    $result = mysqli_fetch_assoc($sql);
    return $result;
}

function total_laba_kotor($connect){
    $query = "SELECT SUM(jumlah * harga) AS total FROM tb_produk;";
    $sql = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($sql);
    return $result['total'];
}
?>