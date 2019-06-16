
<?php if($_SESSION['user_status'] != 'admin'){
  echo '<script> location.replace("/admin/adminIhkFragenEinlegen"); </script>';

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
      <h4 class="display-3 text-center" style="font-size: 30px;">Benutzer</h4>
    </div>
  </div>
	<div class="row">
    <div class="col-md-12">
      <?php if(isset($all_users)): ?>

        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Id</th>
              <th scope="col">Vorname</th>
              <th scope="col">Nachname</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($all_users as $user): ?>
              <?php if($user['user_allowed'] != 'nein'): ?>
                <tr>
                  <td><?php echo $user['user_id']; ?></td>
                  <td><?php echo $user['user_name']; ?></td>
                  <td><?php echo $user['user_lastname']; ?></td>
                  <td><?php echo $user['user_email']; ?></td>
                  <td><?php echo $user['user_status']; ?></td>
                  <td>
                    <form method="post">
                      <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                      <input type="hidden" name="user_email" value="<?php echo $user['user_email']; ?>">
                      <input type="submit" name="update_allowed" value="sperren" class="btn btn-warning">
                    </form>
                  </td>
                  <td>
                    <form method="post">
                      <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                      <input type="submit" name="delete_user" value="löschen" class="btn btn-danger">
                    </form>
                  </td>
                  <td>
                    <form method="post">
                      <div class="form-row">
                        <div class="col-md-6 form-group">
                          <select class="custom-select" name="user_status">
                            <option value="user">User</option>
                            <option value="redaktor">Redaktor</option>
                          </select>
                        </div>
                        <div class="col-md-6 form-group">
                          <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                          <input type="submit" name="change_status" value="ändern" class="btn btn-info">
                        </div>
                      </div>
                    </form>
                  </td>
                </tr>
              <?php endif; ?>

            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
	</div>
</div>


<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>
