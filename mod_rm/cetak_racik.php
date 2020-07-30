<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$kode = $_GET['kode_pasien'];
$kode_resep = $_GET['kode_resep'];
?>
<!doctype html>
<html>

<head>
    <title>Racik Obat</title>
    <link rel="shortcut icon" href="../img/laporan.png">
    <link rel="stylesheet" type="text/css" href="../css/obtracik.css">
</head>

<body>
    <div class="page">
        <div class="kop">

            <h6>

            </h6>
        </div>

        <div class="batas"></div>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM racik_obat WHERE kode_resep='$kode_resep' ORDER BY id_racik DESC");
        $r = mysqli_fetch_array($query);
        ?>

        <table border="0px">
            <tr>
                <td>
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?php
                                $kode_pas = $r['kodepasien'];
                                $querypas = mysqli_query($conn, "SELECT * FROM pasien, pegawai WHERE pegawai.id_pegawai=pasien.id_pegawai AND pasien.kodePasien='$kode'");
                                $rpas = mysqli_fetch_array($querypas);
                                echo $rpas['nama_pegawai'];
                                ?></td>
                        </tr>
                        <tr>
                            <td>Umur</td>
                            <td>:</td>
                            <td><?php


                                $tgl = $rpas['tgl_lhr'];
                                $ambil_thn = substr($tgl, 0, 4);
                                $thn_sekarang = date('Y');
                                $umur = $thn_sekarang - $ambil_thn;
                                echo $umur . " Tahun";
                                ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><?php echo $rpas['jk']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama Karyawan</td>
                            <td>:</td>
                            <td><?php echo $rpas['nama_pegawai'] ?></td>
                        </tr>
                        <tr>
                            <td>Unik Kerja</td>
                            <td>:</td>
                            <td><?php echo $rpas['unit']; ?></td>
                        </tr>


                    </table>
                </td>
                <td>
                    <table class="table tbl2" border="1px">
                        <tr>
                            <td>No. Transkasi</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>Tgl. Transaksi</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>No. Kartu</td>
                            <td>:</td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>NIP</td>
                            <td>:</td>
                            <td><?php echo $rpas['nip']; ?></td>
                        </tr>
                        <tr>
                            <td>Dokter</td>
                            <td>:</td>
                            <td><?php
                                $dok = $r['id_dokter'];
                                $qudok = mysqli_query($conn, "SELECT * FROM dokter WHERE kodeDokter='$dok'");
                                $rdok = mysqli_fetch_array($qudok);
                                echo $rdok['nama_dokter'];
                                ?></td>
                        </tr>

                    </table>
                </td>
            </tr>
        </table>

        <table class="table" style="margin-top:20px;">
            <tr>
                <td style='width:20px;'>No.</td>
                <td style='width:150px;'>Nama Obat</td>
                <td style='width:180px;'>Racik No.Racik Jumlah</td>
                <td style='width:100px;'>Aturan Pakai</td>
                <td style='width:110px;'>Harga</td>
            </tr>
            <?php
            $no = 1;
            $queL = mysqli_query($conn, "SELECT * FROM racik_obat, pasien WHERE kode_resep='$kode_resep' AND racik_obat.kodepasien='$kode' GROUP BY racik_obat.nama_obat ORDER BY id_racik DESC");
            while ($rc = mysqli_fetch_array($queL)) {
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $rc['nama_obat'] ?></td>
                    <td><?php echo $rc['racik'] ?></td>
                    <td><?php echo $rc['aturan_pakai'] ?></td>
                    <td><?php echo $rc['harga'] ?></td>
                </tr>
                <?php
                $no++;
            }
            ?>

        </table>

        <table class="ttd">
            <tr>
                <td style="width:200px;">Pemngambil Obat
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo $r['pengambil_obat']; ?>
                </td>

                <td style="width:200px;">Petugas Apotek
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo $r['pengambil_obat']; ?>
                </td>

                <td style="width:200px;">Dokter
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <?php echo $rdok['nama_dokter']; ?>
                </td>
            </tr>

        </table>
    </div>
</body>

</html>