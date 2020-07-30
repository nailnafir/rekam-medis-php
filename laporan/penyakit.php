<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
$manajer = $_GET['manajer']
?>
<!doctype html>
<html>

<head>
    <title>Laporan Data Pasien</title>
    <link rel="shortcut icon" href="../img/laporan.png">
    <link rel="stylesheet" type="text/css" href="../css/laporan.css">
</head>

<body>
    <div class="page">
        <div class="kop">
            <img src="../img/kop.png" id="kop">
            <div class="header">
                <h2>SYSTEM APLIKASI REKAM MEDIS DI INSTANSI</h2>

                <h6><?php
                    if ($tgl1 == '' and $tgl2 == '') { } else {
                        echo tgl_indo($tgl1) . " s/d " . tgl_indo($tgl2);
                    }
                    ?>

                </h6>
            </div>
        </div>

        <div class="batas"></div>
        <?php

        if ($tgl1 == '' and $tgl2 == '') {
            ?>
            <table class="table" border="1px">
                <tr class="head">
                    <td width="20">NO. </td>
                    <td width="150">NAMA PENYAKIT</td>
                    <td width="50">KODE </td>
                    <td width="60">KARY</td>
                    <td width="60">ISTRI/SUAMI</td>
                    <td width="60">ANAK</td>
                    <td width="60">JUMLAH</td>
                </tr>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik WHERE penyakit.id_penyakit=rekammedik.id_penyakit ORDER BY rekammedik.id_penyakit DESC");
                $no = 1;
                while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <tr bgcolor="#fff">
                        <td align="center"><?php echo $no; ?></td>
                        <td><?php echo $r['nama_penyakit']; ?></td>
                        <td align="center"><?php echo $r['kode_pen']; ?></td>
                        <td align="center"><?php
                                            $id_penyakit = $r['id_penyakit'];
                                            $queryKaryawan = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik, pasien WHERE penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND pasien.kodePasien=rekammedik.kodepasien");
                                            echo $nKaryawan = mysqli_num_rows($queryKaryawan);
                                            ?></td>
                        <td align="center"><?php
                                            $id_penyakit = $r['id_penyakit'];
                                            $queryIstri = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik, tanggungan, pegawai_kel WHERE penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Istri' OR penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Suami'");
                                            echo $nIstri = mysqli_num_rows($queryIstri);
                                            ?></td>
                        <td align="center"><?php
                                            $id_penyakit = $r['id_penyakit'];
                                            $queryAnak = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik, tanggungan, pegawai_kel WHERE penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Anak Kandung'");
                                            echo $nAnak = mysqli_num_rows($queryAnak);
                                            ?></td>
                        <td align="center"><?php echo $nKaryawan + $nIstri + $nAnak; ?></td>
                    </tr>

                    <?php
                    $no++;
                }
                ?>
                <tr>
                    <td colspan="2" align="center">
                        <h4>Total</h4>
                    </td>
                    <td align="center">-</td>
                    <td align="center"><?php
                                        $a = mysqli_query($conn, "SELECT * FROM rekammedik, pasien WHERE pasien.kodePasien=rekammedik.kodepasien");
                                        echo $aa = mysqli_num_rows($a);
                                        ?></td>
                    <td align="center"><?php
                                        $b = mysqli_query($conn, "SELECT * FROM rekammedik, tanggungan, pegawai_kel WHERE tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Istri' OR tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Suami'");
                                        echo $bb = mysqli_num_rows($b);
                                        ?></td>
                    <td align="center"><?php
                                        $c = mysqli_query($conn, "SELECT * FROM rekammedik, tanggungan, pegawai_kel WHERE tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Anak Kandung'");
                                        echo $cc = mysqli_num_rows($c);
                                        ?></td>
                    <td align="center"><?php echo $aa + $bb + $cc; ?></td>
                </tr>

            </table>
        <?php
    } else {
        ?>
            <table class="table" border="1px">
                <tr class="head">
                    <td width="20">NO. </td>
                    <td width="150">NAMA PENYAKIT</td>
                    <td width="50">KODE </td>
                    <td width="60">KARY</td>
                    <td width="60">ISTRI/SUAMI</td>
                    <td width="60">ANAK</td>
                    <td width="60">JUMLAH</td>
                </tr>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM penyakit ORDER BY id_penyakit ASC");
                $no = 1;
                while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <tr bgcolor="#fff">
                        <td align="center"><?php echo $no; ?></td>
                        <td><?php echo $r['nama_penyakit']; ?></td>
                        <td align="center"><?php echo $r['kode_pen']; ?></td>
                        <td align="center"><?php
                                            $id_penyakit = $r['id_penyakit'];
                                            $queryKaryawan = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik, pasien WHERE penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND pasien.kodePasien=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                            echo $nKaryawan = mysqli_num_rows($queryKaryawan);
                                            ?></td>
                        <td align="center"><?php
                                            $id_penyakit = $r['id_penyakit'];
                                            $queryIstri = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik, tanggungan, pegawai_kel WHERE penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Istri' AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "' OR penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Suami' AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                            echo $nIstri = mysqli_num_rows($queryIstri);
                                            ?></td>
                        <td align="center"><?php
                                            $id_penyakit = $r['id_penyakit'];
                                            $queryAnak = mysqli_query($conn, "SELECT * FROM penyakit, rekammedik, tanggungan, pegawai_kel WHERE penyakit.id_penyakit=rekammedik.id_penyakit AND penyakit.id_penyakit='$id_penyakit' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Anak Kandung' AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                            echo $nAnak = mysqli_num_rows($queryAnak);
                                            ?></td>
                        <td align="center"><?php echo $nKaryawan + $nIstri + $nAnak; ?></td>
                    </tr>

                    <?php
                    $no++;
                }
                ?>
                <tr>
                    <td colspan="2" align="center">
                        <h4>Total</h4>
                    </td>
                    <td align="center">-</td>
                    <td align="center"><?php
                                        $a = mysqli_query($conn, "SELECT * FROM rekammedik, pasien WHERE pasien.kodePasien=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                        echo $aa = mysqli_num_rows($a);
                                        ?></td>
                    <td align="center"><?php
                                        $b = mysqli_query($conn, "SELECT * FROM rekammedik, tanggungan, pegawai_kel WHERE tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Istri' AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "' OR tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Suami' AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                        echo $bb = mysqli_num_rows($b);
                                        ?></td>
                    <td align="center"><?php
                                        $c = mysqli_query($conn, "SELECT * FROM rekammedik, tanggungan, pegawai_kel WHERE tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.status_kpeg='Anak Kandung' AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                        echo $cc = mysqli_num_rows($c);
                                        ?></td>
                    <td align="center"><?php echo $aa + $bb + $cc; ?></td>
                </tr>

            </table>
        <?php
    }
    ?>
        <table border="0px" style="float:right;" class="ttd">
            <tr>
                <td>Tangerang, <?php echo tgl_indo(date('Y-m-d')); ?></td>
            </tr>
            <tr>
                <td>Jr Manajer Personalia &amp; Kesejahteraan</td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td><?php echo $manajer; ?></td>
            </tr>
        </table>
    </div>
</body>

</html>