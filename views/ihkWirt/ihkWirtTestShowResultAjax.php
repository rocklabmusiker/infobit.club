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

		while($row = $result->fetch()){
			$antwort_1 = '';
			$antwort_2 = '';
			$antwort_3 = '';
			$antwort_4 = '';
			$antwort_5 = '';
			$antwort_6 = '';

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

			$user_antwort_1 = '';
			$user_antwort_2 = '';
			$user_antwort_3 = '';
			$user_antwort_4 = '';
			$user_antwort_5 = '';
			$user_antwort_6 = '';

			$session_antworten = $_SESSION['session_user_fragen'][$row['frage_id']]['user_antworten'];
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

			

			$output .= '<div class="jumbotron mb-0">
							<h1 class="display-4"> Frage Nr. '.$row['frage_id'].'</h1>
  							<p>'.$row['frage_titel'].'</p>
  							<hr class="my-4">
  							<p>'.$row['frage_info'].'</p>
						</div>


						<table class="table mb-5">
						<thead class="thead-dark">
							<tr>
						      <th scope="col"></th>
						      <th scope="col">Antwort 1</th>
						      <th scope="col">Antwort 2</th>
						      <th scope="col">Antwort 3</th>
						      <th scope="col">Antwort 4</th>
						      <th scope="col">Antwort 5</th>
						      <th scope="col">Antwort 6</th>
						    </tr>
						</thead>
						<tr>
							<th class="text-dark">Richtige Antwort(en)</th>
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
					</table>';
		}
			
			
	}

		
	if($result->rowCount() > 0) {
		echo $output;
	} else {
		echo false;
	}

		
}




		