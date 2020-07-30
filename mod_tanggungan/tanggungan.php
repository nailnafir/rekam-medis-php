<?php
$aksi = "mod_tanggungan/aksi_tanggungan.php";
switch ($_GET['act']) {
	default:
		?>
	<script type="text/javascript">
		$(document).ready(function() {
			<!-- event textbox keyup
			$("#txtcari").keyup(function() {
				var strcari = $("#txtcari").val();
				if (strcari != "") {
					$("#tabel_awal").css("display", "none");

					$("#hasil").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "post",
						url: "mod_tanggungan/cari.php",
						data: "q=" + strcari,
						success: function(data) {
							$("#hasil").css("display", "block");
							$("#hasil").html(data);

						}
					});
				} else {
					$("#hasil").css("display", "none");
					$("#tabel_awal").css("display", "block");
				}
			});
		});
	</script>
	<?php
	$p      = new Paging;
	$batas  = 10;
	$posisi = $p->cariPosisi($batas);
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li class="active">Data Pasien Tanggungan</li>

		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-primary" type="button" onclick="window.location='media.php?module=tanggungan&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Tanggungan</button>
		</div>
		<form class="form-search pull-right">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-search"></i></span>
				<input class="span3" id="txtcari" type="text" placeholder="Search">
			</div>
		</form>
		<hr>
		<div class="row-fluid">
			<div class="span12 pull-left">
				<div id="hasil"></div>
				<div id="tabel_awal">
					<table class="table table-striped">
						<thead>
							<tr class="head1">
								<td>No</td>
								<td>Kode Tanggungan</td>
								<td>Nama Penangung</td>
								<td>Nama Tanggungan</td>
								<td>Hubungan</td>
								<td>JK</td>
								<td>Tanggal Lahir</td>
								<td>Usia</td>
								<td>Tanggal Daftar</td>
								<td></td>
							</tr>

						</thead>
						<tbody>
							<?php
							$query = mysqli_query($conn, "SELECT * FROM tanggungan, pegawai_kel, pegawai WHERE tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.nip_pegawai=pegawai.nip ORDER BY pegawai_kel.nama_kpeg ASC LIMIT $posisi,$batas");
							$no = $posisi + 1;
							while ($r = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $r['kodeTanggungan']; ?></td>
									<td><?php echo $r['nama_pegawai']; ?></td>
									<td><?php echo $r['nama_kpeg']; ?></td>
									<td><?php echo $r['status_kpeg']; ?></td>
									<td><?php echo $r['jk_kpeg']; ?></td>
									<td><?php echo tgl_indo($r['tgllahir_kpeg']); ?></td>
									<td>
										<?php
										$tgl_lht = $r['tgllahir_kpeg'];
										$ambil_thn = substr($tgl_lht, 0, 4);
										$thn_sekarang = date('Y');
										$umur = $thn_sekarang - $ambil_thn;
										echo $umur . " Tahun";
										?>

									</td>
									<td><?php echo $r['jam_daft'] . " / " . tgl_indo($r['tgl_daft']); ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-primary" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
											<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a data-toggle="modal" href="#<?php echo $r['kodeTanggungan'] ?>"><i class="fa fa-credit-card"></i> Cetak Kartu</a></li>
												<li><a href="<?php echo "$aksi?module=hapus&&id_tang=$r[id_tanggungan]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data tanggungan <?php echo $r['nama_kpeg']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>
								<div id="<?php echo $r['kodeTanggungan'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

									<div class="modal-body">
										<h3>Cetak Kartu</h3>
										<a href="front.php?id_pasien=<?php echo $r['kodeTanggungan']; ?>&&status=tanggungan" style="padding:0px 25px;">
											<img src="img/depan.png">
										</a>
										<a href="end.php?id_pasien=<?php echo $r['kodeTanggungan']; ?>&&status=tanggungan" style="padding:0px 25px;">
											<img src="img/belakang.png">
										</a>
									</div>

								</div>
								<?php
								$no++;
							}
							?>
							<tr>
								<td colspan="9">
									<?php
									$jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pasien"));
									$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
									$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);
									echo "$linkHalaman";
									?>
								<td>Jumlah Record <?php echo $jmldata; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php
	break;
case "tambah":
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			<!-- event textbox keyup
			$("#kpeg").keyup(function() {
				var strtgl = $("#kpeg").val();
				if (strtgl != "") {
					$("#hasil_kpeg").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "post",
						url: "mod_tanggungan/cari_kpeg.php",
						data: "q=" + strtgl,
						success: function(data) {
							$("#hasil_kpeg").css("display", "block");
							$("#hasil_kpeg").html(data);

						}
					});
				} else {
					$("#hasil_kpeg").css("display", "none");
				}
			});
		});
	</script>
	<?php
	function acakangkahuruf($panjang)
	{
		$karakter = '0123456789';
		$string = '';
		for ($i = 0; $i < $panjang; $i++) {
			$pos = rand(0, strlen($karakter) - 1);
			$string .= $karakter{
				$pos};
		}
		return $string;
	}
	function acakangkahuruf1($panjang1)
	{
		$karakter1 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';
		for ($i = 0; $i < $panjang1; $i++) {
			$pos1 = rand(0, strlen($karakter1) - 1);
			$string .= $karakter1{
				$pos1};
		}
		return $string;
	}
	$acak1 = acakangkahuruf1(3);
	$acak2 = acakangkahuruf(4);
	$nounik = $acak1 . "-" . $acak2;
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=tanggungan">Data Pasien Tanggungan</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Pasien Tanggungan</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
					<input type="hidden" id="inputText" name="t12" value="<?php echo $rus['kodeUser']; ?>" class="span11">
					<fieldset>
						<legend class="span7 offset1">Nama Penanggung <input type="text" class="span3" id="kpeg" name="t3" required></legend>
						<div class="clear"></div>
						<div class="span3 offset1">

							<div id="hasil_kpeg"></div>


						</div>
						<div class="span3 offset1">



							<div class="control-group">
								<label class="control-label" for="inputPassword">Kode Tanggungan</label>
								<div class="controls">

									<input type="hidden" id="inputText" class="span6" value="<?php echo $nounik; ?>" name="t1">
								</div>
							</div>
							<img alt="testing" src="barcode/barcode.php?text=<?php echo $nounik; ?>&print=true" />
							<div class="control-group">
								<label class="control-label" for="inputPassword">Foto</label>
								<div class="controls">
									<input type="file" name="foto" required>
								</div>
							</div>
							<hr>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</section>

	<?php
	break;
}
?>