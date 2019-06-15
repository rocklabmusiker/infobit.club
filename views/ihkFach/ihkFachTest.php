

<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>



<div 	class="container self_test"
			data-user-id="<?php echo $_SESSION['user_id']; ?>"
			data-cat-theme="<?php echo $_SESSION['cat_theme']; ?>">

	<?php if(isset($fragen_anzahl)): ?>

		<?php if((int)$fragen_anzahl[0] - 1 >= $frage_num): ?> <!--fragen_anzahl beginnt mit 1 und frage_num mit 0-->

			<div class="seller-trenner"></div>

			<div class="row justify-content-center">
				<?php if(isset($frage)): ?>

					<?php $_SESSION['cat_theme'] = $frage['cat_theme']; ?>

						<div 	class="col-md-12 self_test_frage"
									data-frage-id="<?php echo $frage['id']; ?>"
									data-fragen-anzahl="<?php echo $frage['fragen_anzahl']; ?>">

								<div class="jumbotron frage_1">
								  <h3 class="display-6">Frage Nr. <?php echo $frage_num + 1; ?></h3>
									<p class="lead font-weight-normal text-danger"> Diese Aufgabe besteht aus <?php echo $frage['fragen_anzahl']; ?> Fragen.</p>
								  <p class="lead">
										<img 	src="/template/images/selfTestImages/<?php echo $frage['titel']; ?>"
												style="max-width: 1000px; width: 100%;" alt="<?php echo $frage['titel']; ?>">
									</p>
								  <hr class="my-4">
								</div>

								<!-- anzahl der unterfragen-->

								<?php for($i = 1; $i <= $frage['fragen_anzahl']; $i++ ): ?>
									<!-- frage -->
									<div class="frage <?php if($i == 1) echo "active"; ?> <?php echo $i; ?>">
										<div class="jumbotron bg-white border border-dark rounded mt-4">
										<img 	src="/template/images/selfTestImages/<?php echo $frage['frage_bild_'. $i]; ?>"
													style="max-width: 1000px; width: 100%;" alt="<?php echo $frage['frage_bild_'. $i]; ?>">

										</div>
										<button type="button"
														class="button_antwort btn btn-block btn-dark my-4 <?php echo $i; ?>">
														Antwort anzeigen
										</button>
										<!-- antwort auf die Frage -->
										<div class="antwort" style="display:none; position:relative; left: -1500px;">
											<p class="border border-info rounded">
												<img 	src="/template/images/selfTestImages/<?php echo $frage['frage_antwort_'. $i]; ?>"
															style="max-width: 1000px; width: 100%;" alt="<?php echo $frage['frage_antwort_'. $i]; ?>">
											</p>
											<button type="button"
															class="button_next_frage btn btn-block btn-dark my-4">
															Nächste Frage
											</button>
										</div>
										<!-- antwort ende-->
									</div>
								<?php endfor; ?>
						</div>
					<?php endif; ?>

			<div class="col-md-12 mt-3 mb-5">
				<a href="/ihkFachTest/<?php echo $cat_id; ?>?cat_id=<?php echo $cat_id; ?>&frage_num=<?php echo $frage_num += 1; ?>"
					class="btn btn-dark btn-block btn_self_test_weiter mb-5"
					style="display:none;">
					Weiter
				</a>
			</div>
			<!-- onclick="return false" -->

			</div>
			<?php else: ?><!--keine Fragen mehr -->

				<div class="row self_test_ergebnis mt-5">
					<div class="col-md-12">
							<div class="jumbotron bg-dark">
							  <h1 class="display-3 text-center text-white self_test_titel">ERGEBNIS</h1>
							  <hr class="my-4">
								<div class="row">
										<div class="col-md-3">
											<div class="card self_test_card">
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
											<div class="card self_test_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-star fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Erreichte Prozentzahl</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											  	<?php if(isset($gesamtprozentzahl)): ?>
											    	<p class="card-text display-3 text-center pt-0 mt-0 self_test_gesamtprozentzahl" style="margin-top:3px;" data-gesamtprozentzahl="<?php echo $gesamtprozentzahl; ?>">
											    	<?php echo $gesamtprozentzahl; ?>
											    	<span class="text-danger">%</span>
											    <?php endif; ?>
											    </p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card self_test_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-stopwatch fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Vergangene Zeit</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											    <p class="card-text display-3 text-center pt-0 mt-0 self_test_vergangene_zeit" style="margin-top:3px;" data-vergangene-zeit="">
											    </p>
											  </div>
											</div>
										</div>

										<div class="col-md-3">
											<div class="card self_test_card">
												<span class="d-block m-auto pt-4">
													<i class="fas fa-user-graduate fa-5x text-danger"></i>
												</span>
												<h5 class="card-title text-center pt-3 pb-0">Erreichte Note</h5>
												<hr class="mt-2 mb-0">

											  <div class="card-body">
											    <p class="card-text display-3 text-center pt-0 mt-0 self_test_erreichte_note" data-erreichte-note="<?php echo $erreichte_note; ?>">
											    	<?php echo $erreichte_note; ?>
											    </p>
											  </div>
											</div>
										</div>

								</div>

								<hr class="my-4">
								<button class="btn btn-danger btn-lg self_test_ergebnisse_einsehen_button" data-cat-id="<?php echo $_GET['cat_id']; ?>">Ergebnisse speichern</button>
								<a href="/home" class="btn btn-light btn-lg self_test_test_beenden" style="display: none;">Test beenden</a>
							</div>
					</div>
				</div>
		<?php endif; ?>
	<?php endif; ?> <!--$fragen_anzahl-->
</div>





<?php include_once(ROOT . '/views/layouts/footer.php'); ?>

<script src="/template/js/ajax/selfTest.js"></script>
<script src="/template/js/ajax/selfTestSaveResult.js"></script>

<script>


		$(".frage").css("display", "none");
		$(".active").css("display", "block");

		var frage = null;
		var nexFrage = null;


		$(".button_antwort").click(function(){
			frage = this;
			antwort = $(frage).parent().find(".antwort");
			$(this).css("display", "none");
			antwort.css("display", "block");
			antwort.animate({
				"left": 0
			},1000);
		});


		$(".button_next_frage").click(function(){

			frage = $(frage).parent().next();
			if(frage.length == 0){
				$(".btn_self_test_weiter").css("display", "block");
			}

			$(this).css("display", "none");
			frage.css("display", "block");
			frage.animate({
				"left": 0
			},1000);
		});




</script>
