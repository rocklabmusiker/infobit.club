<?php


class StatistikController
{



  public function actionIndex(){

    $user_id = $_SESSION['user_id'];

    // ihk_wirt_abschluss
    $cat_theme = 'ihk_wirt_abschluss';
    if(UserHistory::getTestsInsgesamt($cat_theme, $user_id)){

      $ihk_wirt_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($cat_theme, $user_id);

      $notenGesamtSumme_ihk_wirt = UserHistory::getNotenGesamtSumme($cat_theme, $user_id);
      $ihk_wirt_durchschnittsnote = round($notenGesamtSumme_ihk_wirt / $ihk_wirt_tests_insgesamt_gemacht,1);

    } else {
      $ihk_wirt_tests_insgesamt_gemacht = 0;
      $ihk_wirt_durchschnittsnote = 0;
    }

    // wbs_zwischen_abschluss
    $cat_theme = 'wbs_zwischen_abschluss ';
    if(UserHistory::getTestsInsgesamt($cat_theme, $user_id)){


      $wbs_zwischen_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($cat_theme, $user_id);

      $notenGesamtSumme_wbs_zwischen = UserHistory::getNotenGesamtSumme($cat_theme, $user_id);
      $wbs_zwischen_durchschnittsnote = round($notenGesamtSumme_wbs_zwischen / $wbs_zwischen_tests_insgesamt_gemacht,1);

    } else {
      $wbs_zwischen_tests_insgesamt_gemacht = 0;
      $wbs_zwischen_durchschnittsnote = 0;
    }

    // ihk_zwischen_abschluss
    $cat_theme = 'ihk_zwischen_abschluss';
    if(UserHistory::getTestsInsgesamt($cat_theme, $user_id)){


      $ihk_wirt_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($cat_theme, $user_id);

      $notenGesamtSumme_ihk_zwischen = UserHistory::getNotenGesamtSumme($cat_theme, $user_id);
      $ihk_wirt_durchschnittsnote = round($notenGesamtSumme_ihk_zwischen / $ihk_wirt_tests_insgesamt_gemacht,1) ;

    } else {
      $ihk_zwischen_tests_insgesamt_gemacht = 0;
      $ihk_zwischen_durchschnittsnote = 0;
    }

    // ihk_fach_abschluss
    $cat_theme = 'ihk_fach_abschluss';
    if(UserHistory::getTestsInsgesamt($cat_theme, $user_id)){


      $ihk_fach_tests_insgesamt_gemacht = UserHistory::getTestsInsgesamt($cat_theme, $user_id);

      $notenGesamtSumme_ihk_fach = UserHistory::getNotenGesamtSumme($cat_theme, $user_id);
      $ihk_fach_durchschnittsnote = round($notenGesamtSumme_ihk_fach / $ihk_fach_tests_insgesamt_gemacht,1) ;

    } else {
      $ihk_fach_tests_insgesamt_gemacht = 0;
      $ihk_fach_durchschnittsnote = 0;
    }


    require_once(ROOT . '/views/statistik/statistik.php');
    return true;
  }
}
