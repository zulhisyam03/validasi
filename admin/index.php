<?php
session_start();
include "koneksi.php";
if((empty($_SESSION['acount_user'])) and (empty($_SESSION['account_password'])))
{
?> <script>location.href='login.php';</script> <?php
}
else if((!empty($_SESSION['account_user'])) and (!empty($_SESSION['account_password']))){
    $emailakun=$_SESSION['account_user'];
    $queryuser=$db->query("SELECT * FROM akun Where email='$emailakun'");
    $cekakun=mysqli_num_rows($queryuser);
    if($cekakun>0){
        echo "<script>location.href='akun/';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- CHART LINK -->
	    <link rel="stylesheet" type="text/css" href="js/dist/Chart.min.css">
	    <script type="text/javascript" src="js/dist/Chart.min.js"> </script>
	    <!-- END -->

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>UMKM | Telkom Application</title>
        <link rel="icon" href="assets/images/avatars/logo_telkom.png">

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<script src="js/Chart.js"></script>
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-colorpicker.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->
        <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css" />

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<script type="text/javascript">
	      $(document).ready(function(){
	          $("#banner").hide();
	          $('#banner').slideDown(2000);
	          $('#upload').hide();
	          $('#but').click(function(){
	            $('#upload').slideToggle();
	          });
	      });

	      
	    </script>

	    <style type="text/css">
	            .kot {
	                width: 50%;
	                margin: 15px auto;
	            }
	    </style>

	</head>

	<body class="no-skin">

		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.php" class="navbar-brand">
						<small>
							<img src="assets/images/avatars/logo_telkom.png" width="23px" height="23px">
							UMKM TELKOM
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/avatar5.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Admin
								</span>

							<i class="ace-icon fa fa-caret-down"></i>
							</a>
                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

                                <li>
									<a href="seting.php">
										<i class="ace-icon fa fa-gear"></i>
										Seting Admin
									</a>
								</li>
								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>

							</ul>

						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>


		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

                <div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<img src="assets/images/avatars/logo_telkom2.png" width="90px" height="100px" align="center" style="margin-top:10px;margin-bottom:10px;">
                    <center><strong>UMKM TELKOM<br/>ADMIN<p></p></strong></center>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">

					<li class="active open">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list-alt"></i>
							<span class="menu-text"> Data </span>
                        <b class="arrow fa fa-angle-down"></b>
						</a>

                        <b class="arrow"></b>

						<ul class="submenu">
							<li class="active">
								<a href="../umkm">
									<i class="menu-icon fa fa-caret-right"></i>
									Laporan UMKM
								</a>

								<b class="arrow"></b>
							</li>
                            <li class="">
								<a href="akun.php">
									<i class="menu-icon fa fa-caret-right"></i>
									Daftar UMKM
								</a>

								<b class="arrow"></b>
							</li>
                        </ul>

					</li>
				<!--
                    <li class="">
						<a href="profile.php" id='' data-toggle='' data-id="">
							<i class="menu-icon fa fa-gears "></i>
							<span class="menu-text"> Profile </span>
						</a>

						<b class="arrow"></b>
					</li>
				-->

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">Home</a>
							</li>

							<li class="">
								<a href="#">Data</a>
							</li>
							<li class="active">Laporan UMKM</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
								<div class="row">
									<div class="col-xs-12">
										<div class="page-header">
                                            <h1>
                                                UMKM
                                                <small>
                                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                                    Laporan UMKM
                                                </small>
                                            </h1>
                                        </div><!-- /.page-header -->

										<div class="clearfix" style="padding-bottom:5px;">

										</div>

<!-- SCRIPT PROSES SIMPAN -->
<?php
  if (isset($_POST['save_laporan'])) {
    # code...
    $tgl_in     =$_POST['tgl'];
    $jml_masuk  =preg_replace("/[^0-9]/", "", $_POST['pemasukan']);
    $ket_masuk  =$_POST['ket_pemasukan'];
    $jml_keluar =preg_replace("/[^0-9]/", "", $_POST['pengeluaran']);
    $ket_keluar =$_POST['ket_pengeluaran'];
    $namausaha 	=$_POST['namausaha'];

    $cekemail	= $db->query("SELECT * FROM umkm WHERE nama_usaha='$namausaha' LIMIT 1");
    $res_email	= mysqli_fetch_array($cekemail);
    $email_usaha= $res_email['email'];

    if ($tgl_in=="") {
      # code...
      echo '<div class="alert alert-danger" style=";width:100%;>';
      echo '<button type="button" class="close" data-dismiss="alert" style="right:0px;position:absolute;">';
      echo '<i class="ace-icon fa fa-times"></i>';
      echo '</button>&nbsp;&nbsp;';
      echo '<STRONG><i class="ace-icon fa fa-warning"></i> ERROR</STRONG> Silahkan Isi Tanggal !!!';
      echo '</div>';
    }
    else {
      # code...
      $qsave=$db->query("INSERT INTO pembukuan (email,tgl,masuk_harian,ket_masuk,keluar_harian,ket_keluar) VALUES('$email_usaha','$tgl_in','$jml_masuk','$ket_masuk','$jml_keluar','$ket_keluar')");

      echo '<script>alert("Sukses Tambah Laporan");window.location="../akun/"</script>';
    }
  }

  # SCRIPT DELETE
  if (isset($_GET['no_id'])) {
    # code...
    $no_id  = $_GET['no_id'];
    $delete = $db->query("DELETE FROM pembukuan WHERE id='$no_id'");

    echo "<script>window.location='../umkm'</script>";
  }
  #===== END SCRIPT ========

  #SCRIPT TAHUN
  if (isset($_POST['th'])) {
    # code...

    $tahun 		= $_POST['tahun'];
    $nm 		= $_POST['nm_usaha'];

    $a = $db->query("SELECT * FROM umkm WHERE email='$nm' LIMIT 1");
    $b = mysqli_fetch_array($a);

    $n 			= $b['nama_usaha'];
  }
  else{
    $tahun = "";
    $nm    = "";
    $n 	   = $nm;
  }
  #===== END SCRIPT ========
?>
										<!-- div.dataTables_borderWrap -->
										<div class="row">
                                            <div class="col-xs-12">
                                            <center>

                                            	<!-- GRAFIK SCRIPT -->
					                            <?php 
					                            $qgrafik_bulan  = $db->query("SELECT CONCAT(MONTHname(tgl),' ',YEAR(tgl)) as bulan FROM pembukuan WHERE email='$nm' and YEAR(tgl)='$tahun' GROUP BY MONTH(tgl) ORDER BY tgl ASC");
												$qgrafik_masuk=$db->query("SELECT email,id,tgl,SUM(masuk_harian) AS masuk_bulanan From pembukuan WHERE email='$nm' and YEAR(tgl)='$tahun' GROUP BY CONCAT(YEAR(tgl),month(tgl)) ORDER BY tgl ASC");
												$qgrafik_keluar=$db->query("SELECT SUM(keluar_harian) AS keluar_bulanan From pembukuan WHERE email='$nm' and YEAR(tgl)='$tahun' GROUP BY CONCAT(YEAR(tgl),month(tgl)) ORDER by tgl ASC");

												$cektahun = $db->query("SELECT YEAR(tgl) as tahun FROM pembukuan GROUP by YEAR(tgl)");
												$qnm_usaha= $db->query("SELECT * FROM umkm");
					                            ?>
					                            	<div class="kot">
					                            		<form action="" method="post">
					                            		   <select class="chosen-select" name="nm_usaha" data-placeholder="Nama Usaha .." style="width:140px;text-align:left;">
						                                    <option value=""></option>
						                                    <?php 
						                                    while($datanm_usaha=mysqli_fetch_array($qnm_usaha)){
						                                      echo "<option value=".$datanm_usaha['email'].">".$datanm_usaha['nama_usaha']."</option>";
						                                    }
						                                    ?>
						                                  </select>	
						                                  <select class="chosen-select" name="tahun" data-placeholder="Tahun ..." style="width:140px;text-align:left;">
						                                    <option value=""></option>
						                                    <?php 
						                                    while($datatahun=mysqli_fetch_array($cektahun)){
						                                      echo "<option value=".$datatahun['tahun'].">".$datatahun['tahun']."</option>";
						                                    }
						                                    ?>
						                                  </select>
						                                  <button class="btn btn-info btn-sm" type="submit" name="th" style="height:32px;">
						                                          <i class="ace-icon fa fa-search bigger-110"></i>
						                                  </button>
						                                </form>
											            <canvas id="myChart" width="80" height="40"></canvas>
											    	</div>
<script>

var barChartData = {
  labels: [
    <?php while ($b = mysqli_fetch_array($qgrafik_bulan)) { echo '"' . $b['bulan'] . '",';}?>
  ],

  datasets: [
    {
      label: "Masuk",
      backgroundColor: "lightblue",
      borderColor: "blue",
      borderWidth: 1,
      data: [<?php while ($p = mysqli_fetch_array($qgrafik_masuk)) { echo '"' . $p['masuk_bulanan'] . '",';}?>]
    },
    {
      label: "Keluar",
      backgroundColor: "pink",
      borderColor: "red",
      borderWidth: 1,
      data: [<?php while ($p = mysqli_fetch_array($qgrafik_keluar)) { echo '"' . $p['keluar_bulanan'] . '",';}?>]
    }
  ]
};

var chartOptions = {
  responsive: true,
  legend: {
    position: "top"
  },
  title: {
    display: true,
    text: "<?php echo $n.' Tahun '.$tahun;?>"
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }
    }]
  }
}

  var ctx = document.getElementById("myChart").getContext("2d");
  window.myBar = new Chart(ctx, {
    type: "bar",
    data: barChartData,
    options: chartOptions
  });

