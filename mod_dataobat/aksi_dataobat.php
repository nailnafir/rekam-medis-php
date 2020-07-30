<?php
include("../config/koneksi.php");
$kodeobat = $_GET['kode_obat'];
if ($_GET['module'] == 'tambah') {
	$t1 = $_POST['t1'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t7 = $_POST['t7'];
	$query = mysqli_query($conn, "INSERT INTO obat (nama_obat, jmlh_obat, satuan, detail, kodeuser) VALUES ('$t1','$t3','$t4','$t5','$t7')");
	header("location:../media.php?module=dataobat");
} elseif ($_GET['module'] == 'hapus') {
	$query = mysqli_query($conn, "DELETE FROM obat WHERE id_obat='$kodeobat'");
	header("location:../media.php?module=dataobat");
} elseif ($_GET['module'] == 'edit') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t7 = $_POST['t7'];

	$query = mysqli_query($conn, "UPDATE obat SET nama_obat='$t1', jmlh_obat='$t3', satuan='$t4', detail='$t5' WHERE id_obat='$t7'");
	header("location:../media.php?module=dataobat");
}
