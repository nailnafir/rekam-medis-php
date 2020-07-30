<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$kodeuser = $_POST['q'];
$aksi = "mod_datauser/aksi_datauser.php";
?>
<div class="hasil_cari">
	<h5>Hasil Pencarian <b><?php echo $kodeuser; ?></b></h5>
	<table class="table table-striped">
		<thead>
			<tr class="head">
				<td>No</td>
				<td>Kode User</td>
				<td>Nama Lengkap</td>
				<td>Jenis Kelamin</td>
				<td>Alamat</td>
				<td>No Handphone</td>
				<td>Tanggal Lahir</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = mysqli_query($conn, "SELECT * FROM user_man WHERE kodeUser LIKE '%" . $kodeuser . "%' OR first_name LIKE '%" . $kodeuser . "%' OR last_name LIKE '%" . $kodeuser . "%'");
			$no = 1;
			$num = mysqli_num_rows($query);
			if ($num >= 1) {
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $r['kodeUser']; ?></td>
						<td><?php echo $r['first_name'] . " " . $r['last_name']; ?></td>
						<td><?php echo $r['jk']; ?></td>
						<td><?php echo $r['alamat']; ?></td>
						<td><?php echo $r['no_hp']; ?></td>
						<td><?php echo tgl_indo($r['tgl_lahir']); ?></td>
						<td>
							<div class="btn-group">
								<a class="btn btn-info" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
								<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="media.php?module=data_user&&act=edit&&kodeuser=<?php echo $r['kodeUser']; ?>"><i class="icon-pencil"></i> Edit</a></li>
									<li><a href="<?php echo "$aksi?module=hapus&&iduser=$r[id_user]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data <?php echo $r['first_name']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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
					<td colspan="9">
						<div class="alert alert-error">Data tidak ditemukan</div>
					</td>
				</tr>
			<?php
		}
		?>
		</tbody>
	</table>
</div>