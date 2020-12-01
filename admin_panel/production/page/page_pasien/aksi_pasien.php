<?php

error_reporting(0);

include "../../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];


if ($page=='Pasien' AND $act=='input'){

$id_pasien     = $_POST['id_pasien'];
$id_jk         = $_POST['id_jk'];
$id_status     = $_POST['id_status'];
$tgl_input     = $_POST['tgl_input'];
$usia          = $_POST['usia'];

mysql_query("INSERT INTO pasien (id_pasien, id_jk, id_status, tgl_input, usia) VALUES ('$id_pasien', '$id_jk', '$id_status', '$tgl_input', '$usia')");
header('location:../../menu.php?page='.$page);

}
  

elseif ($page=='Pasien' AND $act=='update'){

  $id_pasien     = $_POST['id_pasien'];
  $id_jk         = $_POST['id_jk'];
  $id_status     = $_POST['id_status'];
  $tgl_input     = $_POST['tgl_input'];
  $usia          = $_POST['usia'];
  
  $query=mysql_query("UPDATE pasien SET id_jk='$id_jk', id_status='$id_status', tgl_input='$tgl_input', usia='$usia' WHERE id_pasien='$id_pasien'"); 							 
  header('location:../../menu.php?page='.$page);

}

elseif ($page=='Pasien' AND $act=='delete'){

mysql_query("DELETE FROM pasien WHERE id_pasien='$_GET[id]'");
header('location:../../menu.php?page='.$page);

}


?>
