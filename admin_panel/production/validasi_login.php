<?php
error_reporting(0);
include "../config/koneksi.php";

$username = $_POST['username'];
$pass     = sha1($_POST['password']);

$login  = mysql_query("SELECT * FROM users WHERE username='$username' AND password='$pass'");
$ketemu = mysql_num_rows($login);
$r      = mysql_fetch_array($login);

if ($ketemu > 0){
  session_start();
  
    $_SESSION[id_user]      = $r[id_user];
    $_SESSION[username]     = $r[username];
    $_SESSION[password]     = $r[password];
    $_SESSION[nama]         = $r[nama];
    $_SESSION[level]        = $r[level];
    
    header('location:menu.php?page=Dashboard');
}
else{
  echo "<script>alert('Username atau Password yang anda masukkan salah!');history.go(-1)</script>";
}

?>
