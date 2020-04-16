<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>


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



<div class="container personalProfil pb-5">

	<div class="seller-trenner"></div>
		<div class="col-md-2 personenBild">
			<div class="card border-dark mb-3" style="max-width: 18rem;">
			  <div class="card-header"><?php if(isset($users_daten)) echo $users_daten['user_name'];?></div>
			  <div class="card-body text-dark">
			    <img src="/template/images/<?php if(isset($users_daten)) {echo $users_daten['user_foto'];} if($users_daten['user_foto'] == ''){echo 'fragezeichen.jpg'; } ?>" alt="img">
			  </div>
			</div>
		</div>
	<div class="col-md-10"></div>


	<div class="row">
	  <div class="col-xs-12 col-sm-12 col-md-3">
	    <div class="nav flex-column nav-pills bg-dark text-white" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	      <a class="nav-link active" id="v-pills-person-tab" data-toggle="pill" href="#v-pills-person" role="tab" aria-controls="v-pills-person" aria-selected="true">Persönliche Daten</a>
	      <a class="nav-link" id="v-pills-bild-tab" data-toggle="pill" href="#v-pills-bild" role="tab" aria-controls="v-pills-bild" aria-selected="false">Profilbild</a>
	      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Persönliche Daten ändern</a>
	      <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">Passwort ändern</a>
	    </div>
	  </div>
	  <div class="col-xs-12 col-sm-12 col-md-9">
	    <div class="tab-content" id="v-pills-tabContent">

	      <div class="tab-pane fade show active" id="v-pills-person" role="tabpanel" aria-labelledby="v-pills-person-tab">
	      	<table class="table table-bordered table-responsive-sm">
					  <thead>
					    <tr>
					      <th scope="col">Vorname</th>
					      <th scope="col">Nachname</th>
					      <th scope="col">E-mail</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php if(isset($users_daten)): ?>
						    <tr>
						      <td><?php echo $users_daten['user_name']; ?></td>
						      <td><?php echo $users_daten['user_lastname']; ?></td>
						      <td style="word-break: break-all;"><?php echo $users_daten['user_email']; ?></td>
						    </tr>
					  	<?php endif; ?>
					  </tbody>
					</table>
			  </div>

				<div class="tab-pane fade" id="v-pills-bild" role="tabpanel" aria-labelledby="v-pills-bild-tab">
					<form action="" method="post" enctype="multipart/form-data">
						<span class="badge badge-warning p-2 mb-4">
							Maximal erlaubte Upload-Größe: 500 kB <br>
							Erlaubte Dateitypen: .jpg, .jpeg, .png, .gif
						</span>
						<div class="input-group">
						  <div class="custom-file">
						    <input type="file" name="datei" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" value="suchen">
						    <label class="custom-file-label" for="inputGroupFile04"></label>
						  </div>
						  <div class="input-group-append">
						  	<input type="submit" class="btn btn-dark " id="inputGroupFileAddon04"  value="Hochladen">
						  </div>
						</div>
					</form>
			  </div>

	      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

	      	<form method="post">

						<div class="form-row">
							<span class="col-md-1 text-danger" style="font-size: 25px; text-align: right;">*</span>
						  <div class="form-group col-md-11">
						    <input 	type="text"
						    				class="form-control"
						    				name="user_name"
						    				value="<?php if(isset($users_daten['user_name'])) echo $users_daten['user_name']; ?>"
						    				placeholder="Vorname">
						  </div>
						</div>
						<div class="form-row">
							<span class="col-md-1 text-danger" style="font-size: 25px; text-align: right;">*</span>
						  <div class="form-group col-md-11">
						    <input 	type="text"
						    				class="form-control"
						    				name="user_lastname"
						    				value="<?php if(isset($users_daten['user_lastname'])) echo $users_daten['user_lastname'];  ?>"
						    				placeholder="Nachname">
						  </div>
						</div>
						<div class="form-row">
							<span class="col-md-1 text-danger" style="font-size: 25px; text-align: right;">*</span>
							<div class="form-group col-md-9">
						    <input 	type="email"
						    				class="form-control user_email"
						    				name="user_email"
						    				value="<?php if(isset($users_daten['user_email'])) echo $users_daten['user_email']; ?>"
						    				placeholder="Email">
						  </div>

						  <div class="form-group col-md-2">
						  	<input type="submit" name="change_user_daten" class="btn btn-dark btn-block" value="aktualisieren">
						  </div>
						</div>

					</form>

	      </div>

	      <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
	      	<span class="badge badge-warning p-2 mb-4">
				Bitte, füllen Sie alle Textfelder aus!
			</span>

	      	<form method="post">
			  <div class="form-group">
			    <input type="password" class="form-control password_old" name="password_old" placeholder="Altes Passwort" value="">
			  </div>
				<div class="form-row">
			    <div class="form-group col-md-3">
			      <input type="password" class="form-control password_new_1" name="password_new_1" placeholder="Neues Passwort" value="">
			    </div>

			    <div class="form-group col-md-3">
			      <input type="password" class="form-control password_new_2" name="password_new_2" placeholder="Neues Passwort wiederholen" value="">
			    </div>
			    	<div class="form-group col-md-2">
						<input type="button" class="btn btn-dark btn-block clear_pass_fields" value="Felder leeren">
			  		</div>
					<div class="form-group col-md-4">
						<input type="submit" name="change_password" class="btn btn-danger btn-block" value="Passwort ändern">
			  		</div>
			  	</div>
			</form>



	      </div>

	    </div>
	  </div>
	</div>
