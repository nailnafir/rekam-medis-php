<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$q = $_POST['q'];
$query = mysqli_query($conn, "SELECT * FROM pegawai WHERE nama_pegawai LIKE '%" . $q . "%' OR nip LIKE '%" . $q . "%'");
$r = mysqli_fetch_array($query);
$nip = $r['nip'];
?>
<div class="control-group">
	<label class="control-label" for="inputPassword">NIP</label>
	<div class="controls">
		<input type="text" id="inputText" class="span12" value="<?php echo $r['nip'] ?>" disabled>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="inputPassword">Nama Pegawai</label>
	<div class="controls">
		<input type="text" class="span12" id="inputText" value="<?php echo $r['nama_pegawai'] ?>" disabled>
	</div>
</div>

<div class="control-group">
	<label class="control-label" for="inputPassword">Nama Keluarga Pegawai</label>
	<div class="controls">
		<select name="t2">
			<option></option>
			<?php
			$qur = mysqli_query($conn, "SELECT * FROM pegawai_kel WHERE nip_pegawai='$nip'");

			while ($rq = mysqli_fetch_array($qur)) {
				echo $rq['nama_kpeg'];
				?>
				<option value="<?php echo $rq['id_kpeg']; ?>"><?php echo $rq['nama_kpeg']; ?></option>
			<?php

		}
		?>
		</select>
	</div>
</div>