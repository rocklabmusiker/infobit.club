<?php



class LinksController
{
  public $theme;
  public $category;

  public function actionPhp(){

    $theme = 'php';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    $category = 'frameworks';
    $frameworks = Links::getLinks($theme, $category);



    require_once(ROOT . '/views/linksSeiten/php.php');
    return true;
  }

  public function actionJavascript(){

    $theme = 'javascript';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    $category = 'frameworks';
    $frameworks = Links::getLinks($theme, $category);

    require_once(ROOT . '/views/linksSeiten/javascript.php');
    return true;
  }

  public function actionCSharp(){

    $theme = 'cSharp';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    $category = 'frameworks';
    $frameworks = Links::getLinks($theme, $category);


    require_once(ROOT . '/views/linksSeiten/cSharp.php');
    return true;
  }

  public function actionHtmlCss(){

    $theme = 'htmlCss';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    $category = 'frameworks';
    $frameworks = Links::getLinks($theme, $category);

    require_once(ROOT . '/views/linksSeiten/htmlCss.php');
    return true;
  }

  public function actionSql(){

    $theme = 'sql';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    require_once(ROOT . '/views/linksSeiten/sql.php');
    return true;
  }

  public function actionLinuxWindows(){

    $theme = 'linuxWindows';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    require_once(ROOT . '/views/linksSeiten/linuxWindows.php');
    return true;
  }


  public function actionNetzwerk(){

    $theme = 'netzwerk';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    require_once(ROOT . '/views/linksSeiten/netzwerk.php');
    return true;
  }

  public function actionWebentwicklung(){

    $theme = 'webentwicklung';
    $category = 'documentation';
    $documentation = Links::getLinks($theme, $category);

    $category = 'buecher';
    $buecher = Links::getLinks($theme, $category);

    $category = 'tutorials';
    $tutorials = Links::getLinks($theme, $category);

    $category = 'frameworks';
    $frameworks = Links::getLinks($theme, $category);

    require_once(ROOT . '/views/linksSeiten/webentwicklung.php');
    return true;
  }




}
