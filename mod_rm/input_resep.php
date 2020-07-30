<?php
include("../config/koneksi.php");
$kode = $_POST['q'];
$query = mysqli_query($conn, "SELECT * FROM rekammedik, dokter WHERE rekammedik.nomorRm='$kode' AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
$r = mysqli_fetch_array($query);
$nomrm = $r['nomorRm'];
?>
<hr>