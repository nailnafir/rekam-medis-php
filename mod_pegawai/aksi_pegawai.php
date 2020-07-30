<?php
include("../config/koneksi.php");
include("../config/fungsi_thumb.php");
if ($_GET['module'] == 'tambah') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t6 = $_POST['t6'];
	$t7 = $_POST['t7'];
	$t8 = $_POST['t8'];

	$query = mysqli_query($conn, "INSERT INTO pegawai(nip, kj, nama_pegawai, unit, jk, tgl_lhr, status_kel, alamat) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8')");
	header("location:../media.php?module=pegawai");
} elseif ($_GET['module'] == 'tambah_kel') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$nip = $_POST['nip'];

	$query = mysqli_query($conn, "INSERT INTO pegawai_kel(nip_pegawai, nama_kpeg, jk_kpeg, tgllahir_kpeg, alamat_kpeg, status_kpeg) VALUES ('$nip','$t1','$t2','$t3','$t4','$t5')");
	header("location:../media.php?module=pegawai");
} elseif ($_GET['module'] == 'hapus') {
	$id_pegawai = $_GET['id_pegawai'];
	$query = mysqli_query($conn, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");
	header("location:../media.php?module=pegawai");
} elseif ($_GET['module'] == 'hapus_kel') {
	echo $id_kpeg = $_GET['id_kpeg'];
	$query = mysqli_query($conn, "DELETE FROM pegawai_kel WHERE id_kpeg='$id_kpeg'");
	header("location:../media.php?module=pegawai");
} elseif ($_GET['module'] == 'edit') {
	$id_pegawai = $_POST['id_pegawai'];
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t6 = $_POST['t6'];
	$t7 = $_POST['t7'];
	$t8 = $_POST['t8'];
	if (empty($t7)) {
		$query = mysqli_query($conn, "UPDATE pegawai SET nip='$t1', kj='$t2', nama_pegawai='$t3', unit='$t4', jk='$t5', tgl_lhr='$t6', alamat='$t8' WHERE id_pegawai='$id_pegawai'");
		header("location:../media.php?module=pegawai");
	} else {
		$query = mysqli_query($conn, "UPDATE pegawai SET nip='$t1', kj='$t2', nama_pegawai='$t3', unit='$t4', jk='$t5', tgl_lhr='$t6', status_kel='$t7', alamat='$t8' WHERE id_pegawai='$id_pegawai'");
		header("location:../media.php?module=pegawai");
	}
}
