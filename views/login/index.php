<?php 

if(isset($_SESSION['userId']) && isset($_SESSION['allowed']) && $_SESSION['allowed'] == 'ja'): echo '<script> location.replace("home"); </script>';
	
?>

<?php else:  ?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<title>Lernportal für 38.1</title>
	<link rel="stylesheet" href="/template/css/bootstrap.min.css">
	<link rel="stylesheet" href="/template/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="/template/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="/template/css/main.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

</head>
<body>

	<div class="container-fluid login">
		<h1>38.1 LERNPORTAL</h1>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form method="post" action="">
				  <div class="form-group">
				    <label for="loginEmail">Email-Adresse</label>
				    <input type="email" name="loginEmail" class="form-control" id="losinEmail"  placeholder="Email-Adresse">
				  </div>

				  <div class="form-group">
				    <label for="loginPassword">Password</label>
				    <input type="password" name="loginPassword" class="form-control" id="loginPassword" placeholder="Password">
				  </div>

				  <button type="submit" name="submit" class="btn btn-dark btn-lg">Eintreten</button>
				  <div class="form-row mt-4">
				  	<div class="form-group col-md-3">
				  		<a href="konto_erstellen" class="text-dark">
				  			<i class="fas fa-user-plus text-success pr-1"></i>Konto erstellen
				  		</a>
				  	</div>
				  	<div class="form-group col-md-4">
				  		<a href="passwort_vergessen" class="text-dark">
				  			<i class="fas fa-key text-info pr-1"></i>Passwort vergessen
				  		</a>
				  	</div>
				  </div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="/template/js/jquery-3.3.1.min.js"></script>
	<script src="/template/js/bootstrap.min.js"></script>
</body>
</html>

<?php endif; ?>
