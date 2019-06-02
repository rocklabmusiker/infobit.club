

<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>



<div class="container ihkFachTest" data-user-id="<?php echo $_SESSION['user_id']; ?>" data-time="<?php echo $_SESSION['timestamp_timer']; ?>">



	<?php if(isset($fragen_anzahl)): ?>

		<?php if((int)$fragen_anzahl[0] - 1 >= $frage_num): ?> <!--fragen_anzahl beginnt mit 1 und frage_num mit 0--> 
	
			<div class="seller-trenner">
				<div class="float-right ihkFachTest_timer"></div>
			</div>

			<div class="row justify-content-center">
				<?php if(isset($frage)): ?>
						<div class="col-md-8 ihkFachTest_frage_id" data-frage-id="<?php echo $frage['frage_id']; ?>">
							<!--mehreren Anterten--> 
							<?php if($mehrere_antworten): ?>

								<div class="jumbotron">
								  <h3 class="display-6">Frage Nr. <?php echo $frage_num + 1; ?></h3>
								  <p class="lead"><?php echo $frage['frage_titel']; ?></p>
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

			<div class="col-md-8 mt-3 mb-5">
				<a href="/ihkFachTest/<?php echo $cat_id; ?>?cat_id=<?php echo $cat_id; ?>&frage_num=<?php echo $frage_num += 1; ?>" class="btn btn-dark btn-block btn_ihk_fach_test" >Weiter</a>
			</div> 
			<!-- onclick="return false" -->
		
			</div>
			<?php else: ?><!--keine Fragen mehr --> 

				<div class="seller-trenner"></div>

				<div class="row ihkFachTest_ergebnis">
					<div class="col-md-12">
							<div class="jumbotron bg-dark">
							  <h1 class="display-3 text-center text-white ihkFachTest_titel">ERGEBNIS</h1>
							  <hr class="my-4">
								<div class="row">
										<div class="col-md-3">
											<div class="card ihkFachTest_card">
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
											<div class="card ihkFachTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-star fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Erreichte Prozentzahl</h5>
												<hr class="mt-2 mb-0">
												
											  <div class="card-body">
											  	<?php if(isset($gesamtprozentzahl)): ?>
											    	<p class="card-text display-3 text-center pt-0 mt-0 ihkFachTest_gesamtprozentzahl" style="margin-top:3px;" data-gesamtprozentzahl="<?php echo $gesamtprozentzahl; ?>">
											    	<?php echo $gesamtprozentzahl; ?> 
											    	<span class="text-danger">%</span>
											    <?php endif; ?>
											    </p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card ihkFachTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-stopwatch fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Vergangene Zeit</h5>
												<hr class="mt-2 mb-0">
												
											  <div class="card-body">
											  	<?php $dt = new DateTime;
																$dt->setTime(0, 0, $_SESSION['timestamp_timer']);
													?>
											    <p class="card-text display-3 text-center pt-0 mt-0 ihkFachTest_vergangene_zeit" style="margin-top:3px;" data-vergangene-zeit="<?php echo $dt->format('H:i:s'); ?>">
											    	<?php echo $dt->format('H:i:s'); ?>
											    </p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card ihkFachTest_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-user-graduate fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Erreichte Note</h5>
												<hr class="mt-2 mb-0">
												
											  <div class="card-body">
											    <p class="card-text display-3 text-center pt-0 mt-0 ihkFachTest_erreichte_note" data-erreichte-note="<?php echo $erreichte_note; ?>">
											    	<?php echo $erreichte_note; ?>
											    </p>
											  </div>
											</div>
										</div>

								</div>
								
								<hr class="my-4">
								<button class="btn btn-danger btn-lg ihkFachTest_ergebnisse_einsehen_button" data-cat-id="<?php echo $_GET['cat_id']; ?>">Ergebnisse ansehen und speichern</button>
								<a href="/home" class="btn btn-light btn-lg ihkFachTest_test_beenden" style="display: none;">Test beenden</a>
							</div>
					</div>
					<!--ajax content ergebnisse--> 
					<div class="ihkFachTest_ergebnisse_einsehen_content"></div>
				</div>
		<?php endif; ?>
	<?php endif; ?> <!--$fragen_anzahl--> 
</div>





<?php include_once(ROOT . '/views/layouts/footer.php'); ?>

<script src="/template/js/ajax/ihkFachTest.js"></script> 
<script src="/template/js/ajax/ihkFachTestShowResult.js"></script>

<script>

	var	secondsFromSession = $(".ihkFachTest").attr("data-time");
	$('.ihkFachTest_timer').timer({
	 	format: '%H:%M:%S',
	 	seconds: secondsFromSession
	});

</script>
