<?php



class LinksController
{

  public function actionPhp(){

    require_once(ROOT . '/views/linksSeiten/php.php');
    return true;
  }

  public function actionJavascript(){

    require_once(ROOT . '/views/linksSeiten/javascript.php');
    return true;
  }

  public function actionCSharp(){

    require_once(ROOT . '/views/linksSeiten/cSharp.php');
    return true;
  }

  public function actionHtmlCss(){

    require_once(ROOT . '/views/linksSeiten/htmlCss.php');
    return true;
  }

  public function actionSql(){

    require_once(ROOT . '/views/linksSeiten/sql.php');
    return true;
  }

  public function actionLinuxWindows(){

    require_once(ROOT . '/views/linksSeiten/linuxWindows.php');
    return true;
  }


  public function actionNetzwerk(){

    require_once(ROOT . '/views/linksSeiten/netzwerk.php');
    return true;
  }

  public function actionWebentwicklung(){

    require_once(ROOT . '/views/linksSeiten/webentwicklung.php');
    return true;
  }




}
