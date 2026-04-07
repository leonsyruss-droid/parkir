<div class="container mt-3">
<div class="glass">
<h4>Rekap Transaksi</h4>
<form method="GET" class="row g-2">
<input type="date" name="tgl1" class="form-control col">
<input type="date" name="tgl2" class="form-control col">
<input type="text" name="plat" class="form-control col" placeholder="Plat Nomor">
<select name="jenis" class="form-select col">
<option value="">Semua</option>
<option value="motor">Motor</option>
<option value="mobil">Mobil</option>
</select>
<button class="btn btn-primary col">Filter</button>
</form>

<?php
$tgl1 = $_GET['tgl1'] ?? '';
$tgl2 = $_GET['tgl2'] ?? '';
$plat = $_GET['plat'] ?? '';
$jenis = $_GET['jenis'] ?? '';

$where = "WHERE t.status='keluar' AND t.id_owner='".$_SESSION['id']."'";
if(!empty($tgl1) && !empty($tgl2)) $where .= " AND DATE(t.waktu_keluar) BETWEEN '$tgl1' AND '$tgl2'";
if(!empty($plat)) $where .= " AND k.plat_nomor LIKE '%$plat%'";
if(!empty($jenis)) $where .= " AND k.jenis_kendaraan='$jenis'";

$q=mysqli_query($koneksi,"SELECT t.*,k.plat_nomor,k.jenis_kendaraan FROM tb_transaksi t JOIN tb_kendaraan k ON t.id_kendaraan=k.id_kendaraan $where ORDER BY t.id_parkir DESC");
?>

<table class="table-modern mt-2 w-100">
<tr><th>ID</th><th>Plat</th><th>Jenis</th><th>Durasi</th><th>Biaya</th><th>Status Bayar</th></tr>
<?php while($tr=mysqli_fetch_assoc($q)){ ?>
<tr>
<td><?= $tr['id_parkir'] ?></td>
<td><?= $tr['plat_nomor'] ?></td>
<td><?= $tr['jenis_kendaraan'] ?></td>
<td><?= $tr['durasi_jam'] ?> jam</td>
<td>Rp <?= number_format($tr['biaya_total']) ?></td>
<td><?= $tr['status_bayar'] ?></td>
</tr>
<?php } ?>
</table>
</div>
</div>