</script>											    	
<?php /* ============== CHART LINE ======================
											      	<script  type="text/javascript">

											    	  var ctx = document.getElementById("myChart").getContext("2d");
											    	  var data = {
											    	            labels: [<?php while ($b = mysqli_fetch_array($qgrafik_bulan)) { echo '"' . $b['bulan'] . '",';}?>],
											    	            datasets: [
											    	            {
											    	              label: "Pemasukan",
											                    fill: false,
											                    lineTension: 0.1,
											                    backgroundColor: "rgba(59, 100, 222, 1)",
											                    borderColor: "rgba(59, 100, 222, 1)",
											                    pointHoverBackgroundColor: "rgba(59, 100, 222, 1)",
																	        pointHoverBorderColor: "rgba(59, 100, 222, 1)",
											    	              data: [<?php while ($p = mysqli_fetch_array($qgrafik_masuk)) { echo '"' . $p['masuk_bulanan'] . '",';}?>]
											    	            },
											                  {
											    	              label: "Pengeluaran",
											                    fill: false,
											                    lineTension: 0.1,
											                    backgroundColor: "rgba(201, 29, 29, 1)",
											                    borderColor: "rgba(201, 29, 29, 1)",
											                    pointHoverBackgroundColor: "rgba(201, 29, 29, 1)",
																	        pointHoverBorderColor: "rgba(201, 29, 29, 1)",
																	        data: [<?php while ($p = mysqli_fetch_array($qgrafik_keluar)) { echo '"' . $p['keluar_bulanan'] . '",';}?>]
											    	            }
											    	            ]
											    	            };

											    	  var myBarChart = new Chart(ctx, {
											    	            type: 'line',
											    	            data: data,
											    	            options: {
											    	            barValueSpacing: 20,
											    	            scales: {
											    	              yAxes: [{
											    	                  ticks: {
											    	                      min: 0,
											    	                  }
											    	              }],
											    	              xAxes: [{
											    	                          gridLines: {
											    	                              color: "rgba(0, 0, 0, 0)",
											    	                          }
											    	                      }]
											    	              }
											    	          }
											    	        });
											    	</script>
					                            <!-- END SCRIPT -->
*/?>
	                                            <a href="#">
						                          <button id='but' class="btn btn-primary" style="width:100%;"><span style='color:white;font-size:15px;font-weight:bolder;letter-spacing:1px;'>Input Pendapatan Harian <i class="fa fa-icon fa-pencil-square-o"></i></span></button>
						                        </a>

						                        <div id='upload' style="width:100%;background-color:#f5f0f0;margin:0;">
						                          <table style="border: 0;">
						                            <form action="" method="post" enctype="multipart/form-data">
						                              <tr><td>&nbsp;</td></tr>

						                              <tr><td>
						                              <div class="form-group">
						                                  <label style="width:100px;margin-left:40px;"  class="col-sm-1 control-label no-padding-right" for="form-field-1"> Tanggal
						                                  </label>
						                                  <div class="col-sm-5" style="margin-left:60px;">
						                                      <div class="row">
						                                          <div class="col-xs-8">
						                                              <div class="input-group" style="width:150px;">
						                                                  <input class="form-control date-picker" id="id-date-picker-1" type="text" data-date-format="yyyy-mm-dd" name="tgl"/>
						                                                  <span class="input-group-addon">
						                                                      <i class="fa fa-calendar bigger-110"></i>
						                                                  </span>
						                                              </div>
						                                          </div>
						                                      </div>
    														 </div>
    													</div>
						                            </td></tr>
						                            <tr><td>&nbsp;</td></tr>
						                            <tr>
						                            	<td>
						                            		<div class="form-group">
							                                  <label style="width:100px;margin-left:40px;" class="col-sm-1 control-label no-padding-right" for="form-field-1"> Nama Usaha
							                                  </label>
							                                  <div class="col-sm-5" style="margin-left:60px;">
							                                      <div class="row">
							                                          <div class="col-xs-8">
							                                              <div class="input-group" style="width:150px;">
							                                                  <select class="chosen-select" name="namausaha" data-placeholder="Pilih..." style="width:140px;text-align:left;">
												                                <option value=""></option>
												                                <?php #SCRIPT SELECT NAMA USAHA =================
												                                	$qcusaha = $db->query("SELECT * FROM umkm");
												                                	while($dcusaha=mysqli_fetch_array($qcusaha)){
												                                		$nama_usaha = $dcusaha['nama_usaha'];
												                                		echo "<option value='".$nama_usaha."'>".strtoupper($nama_usaha)."</option>";
												                                	}
												                                ?>
												                              </select>
							                                                  <span class="input-group-addon">
							                                                      <i class="fa fa-user bigger-110"></i>
							                                                  </span>
							                                              </div>
							                                          </div>
							                                      </div>
	    														 </div>
	    													</div>
						                            	</td>
						                            </tr>
						                            <tr><td>&nbsp;</td></tr>
						                            <tr><td>
						                              <div class="form-group">
						                                  <label style="width:100px;margin-left:40px;"  class="col-sm-1 control-label no-padding-right" for="form-field-1"> Pengeluaran
						                                  </label>
						                                  <div class="col-sm-5" style="margin-left:60px;">
						                                    <div class="row">
						                                        <div class="col-xs-8">
						                                            <div class="input-group" style="width:150px;">
						                                              <input type="text" name="pengeluaran" id="rupiah" placeholder="Pengeluaran" class="col-xs-10 col-sm-5" style="width:110px;" />
						                                              <span class="input-group-addon">
						                                                  <i class="fa fa-money bigger-110"></i>
						                                              </span>

						                                              <input type="text" name="ket_pengeluaran" id="form-field-1" placeholder="Keterangan" class="col-xs-10 col-sm-5" style="width:150px;" />
						                                              <span class="input-group-addon">
						                                                  <i class="fa fa-commenting bigger-110"></i>
						                                              </span>

						                                            </div>
						                                        </div>
						                                    </div>
						                                  </div>
						                              </div>
						                            </td></tr>
						                            <tr><td>&nbsp;</td></tr>
						                            <tr><td>
							                              <div class="form-group">
							                                  <label style="width:100px;margin-left:40px;"  class="col-sm-1 control-label no-padding-right" for="form-field-1"> Pemasukan
							                                  </label>
							                                  <div class="col-sm-5" style="margin-left:60px;">
							                                    <div class="row">
							                                        <div class="col-xs-8">
							                                            <div class="input-group" style="width:150px;">
							                                              <input type="text" name="pemasukan" id="rupiah2" placeholder="Pemasukan" class="col-xs-10 col-sm-5" style="width:110px;" />
							                                              <span class="input-group-addon">
							                                                  <i class="fa fa-money bigger-110"></i>
							                                              </span>

							                                              <input type="text" name="ket_pemasukan" id="form-field-1" placeholder="Keterangan" class="col-xs-10 col-sm-5" style="width:150px;" />
							                                              <span class="input-group-addon">
							                                                  <i class="fa fa-commenting bigger-110"></i>
							                                              </span>
							                                            </div>
							                                        </div>
							                                    </div>
							                                  </div>
							                              </div>
						                            	</td></tr>
							                            </td></tr>
							                            <tr><td>&nbsp;</td></tr>
							                            <tr><td><center><button type='submit' name="save_laporan" class='btn btn-primary' style='width:100px;height:50px;font-size:18px;'><i class='ace-icon fa fa-save'></i>Save</button><p>&nbsp;<p /></td></tr>
						                        	</table>
						                        </div>
						                        <br>
					                            </form>
                                            </center>                                  
				                                <table id="dynamic-table" class="table table-bordered table-hover" >
				                                  <thead>
				                                    <tr>
				                                      <th class="center" style="width:50px;" >No</th>
				                                      <th style="" >Nama Usaha</th>
				                                      <th style="" >Bulan</th>
				                                      <th style="" >Pemasukan Bulanan</th>
				                                      <th style="" >Pengeluaran Bulanan</th>
				                                      <th style="" >Aksi</th>
				                                    </tr>

				                                  </thead>
				                                  <tbody>
				                                    <?php
				                                      $no=1;

				                                      $qpembukuan=$db->query("SELECT email,id,tgl,SUM(masuk_harian) AS masuk_bulanan,SUM(keluar_harian) AS keluar_bulanan From pembukuan GROUP BY email, CONCAT(YEAR(tgl),month(tgl)) DESC");
				                                      while($dpembukuan=mysqli_fetch_array($qpembukuan)){
				                                        $tgl=date("M Y", strtotime($dpembukuan['tgl']));

				                                        #CEK NAMA USAHA ==========
				                                        $email 	= $dpembukuan['email'];
				                                        $qusaha	= $db->query("SELECT * FROM umkm WHERE email='$email' LIMIT 1");
				                                        $dusaha	= mysqli_fetch_array($qusaha);
				                                        #==========================
				                                    ?>
				                                    <tr>
				                                      <td>
				                                        <?php echo $no;?>
				                                      </td>
				                                      <td>
				                                        <?php echo $dusaha['nama_usaha'];?>
				                                      </td>
				                                      <td>
				                                        <?php echo $tgl;?>
				                                      </td>
				                                      <td>
				                                        <?php echo "Rp. ".number_format($dpembukuan['masuk_bulanan'], 0,',','.');?>
				                                      </td>
				                                      <td>
				                                        <?php echo "Rp. ".number_format($dpembukuan['keluar_bulanan'], 0,',','.');?>
				                                      </td>
				                                      <td style="text-align: center;">
				                                        <div class="hidden-sm hidden-xs action-buttons">
				                                          <a href='#myModalbulan' class='blue' id='custId' data-toggle='modal' data-id="<?php echo $dpembukuan['id'];?>">
				                                            <i class="ace-icon fa fa-eye bigger-130"></i>
				                                          </a>

				                                          <a class="delete-link red" href="?no_id=<?php echo $dpembukuan['id'];?>">
				                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
				                                          </a>
				                                          
				                                          <a href='cetak.php?id=<?php echo $dpembukuan['id'];?>&kategori=bulanan' target='_blank' class='red' id='' data-toggle=''>
				                                            <i class="ace-icon fa fa-print bigger-130"></i>
				                                          </a>
				                                        </div>
				                                      </td>
				                                    </tr>
				                                    <?php
				                                      $no=$no + 1;
				                                      }
				                                    ?>
				                                  </tbody>
				                                </table>
                                            </div>
										</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Laporan Harian</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalminggu" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Laporan Mingguan</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModalbulan" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Laporan Bulanan</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModaltahun" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detail Laporan Tahunan</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">UMKM TELKOM</span>
							Aplikasi &copy; 2020
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

