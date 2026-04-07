<?php

// MASUK
if(isset($_POST['masuk'])){
$id_owner = $_POST['owner'] ?? 1;

mysqli_query($koneksi,"INSERT INTO tb_kendaraan(plat_nomor,jenis_kendaraan)
VALUES('$_POST[plat]','$_POST[jenis]')");
$id=mysqli_insert_id($koneksi);

mysqli_query($koneksi,"INSERT INTO tb_transaksi
(id_kendaraan,waktu_masuk,status,id_user,id_owner,status_bayar)
VALUES('$id',NOW(),'masuk','".$_SESSION['id']."','$id_owner','belum')");

$_SESSION['last_id']=null;
header("Location:?"); exit;
}

// KELUAR
if(isset($_POST['keluar'])){
$q=mysqli_query($koneksi,"SELECT t.*,k.plat_nomor,k.jenis_kendaraan 
FROM tb_transaksi t 
JOIN tb_kendaraan k ON t.id_kendaraan=k.id_kendaraan
WHERE k.plat_nomor='$_POST[plat_keluar]' AND status='masuk'
ORDER BY id_parkir DESC LIMIT 1");

$d=mysqli_fetch_assoc($q);

if($d){
$jam=max(1,ceil((time()-strtotime($d['waktu_masuk']))/3600));
$tarif=($d['jenis_kendaraan']=='motor')?2000:5000;
$total=$jam*$tarif;

mysqli_query($koneksi,"UPDATE tb_transaksi SET
waktu_keluar=NOW(),
durasi_jam='$jam',
biaya_total='$total',
status='keluar'
WHERE id_parkir='$d[id_parkir]'");

$_SESSION['last_id']=$d['id_parkir'];
header("Location:?"); exit;
}
}
?>