<?php 
include "component/connection.php";
session_start();

if (isset($_POST['login'])=='login'){
 
   function anti_injection($data){
      $filter  = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
      return $filter;
    }
    
    $username = anti_injection($_POST['username']);
    $password = anti_injection($_POST['password']);
    
    
      $query  = "SELECT * FROM tb_login l
      JOIN tb_karyawan k  ON l.id_karyawan = k.id_karyawan WHERE username='$username' AND password='$password'";
      $login  = mysqli_query($connect, $query);
      $user = mysqli_num_rows($login);
      $data     = mysqli_fetch_array($login);
    
      if ($user > 0){

        $id = $data['id_login'];
        $_SESSION['username']    = $data['username'];
        $_SESSION['password']    = $data['password'];
        $_SESSION['level']       = $data['level'];
        $_SESSION['level']       = $data['level'];
        $_SESSION['karyawan']    = $data['Nama'];
          
    
        $sid_lama = session_id();
        session_regenerate_id();
        $sid_baru = session_id();

        //set time login
        $dt = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $time = $dt->format('Y/m/d H:i:s');
        $query = "UPDATE `tb_login` SET `waktu` = '$time'  WHERE `tb_login`.`id_login` = $id";
        $login  = mysqli_query($connect, $query);

        header("location:index.php");
      }
      else{
        echo "<h1>Login Gagal! Username & Password salah.</h1>";
        echo "<p><a href=\"index.php\">Ulangi Lagi</a></p>";  
      }
    

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login Form</title>
      <link rel="stylesheet" href="styleLogin.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <div class="container">
            <div class="text">
               Login
            </div>
            <form action="login.php" method="POST">
               <div class="data">
                  <label>Username</label>
                  <input name="username"  id="username" type="text" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input name="password" id="password" type="password" required onchange="validateInput()">
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit" name="login" value="login">login</button>
               </div>
               <div class="signup-link">
                  belum punya akun? <a href="#">Daftar disini</a>
               </div>
            </form>
         </div>
      </div>
   </body>
   <script src="script.js"></script>
</html>