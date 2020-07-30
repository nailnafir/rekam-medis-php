<?php
$aksi = "mod_dokter/aksi_jadwal.php";
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
						url: "mod_dokter/cari_jadwal.php",
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
			<li class="active">Jadwal Visit Dokter</li>

		</ul>
		<div class="control-group pull-left">
			<button class="btn btn-success" type="button" onclick="window.location='media.php?module=jadwal_dok&&act=tambah'"><i class="icon-plus icon-white"></i> Tambah Jadwal</button>
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
								<td>Hari / Waktu</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							<?php

							$query = mysqli_query($conn, "SELECT * FROM jadwal_dok, dokter WHERE dokter.kodeDokter=jadwal_dok.kodedokter ORDER BY dokter.nama_dokter ASC LIMIT $posisi,$batas");
							$no = $posisi + 1;
							while ($r = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $r['kodeDokter']; ?></td>
									<td><?php echo $r['nama_dokter']; ?></td>
									<td><?php echo $r['spesialis']; ?></td>
									<td>
										<pre class="span8"><?php echo $r['waktu']; ?> </pre>
									</td>
									<td>
										<div class="btn-group">
											<a class="btn btn-success" href="#"><i class="icon-wrench icon-white"></i> Actions</a>
											<a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="media.php?module=jadwal_dok&&act=edit&&kodedk=<?php echo $r['id_jadwal']; ?>"><i class="icon-pencil"></i> Edit</a></li>
												<li><a href="<?php echo "$aksi?module=hapus&&id_jad=$r[id_jadwal]"; ?>" onclick="return confirm('Apakah anda yakin, ingin menghapus data dokter <?php echo $r['nama_dokter']; ?>?')"><i class="icon-trash"></i> Delete</a></li>
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
									$jmldata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM jadwal_dok"));
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
	<?php
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
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=jadwal_dok">Jadwal Visit Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Tambah Jadwal</li>
		</ul>

		<div class="row-fluid">
			<div class="span12 pull-left">
				<form method="post" enctype="multipart/form-data" action="<?php echo "$aksi?module=tambah"; ?>">
					<input type="hidden" class="span10" id="inputText" value="<?php echo $rus['kodeUser']; ?>" name="t7">
					<fieldset>
						<legend class="span7 offset1">Tambah Jadwal Visit</legend>
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
								<label class="control-label" for="inputPassword"> Hari / Jam</label>
								<div class="controls">
									<textarea class="span11" style="height:200px;" name="t2"></textarea>
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
	$kodedk = $_GET['kodedk'];
	$query = mysqli_query($conn, "SELECT * FROM dokter, jadwal_dok WHERE jadwal_dok.id_jadwal='$kodedk' AND dokter.kodeDokter=jadwal_dok.kodedokter");
	$r = mysqli_fetch_array($query);
	?>
	<section>
		<ul class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="media.php?module=jadwal_dok">Jadwal Visit Dokter</a> <span class="divider"><b>&gt;</b></span></li>
			<li class="active">Update Jadwal</li>
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
									<input type="hidden" id="inputText" value="<?php echo $r['id_jadwal']; ?>" name="t1">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword"> Hari / Jam</label>
								<div class="controls">
									<textarea class="span11" style="height:200px;" name="t2"><?php echo $r['waktu']; ?></textarea>
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