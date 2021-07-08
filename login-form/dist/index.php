<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<style type="text/css">
  h3{
    color: white;
    text-align: center;
  }
  a{
    color: skyblue;
  }
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="login">
  <?php
    if(isset($_GET['registrasi']))
    {
      ?>
        <h1>Daftar</h1>
        <form method="post" name="regis">
          <input type="text" name="u" placeholder="Username" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
        <p></p>
        <h3>Sudah Punya Akun? <a href="../dist/">Login</a></h3>
      <?php
    }
    else{
      ?>
        <h1>Login</h1>
        <form method="post" name=login>
          <input type="text" name="u" placeholder="Username" required="required" />
            <input type="password" name="p" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
        <p></p>
        <h3>Belum Punya Akun? <a href="?registrasi">Daftar</a></h3>
      <?php
    }
  ?>
</div>
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>
