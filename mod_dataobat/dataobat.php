<?php
$aksi = "mod_dataobat/aksi_dataobat.php";
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
						url: "mod_dataobat/cari.php",
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
			<li class="active">Data Obat</li>

		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-info" type="button" onclick="window.location='media.php?module=dataobat&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Obat</button>
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
							<tr class="head">
								<td>No</td>
								<td>Nama Obat</td>
								<td>Jumlah Obat</td>
								<td>Satuan</td>
								<td>Detail</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php

							$query = mysqli_query($conn, "SELECT * FROM obat ORDER BY nama_obat ASC LIMIT $posisi,$batas");
							$no = $posisi + 1;
							while ($r = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $r['nama_obat']; ?></td>
									<td><?php echo $r['jmlh_obat']; ?></td>
									<td><?php echo $r['satuan']; ?></td>
									<td><?php echo $r['detail']; ?></td>
									<td>
										<div class="btn-group">
											<a class="btn btn-info" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
											<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="media.php?module=dataobat&&act=edit&&kodeobat=<?php echo $r['id_obat']; ?>"><i class="icon-pencil"></i> Edit</a></li>
												<li><a href="<?php echo "$aksi?module=hapus&&kode_obat=$r[id_obat]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus obat <?php echo $r['nama_obat']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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
									$jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM obat"));
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
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=dataobat">Data Obat</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Obat</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
					<fieldset>
						<legend class="span7 offset1">Tambah Obat</legend>
						<div class="clear"></div>
						<div class="span5 offset1">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Obat</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" name="t1">
								</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="inputPassword">Jumlah Obat</label>
								<div class="controls">
									<input type="number" class="span3" id="inputText" name="t3">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Satuan</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" name="t4">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Detail</label>
								<div class="controls">
									<textarea class="span12" name="t5"></textarea>
								</div>
							</div>


							<input type="hidden" class="span12" id="inputText" name="t7" value="<?php echo $rus['kodeUser']; ?>">
							<hr>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
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
	$kodeobat = $_GET['kodeobat'];
	$query = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$kodeobat'");
	$r = mysqli_fetch_array($query);
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=dataobat">Data Obat</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Obat</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=edit"; ?>">
					<fieldset>
						<legend class="span7 offset1">Update Obat</legend>
						<div class="clear"></div>
						<div class="span5 offset1">

							<div class="control-group">
								<label class="control-label" for="inputPassword">Nama Obat</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" name="t1" value="<?php echo $r['nama_obat']; ?>">
								</div>
							</div>


							<div class="control-group">
								<label class="control-label" for="inputPassword">Jumlah Obat</label>
								<div class="controls">
									<input type="number" class="span3" id="inputText" name="t3" value="<?php echo $r['jmlh_obat']; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Satuan</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" name="t4" value="<?php echo $r['satuan']; ?>">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Detail</label>
								<div class="controls">
									<textarea class="span12" name="t5"><?php echo $r['detail']; ?></textarea>
								</div>
							</div>


							<input type="hidden" class="span12" id="inputText" name="t7" value="<?php echo $r['id_obat']; ?>">
							<hr>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
									<button type="reset" class="btn btn-warning"><i class="icon-refresh icon-white"></i> Reset</button>
								</div>
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