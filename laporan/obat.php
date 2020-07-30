<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
include("../config/fungsi_minggu.php");
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];
?>
<!doctype html>
<html>

<head>
    <title>Laporan Obat</title>
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
                    <td width="10">NO. </td>
                    <td width="290">NAMA OBAT</td>
                    <td width="80">OBAT KELUAR </td>
                    <td width="80">OBAT SEKARANG</td>
                    <td width="80">TOTAL</td>
                </tr>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM obat ORDER BY jmlh_obat DESC");
                $no = 1;
                while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <tr bgcolor="#fff">
                        <td align="center"><?php echo $no; ?></td>
                        <td><?php echo $r['nama_obat']; ?></td>
                        <td align="center">
                            <?php
                            $id_obat = $r['id_obat'];
                            $ambil_obt = mysqli_query($conn, "SELECT tmp_obat.kdobat,  obat.id_obat, tmp_obat.ambil, SUM(tmp_obat.ambil) AS total FROM tmp_obat, obat WHERE tmp_obat.kdobat=obat.id_obat AND tmp_obat.kdobat='$id_obat'");
                            $r1 = mysqli_fetch_array($ambil_obt);



                            if ($r1 != 0) {
                                echo $r1['total'] + 0;
                            }



                            ?>
                        </td>
                        <td align="center">
                            <?php
                            $id_obat = $r['id_obat'];


                            $sisa_obt = mysqli_query($conn, "SELECT * FROM tmp_obat, obat WHERE tmp_obat.kdobat=obat.id_obat AND obat.id_obat='$id_obat'");
                            $r2 = mysqli_fetch_array($sisa_obt);
                            $sisa = $r2['jmlh_obat'];


                            if ($r1 != 0) {
                                echo $sisa + 0;
                            }



                            ?>
                        </td>

                        <td align="center">
                            <?php
                            echo $sisa + $r1['total'];
                            ?>
                        </td>
                    </tr>

                    <?php
                    $no++;
                }
                ?>


            </table>
        <?php
    } else {
        ?>
            <table class="table" border="1px">
                <tr class="head">
                    <td width="10">NO. </td>
                    <td width="290">NAMA OBAT</td>
                    <td width="80">OBAT KELUAR </td>
                    <td width="80">OBAT SEKARANG</td>
                    <td width="80">TOTAL</td>
                </tr>

                <?php
                $query = mysqli_query($conn, "SELECT * FROM obat ORDER BY jmlh_obat DESC");
                $no = 1;
                while ($r = mysqli_fetch_array($query)) {
                    ?>
                    <tr bgcolor="#fff">
                        <td align="center"><?php echo $no; ?></td>
                        <td><?php echo $r['nama_obat']; ?></td>
                        <td align="center">
                            <?php
                            $id_obat = $r['id_obat'];
                            $ambil_obt = mysqli_query($conn, "SELECT tmp_obat.kdobat,  obat.id_obat, tmp_obat.ambil, tmp_obat.tgl_ambil, SUM(tmp_obat.ambil) AS total FROM tmp_obat, obat WHERE tmp_obat.kdobat=obat.id_obat AND tmp_obat.kdobat='$id_obat' AND tmp_obat.tgl_ambil BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                            $r1 = mysqli_fetch_array($ambil_obt);

                            if ($r1 != 0) {
                                echo $r1['total'] + 0;
                            }



                            ?>
                        </td>
                        <td align="center">
                            <?php
                            $id_obat = $r['id_obat'];


                            $sisa_obt = mysqli_query($conn, "SELECT * FROM tmp_obat, obat WHERE tmp_obat.kdobat=obat.id_obat AND obat.id_obat='$id_obat' AND tmp_obat.tgl_ambil BETWEEN '" . $tgl1 . "' AND '" . $tgl2 . "'");
                            $r2 = mysqli_fetch_array($sisa_obt);
                            $sisa = $r2['jmlh_obat'];


                            if ($r1 != 0) {
                                echo $sisa + 0;
                            }

                            ?>
                        </td>

                        <td align="center">
                            <?php
                            echo $sisa + $r1['total'];
                            ?>
                        </td>
                    </tr>

                    <?php
                    $no++;
                }
                ?>


            </table>
        <?php
    }
    ?>

    </div>
</body>

</html>