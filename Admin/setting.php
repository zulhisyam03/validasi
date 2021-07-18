<?php
  session_start();
  include "../connect.php";

  if((empty($_SESSION['user_nim']) or (empty($_SESSION['user_pass'])))){
    echo "<script>location.href='../login-form/dist/';</script>";
  }
  else {
      # code...
      if ($_SESSION['user_nim']!="admin") {
        # code...
        echo "<script>location.href='../login-form/dist/';</script>";
      }
      else if ($_SESSION['user_nim']=="admin") 
        # code...
      {
        $un      = $_SESSION['user_nim'];
        $up      = $_SESSION['user_pass'];
        $q_loginadmin = mysqli_query($db,"SELECT * FROM admin WHERE user='$un'");
        $d_loginadmin = mysqli_fetch_array($q_loginadmin);
        if (empty($d_loginadmin)) {
          # code...
          echo "<script>location.href='../login-form/dist/';</script>";
        }
        else {
          # code...
          $password = password_verify($_SESSION['user_pass'], $d_loginadmin['password']);
          if ($password=false) {
            # code...
            echo "<script>location.href='../login-form/dist/';</script>";
          }
        }
      }
      else{
        $un      = $_SESSION['user_nim'];
        $up      = $_SESSION['user_pass'];
        $cek_log = mysqli_query($db,"SELECT * FROM biodata WHERE nim='$un' and password='$up'");
        $data_log= mysqli_fetch_array($cek_log);
        if (empty($data_log)) {
            # code...
            echo "<script>location.href='login-form/dist/';</script>";
        }
      }
  }

// MENGAMBIL DATA ADMIN ======================
  $query    = mysqli_query($db,"SELECT * FROM admin WHERE user='$un'");
  $data     = mysqli_fetch_array($query);
// END AMBIL DATA ===================
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin - Tanda Terima Skripsi UNTAD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">

    <style type="text/css">
        blink {
        -webkit-animation: 2s linear infinite kedip; /* for Safari 4.0 - 8.0 */
        animation: 2s linear infinite kedip;
        }
        .warning{
            top: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: red;
            color: whitesmoke;
            position: relative;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <!-- Navbar END-->
      <li class="nav-item">
        <a class="nav-link" data-widget="" data-slide="rue" href="../logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../login-form/untad.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FKIP UNTAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Skripsi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="setting.php" class="nav-link active">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Seting
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <?php
            // CODE UPDATE DATA ADMIN
            if (isset($_POST['submit'])) {
                # code...
                $user       = $un;
                $ketua_jur  = $_POST['ketua_jur'];
                $jurusan    = $_POST['jurusan'];
                $nip        = $_POST['nip'];
                $pass_skrg  = password_hash($_POST['pass_sekarang'], PASSWORD_DEFAULT);
                $pass_baru  = password_hash($_POST['pass_baru'], PASSWORD_DEFAULT);
                $pwd =password_verify($_POST['pass_sekarang'],$up);
                if ($pwd=='1') {
                    # code...
                    if ($_POST['pass_baru']!="") {
                        # code...
                        $update = mysqli_query($db, "UPDATE admin SET jurusan='$jurusan',ketua_jur='$ketua_jur',nip='$nip',password='$pass_baru' WHERE user='$user' and password='$up'");
                        $_SESSION['user_pass']=$pass_baru;
                        echo "<script>alert('Sukses Ubah Biodata dan Password Admin ...');window.location='../admin/setting.php';</script>";
                    }
                    else {
                        # code...
                        $update = mysqli_query($db, "UPDATE admin SET jurusan='$jurusan',ketua_jur='$ketua_jur',nip='$nip' WHERE user='$user' and password='$up'");
                        echo "<script>alert('Sukses Ubah Data Admin ...');window.location='../admin/setting.php';</script>";
                    }
                    
                }
                else {
                    # code...
                    echo "<div class='warning'><blink>Maaf, Masukan Password Yang Benar !!!</blink></div>";
                }
            }
            ?>
          <div class="col-sm-6">
            <h1>Seting</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Seting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Biodata Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">User</label>
                    <input type="email" class="form-control" id="" name="user" required="required" readonly placeholder="Enter email" value="<?= $data['user'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Jurusan</label>
                    <input type="text" class="form-control" id="" name="jurusan" required="required" placeholder="Jurusan" value="<?=$data['jurusan'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nama Ketua Jurusan</label>
                    <input type="text" class="form-control" id="" name="ketua_jur" required="required" placeholder="Nama Ketua Jurusan" value="<?=$data['ketua_jur'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Nip Ketua Jurusan</label>
                    <input type="text" class="form-control" id="" name="nip" required="required" placeholder="NIP" value="<?=$data['nip'];?>">
                  </div>
                  <div class="form-group">
                    <label for="">Password Sekarang</label>
                    <input type="password" class="form-control" name="pass_sekarang" id="exampleInputPassword1" required="required" placeholder="Masukan Password Sekarang Sebagai Konfirmasi" value="">
                  </div>
                  <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" class="form-control" name="pass_baru" id="exampleInputPassword2" placeholder="Password Baru" value="">
                  </div>
                  <br>
                    <span style="color:red;">
                        Catatan : <br>
                        Jika Tidak Ingin Mengubah Password, Kolom "Password Baru" Tidak Perlu Di Isi.
                    </span>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="./plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
