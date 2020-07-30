<?php
include("../config/koneksi.php");
include("../config/fungsi_rupiah.php");
$kode = $_POST['q'];
$query = mysqli_query($conn, "SELECT * FROM obat WHERE id_obat='$kode'");
$r = mysqli_fetch_array($query);

?>
<input type="hidden" class="span10" value="<?php echo $r['id_obat']; ?>" name="t2">

<input type="hidden" class="span10" value="<?php echo $r['jmlh_obat']; ?>" name="stok">

<div class="control-group pull-left span2">
	<label class="control-label" for="inputEmail">Bankanya</label>
	<div class="controls pull-left">
		<input type="number" class="span11" value="0" name="t3">
	</div>
</div>


<div class="control-group pull-left span3">
	<label class="control-label" for="inputEmail"><br></label>
	<div class="controls pull-left">
		<button type="submit" class="btn btn-success"><i class="icon-arrow-down icon-white"></i> Add Obat</button>
	</div>

</div>