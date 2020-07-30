<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");

$limit = $_GET['limit'];
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

?>
<!doctype html>
<html>

<head>
	<title>Laporan Data Pasien</title>
	<link rel="shortcut icon" href="../img/laporan.png">
	<link rel="stylesheet" type="text/css" href="../css/laporan.css">
	<style>
		table tr td {
			font-size: 9px;
		}
	</style>
</head>

<body>

	<div class="page">
		<div class="kop">
			<img src="../img/kop.png" id="kop">

			<div class="header2">
				<h2>SYSTEM APLIKASI REKAM MEDIS DI INSTANSI</h2>
			</div>

			<?php
			$tgl1 = $_GET['tgl1'];
			$tgl2 = $_GET['tgl2'];
			if ($tgl1 == '' and $tgl2 == '') {
				?>

			</div>
			<table border="1px">
				<tr class="head">
					<td width="10">NO. </td>
					<td width="50">NO RM</td>
					<td width="180">NAMA PASIEN</td>
					<td width="120">NAMA DOKTER</td>
					<td width="90">KELUHAN</td>
					<td style="width:140px;">DIAGNOSA</td>
					<td width="50">TINDAKAN</td>
					<td width="50">TANGGAL</td>
				</tr>

				<?php
				$query = mysqli_query($conn, "SELECT * FROM rekammedik, pasien, pegawai, dokter WHERE rekammedik.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
				$no = 1;
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr bgcolor="#fff">
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $r['nomorRm']; ?></td>
						<td><?php echo $r['nama_pegawai']; ?></td>
						<td><?php echo $r['nama_dokter']; ?></td>
						<td><?php echo $r['keluhan']; ?></td>
						<td><?php echo $r['diagnosa']; ?></td>
						<td><?php $tindakan = $r['tindakan'];
							$qutin = mysqli_query($conn, "SELECT * FROM tindakan WHERE id_tindakan='$tindakan'");
							$rt = mysqli_fetch_array($qutin);
							echo $rt['nm_tindakan'];
							?></td>
						<td><?php echo tgl_indo($r['tgl']); ?></td>
					</tr>

					<?php
					$no++;
				}
				?>

			</table>
		<?php
	} else {
		?>
			<table border="1px">
				<tr class="head">
					<td width="10">NO. </td>
					<td width="50">NO RM</td>
					<td width="180">NAMA PASIEN</td>
					<td width="120">NAMA DOKTER</td>
					<td width="90">KELUHAN</td>
					<td style="width:140px;">DIAGNOSA</td>
					<td width="50">TINDAKAN</td>
					<td width="50">TANGGAL</td>
				</tr>

				<?php $query = mysqli_query($conn, "SELECT * FROM rekammedik, pasien, pegawai, dokter WHERE rekammedik.kodepasien=pasien.kodePasien AND pasien.id_pegawai=pegawai.id_pegawai AND dokter.kodeDokter=rekammedik.kodedokter AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "' ORDER BY rekammedik.id_rm DESC");

				$no = 1;
				while ($r = mysqli_fetch_array($query)) {
					?>
					<tr bgcolor="#fff">
						<td align="center"><?php echo $no; ?></td>
						<td><?php echo $r['nomorRm']; ?></td>
						<td><?php echo $r['nama_pegawai']; ?></td>
						<td><?php echo $r['nama_dokter']; ?></td>
						<td><?php echo $r['keluhan']; ?></td>
						<td><?php echo $r['diagnosa']; ?></td>
						<td><?php $t = $r['tindakan'];
							$qt = mysqli_query($conn, "SELECT * FROM tindakan WHERE id_tindakan='$t'");
							$rt = mysqli_fetch_array($qt);
							echo $rt['nm_tindakan'];
							?></td>
						<td><?php echo tgl_indo($r['tgl']); ?></td>
					</tr>

					<?php
					$no++;
				}
				?>

			</table>
		<?php
	}
	?>
	</div>
</body>

</html>