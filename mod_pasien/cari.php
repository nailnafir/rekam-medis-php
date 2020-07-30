<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$kodepasien = $_POST['q'];
$aksi = "mod_pasien/aksi_pasien.php";
?>
<div class="hasil_cari">
	<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
	<table class="table table-striped">
		<thead>
			<tr class="head1">
				<td>No</td>
				<td>Kode Pasien</td>
				<td>NIP</td>
				<td>Nama Pasien</td>
				<td>Unit</td>
				<td>Jenis Kelamin</td>
				<td>Tanggal Lahir</td>
				<td>Usia</td>
				<td>Tanggal Daftar</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM pasien, pegawai WHERE pasien.id_pegawai=pegawai.id_pegawai AND pegawai.nama_pegawai LIKE '%" . $kodepasien . "%'");
			$no = 1;
			$num = mysqli_num_rows($query);
			if ($num >= 1) {
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['kodePasien']; ?></td>
						<td><?php echo $r['nip']; ?></td>
						<td><?php echo $r['nama_pegawai']; ?></td>
						<td><?php echo $r['unit']; ?></td>
						<td><?php echo $r['jk']; ?></td>
						<td><?php echo $r['tgl_lhr']; ?></td>
						<td><?php


							$tgl = $r['tgl_lhr'];
							$ambil_thn = substr($tgl, 0, 4);
							$thn_sekarang = date('Y');
							$umur = $thn_sekarang - $ambil_thn;
							echo $umur . " Tahun";
							?></td>

						<td><?php echo $r['jam_daf'] . " / " . tgl_indo($r['tgl_daf']); ?></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="cetak_kartu.php?id_pasien=<?php echo $r['kodePasien']; ?>&&status=pasien" target="_blank"><i class="fa fa-credit-card"></i> Cetak Kartu</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kodepasien=$r[kodePasien]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data pasien <?php echo $r['nama_pasien']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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