</div>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>

<script>

	 $('#inputGroupFile04').on('change',function(){
                //get the file name
      var fileName = $(this).val();
                //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  });

</script>


<script>

	$(".personalProfil .user_email").change(function(){

		var emailRegex = '^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$';

		if(password_new_1.match(emailRegex)){
			$(this).css({border: "2px solid #19692c"}); // green
		} else {
			$(this).css({border: "2px solid #dc3545"});
		}

	});

</script>




<!-- überprüfe neue Passworts auf die gleichheit-->
<script>


	// passwordfield leeren
	$(".clear_pass_fields").on('click', function(){

		$(".password_old").val("");
		$(".password_new_1").val("");
		$(".password_new_2").val("");
		$(".password_new_1").css({border: "1px solid #ced4da"});
		$(".password_new_2").css({border: "1px solid #ced4da"});
	});


	$(".password_new_1").change(function(){

		var password_new_1 = $(this).val();
		var password_new_2 = $(".password_new_2").val();

		if(password_new_2 != ''){
			if(password_new_1.match('^' + password_new_2 + '$')){
				$(this).css({border: "2px solid #19692c"}); // green
				$(".password_new_2").css({border: "2px solid #19692c"}); // green
			} else {
				$(this).css({border: "2px solid #dc3545"});
				$(".password_new_2").css({border: "2px solid #dc3545"});// red
			}
		}

		if($(".password_new_1").val() == '' && $(".password_new_2").val() == ''){
			$(".password_new_1").css({border: "1px solid #ced4da"});
			$(".password_new_2").css({border: "1px solid #ced4da"});
		}
	});


	$(".password_new_2").change(function(){

		var password_new_1 = $(".password_new_1").val();
		var password_new_2 = $(this).val();

		if(password_new_1 != ''){
			if(password_new_2.match('^' + password_new_1 + '$')){
				$(this).css({border: "2px solid #19692c"});// green
				$(".password_new_1").css({border: "2px solid #19692c"});// green
			} else {
				$(this).css({border: "2x solid #dc3545"});
				$(".password_new_1").css({border: "2px solid #dc3545"});// red
			}
		}

		if($(".password_new_1").val() == '' && $(".password_new_2").val() == ''){
			$(".password_new_1").css({border: "1px solid #ced4da"});
			$(".password_new_2").css({border: "1px solid #ced4da"});
		}
	});


</script>