<script src="js/Chart.js"></script>

<!-- SCRIPT FORMAT RUPIAH 1 -->
    <script type="text/javascript">

        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split       = number_string.split(','),
          sisa        = split[0].length % 3,
          rupiah        = split[0].substr(0, sisa),
          ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }

          rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
          return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
      </script>

<!-- SCRIPT FORMAT RUPIAH -->
    <script type="text/javascript">

        var rupiah2 = document.getElementById('rupiah2');
        rupiah2.addEventListener('keyup', function(e){
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah2.value = formatRupiah(this.value, 'Rp. ');
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix){
          var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split       = number_string.split(','),
          sisa        = split[0].length % 3,
          rupiah2        = split[0].substr(0, sisa),
          ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

          // tambahkan titik jika yang di input sudah menjadi angka ribuan
          if(ribuan){
            separator = sisa ? '.' : '';
            rupiah2 += separator + ribuan.join('.');
          }

          rupiah2 = split[1] != undefined ? rupiah2 + ',' + split[1] : rupiah2;
          return prefix == undefined ? rupiah2 : (rupiah2 ? 'Rp. ' + rupiah2 : '');
        }
      </script>

		<!-- basic scripts DETIL -->
<script type="text/javascript">

    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modal_detil.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
	  $('#myModalminggu').on('show.bs.modal', function (e) {
	      var rowid = $(e.relatedTarget).data('id');
	      //menggunakan fungsi ajax untuk pengambilan data
	      $.ajax({
	          type : 'post',
	          url : 'modal_detilminggu.php',
	          data :  'rowid='+ rowid,
	          success : function(data){
	          $('.fetched-data').html(data);//menampilkan data ke dalam modal
	          }
	      });
	   });
	});

	$(document).ready(function(){
	  $('#myModalbulan').on('show.bs.modal', function (e) {
	      var rowid = $(e.relatedTarget).data('id');
	      //menggunakan fungsi ajax untuk pengambilan data
	      $.ajax({
	          type : 'post',
	          url : 'modal_detilbulan.php',
	          data :  'rowid='+ rowid,
	          success : function(data){
	          $('.fetched-data').html(data);//menampilkan data ke dalam modal
	          }
	      });
	   });
	});

	$(document).ready(function(){
	  $('#myModaltahun').on('show.bs.modal', function (e) {
	      var rowid = $(e.relatedTarget).data('id');
	      //menggunakan fungsi ajax untuk pengambilan data
	      $.ajax({
	          type : 'post',
	          url : 'modal_detiltahun.php',
	          data :  'rowid='+ rowid,
	          success : function(data){
	          $('.fetched-data').html(data);//menampilkan data ke dalam modal
	          }
	      });
	   });
	});

  </script>

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>
        <script src="sweetalert-master/dist/sweetalert.min.js"></script>

		<!-- <![endif]-->
		<!--[if IE]> -->
				<!--
				//make content sliders resizable using jQuery UI (you should include jquery ui files)
				//$('#right-menu > .modal-dialog').resizable({handles: "w", grid: [ 20, 0 ], minWidth: 200, maxWidth: 600});

