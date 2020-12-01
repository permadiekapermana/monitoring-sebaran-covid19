<?php

include "../../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];


if ($page=='Users' AND $act=='input'){

$username     = $_POST['username'];
$password     = sha1($_POST['password']);
$nama         = $_POST['nama'];
$level        = $_POST['level'];

$query=mysql_query("INSERT INTO users (username, password, nama, level) VALUES ('$username', '$password', '$nama', '$level')"); 
header('location:../../menu.php?page='.$page);

}
  

elseif ($page=='Users' AND $act=='update'){
  if (empty($_POST[password]) ){   

  $id_user      = $_POST['id_user'];
  $username     = $_POST['username'];
  $nama         = $_POST['nama'];
  $level        = $_POST['level'];
  
  $query=mysql_query("UPDATE Users SET username='$username', nama='$nama', level='$level' WHERE id_user='$id_user'"); 							 
  header('location:../../menu.php?page='.$page);

  }
  else {

  $id_user      = $_POST['id_user'];
  $username     = $_POST['username'];
  $password     = sha1($_POST['password']);
  $nama         = $_POST['nama'];
  $level        = $_POST['level'];
  
  $query=mysql_query("UPDATE Users SET username='$username', password='$password', nama='$nama', level='$level' WHERE id_user='$id_user'"); 							 
  header('location:../../menu.php?page='.$page);

  }

}

elseif ($page=='Users' AND $act=='delete'){

mysql_query("DELETE FROM users WHERE id_user='$_GET[id]'");
header('location:../../menu.php?page='.$page);

}


?>
