<?php if($_SESSION['user_status'] != 'admin'){
  echo '<script> location.replace("/admin/adminFragenEinlegen"); </script>';

}?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminHeader.php'); ?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminMenu.php'); ?>

<!-- Error messages -->
<?php if(isset($error) && $error == true): ?>
  <div class="error_true alert alert-danger text-center d-inline-block rounded-0" role="alert">
    <?php if(isset($message_text) && $message_text != ''){echo $message_text;} ?>
  </div>
<?php endif; ?>

<?php if(isset($error) && $error == false): ?>
  <div class="error_false alert alert-success text-center d-inline-block rounded-0" role="alert">
    <?php if(isset($message_text) && $message_text != ''){echo $message_text;} ?>
  </div>
<?php endif; ?>


<div class="container">
  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h4 class="display-3 text-center" style="font-size: 30px;">Neue Anfragen</h4>
    </div>
  </div>
	<div class="row">
    <div class="col-md-12">
      <?php if(isset($notAllowedUsers) && $notAllowedUsers != ''): ?>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">User Id</th>
              <th scope="col">User Vorname</th>
              <th scope="col">User Nachname</th>
              <th scope="col">User Email</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($notAllowedUsers as $notAllowedUser): ?>
              <tr>
                <td><?php echo $notAllowedUser['user_id']; ?></td>
                <td><?php echo $notAllowedUser['user_name']; ?></td>
                <td><?php echo $notAllowedUser['user_lastname']; ?></td>
                <td><?php echo $notAllowedUser['user_email']; ?></td>
                <td>
                  <form method="post">
                    <input type="hidden" name="user_id" value="<?php echo $notAllowedUser['user_id']; ?>">
                    <input type="hidden" name="user_email" value="<?php echo $notAllowedUser['user_email']; ?>">
                    <input type="submit" name="update_allowed" value="zulassen" class="btn btn-dark">
                  </form>
                </td>
                <td>
                  <form method="post">
                    <input type="hidden" name="user_id" value="<?php echo $notAllowedUser['user_id']; ?>">
                    <input type="submit" name="delete_new_user" value="löschen" class="btn btn-danger">
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
	</div>
</div>


<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>

<!-- errors messages -->
<script>
  $(".error_true").animate({left: "0"}, 1000);
  setTimeout(function(){
    $(".error_true").animate({left: "-1000px"}, 1000);
  }, 5000);

  $(".error_false").animate({left: "0"}, 1000);
  setTimeout(function(){
    $(".error_false").animate({left: "-1000px"}, 1000);
  }, 5000);
</script>
