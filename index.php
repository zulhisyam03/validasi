<?php
  session_start();
  include "connect.php";

  if((empty($_SESSION['user_nim']) or (empty($_SESSION['user_pass'])))){
    echo "<script>location.href='login-form/dist/';</script>";
  }
  else {
      # code...
      $un      = $_SESSION['user_nim'];
      $up      = $_SESSION['user_pass'];
      $cek_log = mysqli_query($db,"SELECT * FROM biodata WHERE nim='$un' and password='$up'");
      $data_log= mysqli_fetch_array($cek_log);
      if (empty($data_log)) {
          # code...
          echo "<script>location.href='login-form/dist/';</script>";
      }
  }

  $un      = $_SESSION['user_nim'];
  $up      = $_SESSION['user_pass'];
  $query = mysqli_query($db, "SELECT * FROM biodata WHERE nim='$un' and password='$up'");
  $data  = mysqli_fetch_array($query);
?>
<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>FISIP UNTAD - Validasi Judul Skripsi</title>
    <link rel="shortcut icon" href="login-form/untad.png" type="image/x-icon">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>
</head>
<body oncontextmenu='return false' class='snippet-body'>
    <div class="container-fluid px-0" id="bg-div">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="card card0">
                    <div class="d-flex" id="wrapper">
                        <!-- Sidebar -->
                        <div class="bg-light border-right" id="sidebar-wrapper">
                            <div class="sidebar-heading pt-5 pb-4" style="text-align:center;">
                                <img src="login-form/untad.png" alt="Logo Untad" width="180px" height="140px">
                            </div>
                            <div class="list-group list-group-flush"> 
                                <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item active1 ">
                                <div class="list-div my-2">
                                    <div class="fa fa-user"></div> &nbsp;&nbsp; Biodata
                                </div>
                                </a> 
                                <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item bg-light">
                                    <div class="list-div my-2">
                                        <div class="fa fa-file"></div> &nbsp;&nbsp; Skripsi
                                    </div>
                                </a> 
                                <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
                                    <div class="list-div my-2">
                                        <div class="fa fa-cog"></div> &nbsp;&nbsp;&nbsp; Proses Validasi
                                    </div>
                                </a> 
                            </div>
                        </div> <!-- Page Content -->
                        <div id="page-content-wrapper">
                            <div class="row pt-3" id="border-btm">
                                <div class="col-4"> 
                                    <button class="btn btn-primary mt-4 ml-3 mb-3" id="menu-toggle">
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                        <div class="bar4"></div>
                                    </button> 
                                </div>
                                <div class="col-8">
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 mt-4 text-right"><?= $data['nim']; ?></p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-right">
                                        <div class="col-12">
                                            <p class="mb-0 mr-4 text-right"><span class="top-highlight"><?= $data['nama']; ?></span> <a href="logout.php">(Logout)</a></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content">
                                <div id="menu1" class="tab-pane active">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <div class="form-card">
                                                <h3 class="mt-0 mb-4 text-center">Biodata Mahasiswa</h3>
                                                <form onsubmit="event.preventDefault()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> 
                                                                <input type="text" name="nama" id="bk_nm" placeholder="Nama Lengkap" value="<?= $data['nama'];?>"> 
                                                                <label>NAMA MAHASISWA</label> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> 
                                                                <input type="text" name="nim" id="ben-nm" placeholder="0000000" value="<?= $data['nim'];?>"> 
                                                                <label>NIM</label> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> 
                                                                <input type="text" name="email" placeholder="Julle@gmail.com" class="placeicon"  value="<?= $data['email'];?>"> 
                                                                <label>E-MAIL</label> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> 
                                                                <input type="text" onkeyup="this.value=this.value.replace(/[^\d]/,'')" name="hp" placeholder="0822xxxxxxxx" class="placeicon"  value="<?= $data['hp'];?>"> 
                                                                <label>NO. HANDPHONE</label> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12"> 
                                                            <input type="submit" value="UPDATE" class="btn btn-primary placeicon"> 
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="tab-pane in">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <div class="form-card">
                                                <h3 class="mt-0 mb-4 text-center">Informasi Skripsi</h3>
                                                <form onsubmit="event.preventDefault()">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> <input type="text" name="judul" placeholder="Judul Skripsi" required="require"> <label>JUDUL SKRIPSI</label> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="input-group"> <input type="text" name="p1" placeholder="Pembimbing 1" required="require"> <label>PEMBIMBING 1</label> </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="input-group"> <input type="text" name="p2" placeholder="Pembimbing 2" required="require" > <label>PEMBIMBING 2</label> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                                <div class="relative border-dotted h-48 rounded-lg border-dashed border-2 border-blue-700 bg-gray-100 flex justify-center items-center">
                                                                    <div class="absolute">
                                                                        <div class="flex flex-col items-center"> 
                                                                            <i class="fa fa-folder-open fa-4x text-blue-700"></i> 
                                                                            <span class="block text-gray-400 font-normal">Attach you files here</span> 
                                                                        </div>
                                                                    </div> 
                                                                    <input type="file" class="h-full w-full opacity-0" name="doc" required="require" >
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="row">
                                                        <div class="col-md-12"> <input type="submit" name="simpan_skripsi" value="Simpan" class="btn btn-primary placeicon"> </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu3" class="tab-pane">
                                    <div class="row justify-content-center">
                                        <div class="col-11">
                                            <h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
                                            <div class="row justify-content-center">
                                                <div id="qr"> <img src="https://i.imgur.com/DD4Npfw.jpg" width="200px" height="200px"> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type='text/javascript' src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js'></script>

<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<script type='text/javascript'>
    $(document).ready(function(){
    //Menu Toggle Script
    $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    });

    // For highlighting activated tabs
    $("#tab1").click(function () {
    $(".tabs").removeClass("active1");
    $(".tabs").addClass("bg-light");
    $("#tab1").addClass("active1");
    $("#tab1").removeClass("bg-light");
    });
    $("#tab2").click(function () {
    $(".tabs").removeClass("active1");
    $(".tabs").addClass("bg-light");
    $("#tab2").addClass("active1");
    $("#tab2").removeClass("bg-light");
    });
    $("#tab3").click(function () {
    $(".tabs").removeClass("active1");
    $(".tabs").addClass("bg-light");
    $("#tab3").addClass("active1");
    $("#tab3").removeClass("bg-light");
    });
    })
</script>
</body>
</html>