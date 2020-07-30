<?php
include("../config/koneksi.php");
if ($_GET['module'] == 'tambah') {
	$stok = $_POST['stok'];
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];

	$t5 = date('h:i:s');
	$t6 = date('Y-m-d');
	$t7 = $_POST['t7'];
	$cekstok = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$t2'");
	$rtok = mysqli_fetch_array($cekstok);
	$jmlhstok = $rtok['jmlh_obat'];
	if ($jmlhstok >= $t3) {
		$query = mysqli_query($conn, "INSERT INTO tmp_obat (kdrm, kdobat, ambil, jam_ambil, tgl_ambil, kduser) VALUES ('$t1','$t2','$t3','$t5','$t6','$t7')");
		$sisa = $stok - $t3;
		$ubah = mysqli_query($conn, "UPDATE obat SET jmlh_obat='$sisa' WHERE id_obat='$t2'");
		echo "<script>history.back(self);</script>";
	} else {
		echo "<script>
		alert('Stok tinggal $jmlhstok');
		history.back(self);
		</script>";
	}
} elseif ($_GET['module'] == 'delete') {
	$idobat = $_GET['idobat'];
	$id_temp = $_GET['idtemp'];
	$kembali = $_GET['ambil'];

	$pilih = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$idobat'");
	$r = mysqli_fetch_array($pilih);
	$stokobt = $r['jmlh_obat'];
	$hasil = $stokobt + $kembali;
	$ubah = mysqli_query($conn, "UPDATE obat SET jmlh_obat='$hasil' WHERE id_obat='$idobat'");
	$query = mysqli_query($conn, "DELETE FROM tmp_obat WHERE id_temp='$id_temp'");

	echo "<script>history.back(self);</script>";
}
