<?php
include "../config/koneksi.php";

if ($_GET['page']=='Dashboard'){
    if ($_SESSION['level']=='Superadmin' OR $_SESSION['level']=='Admin'){
      include "page/page_dashboard/dashboard.php";
    }
}

?>