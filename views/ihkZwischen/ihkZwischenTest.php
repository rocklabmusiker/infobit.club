

<?php include_once(ROOT . '/views/layouts/header.php'); ?>


<?php include_once(ROOT . '/views/layouts/menu.php'); ?>



<div 	class="container ihkZwischenTest"
			data-user-id="<?php echo $_SESSION['user_id']; ?>"
			data-cat-theme="<?php echo $_SESSION['cat_theme_ihk_zwischen']; ?>">




	<?php if(isset($fragen_anzahl)): ?>

		<?php if((int)$fragen_anzahl[0] - 1 >= $frage_num): ?> <!--fragen_anzahl beginnt mit 1 und frage_num mit 0-->

			<div class="seller-trenner">
				<span class="float-right d-inline-block">
					<button type="button" class="timer_pause" style="display:block;">Pause</button>
					<button type="button" class="timer_start" style="display:none;">Start</button>
				</span>
				<div class="float-right ihkZwischenTest_timer d-inline-block" ></div>
			</div>

			<div class="row justify-content-center">
				<?php if(isset($frage)): ?>

					<?php $_SESSION['cat_theme_ihk_zwischen'] = $frage['frage_cat_theme']; ?>

						<div class="col-md-8 ihkZwischenTest_frage_id" data-frage-id="<?php echo $frage['frage_id']; ?>">
							<!--mehreren Anterten-->
							<?php if($mehrere_antworten): ?>

								<div class="jumbotron">
								  <h3 class="display-6">Frage Nr. <?php echo $frage_num + 1; ?></h3>
								  <p class="lead"><?php echo $frage['frage_titel']; ?></p>
									<?php if($frage['frage_bild'] != ''): ?>
										<hr class="my-4">
										<img src="/template/images/testImages/<?php echo $frage['frage_bild']; ?>" alt="<?php echo $frage['frage_bild']; ?>">
									<?php endif; ?>
								  <hr class="my-4">
								  <p class="lead text-nowrap bd-highlight bg-danger font-weight-normal" style="width: 11.5rem;"><?php echo $frage['frage_info']; ?></p>
								</div>

								<form class="form_mehrere_antworten" data-antwort-gesamt="<?php echo $einzelne_antwort_gesamtzahl - 1; ?>">

									<?php if($frage['antwort_1'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input check_antwort_1"
										  				type="checkbox"
										  				name="check_antwort_1"
										  				value="1">
										  <label class="form-check-label" for="antwort_1">
										    <?php echo $frage['antwort_1']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_2'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input check_antwort_2"
										  				type="checkbox"
										  				name="check_antwort_2"
										  				value="2">
										  <label class="form-check-label" for="antwort_2">
										    <?php echo $frage['antwort_2']; ?>
										  </label>
										</div>
									<?php endif; ?>
									<?php if($frage['antwort_3'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input check_antwort_3"
										  				type="checkbox"
										  				name="check_antwort_3"
										  				value="3">
										  <label class="form-check-label" for="antwort_3">
										    <?php echo $frage['antwort_3']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_4'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input check_antwort_4"
										  				type="checkbox"
										  				name="check_antwort_4"
										  				value="4">
										  <label class="form-check-label" for="antwort_4">
										    <?php echo $frage['antwort_4']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_5'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input check_antwort_5"
										  				type="checkbox"
										  				name="check_antwort_5"
										  				value="5">
										  <label class="form-check-label" for="antwort_5">
										    <?php echo $frage['antwort_5']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_6'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input check_antwort_6"
										  				type="checkbox"
										  				name="check_antwort_6"
										  				value="6">
										  <label class="form-check-label" for="antwort_6">
										    <?php echo $frage['antwort_6']; ?>
										  </label>
										</div>
									<?php endif; ?>

								</form>
							<?php else: ?><!--eine Antwort radio-->

								<form class="form_eine_antwort">

									<div class="jumbotron">
									  <h3 class="display-6">Frage Nr. <?php echo $frage_num + 1; ?></h3>
									  <p class="lead"><?php echo $frage['frage_titel']; ?></p>
										<?php if($frage['frage_bild'] != ''): ?>
											<hr class="my-4">
											<img src="/template/images/testImages/<?php echo $frage['frage_bild']; ?>" alt="<?php echo $frage['frage_bild']; ?>" class="test_img">
										<?php endif; ?>
									  <hr class="my-4">

									</div>

									<?php if($frage['antwort_1'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input radio_antwort_1"
										  				type="radio"
										  				name="radio_antwort"
										  				value="1" >
										  <label 	class="form-check-label" for="radio_antwort_1">
										    <?php echo $frage['antwort_1']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_2'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input radio_antwort_2"
										  				type="radio"
										  				name="radio_antwort"
										  				value="2" >
										  <label class="form-check-label" for="radio_antwort_2">
										    <?php echo $frage['antwort_2']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_3'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input radio_antwort_3"
										  				type="radio"
										  				name="radio_antwort"
										  				value="3" >
										  <label class="form-check-label" for="radio_antwort_3">
										    <?php echo $frage['antwort_3']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_4'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input radio_antwort_4"
										  				type="radio"
										  				name="radio_antwort"
										  				value="4" >
										  <label class="form-check-label" for="radio_antwort_4">
										    <?php echo $frage['antwort_4']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_5'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input radio_antwort_5"
										  				type="radio"
										  				name="radio_antwort"
										  				value="5" >
										  <label class="form-check-label" for="radio_antwort_5">
										    <?php echo $frage['antwort_5']; ?>
										  </label>
										</div>
									<?php endif; ?>

									<?php if($frage['antwort_6'] != ''): ?>
										<div class="form-check">
										  <input 	class="form-check-input radio_antwort_6"
										  				type="radio"
										  				name="radio_antwort"
										  				value="6" >
										  <label class="form-check-label" for="radio_antwort_6">
										    <?php echo $frage['antwort_6']; ?>
										  </label>
										</div>
									<?php endif; ?>

								</form>

							<?php endif; ?>

						</div>
				<?php endif; ?>

			<div class="col-md-8 mt-3 mb-5 ihkZwischen_buttons">
				<button type="button"
								class="btn btn-danger ihkZwischen_antwort_speichern"
								data-link="/ihkZwischenTest/<?php echo $cat_id; ?>?cat_id=<?php echo $cat_id; ?>&frage_num=<?php echo $frage_num += 1; ?>">
								Antwort speichern
				</button>
				<!-- <a href="/ihkZwischenTest/<?php //echo $cat_id; ?>?cat_id=<?php //echo $cat_id; ?>&frage_num=<?php //echo $frage_num += 1; ?>"
				class="btn btn-dark btn-block btn_ihkZwischen_test" style="display:none;">Weiter</a>-->


			</div>
			<!-- onclick="return false" -->

			</div>
			<?php else: ?><!--keine Fragen mehr -->

				<div class="seller-trenner"></div>

				<div class="row ihkZwischenTest_ergebnis">
					<div class="col-md-12">
							<div class="jumbotron bg-dark">
							  <h1 class="display-3 text-center text-white ihkZwischenTest_titel">ERGEBNIS</h1>
							  <hr class="my-4">
								<div class="row">
										<div class="col-md-3">
											<div class="card ihkZwischenTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-book-open fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Anzahl der Fragen</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											    <p class="card-text display-3 text-center pt-0 mt-0"><?php echo $fragen_anzahl[0]; ?></p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card ihkZwischenTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-star fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Erreichte Prozentzahl</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											  	<?php if(isset($gesamtprozentzahl)): ?>
											    	<p class="card-text display-3 text-center pt-0 mt-0 ihkZwischenTest_gesamtprozentzahl" style="margin-top:3px;" data-gesamtprozentzahl="<?php echo $gesamtprozentzahl; ?>">
											    	<?php echo $gesamtprozentzahl; ?>
											    	<span class="text-danger">%</span>
											    <?php endif; ?>
											    </p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card ihkZwischenTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-stopwatch fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Vergangene Zeit</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											    <p 	class="card-text display-3 text-center pt-0 mt-0 ihkZwischenTest_vergangene_zeit"
															data-vergangene-zeit="" style="margin-top:3px;">

											    </p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card ihkZwischenTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-user-graduate fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Erreichte Note</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											    <p class="card-text display-3 text-center pt-0 mt-0 ihkZwischenTest_erreichte_note" data-erreichte-note="<?php echo $erreichte_note; ?>">
											    	<?php echo $erreichte_note; ?>
											    </p>
											  </div>
											</div>
										</div>

								</div>

								<hr class="my-4">
								<button class="btn btn-danger btn-lg ihkZwischenTest_ergebnisse_einsehen_button" data-cat-id="<?php echo $_GET['cat_id']; ?>">Ergebnisse ansehen und speichern</button>
								<a href="/home" class="btn btn-light btn-lg ihkZwischenTest_test_beenden" style="display: none;">Test beenden</a>
							</div>
					</div>
					<!--ajax content ergebnisse-->
					<div class="ihkZwischenTest_ergebnisse_einsehen_content px-3"></div>
				</div>
		<?php endif; ?>
	<?php endif; ?> <!--$fragen_anzahl-->
</div>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>

<script src="/template/js/ajax/ihkZwischenTest.js"></script>
<script src="/template/js/ajax/ihkZwischenTestShowResult.js"></script>

<script>


		var clock = $('.ihkZwischenTest_timer');
		var timerStop = false;
		var loopTimer = null;

				// Set a cookie
		if(!$.cookie('timestamp_timer_ihk_zwischen')) {
				var date = new Date();
				var currentTimestamp = date.getTime();
				$.cookie('timestamp_timer_ihk_zwischen', currentTimestamp);
		}

		var startTime = parseInt($.cookie('timestamp_timer_ihk_zwischen'));

		if ($.cookie('timestamp_timer_ihk_zwischen_pause')) {
				var usedTime = parseInt($.cookie('timestamp_timer_ihk_zwischen_pause'));
		} else {
				usedTime  = 0;
		}

		timerStart();

		function timerStart() {

				loopTimer = setInterval(function() {

						if(timerStop == true){
								clearInterval(loopTimer);
								return;
						}

						usedTime += 1;
						$.cookie('timestamp_timer_ihk_zwischen_pause', usedTime);

						var date = new Date();

						var currentTimestamp = date.getTime();

						startTime = currentTimestamp - (usedTime * 1000);

						var different = (currentTimestamp - startTime) / 1000;

						var hour = Math.floor((different / 60) / 60);
						var minute = Math.floor(different / 60);
						var second = Math.floor((different - (minute * 60)));

						if (second < 10) {
								second = '0' + second;

						} if(hour < 10){
								hour = '0' + hour;
						} if(minute < 10 ){
								 minute = '0' + minute;
						}

						clock.text(hour + ":" + minute + ":" + second);

						}, 1000);
		}

		$(".timer_pause").click(function() {
				$(this).css("display", "none");
				$(".timer_start").css("display", "block");
				timerStop = true;
				// Set a cookie
		});

		$(".timer_start").click(function() {
				$(this).css("display", "none");
				$(".timer_pause").css("display", "block");


				timerStop = false;

				timerStart();

		});

		function getEndTime(){

			//usedTime += 0;
			$.cookie('timestamp_timer_ihk_zwischen_pause');

			var date = new Date();

			var currentTimestamp = date.getTime();

			startTime = currentTimestamp - (usedTime * 1000);

			var different = (currentTimestamp - startTime) / 1000;

			var hour = Math.floor((different / 60) / 60);
			var minute = Math.floor(different / 60);
			var second = Math.floor((different - (minute * 60)));

			if (second < 10) {
					second = '0' + second;

			} if(hour < 10){
					hour = '0' + hour;
			} if(minute < 10 ){
					 minute = '0' + minute;
			}
			var time = hour + ":" + minute + ":" + second;

			$(".ihkZwischenTest_vergangene_zeit").text(time);
			$(".ihkZwischenTest .ihkZwischenTest_vergangene_zeit").attr("data-vergangene-zeit", time);

		}

		getEndTime();

		$(".ihkZwischenTest_ergebnisse_einsehen_button").click(function(){
			timerStop = true;
			usedTime  = 0;
			$.cookie('timestamp_timer_ihk_zwischen_pause',usedTime);
		});



</script>
