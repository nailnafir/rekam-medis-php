<?php
session_start();
include("config/koneksi.php");
$user = $_POST['username'];
$pass = $_POST['password'];
$query = mysqli_query($conn, "SELECT * FROM user_man WHERE username='$user' AND password='$pass'");
$num = mysqli_num_rows($query);
$r = mysqli_fetch_array($query);

if ($num >= 1) {
	$_SESSION['iduser'] = $r['id_user'];
	$_SESSION['akses'] = $r['akses'];
	header("location:media.php?module=home");
} else {
	echo "
		<script type='text/javascript'>
		alert('Username & Password Anda Salah!');
		history.back(self);
		</script>
		";
}
