<?php


class AdminSelfTestController
{


  public function actionIndex(){

    $error;
    $message_text;

    if(Category::getLastCategory() != ''){
      $last_cat = Category::getLastCategory();
    }

    if(isset($_POST['neue_cat_erstellen'])){
      $cat_titel = $_POST['cat_titel'];
      $cat_theme = $_POST['cat_theme'];


      if(Category::neueCatEinlegen($cat_titel, $cat_theme)){

        $error = false;
        $message_text = 'Super! Die Kategorie wurde erstellt!';
        header('Refresh: 2');

      } else{
        $error = true;
        $message_text = 'Fehler! Die Kategorie wurde nicht erstellt!';
        header('Refresh: 2');
      }
    }

    if(isset($_POST['selfTest_frage_speichern'])){

      $titel = $_POST['titel'];
      $cat_id = $_POST['cat_id'];
      $cat_theme = $_POST['cat_theme'];
      $fragen_anzahl = $_POST['fragen_anzahl'];

      if(isset($_FILES['frage_bild_1']['name']) && $_FILES['frage_bild_1']['name'] != ''){
        $frage_bild_1 = pathinfo($_FILES['frage_bild_1']['name'], PATHINFO_FILENAME);
        $frage_bild_1_extension = strtolower(pathinfo($_FILES['frage_bild_1']['name'], PATHINFO_EXTENSION));
        $antwort_bild_1 = pathinfo($_FILES['antwort_bild_1']['name'], PATHINFO_FILENAME);
        $antwort_bild_1_extension = strtolower(pathinfo($_FILES['antwort_bild_1']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_1 = $_POST['frage_punktzahl_1'];
      } else {
        $frage_bild_1 = '';
        $frage_bild_1_extension = '';
        $antwort_bild_1 = '';
        $antwort_bild_1_extension = '';
        $frage_punktzahl_1 = '';
      }

      if(isset($_FILES['frage_bild_2']['name']) && $_FILES['frage_bild_2']['name'] != ''){
        $frage_bild_2 = pathinfo($_FILES['frage_bild_2']['name'], PATHINFO_FILENAME);
        $frage_bild_2_extension = strtolower(pathinfo($_FILES['frage_bild_2']['name'], PATHINFO_EXTENSION));
        $antwort_bild_2 = pathinfo($_FILES['antwort_bild_2']['name'], PATHINFO_FILENAME);
        $antwort_bild_2_extension = strtolower(pathinfo($_FILES['antwort_bild_2']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_2 = $_POST['frage_punktzahl_2'];
      } else {
        $frage_bild_2 = '';
        $frage_bild_2_extension = '';
        $antwort_bild_2 = '';
        $antwort_bild_2_extension = '';
        $frage_punktzahl_2 = '';
      }

      if(isset($_FILES['frage_bild_3']['name']) && $_FILES['frage_bild_3']['name'] != ''){
        $frage_bild_3 = pathinfo($_FILES['frage_bild_3']['name'], PATHINFO_FILENAME);
        $frage_bild_3_extension = strtolower(pathinfo($_FILES['frage_bild_3']['name'], PATHINFO_EXTENSION));
        $antwort_bild_3 = pathinfo($_FILES['antwort_bild_3']['name'], PATHINFO_FILENAME);
        $antwort_bild_3_extension = strtolower(pathinfo($_FILES['antwort_bild_3']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_3 = $_POST['frage_punktzahl_3'];
      } else {
        $frage_bild_3 = '';
        $frage_bild_3_extension = '';
        $antwort_bild_3 = '';
        $antwort_bild_3_extension = '';
        $frage_punktzahl_3 = '';
      }

      if(isset($_FILES['frage_bild_4']['name']) && $_FILES['frage_bild_4']['name'] != ''){
        $frage_bild_4 = pathinfo($_FILES['frage_bild_4']['name'], PATHINFO_FILENAME);
        $frage_bild_4_extension = strtolower(pathinfo($_FILES['frage_bild_4']['name'], PATHINFO_EXTENSION));
        $antwort_bild_4 = pathinfo($_FILES['antwort_bild_4']['name'], PATHINFO_FILENAME);
        $antwort_bild_4_extension = strtolower(pathinfo($_FILES['antwort_bild_4']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_4 = $_POST['frage_punktzahl_4'];
      } else {
        $frage_bild_4 = '';
        $frage_bild_4_extension = '';
        $antwort_bild_4 = '';
        $antwort_bild_4_extension = '';
        $frage_punktzahl_4 = '';
      }

      if(isset($_FILES['frage_bild_5']['name']) && $_FILES['frage_bild_5']['name'] != ''){
        $frage_bild_5 = pathinfo($_FILES['frage_bild_5']['name'], PATHINFO_FILENAME);
        $frage_bild_5_extension = strtolower(pathinfo($_FILES['frage_bild_5']['name'], PATHINFO_EXTENSION));
        $antwort_bild_5 = pathinfo($_FILES['antwort_bild_5']['name'], PATHINFO_FILENAME);
        $antwort_bild_5_extension = strtolower(pathinfo($_FILES['antwort_bild_5']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_5 = $_POST['frage_punktzahl_5'];
      } else {
        $frage_bild_5 = '';
        $frage_bild_5_extension = '';
        $antwort_bild_5 = '';
        $antwort_bild_5_extension = '';
        $frage_punktzahl_5 = '';
      }

      if(isset($_FILES['frage_bild_6']['name']) && $_FILES['frage_bild_6']['name'] != ''){
        $frage_bild_6 = pathinfo($_FILES['frage_bild_6']['name'], PATHINFO_FILENAME);
        $frage_bild_6_extension = strtolower(pathinfo($_FILES['frage_bild_6']['name'], PATHINFO_EXTENSION));
        $antwort_bild_6 = pathinfo($_FILES['antwort_bild_6']['name'], PATHINFO_FILENAME);
        $antwort_bild_6_extension = strtolower(pathinfo($_FILES['antwort_bild_6']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_6 = $_POST['frage_punktzahl_6'];
      } else {
        $frage_bild_6 = '';
        $frage_bild_6_extension = '';
        $antwort_bild_6 = '';
        $antwort_bild_6_extension = '';
        $frage_punktzahl_6 = '';
      }

      if(isset($_FILES['frage_bild_7']['name']) && $_FILES['frage_bild_7']['name'] != ''){
        $frage_bild_7 = pathinfo($_FILES['frage_bild_7']['name'], PATHINFO_FILENAME);
        $frage_bild_7_extension = strtolower(pathinfo($_FILES['frage_bild_7']['name'], PATHINFO_EXTENSION));
        $antwort_bild_7 = pathinfo($_FILES['antwort_bild_7']['name'], PATHINFO_FILENAME);
        $antwort_bild_7_extension = strtolower(pathinfo($_FILES['antwort_bild_7']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_7 = $_POST['frage_punktzahl_7'];
      } else {
        $frage_bild_7 = '';
        $frage_bild_7_extension = '';
        $antwort_bild_7 = '';
        $antwort_bild_7_extension = '';
        $frage_punktzahl_7 = '';
      }

      if(isset($_FILES['frage_bild_8']['name']) && $_FILES['frage_bild_8']['name'] != ''){
        $frage_bild_8 = pathinfo($_FILES['frage_bild_8']['name'], PATHINFO_FILENAME);
        $frage_bild_8_extension = strtolower(pathinfo($_FILES['frage_bild_8']['name'], PATHINFO_EXTENSION));
        $antwort_bild_8 = pathinfo($_FILES['antwort_bild_8']['name'], PATHINFO_FILENAME);
        $antwort_bild_8_extension = strtolower(pathinfo($_FILES['antwort_bild_8']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_8 = $_POST['frage_punktzahl_8'];
      } else {
        $frage_bild_8 = '';
        $frage_bild_8_extension = '';
        $antwort_bild_8 = '';
        $antwort_bild_8_extension = '';
        $frage_punktzahl_8 = '';
      }

      if(isset($_FILES['frage_bild_9']['name']) && $_FILES['frage_bild_9']['name'] != ''){
        $frage_bild_9 = pathinfo($_FILES['frage_bild_9']['name'], PATHINFO_FILENAME);
        $frage_bild_9_extension = strtolower(pathinfo($_FILES['frage_bild_9']['name'], PATHINFO_EXTENSION));
        $antwort_bild_9 = pathinfo($_FILES['antwort_bild_9']['name'], PATHINFO_FILENAME);
        $antwort_bild_9_extension = strtolower(pathinfo($_FILES['antwort_bild_9']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_9 = $_POST['frage_punktzahl_9'];
      } else {
        $frage_bild_9 = '';
        $frage_bild_9_extension = '';
        $antwort_bild_9 = '';
        $antwort_bild_9_extension = '';
        $frage_punktzahl_9 = '';
      }

      if(isset($_FILES['frage_bild_10']['name']) && $_FILES['frage_bild_10']['name'] != ''){
        $frage_bild_10 = pathinfo($_FILES['frage_bild_10']['name'], PATHINFO_FILENAME);
        $frage_bild_10_extension = strtolower(pathinfo($_FILES['frage_bild_10']['name'], PATHINFO_EXTENSION));
        $antwort_bild_10 = pathinfo($_FILES['antwort_bild_10']['name'], PATHINFO_FILENAME);
        $antwort_bild_10_extension = strtolower(pathinfo($_FILES['antwort_bild_10']['name'], PATHINFO_EXTENSION));
        $frage_punktzahl_10 = $_POST['frage_punktzahl_10'];
      } else {
        $frage_bild_10 = '';
        $frage_bild_10_extension = '';
        $antwort_bild_10 = '';
        $antwort_bild_10_extension = '';
        $frage_punktzahl_10 = '';
      }



      $selfTestFrage = SelfTest::selfTestFrageEinsetzen(
        $titel, $cat_id, $cat_theme, $fragen_anzahl,
        $frage_bild_1, $frage_bild_1_extension, $antwort_bild_1, $antwort_bild_1_extension, $frage_punktzahl_1,
        $frage_bild_2, $frage_bild_2_extension, $antwort_bild_2, $antwort_bild_2_extension, $frage_punktzahl_2,
        $frage_bild_3, $frage_bild_3_extension, $antwort_bild_3, $antwort_bild_3_extension, $frage_punktzahl_3,
        $frage_bild_4, $frage_bild_4_extension, $antwort_bild_4, $antwort_bild_4_extension, $frage_punktzahl_4,
        $frage_bild_5, $frage_bild_5_extension, $antwort_bild_5, $antwort_bild_5_extension, $frage_punktzahl_5,
        $frage_bild_6, $frage_bild_6_extension, $antwort_bild_6, $antwort_bild_6_extension, $frage_punktzahl_6,
        $frage_bild_7, $frage_bild_7_extension, $antwort_bild_7, $antwort_bild_7_extension, $frage_punktzahl_7,
        $frage_bild_8, $frage_bild_8_extension, $antwort_bild_8, $antwort_bild_8_extension, $frage_punktzahl_8,
        $frage_bild_9, $frage_bild_9_extension, $antwort_bild_9, $antwort_bild_9_extension, $frage_punktzahl_9,
        $frage_bild_10, $frage_bild_10_extension, $antwort_bild_10, $antwort_bild_10_extension, $frage_punktzahl_10 );
      if($selfTestFrage){
          $error = false;
          $message_text = 'Super! Die Frage wurde eingesetzt!';
          header('Refresh: 2');
        } else {
          $error = true;
          $message_text = 'Fehler. Es hat nicht geklappt!';
          header('Refresh: 2');
        }
      }


    require_once(ROOT . '/views/admin/adminSelfTest/adminSelfTest.php');
    return true;
  }
}
