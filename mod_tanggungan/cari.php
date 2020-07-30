<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$kodepasien = $_POST['q'];
$aksi = "mod_tanggungan/aksi_tanggungan.php";
?>
<div class="hasil_cari">
	<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
	<table class="table table-striped">
		<thead>
			<tr class="head1">
				<td>No</td>
				<td>Kode Tanggungan</td>
				<td>Nama Penangung</td>
				<td>Nama Tanggungan</td>
				<td>Hubungan</td>
				<td>JK</td>
				<td>Tanggal Lahir</td>
				<td>Usia</td>
				<td>Tanggal Daftar</td>
				<td></td>
			</tr>

		</thead>
		<tbody>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM tanggungan, pegawai_kel, pegawai WHERE tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.nama_kpeg LIKE '%" . $kodepasien . "%' OR tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai.nama_pegawai LIKE '%" . $kodepasien . "%'");
			$no = 1;
			$num = mysqli_num_rows($query);
			if ($num >= 1) {
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['kodeTanggungan']; ?></td>
						<td><?php echo $r['nama_pegawai']; ?></td>
						<td><?php echo $r['nama_kpeg']; ?></td>
						<td><?php echo $r['status_kpeg']; ?></td>
						<td><?php echo $r['jk_kpeg']; ?></td>
						<td><?php echo tgl_indo($r['tgllahir_kpeg']); ?></td>
						<td>
							<?php
							$tgl_lht = $r['tgllahir_kpeg'];
							$ambil_thn = substr($tgl_lht, 0, 4);
							$thn_sekarang = date('Y');
							$umur = $thn_sekarang - $ambil_thn;
							echo $umur . " Tahun";
							?>

						</td>
						<td><?php echo $r['jam_daft'] . " / " . tgl_indo($r['tgl_daft']); ?></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">

									<li><a href="<?php echo "$aksi?module=hapus&&id_tang=$r[id_tanggungan]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data tanggungan <?php echo $r['nama_kpeg']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
								</ul>
							</div>
						</td>
					</tr>

					<?php
					$no++;
				}
			} else {
				?>
				<tr>
					<td colspan="11">
						<div class="alert alert-error">Data tidak ditemukan</div>
					</td>
				</tr>
			<?php
		}
		?>

		</tbody>
	</table>
</div>