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
    <link rel="stylesheet" href="./style.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <link href='https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css' rel='stylesheet'>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style type="text/css">
        .warning{
            top: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: red;
            color: whitesmoke;
            position: fixed;
        }
        .caption{
            padding-left: 25px;
            text-transform:uppercase;
        }
        .keterangan{
            width:100%;
            padding:25px;
            background:#f2f6fa;
            border-radius:10px;
        }
        body {
            overflow-x: hidden;
            background: #1c8cee62;
        }
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
    </style>
</head>
<body oncontextmenu='return false' class='snippet-body'>
<?php
    $q_validasi = mysqli_query($db, "SELECT * FROM skripsi WHERE nim='$un'");
    $d_validasi = mysqli_fetch_array($q_validasi);

    if (isset($_POST['simpan_skripsi'])) {
        # code...
        $judul  = $_POST['judul'];
        $p1     = $_POST['p1'];
        $p2     = $_POST['p2'];
        $nik1   = $_POST['nik1'];
        $nik2   = $_POST['nik2'];
        $nm_doc = $_FILES["doc"]["name"];
        $path_asal   = $_FILES["doc"]["tmp_name"];
        $type        = explode(".",$nm_doc);
        $doc_type    = $type[1];

        //Set Direktori Menyimpan File Yang Di Upload
        $path   = "document/".$judul.".".$doc_type;

        if ($doc_type!="pdf") {
            # code...
            echo "<div class='warning' style='position:relative;margin-bottom: -30px;'><blink>File Sekarang -> ".$doc_type." File Skripsi Harus Bertipe PDF !!!</blink></div>";
        }
        else {
            # code...
            if (empty($d_validasi)) {
                # code...
                $q_saveskripsi = mysqli_query($db, "INSERT INTO skripsi VALUE('$un','$judul','$p1','$p2','$nik1','$nik2','$path','$doc_type',NOW(),'No')");
                move_uploaded_file($path_asal,$path);
                echo "<script>alert('Sukses Upload Skripsi ... ');window.location='../validasi/';</script>";
            }
            else {
                # code...
                unset($d_validasi['doc']);
                $q_updateskripsi = mysqli_query($db, "UPDATE TABLE skrispi SET judul='$judul',p1='$p1',p2='$p2',nik1='$nik1',nik2='$nik2',doc='$path',type='$doc_type',tgl_upload=NOW() WHERE nim='$un'");
                move_uploaded_file($path_asal,$path);
                echo "<script>alert('Informasi Skripsi Telah Dirubah... ');window.location='../validasi/';</script>";
            }
        }
    }
?>
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
                                <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">
                                <div class="list-div my-2">
                                    <div class="fa fa-user"></div> &nbsp;&nbsp; Biodata
                                </div>
                                </a> 
                                <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item bg-light">
                                    <div class="list-div my-2">
                                        <div class="fa fa-file"></div> &nbsp;&nbsp; Skripsi
                                    </div>
                                </a> 
                                <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item active1">
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
                                <div id="menu1" class="tab-pane ">
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
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="input-group"> <input type="text" name="judul" placeholder="Judul Skripsi" required="require"> <label>JUDUL SKRIPSI</label> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="input-group"> <input onkeyup="this.value=this.value.replace(/[0-9]/,'')" type="text" name="p1" placeholder="Nama Pembimbing 1" required="require"> <label>NAMA PEMBIMBING 1</label> </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="input-group"> <input onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" name="nik1" placeholder="NIDM/NIK" required="require" > <label>NIDN/NIK PEMBIMBING 1</label> </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="input-group"> <input onkeyup="this.value=this.value.replace(/[0-9]/,'')" type="text" name="p2" placeholder="Nama Pembimbing 2" required="require"> <label>NAMA PEMBIMBING 2</label> </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="input-group"> <input onkeyup="this.value=this.value.replace(/[^\d]/,'')" type="text" name="nik2" placeholder="NIDM/NIK" required="require" > <label>NIDN/NIK PEMBIMBING 2</label> </div>
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
                                <div id="menu3" class="tab-pane active">
                                    <div class="row justify-content-center">
                                        <div class="col-12">
                                            <?php
                                                if (empty($d_validasi)) {
                                                    # code...
                                                    echo "<div style='background-color:red;color:white;width:50%;padding:15px;margin:auto;margin-top:20px;'><blink>Maaf, Silahkan Lengkapi Data Skripsi Terlebih Dahulu ... </blink></div>";                                            
                                                }
                                                else {
                                                    # code...
                                                    if ($d_validasi['validasi']=="Yes"){
                                                        echo    "<h3 class='mt-0 mb-4 text-center'>Silahkan Download Document Persetujuan Dibawah</h3>";
                                                        echo    "<div class='row justify-content-center'>";
                                                        echo    "<div id='qr'> <i class='fa fa-8x fa-download' style='color:steelblue;'></i></div>";
                                                        echo    "</div>";
                                                    }   
                                                    else {
                                                        # code...
                                                        ?>  
                                                            <div class="form-card">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="keterangan">
                                                                            <div style="color: darkgray;padding-bottom:8px;">JUDUL SKRIPSI</div>
                                                                            <span class="caption"><?= $d_validasi['1'];?></span><p></p>
                                                                            <div style="color: darkgray;padding-bottom:8px;">PEMBIMBING 1</div>
                                                                            <span class="caption"><?= $d_validasi['2'];?></span><p></p>
                                                                            <div style="color: darkgray;padding-bottom:8px;">PEMBIMBING 2</div>
                                                                            <span class="caption"><?= $d_validasi['3'];?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <center><br />
                                                            <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
                                                                <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
                                                                <circle cx="170" cy="170" r="135" stroke="#404041"/>
                                                                <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
                                                                <circle cx="170" cy="170" r="85" stroke="#404041"/>
                                                            </svg>
                                                            <br />
                                                            <h2>Sedang Di Proses ...</h2>
                                                            </center>
                                                        <?php
                                                    }                                                 
                                                }                                                
                                            ?>
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