<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "db_monitoringcovid19";

mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

?>
