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
		<h1>KONTO ERSTELLEN</h1>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form method="post" action="">
					<div class="form-group">
				    <label for="loginEmail">Vorname <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="text" name="reg_name" class="form-control reg_name">
				  </div>
				  <div class="form-group">
				    <label for="loginEmail">Email-Adresse <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="email" name="reg_email" class="form-control reg_email" id="losinEmail">
				  </div>

				  <div class="form-group">
				    <label for="loginPassword_1">Passwort <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="password" name="reg_password_1" class="form-control reg_password_1">
				  </div>

				  <div class="form-group">
				    <label for="loginPassword_2">Passwort wiederholen <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="password" name="reg_password_2" class="form-control reg_password_2">
				  </div>
					<div class="form-row">
						<div class="form-group col-md-9">
							<input type="submit" name="konto_erstellen" class="btn btn-dark d-block" value="Konto erstellen">
				  	</div>
						<div class="form-group col-md-3">
							<input type="button" class="btn btn-info btn-block clear_reg_fields" value="Felder leeren">
				  	</div>
					</div>
					<div class="form-row mt-3">
						<a href="/" class="text-danger mb-1" style="text-decoration: none;"><i class="fas fa-angle-double-left pr-2 text-danger" style="position: relative; top:2px;"></i>zurück</a>
					</div>
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>

	<script src="/template/js/jquery-3.3.1.min.js"></script>
	<script src="/template/js/bootstrap.min.js"></script>

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


	<!-- überprüfe neue Passworts auf die gleichheit-->
<script>


	// passwordfield leeren
	$(".clear_reg_fields").on('click', function(){

		$(".reg_name").val("");
		$(".reg_email").val("");
		$(".reg_password_1").val("");
		$(".reg_password_2").val("");
		$(".reg_password_1").css({border: "1px solid #ced4da"});
		$(".reg_password_2").css({border: "1px solid #ced4da"});
	});


	$(".reg_password_1").change(function(){

		var reg_password_1 = $(this).val();
		var reg_password_2 = $(".reg_password_2").val();

		if(reg_password_2 != ''){
			if(reg_password_1.match('^' + reg_password_2 + '$')){
				$(this).css({border: "2px solid #19692c"}); // green
				$(".reg_password_2").css({border: "2px solid #19692c"}); // green
			} else {
				$(this).css({border: "2px solid #dc3545"});
				$(".reg_password_2").css({border: "2px solid #dc3545"});// red
			}
		}

		if($(".reg_password_1").val() == '' && $(".reg_password_2").val() == ''){
			$(".reg_password_1").css({border: "1px solid #ced4da"});
			$(".reg_password_2").css({border: "1px solid #ced4da"});
		}
	});


	$(".reg_password_2").change(function(){

		var reg_password_1 = $(".reg_password_1").val();
		var reg_password_2 = $(this).val();

		if(reg_password_1 != ''){
			if(reg_password_2.match('^' + reg_password_1 + '$')){
				$(this).css({border: "2px solid #19692c"});// green
				$(".reg_password_1").css({border: "2px solid #19692c"});// green
			} else {
				$(this).css({border: "2px solid #dc3545"}); // red
				$(".reg_password_1").css({border: "2px solid #dc3545"});// red
			}
		}

		if($(".reg_password_1").val() == '' && $(".reg_password_2").val() == ''){
			$(".reg_password_1").css({border: "1px solid #ced4da"});
			$(".reg_password_2").css({border: "1px solid #ced4da"});
		}
	});

</script>

</body>
</html>