<?php
include("../config/koneksi.php");
echo $kode = $_POST['q'];
$query = mysqli_query($conn, "SELECT * FROM dokter, jadwal_dok, tarif_dok WHERE dokter.kodeDokter='$kode' AND dokter.kodeDokter=jadwal_dok.kodedokter AND dokter.kodedokter=tarif_dok.kodedokter");
$r = mysqli_fetch_array($query);
?>
<input type="hidden" class="span8" value="<?php echo $r['kodeDokter'] ?>" name="t3">
<div class="rm_info">
	<div class="control-group">
		<label class="control-label" for="inputText">Nama Dokter :</label>
		<div class="controls">
			<input type="text" class="span12" id="inputText" value="<?php echo $r['nama_dokter']; ?>" disabled>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputText">Specialis</label>
		<div class="controls">
			<input type="text" class="span12" id="inputText" value="<?php echo $r['spesialis']; ?>" disabled>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputText">Jadwal</label>
		<div class="controls">
			<pre class="span12"><?php echo $r['waktu']; ?></pre>
		</div>
	</div>
	<div class="clear"></div>
	<div class="control-group">
		<label class="control-label" for="inputText">Tarif</label>
		<div class="controls">
			<textarea class="span12" disabled><?php echo $r['tarif']; ?></textarea>
		</div>
	</div>


</div>