<?php

if(isset($_POST['register'])){
mysqli_query($koneksi,"INSERT INTO tb_user(nama_lengkap,username,password,role,status_aktif)
VALUES('$_POST[nama]','$_POST[user]','$_POST[pass]','owner',1)");
echo "<script>alert('Registrasi berhasil');location='?';</script>";
}

if(isset($_POST['login'])){
$q=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$_POST[username]'");
$d=mysqli_fetch_assoc($q);

if($d && $_POST['password']==$d['password']){
$_SESSION['id']=$d['id_user'];
$_SESSION['role']=$d['role'];
}
}

if(isset($_GET['logout'])){
session_destroy();
header("Location:?");
exit;
}
?>