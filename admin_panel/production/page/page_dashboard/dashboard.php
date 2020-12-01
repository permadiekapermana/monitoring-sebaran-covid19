<?php
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pasien Sembuh</span>
                <span class="info-box-number">
                <?php
                $sembuh   = mysql_query("SELECT COUNT(*) as total FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Sembuh'");
                $a        = mysql_fetch_array($sembuh);
                ?>
                  <?php echo"$a[total]"; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pasien Dirawat</span>
                <span class="info-box-number">
                <?php
                $dirawat   = mysql_query("SELECT COUNT(*) as total FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Dirawat'");
                $b        = mysql_fetch_array($dirawat);
                ?>
                  <?php echo"$b[total]"; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pasien Positif</span>
                <span class="info-box-number">
                <?php
                $positif   = mysql_query("SELECT COUNT(*) as total FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Positif'");
                $c        = mysql_fetch_array($positif);
                ?>
                  <?php echo"$c[total]"; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pasien Meninggal</span>
                <span class="info-box-number">
                <?php
                $meninggal   = mysql_query("SELECT COUNT(*) as total FROM pasien INNER JOIN status ON pasien.id_status=status.id_status WHERE status='Meninggal'");
                $d        = mysql_fetch_array($meninggal);
                ?>
                  <?php echo"$d[total]"; ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-12">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Jumlah Total Pasien Positif Corona per-Hari</h3>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="row">
            <div class="col-md-6">
              <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jumlah Total Pasien Positif Corona berdasarkan Usia</h3>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            <div class="col-md-6">
              <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jumlah Total Pasien Positif Corona berdasarkan Status</h3>
              </div>
              <div class="card-body">
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            </div>

          </div>

        </div>
        <!-- /.row -->      
      </div>
      <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
?>