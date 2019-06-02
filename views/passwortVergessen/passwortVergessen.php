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
	
	<p id="response"></p>
		<!-- Error messages -->
	<?php if(isset($error) && $error == true): ?>
		<div class="error_true alert alert-danger text-center d-inline-block rounded-0" role="alert">
			<?php if(isset($message_text) && $message_text != ''){echo $message_text;} ?>
		</div>
	<?php endif; ?>

	<?php if(isset($error) && $error == false): ?>
		<div class="error_false alert alert-success text-center d-inline-block rounded-0" role="alert">
			<?php if(isset($message_text) && $message_text != ''){echo $message_text;} ?>
		</div>
	<?php endif; ?>


	<div class="container-fluid konto_erstellen">
		<h1>PASSWORD ZURÜCKSETZEN</h1>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form method="post" action="">
				  <div class="form-group">
				    <label for="loginEmail">Email-Adresse <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="email" id="email" class="form-control">
				  </div>
					<input type="button" class="btn btn-dark btn_reset_password" value="Passwort zurücksetzen">
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<script src="/template/js/jquery-3.3.1.min.js"></script>
	<script src="/template/js/bootstrap.min.js"></script>

	<script src="/template/js/ajax/passwortZurucksetzen.js"></script>

		<!-- errors messages -->
	<script>
		$(".error_true").animate({left: "0"}, 1000);
		setTimeout(function(){
			$(".error_true").animate({left: "-1000px"}, 1000);
		}, 5000);

		$(".error_false").animate({left: "0"}, 1000);
		setTimeout(function(){
			$(".error_false").animate({left: "-1000px"}, 1000);
		}, 5000);
	</script>




	

	
</body>
</html>