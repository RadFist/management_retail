<?php
include "../component/connection.php";
include "../function.php";

$data = getAllSupplier($connect);

$id ="";
$name =  "";
$alamat = "";
$np =  "";
$jk = "";
$jk = "";
$tanggal_lahir =  "";

if(isset($_GET['edit_karyawan'])){
    $id = $_GET['edit_karyawan'];
    $data = getAllDatabyid($connect,"tb_karyawan","id_karyawan",$id);
    $name =  $data['Nama'];
    $alamat =  $data['alamat'];
    $np =  $data['np'];
    $jk =  $data['jenis_kelamin'];
    $tanggal_lahir =  $data['tanggal_lahir'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="input.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  </head>
  <body>
    <section class="container">
      <header>Input Data Karyawan</header>
      <form action="../logic/<?= isset($_GET['edit_karyawan']) ? 'edit' : 'input_logic' ?>.php" method="POST" class="form">

        <div class="input-box" hidden>
            <label>Id Karyawan</label>
            <input name="id_karyawan" type="number" placeholder="Masukan id Karyawan" value="<?= $id ?>" />
        </div>


        <div class="select-btn">
          <label>produk</label>
          <i class="fas fa-caret-down"></i>
        </div>
          <div class="content">
            <div class="search">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="cari">
            </div>
            <ul class="options">
            <?php foreach ($data as $tampil) : ?>
                <li value="<?php echo $tampil['id_supplier']; ?>"><?php echo $tampil['Nama']; ?></li>
            <?php endforeach ?>
            </ul>
          </div>

        <div class="column">
          <div class="input-box">
            <label>Supplier</label>
            <select>
                <option value="" default>-</option>
                 <?php foreach ($data as $tampil) : ?>
                    <option value="<?php echo $tampil['id_supplier']; ?>"><?php echo $tampil['Nama']; ?></option>
                  <?php endforeach ?>
             </select>
          </div>

          <div class="input-box">
                <label>jumlah restock produk</label>
                <input name="jumlah_produk" type="number" placeholder="Masukkan jumlah produk" value="<?= $jumlah ?>" required />
            </div>

          <div class="input-box">
            <label>Tanggal</label>
            <input name="tanggal_lahir" type="date" placeholder="Masukkan tanggal lahir" value="<?= $tanggal_lahir ?>" required />
          </div>
       
        <button type="submit" name="submit" value="<?= isset($_GET['edit_karyawan']) ? 'edit_karyawan' : 'simpan_karyawan' ?>">Submit</button>
      </form>
    </section>
  </body>
</html>