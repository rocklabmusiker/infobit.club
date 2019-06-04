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
      $this->userAllowed = 'ja';

      $userAllowedDone = User::updateAllowedUser($user_id, $this->userAllowed);

      if($userAllowedDone){
        $error = false;
        $message_text = 'Der Benutzer wurde zugelassen!';
        // email an den benutzer

        $empfaenger = $user_email;
        $betreff = '"zulassung@infobit.club", "infobit.club-Zulassung"';
        $nachricht = "
					Hi,<br><br>
					Herzlich Willkommen zum 38.1 Lernportal. <br><br>

					Mit freundlichen Grüßen<br>
					infobit.club
				";

        // $email_send = mail($empfaenger, $betreff, $nachricht);

        /*if($email_send){
          $error = false;
          $message_text = 'Der Benutzer wurde zugelassen!';
        }*/
        header('Refresh: 3');

      }else {
        $error = true;
        $message_text = 'Fehler! Der Benutzer wurde nicht zugelassen!';
      }
    }


    require_once(ROOT . '/views/admin/adminHome/adminHome.php');
    return true;
  }
}
