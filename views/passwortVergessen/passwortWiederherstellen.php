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

	<div class="container-fluid konto_erstellen">
		<h1>PASSWORD WIEDERHERSTELLEN</h1>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form method="post" action="">

				  <div class="form-group">
				    <label for="loginPassword_1">Passwort <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="password" name="new_password_1" class="form-control new_password_1">
				  </div>

				  <div class="form-group">
				    <label for="loginPassword_2">Passwort wiederholen <span class="text-danger" style="font-size:20px;">*</span></label>
				    <input type="password" name="new_password_2" class="form-control new_password_2">
				  </div>
					<div class="form-row">
						<div class="form-group col-md-9">
							<input type="submit" name="password_neu_setzen" class="btn btn-dark d-block" value="Passwort neu setzen">
				  	</div>
						<div class="form-group col-md-3">
							<input type="button" class="btn btn-info btn-block clear_pass_fields" value="Felder leeren">
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


	<!-- überprüfe neue Passworts auf die gleichheit-->
<script>


	// passwordfield leeren
	$(".clear_pass_fields").on('click', function(){

		$(".new_password_1").val("");
		$(".new_password_2").val("");
		$(".new_password_1").css({border: "1px solid #ced4da"});
		$(".new_password_2").css({border: "1px solid #ced4da"});
	});


	$(".new_password_1").change(function(){

		var new_password_1 = $(this).val();
		var new_password_2 = $(".new_password_2").val();

		if(new_password_2 != ''){
			if(new_password_1.match('^' + new_password_2 + '$')){
				$(this).css({border: "2px solid #19692c"}); // green
				$(".new_password_2").css({border: "2px solid #19692c"}); // green
			} else {
				$(this).css({border: "2px solid #dc3545"});
				$(".new_password_2").css({border: "2px solid #dc3545"});// red
			}
		}

		if($(".new_password_1").val() == '' && $(".new_password_2").val() == ''){
			$(".new_password_1").css({border: "1px solid #ced4da"});
			$(".new_password_2").css({border: "1px solid #ced4da"});
		}
	});


	$(".new_password_2").change(function(){

		var new_password_1 = $(".new_password_1").val();
		var new_password_2 = $(this).val();

		if(new_password_1 != ''){
			if(new_password_2.match('^' + new_password_1 + '$')){
				$(this).css({border: "2px solid #19692c"});// green
				$(".new_password_1").css({border: "2px solid #19692c"});// green
			} else {
				$(this).css({border: "2px solid #dc3545"}); // red
				$(".new_password_1").css({border: "2px solid #dc3545"});// red
			}
		}

		if($(".new_password_1").val() == '' && $(".new_password_2").val() == ''){
			$(".new_password_1").css({border: "1px solid #ced4da"});
			$(".new_password_2").css({border: "1px solid #ced4da"});
		}
	});

</script>

</body>
</html>
