<?php
  session_start();
  require "../connect.php";

  if((empty($_SESSION['user_nim']) or (empty($_SESSION['user_pass'])))){
    echo "<script>location.href='http://ttd-fisipuntad.rf.gd/login-form/dist/';</script>";
  }
  else {
      # code...
      if ($_SESSION['user_nim']!="admin") {
        # code...
        echo "<script>location.href='http://ttd-fisipuntad.rf.gd/login-form/dist/';</script>";
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
          echo "<script>location.href='http://ttd-fisipuntad.rf.gd/login-form/dist/';</script>";
        }
        else {
          # code...
          $password = password_verify($_SESSION['user_pass'], $d_loginadmin['password']);
          if ($password=false) {
            # code...
            echo "<script>location.href='http://ttd-fisipuntad.rf.gd/login-form/dist/';</script>";
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
            echo "<script>location.href='http://ttd-fisipuntad.rf.gd/login-form/dist/';</script>";
        }
      }
  }

  // CODE UBAH KETERANGAN VALIDASI
  if (isset($_GET['validasi'])) {
    # code...
    $validasi    = $_GET['validasi'];
    $nim_mhs     = $_GET['nim_mhs'];
    $up_validasi = mysqli_query($db, "UPDATE skripsi SET validasi='$validasi' WHERE nim='$nim_mhs'");
    echo "<script>alert('Sukses !!!');window.location='http://ttd-fisipuntad.rf.gd/admin/';</script>";
    $_SESSION['T'] = $validasi." - ".$nim_mhs;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin FKIP | Dashboard</title>
  <link rel="shortcut icon" href="http://ttd-fisipuntad.rf.gd/login-form/untad.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- PHP Code -->
  <?php
    require "../connect.php";

    $q_mhs  = mysqli_query($db, "SELECT biodata.nama,biodata.nim,skripsi.judul,skripsi.validasi,skripsi.doc FROM biodata,skripsi WHERE biodata.nim=skripsi.nim");
  ?>
<!-- END PHP CODE -->
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="http://ttd-fisipuntad.rf.gd/login-form/untad.png" alt="AdminLTELogo" height="60" width="60">
  </div>

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
    <a href="index.php" class="brand-link">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengajuan Skripsi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="setting.php" class="nav-link">
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <!-- Jumlah Skripsi DI Setujui -->
                <?php
                  $q_setuju = mysqli_query($db, "SELECT count(*)as jml_setuju FROM skripsi WHERE validasi='Yes'");
                  $d_setuju = mysqli_fetch_array($q_setuju);
                ?>
                <h3><?= $d_setuju['jml_setuju'];?><sup style="font-size: 20px">Org</sup></h3>

                <p>Di Setujui</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-6 col-12">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <!-- Jumlah Skripsi DI Setujui -->
                <?php
                  $q_tsetuju = mysqli_query($db, "SELECT count(*)as jml_tsetuju FROM skripsi WHERE validasi='No'");
                  $d_tsetuju = mysqli_fetch_array($q_tsetuju);
                ?>
                <h3><?= $d_tsetuju['jml_tsetuju'];?><sup style="font-size: 20px">Org</sup></h3>

                <p>Belum Di Setujui</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-book"></i> DATA PENGAJUAN UJIAN SKRIPSI</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">                
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Nama Mahasiswa</th>
                        <th>No.Stanbuk</th>
                        <th>Judul Skripsi</th>
                        <th>Disetujui</th>
                        <th>***</th>
                      </tr>
                      </thead>
                      <tbody>  
                      <?php
                        while($d_mhs  = mysqli_fetch_array($q_mhs)){
                      ?>                      
                      <tr style="text-transform: uppercase;">
                        <td><?= $d_mhs['nama'];?></td>
                        <td><?= $d_mhs['nim'];?></td>
                        <td><a href="../<?= $d_mhs['doc'];?>"><?= $d_mhs['judul'];?></a></td>                         
                        <!-- Code Valdasi -->                  
                        <?php
                          if ($d_mhs['validasi']=="No")
                          {
                        ?>
                            <div class="form-group">  
                            <td style="background-color:#cc1d22;color:white;">
                            <form action="">
                              <input type="hidden" name="nim_mhs" value="<?= $d_mhs['nim'];?>">
                              <select name="validasi" class="form-control" onchange="this.form.submit();">
                                <option value="No" selected="selected"><?= $d_mhs['validasi'];?></option>
                                <option value="Yes">Yes</option>
                              </select>
                            </form>
                            </td>
                            </div>
                        <?php
                          }
                          else {
                            # code...
                        ?>
                            <div class="form-group">
                            <td style="background-color:#32d165;color:white;">
                            <form action="">
                              <input type="hidden" name="nim_mhs" value="<?= $d_mhs['nim'];?>">
                              <select name="validasi" class="form-control" onchange="this.form.submit();">
                                <option value="No">No</option>
                                <option value="Yes" selected="selected"><?= $d_mhs['validasi'];?></option>
                              </select>   
                            </form>                             
                            </td>
                            </div>
                        <?php
                          }
                        ?>
                        <td>-</td>
                      </tr>
                      <?php
                        }
                      ?>
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Nama Mahasiswa</th>
                        <th>No.Stanbuk</th>
                        <th>Judul Skripsi</th>
                        <th>Keterangan</th>
                        <th>***</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
