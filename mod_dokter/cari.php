<?php
include("../config/koneksi.php");
$kodepasien = $_POST['q'];
$aksi = "mod_dokter/aksi_dokter.php";
?>
<div class="hasil_cari">
	<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
	<table class="table table-striped">
		<thead>
			<tr class="head2">
				<td>No</td>
				<td>Kode Dokter</td>
				<td>Nama Dokter</td>
				<td>Spesialis</td>
				<td>Jenis Kelamin</td>
				<td>Alamat</td>
				<td>No Handphone</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php

			$query = mysqli_query($conn, "SELECT * FROM dokter WHERE nama_dokter LIKE '%" . $kodepasien . "%' OR kodeDokter LIKE '%" . $kodepasien . "%'");
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
						<td><?php echo $r['jk']; ?></td>
						<td><?php echo $r['alamat']; ?></td>
						<td><?php echo $r['no_hp']; ?></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=dokter&&act=edit&&kodedk=<?php echo $r['kodeDokter']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kodedk=$r[kodeDokter]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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
					<td colspan="8">
						<div class="alert alert-error">Data tidak ditemukan</div>
					</td>
				</tr>
			<?php
		}
		?>


		</tbody>
	</table>
</div>