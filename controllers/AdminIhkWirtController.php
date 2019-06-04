<?php


class AdminIhkWirtController
{

  public function actionIndex(){

    require_once(ROOT . '/views/admin/adminIhkWirt/adminIhkWirt.php');
    return true;
  }
}
