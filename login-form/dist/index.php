<?php
  session_start();
  include "../../connect.php";

  if((!empty($_SESSION['user_nim']) and (!empty($_SESSION['user_pass'])))){
    $un      = $_SESSION['user_nim'];
    $up      = $_SESSION['user_pass'];
    $cek_log = mysqli_query($db,"SELECT * FROM biodata WHERE nim='$un' and password='$up'");
    $data_log= mysqli_fetch_array($cek_log);
    if (!empty($data_log)) {
      # code...
      echo "<script>location.href='../../index.php';</script>";
    }
    else if ($_SESSION['user_nim']=="admin") 
        # code...
      {
        $q_cekadmin = mysqli_query($db,"SELECT * FROM admin WHERE user='$un'");
        $d_cekadmin = mysqli_fetch_array($q_cekadmin);
        if (!empty($d_cekadmin)) {
          # code...
          if ($up==$d_cekadmin['password']) {
            # code...
            echo "<script>location.href='../../admin/';</script>";
          }
        }
      }
  }
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style type="text/css">
  blink {
    -webkit-animation: 2s linear infinite kedip; /* for Safari 4.0 - 8.0 */
    animation: 2s linear infinite kedip;
  }
  /* for Safari 4.0 - 8.0 */
  @-webkit-keyframes kedip { 
    100% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    0% {
      visibility: visible;
    }
  }
  @keyframes kedip {
    100% {
      visibility: hidden;
    }
    50% {
      visibility: hidden;
    }
    0% {
      visibility: visible;
    }
  }
  h1{
    margin-top: -10px;
  }
  h3{
    color: white;
    text-align: center;
  }
  a{
    color: skyblue;
  }
  img{
    width: 300px;
    height: 200px;
  }
  .warning{
    top: 0;
    width: 100%;
    padding: 10px;
    text-align: center;
    background-color: red;
    color: whitesmoke;
    position: fixed;
  }
</style>
</head>
<body>
  <!-- PROSES DAFTAR dan LOGIN -->
  <?php
    if(isset($_POST['daftar'])){
      $nama_reg  = $_POST['nama_reg'];
      $nim_reg   = $_POST['nim_reg'];
      $email_reg = $_POST['email_reg'];
      $pass_reg  = password_hash($_POST['pass_reg'], PASSWORD_DEFAULT);
      $hp_reg    = $_POST['hp_reg'];

      // Cek Ketersediaan NIM
      $q_cek = mysqli_query($db, "SELECT * FROM biodata WHERE nim='$nim_reg'");
      $d_cek = mysqli_num_rows($q_cek);

      if(empty($d_cek)){
        $q_reg  = mysqli_query($db,"INSERT INTO biodata VALUE ('$nama_reg','$nim_reg','$email_reg','$hp_reg','$pass_reg')");
        echo "<script>alert('Selamat, Anda Sukses Mendaftarkan Akun ...');window.location='../../';</script>";

        $_SESSION['user_nim']   = $nim_reg;
        $_SESSION['user_pass']  = $pass_reg;
      }
      else{
        echo "<div class='warning'><blink>Maaf, NIM Sudah Terdaftar !!!</blink></div>";
      }      
    }
    else if(isset($_POST['login'])){
      $nim_log  = $_POST['nama_log'];

      $q_login = mysqli_query($db,"SELECT * FROM biodata WHERE nim='$nim_log'");
      $d_login = mysqli_fetch_array($q_login);
      
      if ($nim_log=="admin") {
        # code...
        // -- cek admin 
        $q_loginadmin = mysqli_query($db,"SELECT * FROM admin WHERE user='$nim_log'");
        $d_loginadmin = mysqli_fetch_array($q_loginadmin);

        $password_admin = password_verify($_POST['pass_log'], $d_loginadmin['password']);
        if ($password_admin) {
          # code...
          $_SESSION['user_nim']  = $d_loginadmin['user'];
          $_SESSION['user_pass'] = $d_loginadmin['password'];
          echo "<script>alert(\"Selamat Datang ".$d_loginadmin['user']."\");window.location=\"../../admin/\";</script>";
        }
        else {
          # code...
          echo "<div class='warning'><blink>Password Admin Salah !!!<blink></div>";
        }
      }
      
      //CODE LOGIN MAHASISWA
      else if (empty($d_login)) {
        # code...
        echo "<div class='warning'><blink>NIM Tidak Terdaftar !!!<blink></div>";
      }
      else {
        # code...
        $pass_log = password_verify($_POST['pass_log'], $d_login['password']);
        if ($pass_log) {
          # code...
          $_SESSION['user_nim']  = $d_login['nim'];
          $_SESSION['user_pass'] = $d_login['password'];
          echo "<script>alert(\"Selamat Datang ".$d_login['nama']."\");window.location=\"../../\";</script>";
        }
        else {
          # code...
          echo "<div class='warning'><blink>Password Yang Dimasukan Salah !!!<blink></div>";
        }
        
      }
    }
  ?>
  <!-- END DAFTAR -->
<!-- partial:index.partial.html -->

  <?php
    if(isset($_GET['registrasi']))
    {
      ?>
        <div class="login" style="top: 200px;">
          <center><img src="../untad.png" alt=""></center>
          <h1>Daftar</h1>
          <form method="post" name="regis" action="">
            <input type="text" name="nama_reg" placeholder="Nama Lengkap" required="required" />
            <input type="text" name="nim_reg" placeholder="NIM" required="required">
            <input type="text" name="email_reg" placeholder="E-Mail" required="required">
            <input type="text" name="hp_reg" placeholder="Nomor Handphone" required="required" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
            <input type="password" name="pass_reg" placeholder="Password" required="required" />
            <button type="submit" name="daftar" class="btn btn-primary btn-block btn-large">Daftar</button>
          </form>
          <p></p>
          <h3>Sudah Punya Akun? <a href="../dist/">Login</a></h3>
        </div>
      <?php
    }
    else{
      ?>
        <div class="login" style="top:200px;">
          <center><img src="../untad.png" alt=""></center>
          <h1>Login</h1>
          <form method="post" name=login>
            <input type="text" name="nama_log" placeholder="NIM" required="required" />
              <input type="password" name="pass_log" placeholder="Password" required="required" />
              <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Masuk</button>
          </form>
          <p></p>
          <h3>Belum Punya Akun? <a href="?registrasi">Daftar</a></h3>
        </div>
      <?php
    }
  ?>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
