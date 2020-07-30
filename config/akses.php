<?php
	$iduser=$_SESSION['iduser'];
	$query=mysqli_query($conn, "SELECT * FROM user_man WHERE id_user='$iduser'");
	$rus=mysqli_fetch_array($query);
