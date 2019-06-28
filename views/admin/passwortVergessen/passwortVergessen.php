
<?php if($_SESSION['user_status'] != 'admin'){
  echo '<script> location.replace("/admin/adminIhkFragenEinlegen"); </script>';

}?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminHeader.php'); ?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminMenu.php'); ?>



	<!-- Error messages -->
	<p id="response" class="error_true alert alert-danger text-center rounded-0" role="alert" style="display: none;"></p>

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

	<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>

	<script src="/template/js/ajax/passwortZurucksetzen.js"></script>
	<!-- errors messages -->
<script>
	$(".error_true").animate({left: "0"}, 1000);
	setTimeout(function(){
		$(".error_true").animate({left: "-1000px"}, 1000);
	}, 8000);

	$(".error_false").animate({left: "0"}, 1000);
	setTimeout(function(){
		$(".error_false").animate({left: "-1000px"}, 1000);
	}, 8000);
</script>
