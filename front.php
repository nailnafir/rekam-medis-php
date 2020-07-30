<!DOCTYPE html>
<html>

<head>
    <style type="text/css">
        * {
            padding: 0px;
            margin: 0px;
        }

        body {
            font-family: tahoma;
        }

        @media screen {

            .card {
                width: 5cm;
                height: 7cm;
                background: #eee;
                text-align: center;
            }

            .foto {
                margin-top: 60px;
                width: 2cm;
                height: 2.2cm;
            }

            label {
                display: block;
            }

            .nama {
                font-size: 13px;
                margin: 5px 0px;
                font-weight: bold;
            }

            .unit {
                font-size: 11px;
                margin: 10px 0px;
            }
        }

        @media print {

            button {
                display: none;
            }

            .card {
                width: 3.7cm;
                height: 7cm;
                background-color: #eee;
                text-align: center;
            }

            .foto {
                margin-top: 60px;
                width: 2cm;
                height: 2.2cm;
            }

            label {
                display: block;
            }

            .nama {
                font-size: 9px;
                margin: 5px 0px;
                font-weight: bold;
            }

            .unit {
                font-size: 9px;
                margin: 10px 0px;
            }
        }
    </style>
</head>

<body>



    <?php
    include("config/koneksi.php");
    $tanggungan = $_GET['status'];
    $kode = $_GET['id_pasien'];

    if ($tanggungan == 'pasien') {
        $query = mysqli_query($conn, "SELECT * FROM pasien, pegawai WHERE pasien.kodePasien='$kode' AND pasien.id_pegawai=pegawai.id_pegawai");
        $r = mysqli_fetch_array($query);
        ?>
        <div class="card">
            <img src="foto_pasien/<?php echo $r['foto_pasien']; ?>" class="foto">
            <label class="nama"><?php echo $r['nama_pegawai'] ?></label>
            <label class="unit"><?php echo $r['unit'] ?></label>
            <img alt="testing" src="barcode/barcode.php?text=<?php echo $kode; ?>&print=true" />
        </div>
    <?php
} else {
    $query = mysqli_query($conn, "SELECT * FROM tanggungan, pegawai_kel WHERE tanggungan.kodeTanggungan='$kode' AND tanggungan.id_kpeg=pegawai_kel.id_kpeg");
    $r = mysqli_fetch_array($query);
    ?>
        <div class="card">
            <img src="foto_tanggungan/<?php echo $r['foto_tanggungan']; ?>" class="foto">
            <label class="nama"><?php echo $r['nama_kpeg'] ?></label>
            <label class="unit">Status : Tanggungan</label>
            <img alt="testing" src="barcode/barcode.php?text=<?php echo $kode; ?>&print=true" />
        </div>
    <?php
}
?>
    <button onclick="window.print()">Print</button>

</body>

</html>