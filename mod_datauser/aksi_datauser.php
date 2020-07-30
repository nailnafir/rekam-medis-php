<?php
include("../config/koneksi.php");
include("../config/fungsi_thumb.php");
$iduser = $_GET['iduser'];
if ($_GET['module'] == 'tambah') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t6 = $_POST['t6'];
	$t7 = $_POST['t7'];
	$t8 = $_POST['t8'];
	$t9 = $_POST['t9'];
	$photo = $_FILES['fupload']['name'];
	uploadFoto($photo);
	$query = mysqli_query($conn, "INSERT INTO user_man (kodeUser, first_name, last_name, jk, alamat, no_hp, tgl_lahir, username, password, photo) VALUES ('$t1','$t2','$t3','$t4','$t5','$t6','$t7','$t8','$t9','$photo')");
	header("location:../media.php?module=data_user");
} elseif ($_GET['module'] == 'hapus') {
	$query = mysqli_query($conn, "DELETE FROM user_man WHERE id_user='$iduser'");
	header("location:../media.php?module=data_user");
} elseif ($_GET['module'] == 'edit') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$t3 = $_POST['t3'];
	$t4 = $_POST['t4'];
	$t5 = $_POST['t5'];
	$t6 = $_POST['t6'];
	$t7 = $_POST['t7'];
	$t8 = $_POST['t8'];
	$t9 = $_POST['t9'];
	$photo = $_FILES['fupload']['name'];
	uploadFoto($photo);

	if (empty($photo)) {
		$query = mysqli_query($conn, "UPDATE user_man SET first_name='$t2', last_name='$t3', jk='$t4', alamat='$t5', no_hp='$t6', tgl_lahir='$t7', username='$t8', password='$t9' WHERE kodeUser='$t1'");
		header("location:../media.php?module=data_user");
	} else {
		$query = mysqli_query($conn, "UPDATE user_man SET first_name='$t2', last_name='$t3', jk='$t4', alamat='$t5', no_hp='$t6', tgl_lahir='$t7', username='$t8', password='$t9', photo='$photo' WHERE kodeUser='$t1'");
		header("location:../media.php?module=data_user");
	}
}
