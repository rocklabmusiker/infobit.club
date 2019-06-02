<?php




class PasswortWiederherstellenController
{

  public function actionIndex($param = 0){
    $error;
    $message_text;

    if(isset($_GET['email']) && isset($_GET['token'])){
      $user_email = $_GET['email'];
      $user_token = $_GET['token'];
      if(isset($_POST['password_neu_setzen']) && isset($_POST['new_password_1']) && isset($_POST['new_password_2'])){
          $new_password_1 = $_POST['new_password_1'];
          $new_password_2 = $_POST['new_password_2'];
          if($new_password_1 != '' && $new_password_2 != '' && $new_password_1 == $new_password_2){
            $new_password = $new_password_1;
            $result = PasswortWiederherstellen::getUserIdForPasswordReset($user_email, $user_token, $new_password);

            if($result){
              $error = false;
              $message_text = 'Super! Ihr Passwort wurde geändert!';
              header('Refresh: 3; URL=/');
            } else {
              $error = true;
              $message_text = 'Es hat nicht geklappt! Bitte, versuhen Sie es wieder!';
            }
          }
      }
    } else {
      header('Location /');
      exit();
    }

    require_once(ROOT . '/views/passwortVergessen/passwortWiederherstellen.php');
    return true;
  }
}
