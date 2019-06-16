<?php




class SelfTest
{
  public static function getSelfTestFragen($cat_id, $frage_num) {

    $db = Db::getConnection();
    $sql = "SELECT * FROM self_test WHERE cat_id = :cat_id LIMIT 1 OFFSET ".$frage_num;

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_id', $cat_id);
      $result->execute();


      if($result->rowCount() > 0) {
        return $result->fetch();
      } else {
        return false;
      }
    }
  }


  public static function countSelfTestFragen($cat_id) {

    $db = Db::getConnection();
    $sql = "SELECT COUNT(titel) FROM self_test WHERE cat_id = :cat_id";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_id', $cat_id);
      $result->execute();


      if($result->rowCount() > 0) {
        return $result->fetch();
      } else {
        return false;
      }
    }
  }

  public static function rechnenErgebnissen($session_user_antworten) {

        $result = 0;

        for($i = 0; $i < count($session_user_antworten); $i++){
          $array = explode(',', $session_user_antworten[$i]);
          $result +=  round(array_sum($array),2);
        }

        if($result > 0) {
          return $result;
        } else {
          return false;
        }
  }




  public static function selfTestFrageEinsetzen(
    $titel, $titel_extension, $cat_id, $cat_theme, $fragen_anzahl,
    $frage_bild_1, $frage_bild_1_extension, $antwort_bild_1, $antwort_bild_1_extension, $frage_punktzahl_1,
    $frage_bild_2, $frage_bild_2_extension, $antwort_bild_2, $antwort_bild_2_extension, $frage_punktzahl_2,
    $frage_bild_3, $frage_bild_3_extension, $antwort_bild_3, $antwort_bild_3_extension, $frage_punktzahl_3,
    $frage_bild_4, $frage_bild_4_extension, $antwort_bild_4, $antwort_bild_4_extension, $frage_punktzahl_4,
    $frage_bild_5, $frage_bild_5_extension, $antwort_bild_5, $antwort_bild_5_extension, $frage_punktzahl_5,
    $frage_bild_6, $frage_bild_6_extension, $antwort_bild_6, $antwort_bild_6_extension, $frage_punktzahl_6,
    $frage_bild_7, $frage_bild_7_extension, $antwort_bild_7, $antwort_bild_7_extension, $frage_punktzahl_7,
    $frage_bild_8, $frage_bild_8_extension, $antwort_bild_8, $antwort_bild_8_extension, $frage_punktzahl_8,
    $frage_bild_9, $frage_bild_9_extension, $antwort_bild_9, $antwort_bild_9_extension, $frage_punktzahl_9,
    $frage_bild_10, $frage_bild_10_extension, $antwort_bild_10, $antwort_bild_10_extension, $frage_punktzahl_10
  ){



    $upload_folder = "template/images/selfTestImages/" ; //Das Upload-Verzeichnis

    ///////////////// titel ///////////////
    if($titel != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$titel.'.'.$titel_extension;
      $bild = $titel.'.'.$titel_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$titel.'_'.$id.'.'.$titel_extension;
       $bild = $titel.'_'.$id.'.'.$titel_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
    	move_uploaded_file($_FILES['titel']['tmp_name'], $new_path);

      $titel = $bild;
    }


    ///////////////// frage 1 ///////////////
    if($frage_bild_1 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_1.'.'.$frage_bild_1_extension;
      $bild = $frage_bild_1.'.'.$frage_bild_1_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_1.'_'.$id.'.'.$frage_bild_1_extension;
       $bild = $frage_bild_1.'_'.$id.'.'.$frage_bild_1_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
    	move_uploaded_file($_FILES['frage_bild_1']['tmp_name'], $new_path);

      $frage_bild_1 = $bild;
    }

    //////////////// antwort 1 ////////////////
    if($antwort_bild_1 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_1.'.'.$antwort_bild_1_extension;
      $bild = $antwort_bild_1.'.'.$antwort_bild_1_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_1.'_'.$id.'.'.$antwort_bild_1_extension;
       $bild = $antwort_bild_1.'_'.$id.'.'.$antwort_bild_1_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
    	move_uploaded_file($_FILES['antwort_bild_1']['tmp_name'], $new_path);

      $antwort_bild_1 = $bild;
    }

    ///////////////// frage 2 ///////////////
    if($frage_bild_2 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_2.'.'.$frage_bild_2_extension;
      $bild = $frage_bild_2.'.'.$frage_bild_2_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_2.'_'.$id.'.'.$frage_bild_2_extension;
         $bild = $frage_bild_2.'_'.$id.'.'.$frage_bild_2_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
    	move_uploaded_file($_FILES['frage_bild_2']['tmp_name'], $new_path);

      $frage_bild_2 = $bild;
    }

    //////////////// antwort 2 ////////////////
    if($antwort_bild_2 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_2.'.'.$antwort_bild_2_extension;
      $bild = $antwort_bild_2.'.'.$antwort_bild_2_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_2.'_'.$id.'.'.$antwort_bild_2_extension;
       $bild = $antwort_bild_2.'_'.$id.'.'.$antwort_bild_2_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
    	move_uploaded_file($_FILES['antwort_bild_2']['tmp_name'], $new_path);

      $antwort_bild_2 = $bild;
    }

    ///////////////// frage 3 ///////////////
    if($frage_bild_3 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_3.'.'.$frage_bild_3_extension;
      $bild = $frage_bild_3.'.'.$frage_bild_3_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_3.'_'.$id.'.'.$frage_bild_3_extension;
       $bild = $frage_bild_3.'_'.$id.'.'.$frage_bild_3_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_3']['tmp_name'], $new_path);

      $frage_bild_3 = $bild;
    }

    //////////////// antwort 3 ////////////////
    if($antwort_bild_3 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_3.'.'.$antwort_bild_3_extension;
      $bild = $antwort_bild_3.'.'.$antwort_bild_3_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_3.'_'.$id.'.'.$antwort_bild_3_extension;
       $bild = $antwort_bild_3.'_'.$id.'.'.$antwort_bild_3_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_3']['tmp_name'], $new_path);

      $antwort_bild_3 = $bild;
    }

    ///////////////// frage 4 ///////////////
    if($frage_bild_4 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_4.'.'.$frage_bild_4_extension;
      $bild = $frage_bild_4.'.'.$frage_bild_4_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_4.'_'.$id.'.'.$frage_bild_4_extension;
       $bild = $frage_bild_4.'_'.$id.'.'.$frage_bild_4_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_4']['tmp_name'], $new_path);

      $frage_bild_4 = $bild;
    }

    //////////////// antwort 4 ////////////////
    if($antwort_bild_4 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_4.'.'.$antwort_bild_4_extension;
      $bild = $antwort_bild_4.'.'.$antwort_bild_4_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_4.'_'.$id.'.'.$antwort_bild_4_extension;
       $bild = $antwort_bild_4.'_'.$id.'.'.$antwort_bild_4_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_4']['tmp_name'], $new_path);

      $antwort_bild_4 = $bild;
    }

    ///////////////// frage 5 ///////////////
    if($frage_bild_5 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_5.'.'.$frage_bild_5_extension;
      $bild = $frage_bild_5.'.'.$frage_bild_5_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_5.'_'.$id.'.'.$frage_bild_5_extension;
       $bild = $frage_bild_5.'_'.$id.'.'.$frage_bild_5_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_5']['tmp_name'], $new_path);

      $frage_bild_5 = $bild;
    }

    //////////////// antwort 5 ////////////////
    if($antwort_bild_5 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_5.'.'.$antwort_bild_5_extension;
      $bild = $antwort_bild_5.'.'.$antwort_bild_5_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_5.'_'.$id.'.'.$antwort_bild_5_extension;
       $bild = $antwort_bild_5.'_'.$id.'.'.$antwort_bild_5_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_5']['tmp_name'], $new_path);

      $antwort_bild_5 = $bild;
    }

    ///////////////// frage 6 ///////////////
    if($frage_bild_6 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_6.'.'.$frage_bild_6_extension;
      $bild = $frage_bild_6.'.'.$frage_bild_6_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_6.'_'.$id.'.'.$frage_bild_6_extension;
       $bild = $frage_bild_6.'_'.$id.'.'.$frage_bild_6_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_6']['tmp_name'], $new_path);

      $frage_bild_6 = $bild;
    }

    //////////////// antwort 6 ////////////////
    if($antwort_bild_6 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_6.'.'.$antwort_bild_6_extension;
      $bild = $antwort_bild_6.'.'.$antwort_bild_6_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_6.'_'.$id.'.'.$antwort_bild_6_extension;
       $bild = $antwort_bild_6.'_'.$id.'.'.$antwort_bild_6_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_6']['tmp_name'], $new_path);

      $antwort_bild_6 = $bild;
    }

    ///////////////// frage 7 ///////////////
    if($frage_bild_7 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_7.'.'.$frage_bild_7_extension;
      $bild = $frage_bild_7.'.'.$frage_bild_7_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$frage_bild_7.'_'.$id.'.'.$frage_bild_7_extension;
       $bild = $frage_bild_7.'_'.$id.'.'.$frage_bild_7_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_7']['tmp_name'], $new_path);

      $frage_bild_7 = $bild;
    }

    //////////////// antwort 7 ////////////////
    if($antwort_bild_7 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_7.'.'.$antwort_bild_7_extension;
      $bild = $antwort_bild_7.'.'.$antwort_bild_7_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
       $id = 1;
       do {
       $new_path = $upload_folder.$antwort_bild_7.'_'.$id.'.'.$antwort_bild_7_extension;
       $bild = $antwort_bild_7.'_'.$id.'.'.$antwort_bild_7_extension;
       $id++;
       } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_7']['tmp_name'], $new_path);

      $antwort_bild_7 = $bild;
    }


        ///////////////// frage 8 ///////////////
    if($frage_bild_8 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_8.'.'.$frage_bild_8_extension;
      $bild = $frage_bild_8.'.'.$frage_bild_8_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$frage_bild_8.'_'.$id.'.'.$frage_bild_8_extension;
        $bild = $frage_bild_8.'_'.$id.'.'.$frage_bild_8_extension;
        $id++;
        } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_8']['tmp_name'], $new_path);

      $frage_bild_8 = $bild;
    }

    //////////////// antwort 8 ////////////////
    if($antwort_bild_8 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_8.'.'.$antwort_bild_8_extension;
      $bild = $antwort_bild_8.'.'.$antwort_bild_8_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$antwort_bild_8.'_'.$id.'.'.$antwort_bild_8_extension;
        $bild = $antwort_bild_8.'_'.$id.'.'.$antwort_bild_8_extension;
        $id++;
        } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_8']['tmp_name'], $new_path);

      $antwort_bild_8 = $bild;
    }

    ///////////////// frage 9 ///////////////
    if($frage_bild_9 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_9.'.'.$frage_bild_9_extension;
      $bild = $frage_bild_9.'.'.$frage_bild_9_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$frage_bild_9.'_'.$id.'.'.$frage_bild_9_extension;
        $bild = $frage_bild_9.'_'.$id.'.'.$frage_bild_9_extension;
        $id++;
        } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_9']['tmp_name'], $new_path);

      $frage_bild_9 = $bild;
    }

    //////////////// antwort 9 ////////////////
    if($antwort_bild_9 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_9.'.'.$antwort_bild_9_extension;
      $bild = $antwort_bild_9.'.'.$antwort_bild_9_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$antwort_bild_9.'_'.$id.'.'.$antwort_bild_9_extension;
        $bild = $antwort_bild_9.'_'.$id.'.'.$antwort_bild_9_extension;
        $id++;
        } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_9']['tmp_name'], $new_path);

      $antwort_bild_9 = $bild;
    }


    ///////////////// frage 10 ///////////////
    if($frage_bild_10 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$frage_bild_10.'.'.$frage_bild_10_extension;
      $bild = $frage_bild_10.'.'.$frage_bild_10_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$frage_bild_10.'_'.$id.'.'.$frage_bild_10_extension;
        $bild = $frage_bild_10.'_'.$id.'.'.$frage_bild_10_extension;
        $id++;
        } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['frage_bild_10']['tmp_name'], $new_path);

      $frage_bild_10 = $bild;
    }

    //////////////// antwort 10 ////////////////
    if($antwort_bild_10 != '') {
      //Pfad zum Upload
      $new_path = $upload_folder.$antwort_bild_10.'.'.$antwort_bild_10_extension;
      $bild = $antwort_bild_10.'.'.$antwort_bild_10_extension;
      //Neuer Dateiname falls die Datei bereits existiert
      if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
        $id = 1;
        do {
        $new_path = $upload_folder.$antwort_bild_10.'_'.$id.'.'.$antwort_bild_10_extension;
        $bild = $antwort_bild_10.'_'.$id.'.'.$antwort_bild_10_extension;
        $id++;
        } while(file_exists($new_path));
      }
      //Alles okay, verschiebe Datei an neuen Pfad
      move_uploaded_file($_FILES['antwort_bild_10']['tmp_name'], $new_path);

      $antwort_bild_10 = $bild;
    }


  	$db = Db::getConnection();

  	$sql = "INSERT INTO self_test (
      titel, cat_id, cat_theme, fragen_anzahl,
      frage_bild_1, frage_antwort_1, frage_punktzahl_1,
      frage_bild_2, frage_antwort_2, frage_punktzahl_2,
      frage_bild_3, frage_antwort_3, frage_punktzahl_3,
      frage_bild_4, frage_antwort_4, frage_punktzahl_4,
      frage_bild_5, frage_antwort_5, frage_punktzahl_5,
      frage_bild_6, frage_antwort_6, frage_punktzahl_6,
      frage_bild_7, frage_antwort_7, frage_punktzahl_7,
      frage_bild_8, frage_antwort_8, frage_punktzahl_8,
      frage_bild_9, frage_antwort_9, frage_punktzahl_9,
      frage_bild_10, frage_antwort_10, frage_punktzahl_10
    ) VALUES (
      :titel, :cat_id, :cat_theme, :fragen_anzahl,
      :frage_bild_1, :frage_antwort_1, :frage_punktzahl_1,
      :frage_bild_2, :frage_antwort_2, :frage_punktzahl_2,
      :frage_bild_3, :frage_antwort_3, :frage_punktzahl_3,
      :frage_bild_4, :frage_antwort_4, :frage_punktzahl_4,
      :frage_bild_5, :frage_antwort_5, :frage_punktzahl_5,
      :frage_bild_6, :frage_antwort_6, :frage_punktzahl_6,
      :frage_bild_7, :frage_antwort_7, :frage_punktzahl_7,
      :frage_bild_8, :frage_antwort_8, :frage_punktzahl_8,
      :frage_bild_9, :frage_antwort_9, :frage_punktzahl_9,
      :frage_bild_10, :frage_antwort_10, :frage_punktzahl_10
    )";

  	if($result = $db->prepare($sql)){

  		$result->bindParam(':titel', $titel);
      $result->bindParam(':cat_id', $cat_id);
  		$result->bindParam(':cat_theme', $cat_theme);
      $result->bindParam(':fragen_anzahl', $fragen_anzahl);
      $result->bindParam(':frage_bild_1', $frage_bild_1);
      $result->bindParam(':frage_antwort_1', $antwort_bild_1);
      $result->bindParam(':frage_punktzahl_1', $frage_punktzahl_1);
      $result->bindParam(':frage_bild_2', $frage_bild_2);
      $result->bindParam(':frage_antwort_2', $antwort_bild_2);
      $result->bindParam(':frage_punktzahl_2', $frage_punktzahl_2);
      $result->bindParam(':frage_bild_3', $frage_bild_3);
      $result->bindParam(':frage_antwort_3', $antwort_bild_3);
      $result->bindParam(':frage_punktzahl_3', $frage_punktzahl_3);
      $result->bindParam(':frage_bild_4', $frage_bild_4);
      $result->bindParam(':frage_antwort_4', $antwort_bild_4);
      $result->bindParam(':frage_punktzahl_4', $frage_punktzahl_4);
      $result->bindParam(':frage_bild_5', $frage_bild_5);
      $result->bindParam(':frage_antwort_5', $antwort_bild_5);
      $result->bindParam(':frage_punktzahl_5', $frage_punktzahl_5);
      $result->bindParam(':frage_bild_6', $frage_bild_6);
      $result->bindParam(':frage_antwort_6', $antwort_bild_6);
      $result->bindParam(':frage_punktzahl_6', $frage_punktzahl_6);
      $result->bindParam(':frage_bild_7', $frage_bild_7);
      $result->bindParam(':frage_antwort_7', $antwort_bild_7);
      $result->bindParam(':frage_punktzahl_7', $frage_punktzahl_7);
      $result->bindParam(':frage_bild_8', $frage_bild_8);
      $result->bindParam(':frage_antwort_8', $antwort_bild_8);
      $result->bindParam(':frage_punktzahl_8', $frage_punktzahl_8);
      $result->bindParam(':frage_bild_9', $frage_bild_9);
      $result->bindParam(':frage_antwort_9', $antwort_bild_9);
      $result->bindParam(':frage_punktzahl_9', $frage_punktzahl_9);
      $result->bindParam(':frage_bild_10', $frage_bild_10);
      $result->bindParam(':frage_antwort_10', $antwort_bild_10);
      $result->bindParam(':frage_punktzahl_10', $frage_punktzahl_10);

  		$result->execute();

  		if($result->rowCount() > 0) {
  			return true;
  		} else {
  			return false;
  		}
  	}
  }


} // end class
