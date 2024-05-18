<?php
session_start();
include "component/connection.php";
include "function.php";
$dataKaryawan = getAllData($connect,'tb_karyawan');

if (isset($_POST['Sign-in'])){
$user = $_POST["username"];
$karyawan = $_POST["id_karyawan"];
$pass = $_POST["password"];
$confirm = $_POST["confirm"];
if($pass==$confirm){

    try {
    $query = "INSERT INTO `tb_login`( `id_karyawan`, `username`, `password`, `level`) VALUES ($karyawan, '$user', '$pass', 'karyawan'   )";
    $result = mysqli_query($connect, $query);

    if($result){
    header("location: login.php");
    }else{
    echo "gagal memuat";
    }}catch (mysqli_sql_exception $e) {
        echo "<script>alert('id karyawan mungkin sudah terpakai');</script>";
    }
    }else{
        echo "
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input_pass = document.getElementById('password');
            const input_confirm = document.getElementById('password-confirm');
            const error_msg = document.getElementById('error_msg');
            input_pass.classList.add('worng-input');
            input_confirm.classList.add('worng-input');
            error_msg.removeAttribute('hidden');
        });        
        </script>";
    }
}
?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrapt -->
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-5 m-auto ">
                <div class="card">
                    <div class="card-body">
                    <form action="" method="POST" class="mb-2">
                            <h2 class="text-center mb-3">Register</h2>
                            
                            <div class="form-grup">
                                <label for="username">username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            
                            <div  class="form-grup mt-2 ">
                            <label for="password">Nama Karyawan</label>
                                <select  name="id_karyawan" class="form-control" data-live-search="true">
                                    <?php foreach ($dataKaryawan as $tampil) : ?>
                                        <option value="<?php echo $tampil['id_karyawan']; ?>"><?php echo $tampil['Nama']; ?></option>
                                        <?php endforeach ?>
                                </select>
                            </div>

                            <div class="form-grup mt-2">
                                <label for="password">password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-grup mt-2 mb-2">
                                <label for="password-confirm">confirm</label>
                                <input type="password" name="confirm" id="password-confirm" class="form-control" required>
                            </div>
                            <p hidden id="error_msg" class="text-danger">*password dan konfirmasi password tidak cocok</p>
                        <input type="Submit" name="Sign-in" value="Sign-in" class="btn bg-primary " >
                    </form>
                    <a href="index.php">sudah punya akun?</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>    