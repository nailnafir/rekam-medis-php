<?php
include("../config/koneksi.php");
include("../config/fungsi_thumb.php");
if ($_GET['module'] == 'tambah') {
	$t1 = $_POST['t1'];
	$t2 = $_POST['t2'];
	$tgl = date('Y/m/d');
	$jam = date('h:i');
	$foto = $_FILES['foto']['name'];
	fotoTang($foto);
	$cek = mysqli_query($conn, "SELECT * FROM tanggungan WHERE id_kpeg='$t2'");
	$n = mysqli_num_rows($cek);
	if ($n >= 1) {
		echo "
            <script>
            alert('Data pasien tanggungan sudah ada');
            window.location='../media.php?module=tanggungan';
            </script>
            ";
	} else {
		$query = mysqli_query($conn, "INSERT INTO tanggungan (kodeTanggungan, id_kpeg, foto_tanggungan, tgl_daft, jam_daft) VALUES ('$t1','$t2','$foto','$tgl','$jam')");
		header("location:../media.php?module=tanggungan");
	}
} elseif ($_GET['module'] == 'hapus') {
	$id_tang = $_GET['id_tang'];
	$query = mysqli_query($conn, "DELETE FROM tanggungan WHERE id_tanggungan='$id_tang'");
	header("location:../media.php?module=tanggungan");
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
	$t10 = $_POST['t10'];
	$t11 = $_POST['t11'];
	if (empty($t10)) {
		$query = mysqli_query($conn, "UPDATE pasien SET no_ktp='$t2', nip='$t3', nama_pasien='$t4', pekerjaan='$t5', jk='$t6', agama='$t7', alamat='$t8', tgl_lhr='$t9', no_tlp='$t11' WHERE kodePasien='$t1'");
		header("location:../media.php?module=data_pasien");
	} else {
		$query = mysqli_query($conn, "UPDATE pasien SET no_ktp='$t2', nip='$t3', nama_pasien='$t4', pekerjaan='$t5', jk='$t6', agama='$t7', alamat='$t8', tgl_lhr='$t9', usia='$t10', no_tlp='$t11' WHERE kodePasien='$t1'");
		header("location:../media.php?module=data_pasien");
	}
}
