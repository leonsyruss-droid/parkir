<div class="container mt-3">
<div class="row">
<div class="col-md-6">
<div class="glass">
<h5>Masuk</h5>
<form method="POST">
<input name="plat" class="form-control mb-2" placeholder="Plat Nomor" required>
<select name="jenis" class="form-select mb-2" required>
<option>motor</option><option>mobil</option>
</select>
<input list="ownerList" name="owner" class="form-control mb-2" required>
<datalist id="ownerList">
<?php
$q_owner=mysqli_query($koneksi,"SELECT * FROM tb_user WHERE role='owner'");
while($o=mysqli_fetch_assoc($q_owner)){
 echo "<option value='$o[id_user]'>$o[nama_lengkap]</option>";
}
?>
</datalist>
<button name="masuk" class="btn btn-primary w-100">Masuk</button>
</form>
</div>
</div>

<div class="col-md-6">
<div class="glass">
<h5>Keluar</h5>
<form method="POST">
<input name="plat_keluar" class="form-control mb-2" placeholder="Plat Nomor" required>
<button name="keluar" class="btn btn-danger w-100">Keluar</button>
</form>
</div>
</div>
</div>

<?php if($_SESSION['last_id']){
$q=mysqli_query($koneksi,"SELECT t.*,k.plat_nomor,k.jenis_kendaraan 
FROM tb_transaksi t 
JOIN tb_kendaraan k ON t.id_kendaraan=k.id_kendaraan 
WHERE id_parkir='$_SESSION[last_id]'");
$d=mysqli_fetch_assoc($q);
?>

<div id="struk" class="mt-3 text-center">

<h6>Detail Transaksi</h6>

<p><b>Plat:</b> <?= $d['plat_nomor'] ?></p>
<p><b>Durasi:</b> <?= $d['durasi_jam'] ?> jam</p>

<hr>

<h3>Rp <?= number_format($d['biaya_total']) ?></h3>

<div class="no-print">
<form method="POST">
<input type="hidden" name="id" value="<?= $d['id_parkir'] ?>">

<button name="bayar" class="btn btn-success w-100 mb-2">
Tunai
</button>

<button type="button" id="qrisBtn" class="btn btn-primary w-100 mb-2">
QRIS
</button>

</form>

<div id="qrCodeContainer" style="margin-top:20px;"></div>

<div class="no-print" id="printContainer" style="margin-top:15px; display:none;">
<button id="printBtn" onclick="printStruk()" class="btn btn-dark w-100">
Print
</button>
</div>

</div>

<script>
const tunaiBtn = document.getElementById('tunaiBtn');
const qrisBtn = document.getElementById('qrisBtn');
const payForm = document.getElementById('payForm');
const qrContainer = document.getElementById('qrCodeContainer');
const printContainer = document.getElementById('printContainer');

tunaiBtn?.addEventListener('click',()=>{
    payForm.submit();
    printContainer.style.display='block';
});

qrisBtn?.addEventListener('click',()=>{
    qrContainer.innerHTML='';
    const qrCanvas = document.createElement('canvas');

    const qr = new QRious({
        element: qrCanvas,
        value: 'Bayar QRIS Rp '+document.querySelector('#struk h3').innerText,
        size: 200
    });

    qrContainer.appendChild(qrCanvas);
    printContainer.style.display='block';
});

function printStruk(){
    window.print();
    window.location.href='?reset=1';
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>

<script>
const qrisBtn = document.getElementById('qrisBtn');
const qrContainer = document.getElementById('qrCodeContainer');

qrisBtn?.addEventListener('click',()=>{
    qrContainer.innerHTML='';

    const canvas = document.createElement('canvas');

    new QRious({
        element: canvas,
        value: 'Bayar QRIS Rp <?= $d['biaya_total'] ?>',
        size: 200
    });

    qrContainer.appendChild(canvas);
});
</script>
<?php } ?>
</div>