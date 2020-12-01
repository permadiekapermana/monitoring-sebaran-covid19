<?php
  session_start();
  session_destroy();
  echo "<script>alert('Anda telah keluar dari Sistem!'); window.location = '../production/login-v2.php'</script>";
?>
