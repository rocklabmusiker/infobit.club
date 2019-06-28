

<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>



<div 	class="container ihkFachTest"
			data-user-id="<?php echo $_SESSION['user_id']; ?>"
			data-cat-theme="<?php echo $_SESSION['cat_theme']; ?>">

	<?php if(isset($fragen_anzahl)): ?>

		<?php if((int)$fragen_anzahl[0] - 1 >= $frage_num): ?> <!--fragen_anzahl beginnt mit 1 und frage_num mit 0-->

			<div class="seller-trenner">
				<span class="float-right d-inline-block">
					<button type="button" class="timer_pause" style="display:block;">Pause</button>
					<button type="button" class="timer_start" style="display:none;">Start</button>
				</span>
				<div class="float-right ihkFachTest_timer" data-seconds=""></div>
			</div>

			<div class="row">
				<?php if(isset($frage)): ?>

					<?php $_SESSION['cat_theme'] = $frage['cat_theme']; ?>

						<div 	class="col-md-12 fach_test_frage"
									data-frage-id="<?php echo $frage['id']; ?>"
									data-fragen-anzahl="<?php echo $frage['fragen_anzahl']; ?>">

								<div class="jumbotron frage_1">
								  <h3 class="display-6">Frage Nr. <?php echo $frage_num + 1; ?></h3>
									<p class="lead font-weight-normal text-danger"> Diese Aufgabe besteht aus <?php echo $frage['fragen_anzahl']; ?> Frage(n).</p>
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
										<form >
											<div class="form-row mb-5">
							          <label for="cat_theme">Deine Antwort</label>
							          <textarea class="form-control"></textarea>
							        </div>
										</form>
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
											<form class="bg-info text-white text-center pt-3 pb-0 px-2 bewerte_dich">
												<h3 class="text-white">Bewerte dich!</h3>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="0" >
												  <label 	class="form-check-label" for="radio_antwort_1">Alles falsch</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo ($frage['frage_punktzahl_'. $i] * 20) / 100; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">20 +</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo ($frage['frage_punktzahl_'. $i] * 40) / 100; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">40 +</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo ($frage['frage_punktzahl_'. $i] * 50) / 100; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">50 +</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo ($frage['frage_punktzahl_'. $i] * 60) / 100; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">60 +</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo ($frage['frage_punktzahl_'. $i] * 70) / 100; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">70 +</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo ($frage['frage_punktzahl_'. $i] * 80) / 100; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">80 +</label>
								        </div>
												<div class="form-check form-check-inline mb-5">
													<input 	class="form-check-input radio_antwort"
												  				type="radio"
												  				name="radio_antwort"
												  				value="<?php echo $frage['frage_punktzahl_'. $i]; ?>" >
												  <label 	class="form-check-label" for="radio_antwort_1">90 +</label>
								        </div>
											</form>
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
				<button type="button"
				class="btn btn-dark btn-block btn_ihkFach_test_weiter mb-5"
				data-link="/ihkFachTest/<?php echo $cat_id; ?>?cat_id=<?php echo $cat_id; ?>&frage_num=<?php echo $frage_num += 1;?>" style="display:none;">
								Weiter
				</button>
			</div>

			</div>
			<?php else: ?><!--keine Fragen mehr -->

				<div class="row ihkFachTest_ergebnis mt-5">
					<div class="col-md-12">
							<div class="jumbotron bg-dark">
							  <h1 class="display-3 text-center text-white self_test_titel">ERGEBNIS</h1>
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
											    <p class="card-text display-3 text-center pt-0 mt-0 ihkFachTest_vergangene_zeit" style="margin-top:3px;" data-vergangene-zeit="">
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
								<button class="btn btn-danger btn-lg ihkFachTest_ergebnisse_speichern_button" data-cat-id="<?php echo $_GET['cat_id']; ?>">Ergebnisse speichern</button>
								<a href="/home" class="btn btn-light btn-lg ihkFachTest_beenden" style="display: none;">Test beenden</a>
							</div>
					</div>
				</div>
		<?php endif; ?>
	<?php endif; ?> <!--$fragen_anzahl-->
</div>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>

<script src="/template/js/ajax/ihkFachTest.js"></script>
<script src="/template/js/ajax/ihkFachTestSaveResult.js"></script>

<script>

		$(".frage").css("display", "none");
		$(".button_next_frage").css("display", "none");
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

			var bewerteDich = antwort.find(".button_next_frage");
			$(".bewerte_dich").each(function(){
				$(this).on('change', function() {
					bewerteDich.css("display", "block");
				});
			});

		});

		$(".button_next_frage").click(function(){

			frage = $(frage).parent().next();
			// if keine obj. mehr vorhanden
			if(frage.length == 0){
				$(".btn_ihkFach_test_weiter").css("display", "block");
			}

				$(this).css("display", "none");
				frage.css("display", "block");
				frage.animate({
					"left": 0
				},1000);

		});

</script>


<script>

var clock = $('.ihkFachTest_timer');
var timerStop = false;
var loopTimer = null;

		// Set a cookie
if(!$.cookie('timestamp_timer_ihk_fach')) {
		var date = new Date();
		var currentTimestamp = date.getTime();
		$.cookie('timestamp_timer_ihk_fach', currentTimestamp);
}

var startTime = parseInt($.cookie('timestamp_timer_ihk_fach'));

if ($.cookie('timestamp_timer_ihk_fach_pause')) {
		var usedTime = parseInt($.cookie('timestamp_timer_ihk_fach_pause'));
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
				$.cookie('timestamp_timer_ihk_fach_pause', usedTime);

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
	$.cookie('timestamp_timer_ihk_fach_pause');

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

	$(".ihkFachTest_vergangene_zeit").text(time);
	$(".ihkFachTest_vergangene_zeit").attr("data-vergangene-zeit", time);

}

getEndTime();

$(".ihkFachTest_ergebnisse_einsehen_button").click(function(){
	timerStop = true;
	usedTime  = 0;
	$.cookie('timestamp_timer_ihk_fach_pause',usedTime);
});


</script>
