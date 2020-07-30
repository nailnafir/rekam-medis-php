<?php
$aksi = "mod_dokter/aksi_tarif.php";
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
						url: "mod_dokter/cari_tarif.php",
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
			<li class="active">Tarif Dokter</li>

		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-success" type="button" onclick="window.location='media.php?module=tarif_dok&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Tarif</button>
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
								<td>Tarif Harga</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php

							$query = mysqli_query($conn, "SELECT * FROM tarif_dok, dokter WHERE dokter.kodeDokter=tarif_dok.kodedokter ORDER BY dokter.nama_dokter ASC LIMIT $posisi,$batas");
							$no = $posisi + 1;
							while ($r = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $r['kodeDokter']; ?></td>
									<td><?php echo $r['nama_dokter']; ?></td>
									<td><?php echo $r['spesialis']; ?></td>
									<td><?php echo $r['tarif']; ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
											<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="media.php?module=tarif_dok&&act=edit&&id_tarif=<?php echo $r['id_tarif']; ?>"><i class="icon-pencil"></i> Edit</a></li>
												<li><a href="<?php echo "$aksi?module=hapus&&id_tarif=$r[id_tarif]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus tarif dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
											</ul>
										</div>
									</td>
								</tr>

								<?php
								$no++;
							}
							?>
							<tr>
								<td colspan="5">
									<?php
									$jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tarif_dok"));
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
			$("#txtspecial").click(function() {
				var strspecial = $("#txtspecial").val();
				if (strspecial != "") {

					$("#hasil").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "get",
						url: "mod_dokter/ambil_special.php",
						data: "q=" + strspecial,
						success: function(data) {
							$("#hasil").css("display", "block");
							$("#hasil").html(data);

						}
					});
				} else {
					$("#hasil").css("display", "none");
				}
			});
		});
	</script>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=tarif_dok">Tarif Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Tarif Dokter</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
					<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
					<fieldset>
						<legend class="span7 offset1">Tambah Tarif</legend>
						<div class="clear"></div>
						<div class="span3 offset1">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Pilih Dokter</label>
								<div class="controls">
									<select id="txtspecial" name="t1" class="span11">
										<option disabled selected> </option>
										<?php
										$query_dok = mysqli_query($conn, "SELECT * FROM dokter");
										while ($rdok = mysqli_fetch_array($query_dok)) {
											?>
											<option value="<?php echo $rdok['kodeDokter']; ?>"><?php echo $rdok['kodeDokter']; ?></option>
										<?php
									}
									?>
									</select>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword"> Tarif / Harga</label>
								<div class="controls">
									<input type="text" name="t2" class="span11">
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
							<div id="hasil"></div>

						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</section>

	<?php
	break;

case "edit":
	$id_dok = $_GET['id_tarif'];
	$query = mysqli_query($conn, "SELECT * FROM dokter, tarif_dok WHERE tarif_dok.id_tarif='$id_dok'");
	$r = mysqli_fetch_array($query);
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=tarif_dok">Tarif Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Tarif</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" action="<?php echo "$aksi?module=edit"; ?>">
					<fieldset>
						<legend class="span7 offset1">Update Jadwal</legend>
						<div class="clear"></div>
						<div class="span3 offset1">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Pilih Dokter</label>
								<div class="controls">
									<input type="text" id="inputText" value="<?php echo $r['kodeDokter']; ?>" disabled>
									<input type="hidden" id="inputText" value="<?php echo $r['id_tarif']; ?>" name="t1">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword"> Tarif / Harga</label>
								<div class="controls">
									<input type="text" name="t2" class="span10" value="<?php echo $r['tarif']; ?>">
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
								<label class="control-label" for="inputPassword">Nama Dokter</label>
								<div class="controls">
									<input type="text" id="inputText" value="<?php echo $r['nama_dokter']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Spesialis</label>
								<div class="controls">
									<input type="text" id="inputText" value="<?php echo $r['spesialis']; ?>" disabled>
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