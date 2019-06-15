<?php
session_start();

require_once('../db_ajax.php');

if(isset($_POST['cat_id'])) {

	$cat_id = trim(stripcslashes(htmlspecialchars($_POST['cat_id'])));
	$output = '';



	$sql = "SELECT * FROM fragen WHERE frage_cat_id = :cat_id";

	if($result = $db->prepare($sql)){

		$result->bindParam(':cat_id', $cat_id);

		$result->execute();
		$frage_num = 0;

		while($row = $result->fetch()){

			$frage_num += 1;
			$antwort_1 = '';
			$antwort_2 = '';
			$antwort_3 = '';
			$antwort_4 = '';
			$antwort_5 = '';
			$antwort_6 = '';

			$summe = 0;
			$antwort_richtig = 0;
			$antwort_gesamt = 0;
			$frage_num += 1;

			$fragen_antworten = $row['richtige_antwort'];
			$array_richtige_antworten = explode(',', $fragen_antworten);

			for ($i=0; $i < count($array_richtige_antworten); $i++) {

				if($array_richtige_antworten[$i] == 1){
					$antwort_1 = $row['antwort_1'];
				}
				if($array_richtige_antworten[$i] == 2){
					$antwort_2 = $row['antwort_2'];
				}
				if($array_richtige_antworten[$i] == 3){
					$antwort_3 = $row['antwort_3'];
				}
				if($array_richtige_antworten[$i] == 4){
					$antwort_4 = $row['antwort_4'];
				}
				if($array_richtige_antworten[$i] == 5){
					$antwort_5 = $row['antwort_5'];
				}
				if($array_richtige_antworten[$i] == 6){
					$antwort_6 = $row['antwort_6'];
				}

			}

			$frage_bild_check = $row['frage_bild'];
			$bild = '';
			if($frage_bild_check != ''){
				$bild = '<hr class="my-4"><img src="/template/images/testImages/'.$row['frage_bild'] .'" alt="'.$row['frage_bild'] .'" class="test_img">';


			}

			$user_antwort_1 = '';
			$user_antwort_2 = '';
			$user_antwort_3 = '';
			$user_antwort_4 = '';
			$user_antwort_5 = '';
			$user_antwort_6 = '';

			$session_antworten = $_SESSION['session_user_fragen_ihk_zwischen'][$row['frage_id']]['user_antworten'];
			$array_user_antworten = explode(',', $session_antworten);

			for ($i=0; $i < count($array_user_antworten); $i++) {

				if($array_user_antworten[$i] == 1){
					$user_antwort_1 = $row['antwort_1'];
				}
				if($array_user_antworten[$i] == 2){
					$user_antwort_2 = $row['antwort_2'];
				}
				if($array_user_antworten[$i] == 3){
					$user_antwort_3 = $row['antwort_3'];
				}
				if($array_user_antworten[$i] == 4){
					$user_antwort_4 = $row['antwort_4'];
				}
				if($array_user_antworten[$i] == 5){
					$user_antwort_5 = $row['antwort_5'];
				}
				if($array_user_antworten[$i] == 6){
					$user_antwort_6 = $row['antwort_6'];
				}

			}

			// hier werden prozents gerechnet

				for ($i=0; $i < count($array_user_antworten); $i++) {

						if(in_array($array_user_antworten[$i], $array_richtige_antworten)){

							$antwort_richtig++;
						}
						$antwort_gesamt = count($array_richtige_antworten);
				}

				$summe = (3.33 / $antwort_gesamt) * $antwort_richtig;

				$antwort_prozentzahl = $summe;

				if($antwort_prozentzahl == 3.33) {
					$antwort_richtig_border = '#28a745';
					$antwort_richtig_table = 'table-success';
					$antwort_prozentzahl_color = '#28a745';
				} else if($antwort_prozentzahl == 0){
					$antwort_richtig_border = '#dc3545';
					$antwort_richtig_table = 'table-danger';
					$antwort_prozentzahl_color = '#dc3545';
				} else {
					$antwort_richtig_border = '#ffc107';
					$antwort_richtig_table = 'table-warning';
					$antwort_prozentzahl_color = '#ffc107';
				}



			$output .= '<div class="ihkWirtTest_ergebnisse_content my-3 rounded" style="border: 2px solid ' .$antwort_richtig_border.' !important;">
						<div class="jumbotron mb-0">
							<h1 class="display-4"> Frage Nr. '.$frage_num.'</h1>
  							<p>'.$row['frage_titel'].'</p>'
								. $bild .
								'<hr class="my-4">
  							<p style="font-weight: 600; font-size:20px;">
									Für diese Aufgabe hast du
										<span class="" style="font-size:30px; color: '.$antwort_prozentzahl_color.'"> '.$antwort_prozentzahl.'% </span>
									bekommen!
								</p>
						</div>


						<table class="table mb-5 '.$antwort_richtig_table.'">
						<thead class="">
							<tr>
						      <th scope="col"></th>
						      <th scope="col">Antwort-1</th>
						      <th scope="col">Antwort-2</th>
						      <th scope="col">Antwort-3</th>
						      <th scope="col">Antwort-4</th>
						      <th scope="col">Antwort-5</th>
						      <th scope="col">Antwort-6</th>
						    </tr>
						</thead>
						<tr>
							<th class="text-dark bg-light">Richtige Antwort(en)</th>
							<th class="bg-light text-success">'
							. $antwort_1.
							'</th>
							<th class="bg-light text-success">'
							. $antwort_2.
							'</th>
							<th class="bg-light text-success">'
							. $antwort_3.
							'</th>
							<th class="bg-light text-success">'
							. $antwort_4.
							'</th>
							<th class="bg-light text-success">'
							. $antwort_5.
							'</th>
							<th class="bg-light text-success">'
							. $antwort_6.
							'</th>
						</tr>
						<tr class="shop_stock_table-php" >
							<th class="bg-light text-dark">Deine Antwort(en)</th>

							<th class="bg-light text-primary">'
							. $user_antwort_1.
							'</th>
							<th class="bg-light text-primary">'
							. $user_antwort_2.
							'</th>
							<th class="bg-light text-primary">'
							. $user_antwort_3.
							'</th>
							<th class="bg-light text-primary">'
							. $user_antwort_4.
							'</th>
							<th class="bg-light text-primary">'
							. $user_antwort_5.
							'</th>
							<th class="bg-light text-primary">'
							. $user_antwort_6.
							'</th>
						</tr>
					</table>
				</div>';
		}

	}


	if($result->rowCount() > 0) {
		echo $output;
	} else {
		echo false;
	}


}
