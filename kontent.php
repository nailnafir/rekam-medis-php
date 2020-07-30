<?php
	if($_GET['module']=='home'){
		?>
		<section>
		<div class="row-fluid">
			<div class="span4 pull-left">
				<div class="info_akses span12">
				<img src="img/logo.png" class="logo span12">
					<?php
					$fotouser=$rus['photo'];
					if(empty($fotouser)){
					?>
					<div style="background:url(photo_user/default.png) #fff center;background-size:cover;" class="foto pull-left"></div>
					<?php
					}
					else{
					?>
					<div style="background:url(<?php echo "photo_user/".$fotouser; ?>) center;background-size:cover;" class="foto pull-left"></div>
					<?php
					}
					?>
					<div class="span6 pull-left">
					<h4><i class="icon-info-sign icon-white"></i> Info Akses</h4>
					<div class="isi_akses">
					<span>Kode User</span>
						<span class="form"><?php echo $rus['kodeUser']; ?></span>
					
					<span>Nama Lengkap</span>
						<span class="form"><?php echo $rus['first_name']." ".$rus['last_name']; ?></span>
					
					<hr>
					<span><a data-toggle="modal" href="#myModal" class="btn btn-info btn-small">Ganti Photo</a>	</span>
						
					</div>
					</div>
				</div>
				<!-- Modal -->
						<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							  <h3 id="myModalLabel">Ganti Photo</h3>
							</div>
							<div class="modal-body">
								<p>
								<?php
								$fotouser=$rus['photo'];
								if(empty($fotouser)){
								?>
								<div style="background:url(photo_user/default.png) center;background-size:cover;" class="fotos pull-left"></div>
								<?php
								}
								else{
								?>
								<div style="background:url(<?php echo "photo_user/".$fotouser; ?>) center;background-size:cover;" class="fotos pull-left"></div>
								<?php
								}
								?>
								<form method="post" action="upload_foto.php" enctype="multipart/form-data">
								<input type="hidden" name="kodeuser" value="<?php echo $rus['kodeUser']; ?>">
								<input type="file" name="fupload">
								</p>
							  
							</div>
							<div class="modal-footer">
							  <button class="btn" data-dismiss="modal">Close</button>
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  </form>
							</div>
						</div>
						<!-- End Modal -->
				</div>
			<div class="span8 thumb pull-right">
				<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert">&times;</button>Selamat datang <strong><?php echo $rus['first_name']; ?></strong> <?php echo date('D m Y'); ?>.</div>							
					<ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#regist" class="thumbnail">
								<img src="img/regis.png" alt="">
                                
							</a>
						</li>
						
						
						<li class="span3">
							<a href="media.php?module=rekam_medik" class="thumbnail">
								<img src="img/rekam.png" alt="">
							</a>
						</li>
					
					</ul>
	
					<h5>LAPORAN</h5>
                <ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#lapPenyakit" class="thumbnail">
								<img src="img/lap_1.png" alt="">
							</a>
						</li>
                        <li class="span3">
							<a data-toggle="modal" href="#lapKonsep" class="thumbnail">
								<img src="img/lap_2.png" alt="">
							</a>
						</li>
                    <li class="span3">
							<a data-toggle="modal" href="#lapPeriksa" class="thumbnail">
								<img src="img/lap_6.png" alt="">
							</a>
						</li>
                        
                    <li class="span3">
							<a data-toggle="modal" href="#lapObat" class="thumbnail">
								<img src="img/lap_4.png" alt="">
							</a>
						</li>
                    
                </ul>
                <ul class="thumbnails">
						
                    <li class="span3">
							<a data-toggle="modal" href="#lapRm" class="thumbnail">
								<img src="img/lap_5.png" alt="">
							</a>
						</li>
                </ul>
                
                <!--<ul class="thumbnails">
						<li class="span3">
							<a data-toggle="modal" href="#lapPasien" class="thumbnail">
								<img src="img/lap_pasien.png" alt="">
							</a>
						</li>
<li class="span3">
							<a data-toggle="modal" href="#lapRawatinap" class="thumbnail">
								<img src="img/lap_3.png" alt="">
							</a>
						</li>
                        <li class="span3">
							<a data-toggle="modal" href="#lapRm" class="thumbnail">
								<img src="img/lap_rekam.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a data-toggle="modal" href="#lapDokter" class="thumbnail">
								<img src="img/lap_dokter.png" alt="">
							</a>
						</li>
						<li class="span3">
							<a href="laporan/f_dataobat.php" target="_blank" class="thumbnail">
								<img src="img/lap_obat.png" alt="">
							</a>
						</li>
					
						
						
					</ul>
                    -->
				
				
					<!-- tombol untuk memicu modal -->
						
				    <div id="lapPenyakit" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Penyakit</h3>
								<form method="get" action="laporan/f_penyakit.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                
                        <div id="lapKonsep" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Konsultasi Dokter Spesial</h3>
								<form method="get" action="laporan/f_konsep.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 
                <div id="lapPeriksa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Pemeriksaan</h3>
								<form method="get" action="laporan/f_pemeriksaan.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div> 
                
               <!-- <div id="lapPoli" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Kunjungan di Poliklinik</h3>
								<form method="get" action="laporan/f_poli.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                -->
                    <div id="lapRawatinap" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Rawat Inap</h3>
								<form method="get" action="laporan/f_rawatinap.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                    <div class="control-group">
								<label class="control-label" for="inputPassword">Jr Manajer Personalia &amp Kesejahteraan
</label>
								<div class="controls">
								<input type="text" class="span10" id="inputText" name="manajer">
								</div>
							</div>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                <div id="lapObat" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Laporan Obat</h3>
								<form method="get" action="laporan/f_obat.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
                                 
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>  
                
                
						<!-- Modal -->
						<div id="lapDokter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<a href="laporan/f_datadok.php" target="_blank">LAORAN DATA DOKTER</a><p>
								<a href="laporan/f_jaddok.php" target="_blank">LAORAN JADWAL DOKTER</a>
							</div>
							
						</div>   
                        
						 
						
						<!-- Modal -->
						<div id="lapPasien" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Periode</h3>
								<form method="get" action="laporan/f_datapas.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2"><p>
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                
                <div id="lapRm" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body">
								<h3>Periode Kunjungan Pasien</h3>
								<form method="get" action="laporan/f_rekammedik.php">
									<input type="date" name="tgl1"> - <input type="date" name="tgl2">
									<button type="submit" class="btn">Cetak</button>
								</form>
							</div>
							
						</div>   
                
                <div id="regist" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							
							<div class="modal-body center">
								<h3>Registrasi Pasien</h3>
                                <a href="media.php?module=data_pasien&&act=tambah_pasien">
								    <img src="img/addpas.png">
                                </a>
                                <a href="media.php?module=tanggungan&&act=tambah">
                                    <img src="img/addtang.png">
                                </a>
							</div>
							
						</div>   
						
			</div>
		</div>
	</section>
		<?php
	}
	elseif($_GET['module']=='data_user'){
        if($akses=='3'){
		  include("mod_datauser/data_user.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='data_pasien'){
        if($akses=='3'){
		  include("mod_pasien/pasien.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='dokter'){
		
        if($akses=='3'){
		  include("mod_dokter/dokter.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='jadwal_dok'){
		
        if($akses=='3'){
		  include("mod_dokter/jadwal_dok.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='tarif_dok'){
        if($akses=='3'){
		  include("mod_dokter/tarif_dok.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='tindakan'){
        if($akses=='3'){
		  include("mod_tindakan/tindakan.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='dataobat'){
        if($akses=='3'){
		  include("mod_dataobat/dataobat.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='rekam_medik'){
		
        if($akses=='3'){
		  include("mod_rm/rekam_medik.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='apotek'){
        if($akses=='3'){
		  include("mod_apotek/apotek.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
	elseif($_GET['module']=='tanggungan'){
        if($akses=='3'){
		  include("mod_tanggungan/tanggungan.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
	}
    elseif($_GET['module']=='pegawai'){
        if($akses=='3'){
		  include("mod_pegawai/pegawai.php");
        }
        else{
            echo "
		      <script type='text/javascript'>
			     alert('Mohon maaf, akses anda kami tolak.');
			     back.self();
		      </script>
	";
        }
		
	}
	elseif($_GET['module']=='keluar'){
		session_start();
		session_destroy();
		header("location:index.php");
	}
?>