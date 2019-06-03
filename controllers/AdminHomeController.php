<?php




class AdminHomeController
{
  private $userAllowed;
  public function actionIndex(){

    $this->userAllowed = 'nein';

    $notAllowedUsers = User::getNotAllowedUserDaten($this->userAllowed);


    require_once(ROOT . '/views/admin/adminHome/adminHome.php');
    return true;
  }
}
