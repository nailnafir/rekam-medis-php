<?php
include("../config/koneksi.php");
if ($_GET['module'] == 'tambahrm') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = "-";
	$t7 = date('Y-m-d');
	$t6 = date('H:i:s');
	$t8 = $_POST['t8'];
	$t9 = "-";
	$query = mysqli_query($conn, "INSERT INTO rekammedik (nomorRm, kodepasien, kodedokter, keluhan, diagnosa, tindakan, jam, tgl, kodeuser) VALUES ('$t1','$t2','$t3','$t4','$t5','$t9','$t6','$t7','$t8')");
	echo "<script>history.back(self);</script>";
} elseif ($_GET['module'] == 'tambah_tang') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = "-";
	$t7 = date('Y-m-d');
	$t6 = date('H:i:s');
	$t8 = $_POST['t8'];
	$t9 = "-";
	$query = mysqli_query($conn, "INSERT INTO rekammedik (nomorRm, kodepasien, kodedokter, keluhan, diagnosa, tindakan, jam, tgl, kodeuser) VALUES ('$t1','$t2','$t3','$t4','$t5','$t9','$t6','$t7','$t8')");
	echo "<script>history.back(self);</script>";
} elseif ($_GET['module'] == 'ubah_diag') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$penyakit = $_POST['penyakit'];
	$status = $_POST['status'];
	$kode = $_POST['kode'];
	$spesialis = $_POST['spesialis'];
	$rs = $_POST['rs'];
	$query = mysqli_query($conn, "UPDATE rekammedik SET diagnosa='$t2', tindakan='$t3', id_rs='$rs', spesialis='$spesialis', id_penyakit='$penyakit' WHERE nomorRm='$t1'");
	header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");
} elseif ($_GET['module'] == 'tambahracik') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t6 = $_POST['t6'];
	$t7 = $_POST['t7'];
	$kode_resep = $_POST['kode_resep'];
	$kode = $_POST['kode'];
	$status = $_POST['status'];
	$tgl = date('Y-m-d');
	$query = mysqli_query($conn, "INSERT INTO racik_obat(kode_resep,nama_obat,racik,aturan_pakai,harga,pengambil_obat,petugas_apotek,id_dokter,kodepasien,tgl_racik) VALUES('$kode_resep','$t1','$t2','$t3','$t4','$t5','$t6','$t7','$kode','$tgl')");
	header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");
} elseif ($_GET['module'] == 'hapus_racik') {
	$id_racik = $_GET['id_racik'];
	$kode = $_GET['kode'];
	$status = $_GET['status'];
	$query = mysqli_query($conn, "DELETE FROM racik_obat WHERE id_racik='$id_racik'");
	header("location:../media.php?module=rekam_medik&&status=$status&&kodepasien=$kode");
}
