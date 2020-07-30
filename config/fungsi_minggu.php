<?php
	function minggu($date) {
		$tgl=date_parse($date);
		$tanggal =  $tgl["day"];
		$bulan   =  $tgl["month"];
		$tahun   =  $tgl["year"];
		//tanggal 1 tiap bulan
		$tanggalAwalBulan = mktime(0, 0, 0, $bulan, 1, $tahun);
		$mingguAwalBulan = (int) date("W", $tanggalAwalBulan);
		//tanggal sekarang
		$tanggalYangDicari = mktime(0, 0, 0, $bulan, $tanggal, $tahun);
		$mingguTanggalYangDicari = (int) date("W", $tanggalYangDicari);
		$mingguKe = $mingguTanggalYangDicari-$mingguAwalBulan + 1;
		return $mingguKe;
    }
?>