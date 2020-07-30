<?php
include("../config/koneksi.php");
include("../config/fungsi_indotgl.php");
$kodepasien = $_POST['q'];
$aksi = "mod_pegawai/aksi_pegawai.php";
?>
<div class="hasil_cari">
    <h5>Hasil Pencarian <b><?php echo $kodepasien; ?></b></h5>
    <table class="table table-striped">
        <thead>
            <tr class="head1">
                <td>No</td>
                <td>Unit</td>
                <td>KJ</td>
                <td>NIP</td>
                <td>Nama Pegawai</td>
                <td>Istri/Suami</td>
                <td>Anak</td>
                <td>Susunan Keluarga</td>
                <td>Tanggal Lahir</td>
                <td>Status</td>
                <td>Alamat</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE nip LIKE '%" . $kodepasien . "%' OR nama_pegawai LIKE '%" . $kodepasien . "%'");
            $no = 1;
            $num = mysqli_num_rows($query);
            if ($num >= 1) {
                while ($r = mysqli_fetch_array($query)) {
                    $nip = $r['nip'];
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $r['unit']; ?></td>
                        <td><?php echo $r['kj']; ?></td>
                        <td><?php echo $r['nip']; ?></td>
                        <td><?php echo $r['nama_pegawai']; ?></td>
                        <td>
                            <?php
                            if ($r['status_kel'] == 'Istri') {
                                $query_suami = mysqli_query($conn, "SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.status_kpeg='Suami'");
                                echo mysqli_num_rows($query_suami);
                            } elseif ($r['status_kel'] == 'Suami') {
                                $query_istri = mysqli_query($conn, "SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.status_kpeg='Istri'");
                                echo mysqli_num_rows($query_istri);
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            $query_anak = mysqli_query($conn, "SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip AND pegawai_kel.status_kpeg='Anak Kandung'");
                            echo mysqli_num_rows($query_anak);
                            ?>
                        </td>
                        <td>
                            <?php
                            echo "<b>" . $r['nama_pegawai'] . "</b><br>";
                            $query_kel = mysqli_query($conn, "SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.id_kpeg ASC");
                            $num_kel = mysqli_num_rows($query_kel);
                            while ($r_kel = mysqli_fetch_array($query_kel)) {
                                echo $r_kel['nama_kpeg'] . " <a href='$aksi?module=hapus_kel&&id_kpeg=$r_kel[id_kpeg]'><span class='fa fa-close alert-danger'></span></a>" . "<br>";
                            }


                            ?>
                        </td>
                        <td><?php echo tgl_indo($r['tgl_lhr']) . "<br>";
                            $query_kel = mysqli_query($conn, "SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.id_kpeg ASC");
                            $num_kel = mysqli_num_rows($query_kel);
                            while ($r_kel = mysqli_fetch_array($query_kel)) {
                                echo tgl_indo($r_kel['tgllahir_kpeg']) . "<br>";
                            }
                            ?></td>
                        <td><?php echo $r['status_kel'] . " / " . $r['jk'] . "<br>";
                            $query_kel = mysqli_query($conn, "SELECT * FROM pegawai, pegawai_kel WHERE pegawai_kel.nip_pegawai=$nip AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.id_kpeg ASC");
                            $num_kel = mysqli_num_rows($query_kel);
                            while ($r_kel = mysqli_fetch_array($query_kel)) {
                                echo $r_kel['status_kpeg'] . " / " . $r_kel['jk_kpeg'] . "<br>";
                            }
                            ?></td>
                        <td><?php echo $r['alamat'] ?></td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="media.php?module=pegawai&&act=edit&&id_pegawai=<?php echo $r['id_pegawai']; ?>"><i class="icon-pencil"></i> Edit</a></li>
                                    <li><a href="<?php echo "$aksi?module=hapus&&id_pegawai=$r[id_pegawai]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data pegawai <?php echo $r['nama_pegawai']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>

                    <?php
                    $no++;
                }
            } else {
                ?>
                <tr>
                    <td colspan="11">
                        <div class="alert alert-error">Data tidak ditemukan</div>
                    </td>
                </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>