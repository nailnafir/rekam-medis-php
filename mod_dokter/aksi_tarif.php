<?php
include("../config/koneksi.php");
if ($_GET['module'] == 'tambah') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$query = mysqli_query($conn, "INSERT INTO tarif_dok (kodedokter, tarif) VALUES ('$t1','$t2')");
	header("location:../media.php?module=tarif_dok");
} elseif ($_GET['module'] == 'hapus') {
	$id_jadwal = $_GET['id_tarif'];
	$query = mysqli_query($conn, "DELETE FROM tarif_dok WHERE id_tarif='$id_jadwal'");
	header("location:../media.php?module=tarif_dok");
} elseif ($_GET['module'] == 'edit') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$query = mysqli_query($conn, "UPDATE tarif_dok SET tarif='$t2' WHERE id_tarif='$t1'");
	header("location:../media.php?module=tarif_dok");
}
