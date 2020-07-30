<?php
include("../config/koneksi.php");
if ($_GET['module'] == 'tambah') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$query = mysqli_query($conn, "INSERT INTO jadwal_dok (kodedokter, waktu) VALUES ('$t1','$t2')");
	header("location:../media.php?module=jadwal_dok");
} elseif ($_GET['module'] == 'hapus') {
	$id_jadwal = $_GET['id_jad'];
	$query = mysqli_query($conn, "DELETE FROM jadwal_dok WHERE id_jadwal='$id_jadwal'");
	header("location:../media.php?module=jadwal_dok");
} elseif ($_GET['module'] == 'edit') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];



	$query = mysqli_query($conn, "UPDATE jadwal_dok SET waktu='$t2' WHERE id_jadwal='$t1'");
	header("location:../media.php?module=jadwal_dok");
}
