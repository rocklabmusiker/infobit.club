<?php


class AdminBenutzerController
{

  public function actionIndex(){

    $all_users = User::getAllUsers();

    if(isset($_POST['update_allowed']) && isset($_POST['user_id'])){
      $user_id = $_POST['user_id'];
      $user_email = $_POST['user_email'];
      $this->userAllowed = 'nein';

      $userAllowedDone = User::updateAllowedUser($user_id, $this->userAllowed);

      if($userAllowedDone){
        $error = false;
        $message_text = 'Der Benutzer wurde gesperrt!';

        header('Refresh: 3');

      }else {
        $error = true;
        $message_text = 'Fehler! Der Benutzer wurde nicht gesperrt!';
      }
    }

    if(isset($_POST['delete_user'])){
      $user_id = $_POST['user_id'];

      $userDeleted = User::newUserNotAllowedAndDelete($user_id);
      if($userDeleted){
        $error = false;
        $message_text = 'Der User wurde erfolgreich gelöscht';
        header('Refresh: 2');
      } else {
        $error = true;
        $message_text = 'Der User konnte nicht gelöscht werden!';
      }
    }

    if(isset($_POST['change_status']) && isset($_POST['user_id'])){
      $user_id = $_POST['user_id'];
      $user_status = $_POST['user_status'];


      $userStatusChanged = User::updateUserStatus($user_id, $user_status);

      if($userStatusChanged){
        $error = false;
        $message_text = 'Der Status wurde geändert!';

        header('Refresh: 3');

      }else {
        $error = true;
        $message_text = 'Fehler! Der Status wurde nicht geändert!';
      }
    }

    require_once(ROOT . '/views/admin/adminBenutzer/adminBenutzer.php');
    return true;
  }


}
