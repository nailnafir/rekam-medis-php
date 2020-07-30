<?php
function format_rupiah($angka){
  $rupiah="Rp. ".number_format($angka,0,',','.');
  return $rupiah;
}
?> 
