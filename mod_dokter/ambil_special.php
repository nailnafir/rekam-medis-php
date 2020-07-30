<?php
include("../config/koneksi.php");
$kodedokter1 = $_GET['q'];
$ambild_dok = mysqli_query($conn, "SELECT * FROM dokter WHERE kodeDokter='$kodedokter1'");
$rdk = mysqli_fetch_array($ambild_dok);
?>
<div class="control-group">
	<label class="control-label" for="inputPassword">Nama Dokter</label>
	<div class="controls">
		<input type="text" id="inputText" value="<?php echo $rdk['nama_dokter']; ?>" disabled>
	</div>
</div>
<div class="control-group">
	<label class="control-label" for="inputPassword">Spesialis</label>
	<div class="controls">
		<input type="text" id="inputText" value="<?php echo $rdk['spesialis']; ?>" disabled>
	</div>
</div>