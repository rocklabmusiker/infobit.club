<?php




class PasswortWiederherstellenController
{

  public function actionIndex($param = 0){

    if(isset($_GET['email']) && isset($_GET['token'])){
      $user_email = $_GET['email'];
      $user_token = $_GET['token'];
      if(isset($_POST['password_neu_setzen']) && isset($_POST['new_password_1']) && isset($_POST['new_password_2'])){
          $new_password_1 = $_POST['new_password_1'];
          $new_password_2 = $_POST['new_password_2'];
          if($new_password_1 != '' && $new_password_2 != '' && $new_password_1 == $new_password_2){
            $new_password = $new_password_1;
            PasswortWiederherstellen::getUserIdForPasswordReset($user_email, $user_token, $new_password);
          }
      }
    } else{
      header('Location /');
      exit();
    }

    require_once(ROOT . '/views/passwortVergessen/passwortWiederherstellen.php');
    return true;
  }
}
