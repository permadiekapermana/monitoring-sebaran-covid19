<?php
include "../config/koneksi.php";

$aksi="page/page_status/aksi_status.php";

switch($_GET[act]){

default:

?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="?page=Status&act=tambah"><button type="button" class="btn btn-round btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID Status</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = mysql_query("SELECT * FROM `status` ORDER BY id_status ASC");
                  $no = 1;
                  while($r=mysql_fetch_array($tampil)){                  
                  ?>
                  <tr>                  
                    <td width="17%"><?php echo"$no"; ?></td>
                    <td><?php echo"$r[status]"; ?></td>
                    <td width="20%">
                    <a href='<?php echo"?page=Status&act=edit&id=$r[id_status]"; ?>' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href="<?php echo"$aksi?page=Status&act=delete&id=$r[id_status]"; ?>" class="btn btn-danger" <?php echo" onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\" ";?>><i class='fa fa-trash'></i> Delete</a>
                    </td>
                  </tr>
                  <?php
                  $no++;
                  }
                  ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>ID Status</th>
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
                <h3 class="card-title">Tambah Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=Status&act=input"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="id_status">ID Status</label>
                    <?php
                    $query = mysql_query("SELECT max(id_status) as idTerbesar FROM status");
                    $data = mysql_fetch_array($query);
                    $idTerbesar = $data['idTerbesar'];
                    $idTerbesar++;
                    ?>
                    <input type="text" class="form-control" id="id_status" value="<?php echo"$idTerbesar"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_status" name="id_status" value="<?php echo"$idTerbesar"; ?>">
                    <span>ID Status dibuat otomatis.</span>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" placeholder="Masukkan Status" required>
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
$edit = mysql_query("SELECT * FROM `status` WHERE id_status='$_GET[id]'");
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
                <h3 class="card-title">Ubah Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=Status&act=update"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="id_status">ID Status</label>
                    <input type="text" class="form-control" id="id_status" value="<?php echo"$r[id_status]"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_status" name="id_status" value="<?php echo"$r[id_status]"; ?>">
                    <span>ID Jenis Kelamin tidak dapat diubah.</span>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo"$r[status]"; ?>" placeholder="Masukkan Status" required>
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