<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style type="text/css">
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
</style>
</head>
<body>
<!-- partial:index.partial.html -->

  <?php
    if(isset($_GET['registrasi']))
    {
      ?>
        <div class="login" style="top: 200px;">
          <center><img src="../untad.png" alt=""></center>
          <h1>Daftar</h1>
          <form method="post" name="regis" action="regist.php">
            <input type="text" name="nama_reg" placeholder="Nama Lengkap" required="required" />
            <input type="text" name="nim_reg" placeholder="NIM" required="required">
            <input type="text" name="email_reg" placeholder="E-Mail">
            <input type="password" name="pass_reg" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Daftar</button>
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
            <input type="text" name="u" placeholder="Username" required="required" />
              <input type="password" name="p" placeholder="Password" required="required" />
              <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
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
