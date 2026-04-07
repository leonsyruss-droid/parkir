<?php
function logAksi($k, $t){
    if(session_status() === PHP_SESSION_NONE){
        session_start();
    }

    if(isset($_SESSION['id']) && $k){
        $id = $_SESSION['id'];
        $t = mysqli_real_escape_string($k, $t);

        mysqli_query($k, "INSERT INTO tb_log (aktivitas, id_user, waktu) 
        VALUES ('$t','$id',NOW())");
    }
}
?>