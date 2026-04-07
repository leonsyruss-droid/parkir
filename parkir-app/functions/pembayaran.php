<?php

if(isset($_POST['bayar'])){
mysqli_query($koneksi,"UPDATE tb_transaksi SET status_bayar='lunas' WHERE id_parkir='$_POST[id]'");
logAksi($koneksi,"Transaksi $_POST[id] dibayar oleh owner ".$_SESSION['id']);
$_SESSION['paid']=true;
}

if(isset($_POST['qris'])) $_SESSION['show_qr']=true;

if(isset($_POST['konfirmasi_qr'])){
mysqli_query($koneksi,"UPDATE tb_transaksi SET status_bayar='lunas' WHERE id_parkir='$_POST[id]'");
$_SESSION['paid']=true;
unset($_SESSION['show_qr']);
}

if(isset($_GET['reset'])){
$_SESSION['last_id']=null;
unset($_SESSION['paid'],$_SESSION['show_qr']);
header("Location:?"); exit;
}
?>