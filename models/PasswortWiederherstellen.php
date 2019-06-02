<?php



class PasswortWiederherstellen
{

  public static function getUserIdForPasswordReset($user_email, $user_token, $new_password) {

    $user_email = trim(stripslashes(htmlspecialchars($user_email)));
    $user_token = trim(stripslashes(htmlspecialchars($user_token)));
    $new_password = trim(stripslashes(htmlspecialchars($new_password)));

    $db = Db::getConnection();
    $sql = "SELECT user_id FROM user WHERE user_email = :user_email AND user_token = :user_token AND user_token<>'' AND user_token_expire > NOW()";

    if($result = $db->prepare($sql)) {
      $result->bindParam(':user_email', $user_email);
      $result->bindParam(':user_token', $user_token);
      $result->execute();

      $row = $result->fetch();
      $user_id = $row['user_id'];

      if($result->rowCount() > 0) {
          $user_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $sql_set_pass = "UPDATE user SET user_password = :user_password_hash WHERE user_id = :user_id";

          if($row = $db->prepare($sql_set_pass)){
            $row->bindParam(':user_password_hash', $user_password_hash);
            $row->bindParam(':user_id', $user_id);
            $row->execute();
            if($result->rowCount() > 0){
              return true;
            } else {
              return false;
            }
          }
      } else {
        return false;
      }
    }
  }




}
