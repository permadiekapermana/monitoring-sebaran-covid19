<?php
include "../config/koneksi.php";

$aksi="page/page_pasien/aksi_pasien.php";

switch($_GET[act]){

default:

?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3>Data Pasien Covid-19</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-body col-md-6">
              <form action="?page=Pasien&act=search" method="POST">
              <div class="form-group">
                  <label for="id_status">Status</label>
                  <select class="custom-select form-control-rounded0" name="id_status" id="exampleSelectBorder">
                    <option value="">-- Pilih Status --</option>
                    <?php
                    $tampil=mysql_query("SELECT * FROM status ORDER BY id_status");
                    while($r=mysql_fetch_array($tampil)){
                    ?>                    
                    <option value="<?php echo"$r[id_status]"; ?>"><?php echo"$r[status]"; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="text" class="form-control" id="usia" value="" name="usia" placeholder="Masukkan Usia">
              </div>
              <div class="form-group col-12">
                    <label for="tgl_input">Tanggal</label> <br>                 
                    Tanggal Awal <input type='date' class='form-control' value="" id='tgl_awal' name='tgl_awal'>
                    Tanggal Akhir <input type='date' class='form-control' value="" id='tgl_akhir' name='tgl_akhir'>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
              <h3 class="card-title"><a href="?page=Pasien&act=tambah"><button type="button" class="btn btn-round btn-primary mr-2"><i class="fa fa-plus"></i> Tambah Data</button></a></h3>
              <!-- <h3 class="card-title"><a href="?page=Pasien&act=tambah"><button type="button" class="btn btn-round btn-danger mr-2"><i class="fa fa-plus"></i> Export PDF</button></a></h3> <h3 class="card-title"><a href="?page=Pasien&act=tambah"><button type="button" class="btn btn-round btn-success"><i class="fa fa-plus"></i> Export Excel</button></a></h3> -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>ID Pasien</th>
                    <th>Usia (Th)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = mysql_query("SELECT pasien.tgl_input, pasien.id_pasien, pasien.usia, status.status FROM `pasien` INNER JOIN status ON pasien.id_status=status.id_status ORDER BY pasien.id_pasien ASC");
                  $no = 1;
                  while($r=mysql_fetch_array($tampil)){                  
                  ?>
                  <tr>                  
                    <td width="5%"><?php echo"$no"; ?></td>
                    <td><?php echo"$r[tgl_input]"; ?></td>
                    <td><?php echo"$r[id_pasien]"; ?></td>
                    <td><?php echo"$r[usia]"; ?></td>
                    <td><?php echo"$r[status]"; ?></td>
                    <td width="20%">
                    <a href='<?php echo"?page=Pasien&act=edit&id=$r[id_pasien]"; ?>' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href="<?php echo"$aksi?page=Pasien&act=delete&id=$r[id_pasien]"; ?>" class="btn btn-danger" <?php echo" onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\" ";?>><i class='fa fa-trash'></i> Delete</a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Usia (Th)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
      </div>
</section>

<?php
break;

case "search":
?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3>Data Pasien Covid-19</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="card-body col-md-6">
              <form action="?page=Pasien&act=search" method="POST">
              <div class="form-group">
                  <label for="id_status">Status</label>
                  <select class="custom-select form-control-rounded0" name="id_status" id="exampleSelectBorder">
                    <option value="">-- Pilih Status --</option>
                    <?php
                    $tampil=mysql_query("SELECT * FROM status ORDER BY id_status");
                    while($r=mysql_fetch_array($tampil)){
                    ?>                    
                    <option value="<?php echo"$r[id_status]"; ?>"><?php echo"$r[status]"; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              </div>
              <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="number" class="form-control" id="usia" name="usia" onkeypress='return harusAngka(event)' placeholder="Masukkan Usia">
              </div>
              <div class="form-group col-12">
                    <label for="tgl_input">Tanggal</label> <br>                 
                    Tanggal Awal <input type='date' class='form-control' id='tgl_awal' name='tgl_awal'>
                    Tanggal Akhir <input type='date' class='form-control' id='tgl_akhir' name='tgl_akhir'>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>
              <h3 class="card-title"><a href="?page=Pasien&act=tambah"><button type="button" class="btn btn-round btn-primary mr-2"><i class="fa fa-plus"></i> Tambah Data</button></a></h3>
              <!-- <h3 class="card-title"><a href="?page=Pasien&act=tambah"><button type="button" class="btn btn-round btn-danger mr-2"><i class="fa fa-plus"></i> Export PDF</button></a></h3> <h3 class="card-title"><a href="?page=Pasien&act=tambah"><button type="button" class="btn btn-round btn-success"><i class="fa fa-plus"></i> Export Excel</button></a></h3> -->
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>ID Pasien</th>
                    <th>Usia (Th)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  if($_POST['tgl_awal'] > $_POST['tgl_akhir']){
                    echo "<script>alert('Tanggal awal tidak boleh lebih besar dari tanggal akhir!');</script>";
                    header('location:menu.php?page=Pasien');
                  }

                  elseif($_POST['id_status']=='' AND $_POST['usia']=='' AND $_POST['tgl_awal']=='' AND $_POST['tgl_akhir']==''){
                  $tampil = mysql_query("SELECT pasien.tgl_input, pasien.id_pasien, pasien.usia, status.status FROM `pasien` INNER JOIN status ON pasien.id_status=status.id_status ORDER BY pasien.id_pasien ASC");
                  }
                  else{
                  $tampil = mysql_query("SELECT pasien.tgl_input, pasien.id_pasien, pasien.usia, status.status FROM `pasien` INNER JOIN status ON pasien.id_status=status.id_status WHERE pasien.id_status='$_POST[id_status]' AND usia='$_POST[usia]' AND pasien.tgl_input BETWEEN '$_POST[tgl_awal]' AND '$_POST[tgl_akhir]' ORDER BY pasien.id_pasien ASC");
                  }
                  $no = 1;
                  while($r=mysql_fetch_array($tampil)){                  
                  ?>
                  <tr>                  
                    <td width="5%"><?php echo"$no"; ?></td>
                    <td><?php echo"$r[tgl_input]"; ?></td>
                    <td><?php echo"$r[id_pasien]"; ?></td>
                    <td><?php echo"$r[usia]"; ?></td>
                    <td><?php echo"$r[status]"; ?></td>
                    <td width="20%">
                    <a href='<?php echo"?page=Pasien&act=edit&id=$r[id_pasien]"; ?>' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href="<?php echo"$aksi?page=Pasien&act=delete&id=$r[id_pasien]"; ?>" class="btn btn-danger" <?php echo" onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\" ";?>><i class='fa fa-trash'></i> Delete</a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Usia (Th)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
      </div>
</section>
<?php
break;

case "tambah":
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tambah Pasien</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=Pasien&act=input"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="tgl_input">Tanggal Input</label>
                    <?php
                    echo"
                    <input type='date' class='form-control' id='tgl_input' name='tgl_input' value='"; echo date('Y-m-d'); echo"' required>
                    "; ?>
                  </div>
                  <div class="form-group">
                    <label for="id_pasien">ID Pasien</label>
                    <?php
                    $query = mysql_query("SELECT max(id_pasien) as idTerbesar FROM pasien");
                    $data = mysql_fetch_array($query);
                    $idTerbesar = $data['idTerbesar'];
                    $urutan = (int) substr($idTerbesar, 3, 4);
                    $urutan++;
                    $huruf = "NO_";
                    $idFinal = $huruf . sprintf("%04s", $urutan);
                    ?>
                    <input type="text" class="form-control" id="id_pasien" value="<?php echo"$idFinal"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="<?php echo"$idFinal"; ?>">
                    <span>ID Pasien dibuat otomatis.</span>
                  </div>                                  
                <div class="form-group">
                  <label for="id_jk">Jenis Kelamin</label>
                  <select class="custom-select form-control-rounded0" name="id_jk" id="exampleSelectBorder" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <?php
                    $tampil=mysql_query("SELECT * FROM jenis_kelamin ORDER BY id_jk");
                    while($r=mysql_fetch_array($tampil)){
                    ?>                    
                    <option value="<?php echo"$r[id_jk]"; ?>"><?php echo"$r[jk]"; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="text" class="form-control" id="usia" name="usia" placeholder="Masukkan Usia" required>
                  </div>
                <div class="form-group">
                  <label for="id_status">Status</label>
                  <select class="custom-select form-control-rounded0" name="id_status" id="exampleSelectBorder" required>
                    <option value="">-- Pilih Status --</option>
                    <?php
                    $tampil=mysql_query("SELECT * FROM status ORDER BY id_status");
                    while($r=mysql_fetch_array($tampil)){
                    ?>                    
                    <option value="<?php echo"$r[id_status]"; ?>"><?php echo"$r[status]"; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button class="btn btn-danger" type="button" <?php echo"onclick=self.history.back()"; ?>>Cancel</button>
                  <button type="reset" class="btn btn-warning">Warning</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
      </div>
</section>
<?php
break;

case "edit":
$edit = mysql_query("SELECT * FROM `pasien` WHERE id_pasien='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Pasien</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=Pasien&act=update"; ?>" method="POST">
                <div class="card-body col-md-6">   
                  <div class="form-group">
                    <label for="tgl_input">Tanggal Input</label>
                    <?php
                    echo"
                    <input type='date' class='form-control' id='tgl_input' name='tgl_input' value='$r[tgl_input]' required>
                    "; ?>
                  </div>      
                  <div class="form-group">
                    <label for="id_pasien">ID Pasien</label>
                    <input type="text" class="form-control" id="id_pasien" value="<?php echo"$r[id_pasien]"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_pasien" name="id_pasien" value="<?php echo"$r[id_pasien]"; ?>">
                    <span>ID Pasien tidak dapat diubah.</span>
                  </div>                           
                <div class="form-group">
                  <label for="id_jk">Jenis Kelamin</label>
                  <select class="custom-select form-control-rounded0" name="id_jk" id="exampleSelectBorder" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <?php
                    $tampil_jk=mysql_query("SELECT * FROM jenis_kelamin ORDER BY id_jk");
                    while($s=mysql_fetch_array($tampil_jk)){
                    if ($r[id_jk]==$s[id_jk]){
                    ?>                    
                    <option value="<?php echo"$s[id_jk]"; ?>" selected><?php echo"$s[jk]"; ?></option>
                    <?php
                    } else {
                    ?>
                    <option value="<?php echo"$s[id_jk]"; ?>"><?php echo"$s[jk]"; ?></option>
                    <?php
                    }
                    }
                    ?>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="usia">Usia</label>
                    <input type="text" class="form-control" id="usia" name="usia" value="<?php echo"$r[usia]"; ?>" placeholder="Masukkan Usia" required>
                  </div>
                <div class="form-group">
                  <label for="id_status">Status</label>
                  <select class="custom-select form-control-rounded0" name="id_status" id="exampleSelectBorder" required>
                    <option value="">-- Pilih Status --</option>
                    <?php
                    $tampil_status=mysql_query("SELECT * FROM status ORDER BY id_status");
                    while($t=mysql_fetch_array($tampil_status)){
                    if ($r[id_status]==$t[id_status]){
                    ?>                    
                    <option value="<?php echo"$t[id_status]"; ?>" selected><?php echo"$t[status]"; ?></option>
                    <?php
                    } else {
                    ?>
                    <option value="<?php echo"$t[id_status]"; ?>"><?php echo"$t[status]"; ?></option>
                    <?php
                    }
                    }
                    ?>
                  </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button class="btn btn-danger" type="button" <?php echo"onclick=self.history.back()"; ?>>Cancel</button>
                  <button type="reset" class="btn btn-warning">Warning</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
      </div>
</section>
<?php
break;
}
?>