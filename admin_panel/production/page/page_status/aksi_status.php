<?php

include "../../../config/koneksi.php";

$page=$_GET[page];
$act=$_GET[act];


if ($page=='Status' AND $act=='input'){

$status     = $_POST['status'];

$query=mysql_query("INSERT INTO status (status) VALUES ('$status')"); 
header('location:../../menu.php?page='.$page);

}
  

elseif ($page=='Status' AND $act=='update'){    

  $id_status    = $_POST['id_status'];
  $status       = $_POST['status'];
  
$query=mysql_query("UPDATE status SET status='$status' WHERE id_status='$id_status'"); 							 
header('location:../../menu.php?page='.$page);

}

elseif ($page=='Status' AND $act=='delete'){

mysql_query("DELETE FROM status WHERE id_status='$_GET[id]'");
header('location:../../menu.php?page='.$page);

}


?>
