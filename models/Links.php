<?php




class Links
{


  public static function linksEinlegen($theme, $category, $titel, $link){

    $db = Db::getConnection();
    $sql = "INSERT INTO links (theme, category, titel, link)
    VALUES (:theme, :category, :titel, :link)";

    if($result = $db->prepare($sql)){
      $result->bindParam(':theme', $theme);
      $result->bindParam(':category', $category);
      $result->bindParam(':titel', $titel);
      $result->bindParam(':link', $link);

      $result->execute();

      if($result->rowCount() > 0) {
        return true;
      } else {
        return false;
      }

    }

  }


  public static function getLinks($theme, $category) {

    $db = Db::getConnection();
    $sql = "SELECT * FROM links WHERE theme = :theme AND category = :category";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':theme', $theme);
      $result->bindParam(':category', $category);
      $result->execute();

      $daten = [];
      $i = 0;
      while($row = $result->fetch()) {
        $daten[$i]['titel'] = $row['titel'];
        $daten[$i]['link'] = $row['link'];
        $i++;
      }

      if($result->rowCount() > 0) {
        return $daten;
      } else {
        return false;
      }
    }
  }

} // end class
