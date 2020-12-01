<?php
include "../config/koneksi.php";

if ($_GET['page']=='Dashboard'){
    if ($_SESSION['level']=='Superadmin' OR $_SESSION['level']=='Admin'){
      include "page/page_dashboard/dashboard.php";
    }
}

elseif ($_GET['page']=='JenisKelamin'){
    if ($_SESSION['level']=='Superadmin' OR $_SESSION['level']=='Admin'){
      include "page/page_jk/jk.php";
    }
}

elseif ($_GET['page']=='Users'){
    if ($_SESSION['level']=='Superadmin'){
      include "page/page_users/users.php";
    }
}

elseif ($_GET['page']=='Status'){
    if ($_SESSION['level']=='Superadmin' OR $_SESSION['level']=='Admin'){
      include "page/page_status/status.php";
    }
}

elseif ($_GET['page']=='Pasien'){
    if ($_SESSION['level']=='Superadmin' OR $_SESSION['level']=='Admin'){
      include "page/page_pasien/pasien.php";
    }
}

?>