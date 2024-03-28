<?php 
session_start();

if (isset($_POST['login'])=='login'){
  header('location:index.php');
};

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
                  <input name="username" type="text" required>
               </div>
               <div class="data">
                  <label>Password</label>
                  <input name="password" type="password" required>
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
</html>