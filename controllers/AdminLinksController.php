<?php



class AdminLinksController
{


  public function actionIndex(){
    $error;
    $message_text;

    if(isset($_POST['link_speichern'])){

      $theme = $_POST['theme'];
      $categorie = $_POST['categorie'];
      $titel = $_POST['titel'];
      $link = $_POST['link'];

      if($theme != '' && $categorie != '' && $titel != '' && $link != ''){



      } else{
          $error = true;
          $message_text = 'Die Felder durfen nicht leer sein!';
      }


    }

    require_once(ROOT . '/views/admin/adminLinks/adminLinks.php');
    return true;
  }
}
