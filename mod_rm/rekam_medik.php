<?php
$aksi = "mod_rm/aksi_rm.php";
switch ($_GET['act']) {
	default:
		?>
	<script type="text/javascript">
		$(document).ready(function() {
			<!-- event textbox keyup
			$("#txtkdpasien").keyup(function() {
				var strcari = $("#txtkdpasien").val();
				if (strcari != "") {
					$("#hasil").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "post",
						url: "mod_rm/cari_pasien.php",
						data: "q=" + strcari,
						success: function(data) {
							$("#hasil").css("display", "block");
							$("#hasil").html(data);
						}
					});
				} else {
					$("#hasil").css("display", "block");
				}
			});

			$("#txtdos").click(function() {
				var strdok = $("#txtdok").val();
				if (strdok != "") {
					$("#tampil").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "post",
						url: "mod_rm/caridok.php",
						data: "q=" + strdok,
						success: function(data) {
							$("#tampil").css("display", "block");
							$("#tampil").html(data);
						}
					});
				} else {
					$("#tampil").css("display", "block");
				}
			});





			$("#txtobat").click(function() {
				var strobat = $("#txtobat").val();
				if (strobat != "") {
					$("#hasils").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "post",
						url: "mod_rm/input_obat.php",
						data: "q=" + strobat,
						success: function(data) {
							$("#hasils").css("display", "block");
							$("#inpt").css("display", "block");
							$("#hasils").html(data);
						}
					});
				} else {
					$("#hasils").css("display", "block");


				}
			});

			$("#tindakan").click(function() {
				var strtindakan = $("#tindakan").val();
				if (strtindakan != "") {
					$("#hasil_tindakan").html("<img src='img/loader.gif'/>")
					$.ajax({
						type: "post",
						url: "mod_rm/tindakan.php",
						data: "q=" + strtindakan,
						success: function(data) {
							$("#hasil_tindakan").css("display", "block");
							$("#hasil_tindakan").html(data);
						}
					});
				} else {
					$("#hasil_tindakan").css("display", "block");


				}
			});

		});
	</script>

	<section>
		<div class="row-fluid">
			<div class="span2 pull-left">
				<div class="span12" style="background:#fff;">

					<?php
					$kode = $_GET['kodepasien'];
					$status = $_GET['status'];
					if ($kode != '' and $status == 'pasien') {
						$qupas = mysqli_query($conn, "SELECT * FROM pasien, pegawai WHERE pasien.id_pegawai=pegawai.id_pegawai AND pasien.kodePasien='$kode'");
						$rpas = mysqli_fetch_array($qupas);
						?>
						<div class="control-group">
							<div class="rm_text">
								<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['kodePasien'] . " / Pegawai" ?>" disabled>
								</div>
							</div>
						</div>
						<div class="rm_info">
							<div class="control-group">
								<label class="control-label" for="inputText">NIP</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nip']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Nama Lengkap</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_pegawai']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Unit</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['unit']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['jk']; ?>" disabled>
								</div>
							</div>
							<?php
							$tgl = $rpas['tgl_lhr'];
							$ambil_thn = substr($tgl, 0, 4);
							$thn_sekarang = date('Y');
							$umur = $thn_sekarang - $ambil_thn;
							?>
							<div class="control-group">
								<label class="control-label" for="inputText">Umur</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $umur . " Tahun"; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
									<textarea class="span12" disabled><?php echo $rpas['alamat']; ?></textarea>
								</div>
							</div>


						</div>
					<?php
				} elseif ($kode != '' and $status == 'tanggungan') {
					$qupas = mysqli_query($conn, "SELECT * FROM tanggungan, pegawai_kel, pegawai WHERE tanggungan.id_kpeg=pegawai_kel.id_kpeg AND pegawai_kel.nip_pegawai=pegawai.nip AND tanggungan.kodeTanggungan='$kode'");
					$rpas = mysqli_fetch_array($qupas);
					?>
						<div class="control-group">
							<div class="rm_text">
								<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" value="<?php echo $rpas['kodeTanggungan']; ?>" disabled>
								</div>
							</div>
						</div>
						<div class="rm_info">

							<div class="control-group">
								<label class="control-label" for="inputText">Nama Pasien</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_kpeg']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Status</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="Tanggungan" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Nama Penanggung</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['nama_pegawai']; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Jenis Kelamin</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $rpas['jk_kpeg']; ?>" disabled>
								</div>
							</div>
							<?php
							$tgl_lhr = $rpas['tgllahir_kpeg'];
							$ambil_thn = substr($tgl_lhr, 0, 4);
							$thn_sekarang = date('Y');
							$umur = $thn_sekarang - $ambil_thn;
							?>
							<div class="control-group">
								<label class="control-label" for="inputText">Umur</label>
								<div class="controls">
									<input type="text" class="span12" id="inputText" value="<?php echo $umur . " Tahun"; ?>" disabled>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputText">Alamat</label>
								<div class="controls">
									<textarea class="span12" disabled><?php echo $rpas['alamat']; ?></textarea>
								</div>
							</div>


						</div>
					<?php
				} else {
					?>
						<div class="control-group">
							<div class="rm_text">
								<div class="controls">
									<input type="text" class="span12" id="txtkdpasien" placeholder="Masukkan Kode Pasien">
								</div>
							</div>
						</div>
					<?php
				}
				?>
				</div>

			</div>
			<div class="span10 thumb pull-right">
				<?php
				if (isset($kode)) {
					$querm = mysqli_query($conn, "SELECT * FROM rekammedik");
					$num = mysqli_num_rows($querm);
					$jmlh = $num + 1;
					$waktu = date('dmy');
					$nounik = "RM-" . $waktu . $jmlh;
					?>
					<div class="tabbable" style="margin-bottom: 18px;">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab"><span class="fa fa-medkit"></span> Data Rekam Medik</a></li>
							<li><a href="#racikObt" data-toggle="tab"><span class="fa fa-refresh"></span> Racik Obat</a></li>
							<li><a href="media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>"><span class="fa fa-refresh"></span> Reload</a></li>

							<li><a href="media.php?module=rekam_medik"><span class="fa fa-close"></span> Exit</a></li>
						</ul>
						<div class="tab-content" style="padding-bottom: 9px; border-bottom: 1px solid #ddd;">
							<?php
							$bukadiag = $_GET['diagnosa'];
							$koderm = $_GET['koderm'];
							if ($bukadiag == 'on') {
								?>
								<div class="tab-pane active" id="tab3">
									<div class="control-group">
										<?php
										$qkel = mysqli_query($conn, "SELECT * FROM rekammedik WHERE nomorRm='$koderm'");
										$rkel = mysqli_fetch_array($qkel);
										?>
										<form method="post" action="<?php echo $aksi . "?module=ubah_diag" ?>">
											<input type="hidden" name="t1" value="<?php echo $rkel['nomorRm'] ?>">
											<input type="hidden" name="kode" value="<?php echo $kode; ?>">
											<div class="control-group">
												<label class="control-label" for="inputEmail">Keluhan</label>
												<div class="controls">
													<input type="hidden" name="status" value="<?php echo $status; ?>">
													<textarea class="span8" name="t4" disabled><?php echo $rkel['keluhan']; ?></textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Diagnosa</label>
												<div class="controls">
													<textarea class="span8" name="t2"></textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Nama Penyakit</label>
												<div class="controls">
													<select name="penyakit">
														<option>Pilih Penyakit</option>
														<?php
														$qtind = mysqli_query($conn, "SELECT * FROM penyakit");
														while ($rtind = mysqli_fetch_array($qtind)) {
															?>
															<option value="<?php echo $rtind['id_penyakit']; ?>"><?php echo $rtind['nama_penyakit']; ?></option>
														<?php
													}
													?>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Tindakan</label>
												<div class="controls">
													<select name="t3" id="tindakan">
														<option>Pilih Tindakan</option>
														<?php
														$qtind = mysqli_query($conn, "SELECT * FROM tindakan");
														while ($rtind = mysqli_fetch_array($qtind)) {
															?>
															<option value="<?php echo $rtind['id_tindakan']; ?>"><?php echo $rtind['nm_tindakan']; ?></option>
														<?php
													}
													?>
													</select>
												</div>
											</div>
											<div id="hasil_tindakan"></div>
											<div class="controls">
												<button class="btn btn-danger" data-toggle="tab" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-arrow-left icon-white"></i> Back</button>
												<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
											</div>
										</form>
									</div>

								</div>
							<?php
						} else {
							$inobat = $_GET['input_obat'];
							if ($inobat == 'on') {
								?>
									<button type="button" data-toggle="tab" class="btn btn-danger" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-arrow-left icon-white"></i> Back</button>
									<hr>
									<div class="tab-pane active" id="tab4">
										<div class="span2">
											<?php
											$query4 = mysqli_query($conn, "SELECT * FROM rekammedik, dokter WHERE rekammedik.nomorRm='$koderm' AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
											$r = mysqli_fetch_array($query4);
											?>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Keluhan</label>
												<div class="controls">
													<textarea class="span12" disabled><?php echo $r['keluhan']; ?></textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Diagnosa</label>
												<div class="controls">
													<textarea class="span12" disabled><?php echo $r['diagnosa']; ?></textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Tindakan</label>
												<div class="controls">
													<textarea class="span12" disabled><?php echo $r['tindakan']; ?></textarea>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Nama Dokter</label>
												<div class="controls">
													<input type="text" class="span12" value="<?php echo $r['nama_dokter']; ?>" disabled>
												</div>
											</div>
										</div>
									</div>
									<div class="span10 pull-right" id="inpt">
										<div class="control-group pull-left">
											<label class="control-label" for="inputEmail">Pilih Obat</label>
											<div class="controls pull-left">
												<select name="t3" id="txtobat">
													<option> Nama Obat</option>
													<?php
													$qtind = mysqli_query($conn, "SELECT * FROM obat ORDER BY nama_obat ASC");
													while ($rtind = mysqli_fetch_array($qtind)) {
														?>
														<option value="<?php echo $rtind['id_obat']; ?>"><?php echo $rtind['nama_obat']; ?></option>
													<?php
												}
												?>
												</select>
											</div>
										</div>
										<form method="post" action="mod_rm/aksi_inputob.php?module=tambah">
											<input type="hidden" class="span3" value="<?php echo $koderm; ?>" name="t1">
											<input type="hidden" class="span10" value="<?php echo $rus['kodeUser']; ?>" name="t7">
											<div id="hasils" class="pull-left span8"></div>
										</form>
									</div>
									<div class="span10">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th align="center">Nomor RM</th>
													<th align="center">Nama Obat</th>
													<th align="center">Bentuk Obat</th>

													<th align="center">Ambil</th>

													<th align="center"></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$qobt = mysqli_query($conn, "SELECT * FROM tmp_obat, obat WHERE tmp_obat.kdrm='$koderm' AND obat.id_obat=tmp_obat.kdobat ORDER BY tmp_obat.id_temp DESC");
												$no = 1;
												while ($robt = mysqli_fetch_array($qobt)) {

													?>
													<tr bgcolor="#fff">
														<td><?php echo $no; ?></td>
														<td><?php echo $robt['kdrm']; ?></td>
														<td><?php echo $robt['nama_obat']; ?></td>
														<td><?php echo $robt['bentuk']; ?></td>


														<td><?php echo $robt['ambil']; ?></td>

														<td><button class="btn btn-danger" onclick="window.location='mod_rm/aksi_inputob.php?module=delete&&idtemp=<?php echo $robt['id_temp']; ?>&&ambil=<?php echo $robt['ambil'] ?>&&idobat=<?php echo $robt['kdobat']; ?>'"><i class="icon-trash icon-white"></i></button></td>
													</tr>
													<?php
													$no++;
												}
												?>
												<tr>
													<td colspan="4"></td>
													<td colspan="2">Total Obat<b>
															<?php
															$jmlh = mysqli_num_rows($qobt);
															echo $jmlh;
															?>
														</b></td>
												</tr>
											</tbody>
										</table>
									</div>
								<?php
							} else {
								?>

									<div class="tab-pane active" id="tab1">
										<div class="control-group">
											<div class="controls">
												<button class="btn btn-info" data-toggle="tab" href="#tab2"><i class="icon-chevron-right icon-white"></i> Input Keluhan</button>
												<hr>
											</div>
										</div>

										<table class="table table-bordered table-striped">
											<caption> Data Rekam Medik </caption>
											<thead>
												<tr>
													<th>#</th>
													<th align="center">Nomor RM</th>
													<th align="center">Dokter</th>
													<th align="center">Keluhan</th>
													<th align="center">Diagnosa</th>
													<th align="center">Obat</th>
													<th align="center">Tindakan</th>
													<th align="center">Tgl Berobat</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$qrm = mysqli_query($conn, "SELECT * FROM rekammedik, dokter WHERE rekammedik.kodepasien='$kode' AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
												$no = 1;
												while ($rrm = mysqli_fetch_array($qrm)) {

													?>
													<tr>
														<td><?php echo $no; ?></td>
														<td><?php echo $rrm['nomorRm']; ?></td>
														<td><?php echo $rrm['nama_dokter']; ?></td>
														<td><?php echo $rrm['keluhan']; ?></td>
														<td>
															<?php
															$dig = $rrm['diagnosa'];
															if ($dig == '-') {
																?>
																<button type="button" data-toggle="tab" class="btn btn-warning" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&diagnosa=on&&koderm=<?php echo $rrm['nomorRm'] ?>'"><span class="fa fa-stethoscope"></span> Diagnosa Sekarang</button>
															<?php
														} else {
															echo $dig;
														}
														?>
														</td>
														<td>
															<?php
															$qil = mysqli_query($conn, "SELECT * FROM tmp_obat, rekammedik WHERE rekammedik.nomorRm=tmp_obat.kdrm");
															$num_obt = mysqli_num_rows($qil);
															if ($num_obt >= 1) {
																?>
																<button class="btn btn-warning" data-toggle="tab" href="#tab4" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&input_obat=on&&koderm=<?php echo $rrm['nomorRm']; ?>'"><i class="icon-tint icon-white"></i> Obat Pasien</button>
															<?php
														} else {
															?>
																<button class="btn btn-success" data-toggle="tab" href="#tab4" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>&&input_obat=on&&koderm=<?php echo $rrm['nomorRm']; ?>'"><i class="icon-tint icon-white"></i> Obat Pasien</button>
															<?php
														}
														?>
														</td>
														<td><?php
															$tin = $rrm['tindakan'];
															$querytin = mysqli_query($conn, "SELECT * FROM tindakan WHERE id_tindakan='$tin'");
															$rti = mysqli_fetch_array($querytin);
															echo $rti['nm_tindakan'];
															?></td>
														<td><?php echo tgl_indo($rrm['tgl']); ?></td>
													</tr>
													<?php
													$no++;
												}
												?>

											</tbody>
										</table>

									</div>




								<?php
							}
						}
						$qrm = mysqli_query($conn, "SELECT * FROM rekammedik, dokter, pasien_tanggungan, pasien WHERE pasien_tanggungan.kodepasien=pasien.kodePasien AND pasien.kodePasien='$kode' AND rekammedik.kodepasien=pasien_tanggungan.kode_tang AND dokter.kodeDokter=rekammedik.kodedokter ORDER BY rekammedik.id_rm DESC");
						?>



							<div class="tab-pane" id="tab6">
								<button type="button" data-toggle="tab" class="btn btn-danger" onclick="window.location='media.php?module=rekam_medik&&status=<?php echo $status; ?>&&kodepasien=<?php echo $kode; ?>'"><i class="icon-chevron-left icon-white"></i> Back</button>
								<hr>
								<form method="post" action="<?php echo $aksi . "?module=tambah_tang" ?>">
									<div class="span6">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Pilih Tanggungan :</label>
											<div class="controls">
												<select name="t2">
													<option selected disabled>Pilih Tanggungan :</option>
													<?php
													$quetang = mysqli_query($conn, "SELECT * FROM pasien_tanggungan WHERE kodepasien='$kode'");
													while ($rtang = mysqli_fetch_array($quetang)) {
														?>
														<option value="<?php echo $rtang['kode_tang']; ?>"><?php echo $rtang['nama_tang']; ?></option>
													<?php
												}
												?>
												</select>
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
											<div class="controls">
												<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
												<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="t1">

												<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="t8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Masukkan Keluhan :</label>
											<div class="controls">
												<textarea class="span8" name="t4"></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Dokter Yang Menangani</label>
											<div class="controls">
												<select name="" id="txtdok" class="span8">
													<option disabled selected>Pilih Dokter</option>
													<?php
													$querdok = mysqli_query($conn, "SELECT * FROM dokter");
													while ($rdok = mysqli_fetch_array($querdok)) {
														?>
														<option value="<?php echo $rdok['kodeDokter']; ?>"><?php echo $rdok['nama_dokter']; ?></option>
													<?php
												}
												?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
												<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
											</div>
										</div>
									</div>
									<div class="span4">
										<div id="tampil"></div>

									</div>
								</form>
							</div>


							<div class="tab-pane" id="racikObt">
								<div class="control-group">
									<h4>Racik Obat</h4>
									<button class="btn btn-info" data-toggle="tab" href="#addRacik"><i class="icon-chevron-right icon-white"></i> Tambah Racik Obat</button>
									<table class="table table-bordered table-striped">
										<caption> Data Racik Obat </caption>
										<thead>
											<tr>
												<th>#</th>
												<th align="center">Kode Resep</th>
												<th align="center">Nama Obat</th>
												<th align="center">Racikkan</th>
												<th align="center">Aturan Pakai</th>
												<th align="center">Harga</th>
												<th align="center">Pengambil Obat</th>
												<th align="center">Petugas Apotek</th>
												<th align="center">Dokter</th>
												<th align="center">Tanggal</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = mysqli_query($conn, "SELECT * FROM racik_obat WHERE kodePasien='$kode' ORDER BY id_racik DESC");
											$no = 1;
											while ($r = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no; ?></td>
													<td>
														<pre><?php echo $r['kode_resep']; ?></pre>
													</td>
													<td>
														<pre><?php echo $r['nama_obat']; ?></pre>
													</td>
													<td>
														<pre><?php echo $r['racik']; ?></pre>
													</td>
													<td>
														<pre><?php echo $r['aturan_pakai']; ?></pre>
													</td>
													<td><?php echo $r['harga']; ?></td>
													<td><?php echo $r['pengambil_obat']; ?></td>
													<td><?php echo $r['petugas_apotek']; ?></td>
													<td><?php
														$do = $r['id_dokter'];
														$qd = mysqli_query($conn, "SELECT * FROM dokter WHERE kodeDokter='$do'");
														$rdk = mysqli_fetch_array($qd);
														echo $rdk['nama_dokter'];
														?></td>
													<td><?php echo tgl_indo($r['tgl_racik']); ?></td>
													<td><button class="btn btn-success" onclick="window.location='mod_rm/f_racik.php?kode_pasien=<?php echo $kode; ?>&&kode_resep=<?php echo $r['kode_resep']; ?>&&status=<?php echo $status; ?>'"><i class="fa fa-print"></i></button>
														<button class="btn btn-danger" onclick="window.location='mod_rm/aksi_rm.php?module=hapus_racik&&id_racik=<?php echo $r['id_racik']; ?>&&kode=<?php echo $kode; ?>&&status=pasien'"><i class="icon-trash icon-white"></i></button></td>
												</tr>
												<?php
												$no++;
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="addRacik">
								<h3>Tambah Obat Racik</h3>
								<form method="post" action="<?php echo $aksi . "?module=tambahracik" ?>">
									<input type="hidden" id="inputText" name="kode" value="<?php echo $kode; ?>" class="span4">
									<input type="hidden" id="inputText" name="status" value="<?php echo $status ?>" class="span4">
									<div class="control-group">
										<label class="control-label" for="inputPassword">Kode Resep</label>
										<div class="controls">
											<input type="text" class="span4" name="kode_resep" value="<?php echo $kode; ?>-001">

										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Nama Obat</label>
										<div class="controls">
											<textarea class="span4" name="t1"></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Racikan</label>
										<div class="controls">
											<textarea class="span4" name="t2"></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Aturan Pemakaian</label>
										<div class="controls">
											<textarea class="span4" name="t3"></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Harga</label>
										<div class="controls">
											<input type="text" id="inputText" name="t4" class="span4">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Pengambil Obat</label>
										<div class="controls">

											<input type="text" id="inputText" name="t5" class="span4">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Petugas Apotek</label>
										<div class="controls">
											<input type="text" id="inputText" name="t6" class="span4">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Dokter</label>
										<div class="controls">
											<select name="t7">
												<option selected disabled>Pilih Dokter</option>
												<?php
												$qdok = mysqli_query($conn, "SELECT * FROM dokter");
												while ($rd = mysqli_fetch_array($qdok)) {
													?>
													<option value="<?php echo $rd['kodeDokter'] ?>"><?php echo $rd['nama_dokter'] ?></option>
												<?php
											}
											?>
											</select>
										</div>
									</div>
									<hr>
									<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
								</form>
							</div>
							<div class="tab-pane" id="tab2">
								<hr>
								<form method="post" action="<?php echo $aksi . "?module=tambahrm" ?>">
									<div class="span6">

										<div class="control-group">
											<label class="control-label" for="inputEmail">Nomor Rekam Medik</label>
											<div class="controls">
												<input type="text" class="span8" value="<?php echo $nounik ?>" disabled>
												<input type="hidden" class="span8" value="<?php echo $nounik ?>" name="t1">
												<input type="hidden" class="span8" value="<?php echo $kode ?>" name="t2">
												<input type="hidden" class="span8" value="<?php echo $rus['kodeUser'] ?>" name="t8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Masukkan Keluhan</label>
											<div class="controls">
												<textarea class="span8" name="t4"></textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Dokter Yang Menangani</label>
											<div class="controls">
												<select name="t3" id="txtdok" class="span8">
													<option disabled selected>Pilih Dokter</option>
													<?php
													$querdok = mysqli_query($conn, "SELECT * FROM dokter");
													while ($rdok = mysqli_fetch_array($querdok)) {
														?>
														<option value="<?php echo $rdok['kodeDokter']; ?>"><?php echo $rdok['nama_dokter']; ?></option>
													<?php
												}
												?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<button class="btn btn-danger" data-toggle="tab" href="#tab1"><i class="icon-arrow-left icon-white"></i> Back</button>
												<button type="submit" class="btn btn-success"><i class="icon-ok-circle icon-white"></i> Simpan</button>
											</div>
										</div>
									</div>
									<div class="span4">
										<div id="tampil"></div>

									</div>
								</form>
							</div>


						</div>
					</div> <!-- /tabbable -->
				<?php
			} else {
				?>

					<div id="hasil"></div>
				<?php
			}
			?>
			</div>
		</div>
	</section>
	<?php
	break;
}
?>