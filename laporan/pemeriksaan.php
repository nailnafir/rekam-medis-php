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
                    <td width="170">PEMERIKSAAN</td>
                    <td width="115">KARYAWAN </td>
                    <td width="115">KELUARGA</td>
                    <td width="115">JUMLAH</td>
                </tr>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM tindakan WHERE lap='1' ORDER BY nm_tindakan ASC");
                $no = 1;
                while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <tr bgcolor="#fff">
                        <td align="center"><?php echo $no; ?></td>
                        <td><?php echo $r['nm_tindakan']; ?></td>
                        <td align="center"><?php
                                            $id_tindakan = $r['id_tindakan'];
                                            $queryTindakan = mysqli_query($conn, "SELECT * FROM tindakan, rekammedik, pasien WHERE tindakan.id_tindakan=rekammedik.tindakan AND tindakan.id_tindakan='$id_tindakan' AND pasien.kodePasien=rekammedik.kodepasien AND tindakan.lap='1'");
                                            echo $nTindakan = mysqli_num_rows($queryTindakan);
                                            ?></td>
                        <td align="center"><?php
                                            $id_tindakan = $r['id_tindakan'];
                                            $tindakanTang = mysqli_query($conn, "SELECT * FROM tindakan, rekammedik, tanggungan WHERE tindakan.id_tindakan=rekammedik.tindakan AND tindakan.id_tindakan='$id_tindakan' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tindakan.lap='1'");
                                            echo $tTang = mysqli_num_rows($tindakanTang);
                                            ?></td>


                        <td align="center"><?php echo $nTindakan + $tTang; ?></td>
                    </tr>

                    <?php
                    $no++;
                }
                ?>
                <tr>
                    <td colspan="2" align="center">
                        <h4>Total</h4>
                    </td>

                    <td align="center"><?php
                                        $a = mysqli_query($conn, "SELECT * FROM rekammedik, pasien,tindakan WHERE pasien.kodePasien=rekammedik.kodepasien AND tindakan.id_tindakan=rekammedik.tindakan AND tindakan.lap='1'");
                                        echo $aa = mysqli_num_rows($a);
                                        ?></td>
                    <td align="center"><?php
                                        $b = mysqli_query($conn, "SELECT * FROM tindakan, rekammedik, tanggungan WHERE tindakan.id_tindakan=rekammedik.tindakan AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND tindakan.lap='1'");
                                        echo $bb = mysqli_num_rows($b);
                                        ?></td>

                    <td align="center"><?php echo $aa + $bb; ?></td>
                </tr>

            </table>
        <?php
    } else {
        ?>
            <table class="table" border="1px">
                <tr class="head">
                    <td width="20">NO. </td>
                    <td width="170">SPESIALIS</td>
                    <td width="115">KARYAWAN </td>
                    <td width="115">KELUARGA</td>
                    <td width="115">JUMLAH</td>
                </tr>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM konsul_spesial ORDER BY id_spesialis ASC");
                $no = 1;
                while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <tr bgcolor="#fff">
                        <td align="center"><?php echo $no; ?></td>
                        <td><?php echo $r['nama_spesialis']; ?></td>
                        <td align="center"><?php
                                            $id_spesialis = $r['id_spesialis'];
                                            $queryKaryawan = mysqli_query($conn, "SELECT * FROM konsul_spesial, rekammedik, pasien WHERE konsul_spesial.id_spesialis=rekammedik.spesialis AND konsul_spesial.id_spesialis='$id_spesialis' AND pasien.kodePasien=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                            echo $nKaryawan = mysqli_num_rows($queryKaryawan);
                                            ?></td>
                        <td align="center"><?php
                                            $id_spesialis = $r['id_spesialis'];
                                            $queryTang = mysqli_query($conn, "SELECT * FROM konsul_spesial, rekammedik, tanggungan WHERE konsul_spesial.id_spesialis=rekammedik.spesialis AND konsul_spesial.id_spesialis='$id_spesialis' AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                            echo $nTang = mysqli_num_rows($queryTang);
                                            ?></td>


                        <td align="center"><?php echo $nKaryawan + $nTang; ?></td>
                    </tr>

                    <?php
                    $no++;
                }
                ?>
                <tr>
                    <td colspan="2" align="center">
                        <h4>Total</h4>
                    </td>

                    <td align="center"><?php
                                        $a = mysqli_query($conn, "SELECT * FROM rekammedik, pasien,konsul_spesial WHERE pasien.kodePasien=rekammedik.kodepasien AND konsul_spesial.id_spesialis=rekammedik.spesialis AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                        echo $aa = mysqli_num_rows($a);
                                        ?></td>
                    <td align="center"><?php
                                        $b = mysqli_query($conn, "SELECT * FROM konsul_spesial, rekammedik, tanggungan WHERE konsul_spesial.id_spesialis=rekammedik.spesialis AND tanggungan.kodeTanggungan=rekammedik.kodepasien AND rekammedik.tgl BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                                        echo $bb = mysqli_num_rows($b);
                                        ?></td>

                    <td align="center"><?php echo $aa + $bb; ?></td>
                </tr>

            </table>
        <?php
    }
    ?>
        <table border="0" style="float:right;" class="ttd">
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