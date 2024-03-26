<?php
include '../component/connection.php';

function delete($connect,$table,$id_name,$id,$location){
    $id_tmp= mysqli_real_escape_string($connect, $id);
    $query = "DELETE FROM $table WHERE $id_name = ?";
    $stmt = mysqli_prepare($connect, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $id_tmp);
        $result = mysqli_stmt_execute($stmt);
        if ($result) {
            header("location: $location");
            exit();
        } else {
            echo "Gagal mengeksekusi pernyataan SQL: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal membuat pernyataan SQL: " . mysqli_error($connect);
    }
    mysqli_close($connect);
}

if(isset($_GET['delete_karyawan'])){
    $id = $_GET['delete_karyawan'];
    $location = "../karyawan.php?deleteSuccess";
    $table = "`tb_karyawan`";
    $column = "id_karyawan";
    delete($connect,$table,$column,$id,$location);    
}else if(isset($_GET['delete_supplier'])){
    $id = $_GET['delete_supplier'];
    $location = "../supplier.php?deleteSuccess";
    $table = "`tb_supplier`";
    $column = "id_supplier";  
    delete($connect,$table,$column,$id,$location);    
}else if(isset($_GET['delete_produk'])){
    echo "logic belom di buat: jika di delete maka supplier juga harus ke delete";
    die();
    $id = $_GET['delete_produk'];
    $location = "../produk.php?deleteSuccess";
    $table = "`tb_produk`";
    $column = "id_produk";   
    delete($connect,$table,$column,$id,$location);    
} else if(isset($_GET['delete_stock_in'])) {
    $id = $_GET['delete_stock_in'];
    $location = "../stock_in.php?deleteSuccess";
    $table = "`tb_restok`";
    $column = "id_restok";   
    delete($connect,$table,$column,$id,$location);    
} else if(isset($_GET['delete_kategori'])) {
    $id = $_GET['delete_kategori'];
    $location = "../kategori.php?deleteSuccess";
    $table = "`tb_kategori`";
    $column = "id_kategori";   
    delete($connect,$table,$column,$id,$location);    
} else if(isset($_GET['delete_penjualan'])) {
    $id = $_GET['delete_penjualan'];
    $location = "../penjualan.php?deleteSuccess";
    $table = "`tb_penjualan_harian`";
    $column = "id_penjualan";   
    delete($connect,$table,$column,$id,$location);    
} else{
    header("location: ../index.php?deleteError");

}

?>