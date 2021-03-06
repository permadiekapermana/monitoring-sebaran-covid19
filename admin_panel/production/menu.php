<?php
  include "../config/koneksi.php";
  error_reporting(0);
  session_start(0); 
  if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
    echo "<script>alert('Untuk mengakses sistem, Anda harus login'); window.location = '../'</script>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin: Monitoring Sebaran Covid-19</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="../../client/images/covid-logo.png">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#logoutModal" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Log Out</h5>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Apakah anda yakin ingin Log Out ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="logout.php"><button type="button" class="btn btn-primary">Log Out</button></a>
              </div>
            </div>
          </div>
        </div>
        <!-- /Modal Logout -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?page=Dashboard" class="brand-link">      
      <span class="brand-text font-weight-light">Monitoring Covid-19</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo " $_SESSION[nama]"; ?></a>
          <a href="#" class="d-block"><?php echo " $_SESSION[level]"; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php  if ($_SESSION['level']=='Superadmin' ){ ?> 
          <li class="nav-item">
            <a href="?page=Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-header">KELOLA ADMIN</li>
          
          <li class="nav-item">
            <a href="?page=Users" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-header">DATA MASTER</li>
          
          <li class="nav-item">
            <a href="?page=JenisKelamin" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Jenis Kelamin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=Status" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Status Pasien
              </p>
            </a>
          </li>
          <li class="nav-header">DATA PASIEN</li>
          
          <li class="nav-item">
            <a href="?page=Pasien" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Pasien
              </p>
            </a>
          </li>
          <?php } elseif ($_SESSION['level']=='Admin' ){ ?>
          <li class="nav-item">
            <a href="?page=Dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-header">DATA MASTER</li>
          
          <li class="nav-item">
            <a href="?page=JenisKelamin" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Jenis Kelamin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=Status" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Status Pasien
              </p>
            </a>
          </li>
          <li class="nav-header">DATA PASIEN</li>
          
          <li class="nav-item">
            <a href="?page=Pasien" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Pasien
              </p>
            </a>
          </li>
          <?php }?>
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
            <h1 class="m-0"><?php echo " $_GET[page]"; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?Page=Dashboard">Home</a></li>
              <li class="breadcrumb-item active"><?php echo " $_GET[page]"; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php
      include "page.php";
    ?>

  

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="https://permadiekapermana.github.io" target="_blank">Permadi Eka Permana</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Template by <b>AdminLTE</b>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard2.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["colvis"]
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
<script>
 
function harusAngka(evt){
 var charCode = (evt.which) ? evt.which : event.keyCode
 if ((charCode < 48 || charCode > 57)&&charCode>32)
 return false;
 return true;
}
 
 
</script>
<!-- Page specific script -->
<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

    var areaChartData = {
      <?php
      $positif  = mysql_query("SELECT tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' GROUP BY tgl_input ORDER BY tgl_input");
      $positif2  = mysql_query("SELECT COUNT(tgl_input) as tgl_input FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' GROUP BY tgl_input ORDER BY tgl_input DESC");
      ?>
      labels  : [<?php while ($p = mysql_fetch_array($positif)) { echo '"' . $p['tgl_input'] . '",';}?>],
      datasets: [
        {
          label               : 'Digital Goods',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?php while ($p2 = mysql_fetch_array($positif2)) { echo '"' . $p2['tgl_input'] . '",';}?>]
        }
      ]
    }

    var areaChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
      legend: {
        display: false
      },
      scales: {
        xAxes: [{
          gridLines : {
            display : false,
          }
        }],
        yAxes: [{
          gridLines : {
            display : false,
          }
        }]
      }
    }

    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas, {
      type: 'line',
      data: areaChartData,
      options: areaChartOptions
    })

    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [        
          '< 17 Tahun',
          '17 - 40 Tahun',
          '> 40 Tahun',
      ],
      datasets: [
        {
        <?php
        $bawah17  = mysql_query("SELECT COUNT(usia) as umur FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' AND usia<17");
        $one = mysql_fetch_array($bawah17);
        $empatpuluh  = mysql_query("SELECT COUNT(usia) as umur FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' AND usia BETWEEN 17 AND 40");
        $two = mysql_fetch_array($empatpuluh);
        $lebihempatpuluh  = mysql_query("SELECT COUNT(usia) as umur FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif' AND usia>40");
        $three = mysql_fetch_array($lebihempatpuluh);
        ?>
          data: [<?php echo "$one[umur]"; ?>,<?php echo "$two[umur]"; ?>,<?php echo "$three[umur]"; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = {
      labels: [
          'Meninggal',
          'Sembuh',
          'Positif',
          'Dirawat',
      ],
      datasets: [
        {
        <?php
        $one  = mysql_query("SELECT COUNT(id_pasien) as id FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Meninggal'");
        $o = mysql_fetch_array($one);
        $two  = mysql_query("SELECT COUNT(id_pasien) as id FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Sembuh'");
        $t = mysql_fetch_array($two);
        $tri  = mysql_query("SELECT COUNT(id_pasien) as id FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif'");
        $tr = mysql_fetch_array($tri);
        $four  = mysql_query("SELECT COUNT(id_pasien) as id FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Dirawat'");
        $f = mysql_fetch_array($four);
        ?>
          data: [<?php echo "$o[id]"; ?>,<?php echo "$t[id]"; ?>,<?php echo "$tr[id]"; ?>,<?php echo "$f[id]"; ?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', 'blue'],
        }
      ]
    }
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })

    
  })
</script>
</body>
</html>
