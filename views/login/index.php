<?php

if(isset($_SESSION['userId']) && isset($_SESSION['allowed']) && $_SESSION['allowed'] == 'ja'): echo '<script> location.replace("home"); </script>';

?>

<?php else:  ?>
<!DOCTYPE html>
<html lang="de">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
					<?php
						echo '<input type="hidden" name="hidden" value="'.$atmt.'">';
					?>
				  <div class="form-group">
				    <label for="loginEmail">Email-Adresse</label>
				    <input 	type="email"
										name="loginEmail"
										class="form-control"
										id="losinEmail"
										placeholder="Email-Adresse"
										<?php if($atmt == 4) echo "disabled"; ?>
										>
				  </div>

				  <div class="form-group">
				    <label for="loginPassword">Password</label>
				    <input 	type="password"
										name="loginPassword"
										class="form-control"
										id="loginPassword"
										placeholder="Password"
										<?php if($atmt == 4) echo "disabled"; ?>
										>
				  </div>

				  <button type="submit"
									name="submit"
									class="btn btn-dark btn-lg"
									<?php if($atmt == 4) echo "disabled"; ?>
									>Eintreten</button>

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
