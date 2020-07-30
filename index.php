<!DOCTYPE html>
<html lang="id">
	<head>
		<title>Aplikasi Rekam Medik | Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link  href="css/bootstrap-responsive.min.css"  rel ="stylesheet"> 
		<link rel="shoutcut icon" href="logo.png">

	</head>
	<body>
	<div class="line"></div>
	<section>
		<div class="container">
			<div class="row">
			
				<div class="span4 offset4 content">
				<h5><i class="icon-lock icon-white"></i> Aplikasi Rekam Medik</h5>
				<form method="post" action="cek_log.php">
					<fieldset>
								<label>Username</label>
								<input type="text" class="span4" name="username" autocomplete="off">
								
								<label>Password</label>
								<input type="password" class="span4" name="password">
								<div class="clear"></div>
								
								<hr>
								
								<div class="clear"></div>
								<button type="submit" class="btn btn-info"> Login</button>
								
							</fieldset>
				</form>
				
				<!-- Modal -->
					
					<!-- End Modal -->
				
				</div>
			</div>
		</div>
	</section>
	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script><!-- Bootstrap -->
	</body>
</html>