<?php
include "../config/koneksi.php";

$aksi="page/page_jk/aksi_jk.php";

switch($_GET[act]){

default:

?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="?page=JenisKelamin&act=tambah"><button type="button" class="btn btn-round btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Jenis Kelamin</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = mysql_query("SELECT * FROM `jenis_kelamin` ORDER BY id_jk ASC");
                  $no = 1;
                  while($r=mysql_fetch_array($tampil)){                  
                  ?>
                  <tr>                  
                    <td width="17%"><?php echo"$no"; ?></td>
                    <td><?php echo"$r[jk]"; ?></td>
                    <td width="20%">
                    <a href='<?php echo"?page=JenisKelamin&act=edit&id=$r[id_jk]"; ?>' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href="<?php echo"$aksi?page=JenisKelamin&act=delete&id=$r[id_jk]"; ?>" class="btn btn-danger" <?php echo" onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\" ";?>><i class='fa fa-trash'></i> Delete</a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID Jenis Kelamin</th>
                    <th>Jenis Kelamin</th>
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
                <h3 class="card-title">Tambah Jenis Kelamin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=JenisKelamin&act=input"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="id_jk">ID Jenis Kelamin</label>
                    <?php
                    $query = mysql_query("SELECT max(id_jk) as idTerbesar FROM jenis_kelamin");
                    $data = mysql_fetch_array($query);
                    $idTerbesar = $data['idTerbesar'];
                    $idTerbesar++;
                    ?>
                    <input type="text" class="form-control" id="id_jk" value="<?php echo"$idTerbesar"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_jk" name="id_jk" value="<?php echo"$idTerbesar"; ?>">
                    <span>ID Jenis Kelamin dibuat otomatis.</span>
                  </div>
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jk" name="jk" placeholder="Masukkan Jenis Kelamin" required>
                  </div>
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
$edit = mysql_query("SELECT * FROM `jenis_kelamin` WHERE id_jk='$_GET[id]'");
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
                <h3 class="card-title">Ubah Jenis Kelamin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=JenisKelamin&act=update"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="id_jk">ID Jenis Kelamin</label>
                    <input type="text" class="form-control" id="id_jk" value="<?php echo"$r[id_jk]"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_jk" name="id_jk" value="<?php echo"$r[id_jk]"; ?>">
                    <span>ID Jenis Kelamin tidak dapat diubah.</span>
                  </div>
                  <div class="form-group">
                    <label for="jk">Jenis Kelamin</label>
                    <input type="text" class="form-control" id="jk" name="jk" value="<?php echo"$r[jk]"; ?>" placeholder="Masukkan Jenis Kelamin" required>
                  </div>
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