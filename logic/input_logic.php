<?php
include '../component/connection.php';

if(isset($_POST['submit']))
{
    //karyawan logic
    if($_POST['submit'] == 'simpan_karyawan')
    {
        $nama_karyawan = mysqli_real_escape_string($connect, $_POST['nama_karyawan']);
        $np = mysqli_real_escape_string($connect, $_POST['np']);
        $tanggal_lahir = mysqli_real_escape_string($connect, $_POST['tanggal_lahir']);
        $gender = mysqli_real_escape_string($connect, $_POST['gender']);
        $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);

        $query = "INSERT INTO `tb_karyawan` (`Nama`, `alamat`, `np`, `jenis_kelamin`,`tanggal_lahir`) VALUES  (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($connect, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sssss', $nama_karyawan, $alamat, $np, $gender, $tanggal_lahir);
            $result = mysqli_stmt_execute($stmt);
            
            if($result){
                header("location:../karyawan.php?success");
                exit();
            } else {
                echo "Gagal mengeksekusi pernyataan SQL: " . mysqli_stmt_error($stmt);
            }
            
            mysqli_stmt_close($stmt);
        } else {
            echo "Gagal membuat pernyataan SQL: " . mysqli_error($connect);
        }
    
        mysqli_close($connect);
        

    }else if($_POST['submit'] == 'simpan_supplier')
    {
    // mysqli_real_escape_string 
    $name_supplier = mysqli_real_escape_string($connect, $_POST['name_supplier']);
    $np = mysqli_real_escape_string($connect, $_POST['np']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
    
    // parameterized query 
    $query = "INSERT INTO `tb_supplier`(`nama`, `alamat`, `np`) VALUES (?, ?, ?)";
    
    // Menggunakan prepared statement
    $stmt = mysqli_prepare($connect, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sss', $name_supplier,$alamat, $np);
        $result = mysqli_stmt_execute($stmt);
        
        if($result){
            header("location:../supplier.php?success");
            exit();
        } else {
            echo "Gagal mengeksekusi pernyataan SQL: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal membuat pernyataan SQL: " . mysqli_error($connect);
    }

    mysqli_close($connect);
    }else if($_POST['submit'] == 'simpan_produk')
    {
      
    $nama_produk = mysqli_real_escape_string($connect, $_POST['nama_produk']);
    $jumlah_produk = mysqli_real_escape_string($connect, $_POST['jumlah_produk']);
    $harga_produk = mysqli_real_escape_string($connect, $_POST['harga_produk']);
    
    $query = "INSERT INTO `tb_produk`(`nama_produk`, `jumlah`, `harga`) VALUES (?, ?, ?)";
    
    $stmt = mysqli_prepare($connect, $query);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'sii', $nama_produk, $jumlah_produk, $harga_produk);
        $result = mysqli_stmt_execute($stmt);
        
        if($result){
            header("location:../produk.php?success");
            exit();
        } else {
            echo "Gagal mengeksekusi pernyataan SQL: " . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        echo "Gagal membuat pernyataan SQL: " . mysqli_error($connect);
    }

    mysqli_close($connect);
    }else{
        header("location:../index.php?error");
    }
} else {
    header("location:../index.php?error");
}
?>

