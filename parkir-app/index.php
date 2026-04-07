<?php
session_start();

include "config/database.php";
include "config/init_db.php";
include "functions/log.php";
include "functions/auth.php";
include "functions/transaksi.php";
include "functions/pembayaran.php";

$page = $_GET['page'] ?? 'login';

if(!isset($_SESSION['last_id'])) $_SESSION['last_id']=null;

include "partials/header.php";

if(!isset($_SESSION['role'])){
    if($page=='register') include "pages/register.php";
    else include "pages/login.php";
}else{

    include "partials/navbar.php";

    if($_SESSION['role']=='admin'){
        include "pages/admin.php";
    }elseif($_SESSION['role']=='petugas'){
        include "pages/petugas.php";
    }else{
        include "pages/owner.php";
    }
}

include "partials/footer.php";
?>