<?php
	if($_GET['module']=='home'){
		echo "Home | Aplikasi Klinik";
	}
	elseif($_GET['module']=='data_user'){
		echo "Data User | Aplikasi Klinik";
	}
	elseif($_GET['module']=='data_pasien'){
		echo "Data Pasien | Aplikasi Klinik";
	}
	elseif($_GET['module']=='dokter'){
		echo "Data Dokter | Aplikasi Klinik";
	}
	elseif($_GET['module']=='jadwal_dok'){
		echo "Jadwal Dokter | Aplikasi Klinik";
	}
	elseif($_GET['module']=='tarif_dok'){
		echo "Tarif Dokter | Aplikasi Klinik";
	}
	elseif($_GET['module']=='tindakan'){
		echo "Kategori Tindakan | Aplikasi Klinik";
	}
	elseif($_GET['module']=='dataobat'){
		echo "Data Obat | Aplikasi Klinik";
	}
	elseif($_GET['module']=='rekam_medik'){
		echo "Rekam Medik | Aplikasi Klinik";
	}
?>