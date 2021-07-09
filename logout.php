<?php
  session_start();
  unset($_SESSION['user_nim']);
  unset($_SESSION['user_pass']);

  echo "<script>alert('Silahkan Login Kembali ... !');window.location='login-form/dist/';</script>";
?>