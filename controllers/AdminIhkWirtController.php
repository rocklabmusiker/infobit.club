<?php


class AdminIhkWirtController
{

  public function actionIndex(){
    $error;
		$message_text;

    if(Category::getLastCategory() != ''){
      $last_cat = Category::getLastCategory();
    }

    if(isset($_POST['frage_speichern'])){
      $frage_cat_id = $_POST['frage_cat_id'];
      $frage_titel = $_POST['frage_titel'];
      $richtige_antwort = $_POST['richtige_antwort'];
      $frage_info = $_POST['frage_info'];
      $antwort_1 = $_POST['antwort_1'];
      $antwort_2 = $_POST['antwort_2'];
      $antwort_3 = $_POST['antwort_3'];
      $antwort_4 = $_POST['antwort_4'];
      $antwort_5 = $_POST['antwort_5'];
      $antwort_6 = $_POST['antwort_6'];

      if(isset($_FILES['frage_bild']) && $_FILES['frage_bild'] != ''){
        $filename = pathinfo($_FILES['frage_bild']['name'], PATHINFO_FILENAME);
  			$extension = strtolower(pathinfo($_FILES['frage_bild']['name'], PATHINFO_EXTENSION));
        $frage_mit_bild = Fragen::frageEinsetzenMitBild($frage_titel, $frage_info, $frage_cat_id, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $antwort_5, $antwort_6, $richtige_antwort,  $filename, $extension);
        if($frage_mit_bild){
          $error = false;
  				$message_text = 'Super! Die Frage wurde eingesetzt!';
        } else {
          $error = true;
  				$message_text = 'Fehler. Es hat nicht geklappt!';
        }

      } else{
        $frage_ohne_bild = Fragen::frageEinsetzenOhneBild($frage_titel, $frage_info, $frage_cat_id, $antwort_1, $antwort_2, $antwort_3, $antwort_4, $antwort_5, $antwort_6, $richtige_antwort);
        if($frage_ohne_bild){
          $error = false;
  				$message_text = 'Super! Die Frage wurde eingesetzt!';
        } else {
          $error = true;
  				$message_text = 'Fehler. Es hat nicht geklappt!';
        }
      }

    }



    require_once(ROOT . '/views/admin/adminIhkWirt/adminIhkWirt.php');
    return true;
  }
}
