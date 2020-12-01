<?php

include "../../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];

if ($page=='JenisKelamin' AND $act=='input'){

$jk     = $_POST['jk'];

$query=mysql_query("INSERT INTO jenis_kelamin (jk) VALUES ('$jk')"); 
header('location:../../menu.php?page='.$page);

}
  
elseif ($page=='JenisKelamin' AND $act=='update'){    

  $id_jk    = $_POST['id_jk'];
  $jk       = $_POST['jk'];
  
$query=mysql_query("UPDATE jenis_kelamin SET jk='$jk' WHERE id_jk='$id_jk'"); 							 
header('location:../../menu.php?page='.$page);

}

elseif ($page=='JenisKelamin' AND $act=='delete'){

mysql_query("DELETE FROM jenis_kelamin WHERE id_jk='$_GET[id]'");
header('location:../../menu.php?page='.$page);

}


?>
