<?php



class UserHistory
{


  public static function getGemachtesTestsAnzahl($cat_theme, $user_id){
    $db = Db::getConnection();
    $sql = "SELECT COUNT(user_history.cat_id) AS anzahl, user_history.cat_id FROM category, user_history WHERE category.cat_id = user_history.cat_id  AND category.cat_theme = :cat_theme AND user_history.user_id = :user_id group by category.cat_id";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_theme', $cat_theme);
      $result->bindParam(':user_id', $user_id);
      $result->execute();

      $anzahl =  $result->fetch(PDO::FETCH_NUM);
      /*
      $anzahl = [];
      $i = 0;
      while($row = $result->fetch()) {
        $anzahl[$i]['cat_id'] = $row['cat_id'];
        $anzahl[$i]['anzahl'] = $row['anzahl'];
        $i++;
      }
      */

      if($result->rowCount() > 0) {
        return $anzahl;
      } else {
        return false;
      }
    }
  }

  public static function getLetzteNote($cat_theme, $user_id){
    $db = Db::getConnection();
    $sql = "SELECT user_history.erreichte_note, user_history.cat_id FROM category, user_history
    WHERE category.cat_id = user_history.cat_id AND user_history.cat_theme = :cat_theme AND user_history.user_id = :user_id ORDER BY user_history.id ASC LIMIT 1";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_theme', $cat_theme);
      $result->bindParam(':user_id', $user_id);
      $result->execute();

      $anzahl =  $result->fetch(PDO::FETCH_NUM);

      if($result->rowCount() > 0) {
        return $anzahl;
      } else {
        return false;
      }
    }
  }

  public static function getTestsInsgesamt($cat_theme, $user_id){
    $db = Db::getConnection();
    $sql = "SELECT COUNT(cat_theme) FROM user_history WHERE cat_theme = :cat_theme AND user_id = :user_id";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_theme', $cat_theme);
      $result->bindParam(':user_id', $user_id);
      $result->execute();

      $anzahl =  $result->fetch();

      if($result->rowCount() > 0) {
        return $anzahl[0];
      } else {
        return false;
      }
    }
  }


  public static function getNotenGesamtSumme($cat_theme, $user_id){
    $db = Db::getConnection();
    $sql = "SELECT SUM(erreichte_note) FROM user_history WHERE cat_theme = :cat_theme AND user_id = :user_id";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':cat_theme', $cat_theme);
      $result->bindParam(':user_id', $user_id);
      $result->execute();

      $anzahl =  $result->fetch();

      if($result->rowCount() > 0) {
        return $anzahl[0];
      } else {
        return false;
      }
    }
  }

} // ende class
