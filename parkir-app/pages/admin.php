<div class="container mt-3">
<div class="glass">
<h5>Tambah User</h5>
<form method="POST">
<input name="nama" class="form-control mb-2" placeholder="Nama Lengkap" required>
<input name="user" class="form-control mb-2" placeholder="Username" required>
<input name="pass" class="form-control mb-2" placeholder="Password" required>
<select name="role" class="form-select mb-2" required>
<option>admin</option><option>petugas</option>
</select>
<button name="add_user" class="btn btn-success w-100">Tambah</button>
</form>
</div>

<div class="glass">
<h5>Area Parkir</h5>
<form method="POST">
<input name="area" class="form-control mb-2" placeholder="Nama Area" required>
<button name="add_area" class="btn btn-primary w-100">Tambah</button>
</form>
</div>

<div class="glass">
<h5>Log Aktivitas</h5>
<?php
$q=mysqli_query($koneksi,"SELECT l.*,u.username FROM tb_log l LEFT JOIN tb_user u ON l.id_user=u.id_user ORDER BY l.id_log DESC");
while($d=mysqli_fetch_assoc($q)){
 echo "<div class='log-item'>👤 <div><b>$d[username]</b><br><small>$d[aktivitas]</small></div></div>";
}
?>
</div>
</div>