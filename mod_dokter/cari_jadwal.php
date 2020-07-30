<?php
include("../config/koneksi.php");
$kodedokter = $_POST['q'];
$aksi = "mod_dokter/aksi_jadwal.php";
?>
<div class="hasil_cari">
	<h5>Hasil Pencarian <b><?php echo $kodedokter; ?></b></h5>
	<table class="table table-striped">
		<thead>
			<tr class="head2">
				<td>No</td>
				<td>Kode Dokter</td>
				<td>Nama Dokter</td>
				<td>Spesialis</td>
				<td>Hari / Waktu</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM jadwal_dok, dokter WHERE dokter.kodeDokter=jadwal_dok.kodedokter AND dokter.kodeDokter LIKE '%" . $kodedokter . "%' OR dokter.kodeDokter=jadwal_dok.kodedokter AND dokter.nama_dokter LIKE '%" . $kodedokter . "%'");
			$no = 1;
			$num = mysqli_num_rows($query);
			if ($num >= 1) {
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['kodeDokter']; ?></td>
						<td><?php echo $r['nama_dokter']; ?></td>
						<td><?php echo $r['spesialis']; ?></td>
						<td>
							<pre class="span8"><?php echo $r['waktu']; ?> </pre>
						</td>
						<td>
							<div class="btn-group">
								<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=jadwal_dok&&act=edit&&kodedk=<?php echo $r['id_jadwal']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&id_jad=$r[id_jadwal]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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
					<td colspan="6">
						<div class="alert alert-error">Data tidak ditemukan</div>
					</td>
				</tr>
			<?php
		}
		?>

		</tbody>
	</table>
</div>