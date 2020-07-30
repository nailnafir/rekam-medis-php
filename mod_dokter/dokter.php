<?php
$aksi = "mod_dokter/aksi_dokter.php";
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
						url: "mod_dokter/cari.php",
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
			<li class="active">Data Dokter</li>

		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-success" type="button" onclick="window.location='media.php?module=dokter&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Dokter</button>
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
							<tr class="head2">
								<td>No</td>
								<td>Kode Dokter</td>
								<td>Nama Dokter</td>
								<td>Spesialis</td>
								<td>Jenis Kelamin</td>
								<td>Alamat</td>
								<td>No Handphone</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php

							$query = mysqli_query($conn, "SELECT * FROM dokter ORDER BY nama_dokter ASC LIMIT $posisi,$batas");
							$no = $posisi + 1;
							while ($r = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $r['kodeDokter']; ?></td>
									<td><?php echo $r['nama_dokter']; ?></td>
									<td><?php echo $r['spesialis']; ?></td>
									<td><?php echo $r['jk']; ?></td>
									<td><?php echo $r['alamat']; ?></td>
									<td><?php echo $r['no_hp']; ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
											<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="media.php?module=dokter&&act=edit&&kodedk=<?php echo $r['kodeDokter']; ?>"><i class="icon-pencil"></i> Edit</a></li>
												<li><a href="<?php echo "$aksi?module=hapus&&kodedk=$r[kodeDokter]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>

								<?php
								$no++;
							}
							?>
							<tr>
								<td colspan="7">
									<?php
									$jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dokter"));
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
	$time_stamp = date("sdy");
	$acak1 = $time_stamp;
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
	$acak2 = acakangkahuruf(3);
	$nounik = "DK-" . $acak1 . $acak2;
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom:5px;">
			<li><a href="media.php?module=dokter">Data Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Dokter</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
					<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
					<fieldset>
						<legend class="span7 offset1">Tambah Dokter</legend>
						<div class="clear"></div>
						<div class="span3 offset1">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Dokter</label>
								<div class="controls">
									<input type="text" class="span10" id="inputText" name="t2">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="L">
									Laki-Laki
								</label>
								<label class="radio">
									<input type="radio" name="t4" id="optionsRadios1" value="P">
									Perempuan
								</label>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
									<input type="number" id="inputText" name="t6">
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
						<div class="span3">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Kode Dokter</label>
								<div class="controls">
									<input type="text" id="inputText" class="span6" value="<?php echo $nounik; ?>" disabled>
									<input type="hidden" id="inputText" class="span6" value="<?php echo $nounik; ?>" name="t1">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Spesialis</label>
								<div class="controls">

									<input type="text" id="inputText" class="span11" name="t3">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
									<textarea name="t5"></textarea>
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

case "edit":
	$kodedk = $_GET['kodedk'];
	$query = mysqli_query($conn, "SELECT * FROM dokter WHERE kodeDokter='$kodedk'");
	$r = mysqli_fetch_array($query);
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=dokter">Data Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Dokter</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" action="<?php echo "$aksi?module=edit"; ?>">
					<fieldset>
						<legend class="span7 offset1">Ubah Dokter</legend>
						<div class="clear"></div>
						<div class="span3 offset1">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Dokter</label>
								<div class="controls">
									<input type="text" class="span10" id="inputText" name="t2" value="<?php echo $r['nama_dokter']; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Jenis Kelamin</label>
								<?php
								$jk = $r['jk'];
								if ($jk == 'L') {
									?>
									<label class="radio">
										<input type="radio" name="t4" id="optionsRadios1" value="L" checked>
										Laki-Laki
									</label>
									<label class="radio">
										<input type="radio" name="t4" id="optionsRadios1" value="P">
										Perempuan
									</label>
								<?php
							} else {
								?>
									<label class="radio">
										<input type="radio" name="t4" id="optionsRadios1" value="L">
										Laki-Laki
									</label>
									<label class="radio">
										<input type="radio" name="t4" id="optionsRadios1" value="P" checked>
										Perempuan
									</label>
								<?php
							}
							?>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">No Handphone</label>
								<div class="controls">
									<input type="number" id="inputText" name="t6" value="<?php echo $r['no_hp']; ?>">
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
						<div class="span3">


							<input type="hidden" id="inputText" class="span6" value="<?php echo $r['kodeDokter']; ?>" name="t1">


							<div class="control-group">
								<label class="control-label" for="inputPassword">Spesialis</label>
								<div class="controls">

									<input type="text" id="inputText" class="span11" name="t3" value="<?php echo $r['spesialis']; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Alamat</label>
								<div class="controls">
									<textarea name="t5"><?php echo $r['alamat']; ?></textarea>
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