<?php
$conn=mysqli_connect("localhost","root","") or die("Tidak Terkoneksi");
$db=mysqli_select_db($conn, "db_rm") or die ("Database Tidak Ditemukan");
