<?php
include "../config/koneksi.php";

$aksi="page/page_users/aksi_users.php";

switch($_GET[act]){

default:

?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a href="?page=Users&act=tambah"><button type="button" class="btn btn-round btn-primary"><i class="fa fa-plus"></i> Tambah Data</button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $tampil = mysql_query("SELECT * FROM `users` ORDER BY id_user ASC");
                  $no = 1;
                  while($r=mysql_fetch_array($tampil)){                  
                  ?>
                  <tr>                  
                    <td width="5%"><?php echo"$no"; ?></td>
                    <td><?php echo"$r[username]"; ?></td>
                    <td><?php echo"$r[nama]"; ?></td>
                    <td><?php echo"$r[level]"; ?></td>
                    <td width="20%">
                    <a href='<?php echo"?page=Users&act=edit&id=$r[id_user]"; ?>' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href="<?php echo"$aksi?page=Users&act=delete&id=$r[id_user]"; ?>" class="btn btn-danger" <?php echo" onClick=\"return confirm('Yakin ingin hapus data ? Data yang dihapus tidak dapat dipulihkan !')\" ";?>><i class='fa fa-trash'></i> Delete</a>
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
                    <th>Level</th>
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
                <h3 class="card-title">Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=Users&act=input"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="id_user">ID Users</label>
                    <?php
                    $query = mysql_query("SELECT max(id_user) as idTerbesar FROM users");
                    $data = mysql_fetch_array($query);
                    $idTerbesar = $data['idTerbesar'];
                    $idTerbesar++;
                    ?>
                    <input type="text" class="form-control" id="id_user" value="<?php echo"$idTerbesar"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo"$idTerbesar"; ?>">
                    <span>ID User dibuat otomatis.</span>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                  </div>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="level" value="Admin" checked>
                          <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="level" value="Superadmin">
                          <label class="form-check-label">Superadmin</label>
                    </div>
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
$edit = mysql_query("SELECT * FROM `users` WHERE id_user='$_GET[id]'");
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
                <h3 class="card-title">Ubah User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?php echo"$aksi?page=Users&act=update"; ?>" method="POST">
                <div class="card-body col-md-6">
                  <div class="form-group">
                    <label for="id_user">ID Users</label>
                    <input type="text" class="form-control" id="id_user" value="<?php echo"$r[id_user]"; ?>" disabled>
                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?php echo"$r[id_user]"; ?>">
                    <span>ID User tidak dapat diubah.</span>
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo"$r[username]"; ?>" placeholder="Masukkan Username" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
                    <span>Jika Password tidak ingin diubah, kosongkan.</span>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo"$r[nama]"; ?>" placeholder="Masukkan Nama" required>
                  </div>
                  <?php
                  if($r[level]=='Admin'){
                  ?>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="level" value="Admin" checked>
                          <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="level" value="Superadmin">
                          <label class="form-check-label">Superadmin</label>
                    </div>
                  </div>
                  <?php
                  }else{
                  ?>
                  <div class="form-group">
                    <label for="level">Level</label>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="level" value="Admin" >
                          <label class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="level" value="Superadmin" checked>
                          <label class="form-check-label">Superadmin</label>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
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