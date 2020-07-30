<?php
include("../config/koneksi.php");
$kode = $_POST['q'];
$query = mysqli_query($conn, "SELECT * FROM pasien, pegawai WHERE pasien.id_pegawai=pegawai.id_pegawai AND pasien.kodePasien LIKE '%" . $kode . "%' OR pegawai.nama_pegawai LIKE '%" . $kode . "%'");
$r = mysqli_fetch_array($query);
$num = mysqli_num_rows($query);
if ($num >= 1) {
	$status = "pasien";
	?>
	<div class="rm_info">

		<div style="background:url('foto_pasien/<?php
												if ($r['foto_pasien'] != '') {
													echo $r['foto_pasien'];
												} else {
													echo "not_found.png";
												}
												?>') #fff center;background-size:cover;" class="fotoPasien"></div>
		<div class="control-group">
			<label class="control-label" for="inputText">NIP</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $r['nip']; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Kode Pasien</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $r['kodePasien']; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Nama Pasien</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $r['nama_pegawai']; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Unit Jabatan</label>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $r['unit']; ?></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Jenis Kelamin</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $r['jk']; ?>" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputText">Alamat</label>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $r['alamat']; ?></textarea>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="button" class="btn btn-success" onclick="window.location='media.php?module=rekam_medik&&status=pasien&&kodepasien=<?php echo $r['kodePasien'] ?>'"><i class="icon-ok-circle icon-white"></i> Proses</button>
			</div>
		</div>
	</div>
<?php
} elseif ($num == 0) {
	$quer = mysqli_query($conn, "SELECT * FROM tanggungan, pegawai_kel, pegawai WHERE tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.nip_pegawai=pegawai.nip AND tanggungan.kodeTanggungan LIKE '%" . $kode . "%' OR pegawai_kel.nama_kpeg LIKE '%" . $kode . "%'");
	$rk = mysqli_fetch_array($quer);
	$num = mysqli_num_rows($quer);
	$status = "tanggungan";
	?>
	<div class="rm_info">
		<div style="background:url('foto_tanggungan/<?php
													if ($rk['foto_tanggungan'] != '') {
														echo $rk['foto_tanggungan'];
													} else {
														echo "not_found.png";
													}
													?>') #fff center;background-size:cover;" class="fotoPasien"></div>
		<div class="control-group">
			<label class="control-label" for="inputText">Kode Pasien</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $rk['kodeTanggungan']; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Nama Pasien</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $rk['nama_kpeg']; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Status</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $rk['status_kpeg']; ?>" disabled>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputText">Nama Penangung</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $rk['nama_pegawai']; ?>" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputText">Jenis Kelamin</label>
			<div class="controls">
				<input type="text" class="span12" id="inputText" value="<?php echo $rk['jk_kpeg']; ?>" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="inputText">Alamat</label>
			<div class="controls">
				<textarea class="span12" disabled><?php echo $rk['alamat_kpeg']; ?></textarea>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<button type="button" class="btn btn-success" onclick="window.location='media.php?module=rekam_medik&&status=tanggungan&&kodepasien=<?php echo $rk['kodeTanggungan'] ?>'"><i class="icon-ok-circle icon-white"></i> Proses</button>
			</div>
		</div>
	</div>
<?php
}
?>