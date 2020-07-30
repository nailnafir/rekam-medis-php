<?php
include("../config/koneksi.php");
include("../config/fungsi_rupiah.php");
$kodepasien = $_POST['q'];
$aksi = "mod_dataobat/aksi_dataobat.php";
?>
<div class="hasil_cari">
	<h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
	<table class="table table-striped">
		<thead>
			<tr class="head">
				<td>No</td>
				<td>Nama Obat</td>
				<td>Jumlah Obat</td>
				<td>Satuan</td>
				<td>Detail</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php

			$query = mysqli_query($conn, "SELECT * FROM obat WHERE nama_obat LIKE '%" . $kodepasien . "%'");
			$no = 1;
			$num = mysqli_num_rows($query);
			if ($num >= 1) {
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['nama_obat']; ?></td>
						<td><?php
							$id_obt = $r['id_obat'];
							$cekobt = mysqli_query($conn, "SELECT * FROM tmp_obat WHERE kdobat='$id_obt'");
							$ro = mysqli_fetch_array($cekobt);
							echo $obt_sekrng = $r['jmlh_obat'] - $ro['ambil'];
							?></td>
						<td><?php echo $r['satuan']; ?></td>
						<td><?php echo $r['detail']; ?></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-info" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=dataobat&&act=edit&&kodeobat=<?php echo $r['id_obat']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&kode_obat=$r[id_obat]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus obat <?php echo $r['nama_obat']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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