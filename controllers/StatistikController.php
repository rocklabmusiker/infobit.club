<?php


class StatistikController
{
  private $cat_theme;


  public function actionIndex(){

    $user_id = $_SESSION['user_id'];
    $this->cat_theme = 'ihk_wirt_abschluss';

    if(UserHistory::getTestsInsgesamt($this->cat_theme, $user_id)){
      $ihk_wirt_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($this->cat_theme, $user_id);

      $notenGesamtSumme = UserHistory::getNotenGesamtSumme($this->cat_theme, $user_id);
      $ihk_wirt_durchschnittsnote = $notenGesamtSumme / $ihk_wirt_tests_insgesamt_gemacht;

    } else {
      $ihk_wirt_tests_insgesamt_gemacht = 0;
      $ihk_wirt_durchschnittsnote = 0;
    }


    require_once(ROOT . '/views/statistik/statistik.php');
    return true;
  }
}
