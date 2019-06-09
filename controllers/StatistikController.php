<?php


class StatistikController
{
  private $cat_theme;


  public function actionIndex(){

    $user_id = $_SESSION['user_id'];

    // ihk_wirt_abschluss
    if(UserHistory::getTestsInsgesamt($this->cat_theme, $user_id)){
      $this->cat_theme = 'ihk_wirt_abschluss';

      $ihk_wirt_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($this->cat_theme, $user_id);

      $notenGesamtSumme_ihk_wirt = UserHistory::getNotenGesamtSumme($this->cat_theme, $user_id);
      $ihk_wirt_durchschnittsnote = $notenGesamtSumme_ihk_wirt / $ihk_wirt_tests_insgesamt_gemacht;

    } else {
      $ihk_wirt_tests_insgesamt_gemacht = 0;
      $ihk_wirt_durchschnittsnote = 0;
    }

    // wbs_zwischen_abschluss
    if(UserHistory::getTestsInsgesamt($this->cat_theme, $user_id)){
      $this->cat_theme = 'wbs_zwischen_abschluss ';

      $wbs_zwischen_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($this->cat_theme, $user_id);

      $notenGesamtSumme_wbs_zwischen = UserHistory::getNotenGesamtSumme($this->cat_theme, $user_id);
      $wbs_zwischen_durchschnittsnote = $notenGesamtSumme_wbs_zwischen / $wbs_zwischen_tests_insgesamt_gemacht;

    } else {
      $wbs_zwischen_tests_insgesamt_gemacht = 0;
      $wbs_zwischen_durchschnittsnote = 0;
    }

    // ihk_zwischen_abschluss
    if(UserHistory::getTestsInsgesamt($this->cat_theme, $user_id)){
      $this->cat_theme = 'ihk_zwischen_abschluss';

      $ihk_wirt_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($this->cat_theme, $user_id);

      $notenGesamtSumme_ihk_zwischen = UserHistory::getNotenGesamtSumme($this->cat_theme, $user_id);
      $ihk_wirt_durchschnittsnote = $notenGesamtSumme_ihk_zwischen / $ihk_wirt_tests_insgesamt_gemacht ;

    } else {
      $ihk_zwischen_tests_insgesamt_gemacht = 0;
      $ihk_zwischen_durchschnittsnote = 0;
    }


    require_once(ROOT . '/views/statistik/statistik.php');
    return true;
  }
}
