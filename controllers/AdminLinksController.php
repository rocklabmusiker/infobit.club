<?php



class AdminLinksController
{


  public function actionIndex(){
    $error;
    $message_text;

    if(isset($_POST['link_speichern'])){

      $theme = $_POST['theme'];
      $category = $_POST['category'];
      $titel = $_POST['titel'];
      $link = $_POST['link'];

      if($theme != '' && $category != '' && $titel != '' && $link != ''){

        $linkEingelegt = Links::linksEinlegen($theme, $category, $titel, $link);

        if($linkEingelegt){

          $error = false;
          $message_text = 'Alles super! Der Link wurde eingelegt!';
          header('Refresh: 2');

        } else{
            $error = true;
            $message_text = 'Fehler! Der Link wurde nicht eingelegt!';
            header('Refresh: 2');
        }


      } else{
          $error = true;
          $message_text = 'Die Felder durfen nicht leer sein!';
          header('Refresh: 2');
      }


    }

    require_once(ROOT . '/views/admin/adminLinks/adminLinks.php');
    return true;
  }
}
