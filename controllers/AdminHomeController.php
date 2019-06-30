<?php
// namespace components\PHPMailer\PHPMailer;


class AdminHomeController
{
  private $userAllowed;
  public $error;
  public $message_text;
  public function actionIndex(){

    $this->userAllowed = 'nein';

    $notAllowedUsers = User::getNotAllowedUserDaten($this->userAllowed);

    if(isset($_POST['update_allowed']) && isset($_POST['user_id'])){
      $user_id = $_POST['user_id'];
      $user_email = $_POST['user_email'];
      $user_name = User::getUserDaten($user_id)['user_name'];
      $this->userAllowed = 'ja';

      $userAllowedDone = User::updateAllowedUser($user_id, $this->userAllowed);

      if($userAllowedDone){

        // email an den benutzer
        /*
        $empfaenger = $user_email;
        $betreff = "infobit.club-Zulassung";
        $nachricht = "
					Hi $user_name, Herzlich Willkommen zum 38.1 Lernportal.

					Mit freundlichen Grüßen
					infobit.club
				";

        $email_send = mail($empfaenger, $betreff, $nachricht);

        if($email_send){
          $error = false;
          $message_text = 'Der Benutzer wurde zugelassen!';
        }

        */
        $error = false;
        $message_text = 'Der Benutzer wurde zugelassen!';
        header('Refresh: 3');

      }else {
        $error = true;
        $message_text = 'Fehler! Der Benutzer wurde nicht zugelassen!';
      }
    }

    if(isset($_POST['delete_new_user'])){
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


    require_once(ROOT . '/views/admin/adminHome/adminHome.php');
    return true;
  }
}
