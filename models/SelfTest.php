<?php




class SelfTest
{
  public static function getSelfTestFragen($cat_id, $frage_num) {

    $db = Db::getConnection();
    $sql = "SELECT * FROM self_test WHERE cat_id = :cat_id LIMIT 1 OFFSET ".$frage_num;

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_id', $cat_id);
      $result->execute();


      if($result->rowCount() > 0) {
        return $result->fetch();
      } else {
        return false;
      }
    }
  }


  public static function countSelfTestFragen($cat_id) {

    $db = Db::getConnection();
    $sql = "SELECT COUNT(titel) FROM self_test WHERE cat_id = :cat_id";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_id', $cat_id);
      $result->execute();


      if($result->rowCount() > 0) {
        return $result->fetch();
      } else {
        return false;
      }
    }
  }


} // end class