<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

        <!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
        <!-- page specific plugin scripts -->
    <script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.buttons.min.js"></script>
		<script src="assets/js/buttons.flash.min.js"></script>
		<script src="assets/js/buttons.html5.min.js"></script>
		<script src="assets/js/buttons.print.min.js"></script>
		<script src="assets/js/buttons.colVis.min.js"></script>
		<script src="assets/js/dataTables.select.min.js"></script>

		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

        <!-- SCRIPT DELETE -->
        <script>
        jQuery(document).ready(function($){
            $('.delete-link').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Alert',
                        text: 'Hapus Data?',
                        html: true,
                        confirmButtonColor: '#d9534f',
                        showCancelButton: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
    </script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable =
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],


					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,

					//,
					//"sScrollY": "200px",
					//"bPaginate": false,

					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element

					//"iDisplayLength": 50


					select: {
						style: 'multi'
					}
			    } );



				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';

				myTable.buttons().container().appendTo( $('.tableTools-container') );

				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});


				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {

					defaultColvisAction(e, dt, button, config);


					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});

				////

				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);





				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );




				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);

				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox], #dynamic-table_wrapper input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$('#dynamic-table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) myTable.row(row).select();
						else  myTable.row(row).deselect();
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(this.checked) myTable.row(row).deselect();
					else myTable.row(row).select();
				});

				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});

                if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true});
					//resize the chosen on window resize
			/*
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen'); */
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});


					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}


				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header

					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});

				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if($row.is('.detail-row ')) return;
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});



				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();

					var off2 = $source.offset();
					//var w2 = $source.width();

					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}


				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});


				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});


				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});




				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});


			})
		</script>
	</body>
</html>
