<?php
$koneksi = mysqli_connect("localhost","root","","parkir");
if(!$koneksi){
    die("Koneksi gagal: ".mysqli_connect_error());
}
?>