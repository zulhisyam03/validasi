<!DOCTYPE html>
<html>
<head>
 <title>maribelajarcoding.com</title>
 <link rel="stylesheet" type="text/css" href="dist/Chart.min.css">
 <script type="text/javascript" src="dist/Chart.min.js"> </script>
</head>
<body>
<h2 >Membuat Grafik dengan Chart.js Javascript</h2> 

<div style="width: 600px;" >
 <canvas id="myChart"></canvas>
</div>
<h4><a href="">maribelajarcoding.com</a></h4>

 <?php 
  include '../koneksi.php';
  $qgrafik_bulan  = $db->query("SELECT CONCAT(MONTHname(tgl),' ',YEAR(tgl)) as bulan FROM pembukuan WHERE email='drivezulhisyam@gmail.com' and YEAR(tgl)='2020' GROUP BY MONTH(tgl) ASC");
  $qgrafik_masuk=$db->query("SELECT email,id,tgl,SUM(masuk_harian) AS masuk_bulanan From pembukuan WHERE email='drivezulhisyam@gmail.com' and YEAR(tgl)='2020' GROUP BY CONCAT(YEAR(tgl),month(tgl)) ASC");
  $qgrafik_keluar=$db->query("SELECT SUM(keluar_harian) AS keluar_bulanan From pembukuan WHERE email='drivezulhisyam@gmail.com' and YEAR(tgl)='2020' GROUP BY CONCAT(YEAR(tgl),month(tgl)) ASC");
?>

<script>

var barChartData = {
  labels: [
    <?php while ($b = mysqli_fetch_array($qgrafik_bulan)) { echo '"' . $b['bulan'] . '",';}?>
  ],

  datasets: [
    {
      label: "Masuk",
      backgroundColor: "pink",
      borderColor: "red",
      borderWidth: 1,
      data: [<?php while ($p = mysqli_fetch_array($qgrafik_masuk)) { echo '"' . $p['masuk_bulanan'] . '",';}?>]
    },
    {
      label: "Keluar",
      backgroundColor: "lightblue",
      borderColor: "blue",
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
    text: "Chart.js Bar Chart"
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
</body>
</html>