<?php include_once(ROOT . '/views/admin/adminLayouts/adminHeader.php'); ?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminMenu.php'); ?>




<div class="container">
  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h4 class="display-3 text-center" style="font-size: 30px;">Neue Anfragen</h4>
    </div>
  </div>
	<div class="row">
    <?php if(isset($notAllowedUsers)): ?>
      <?php foreach($notAllowedUsers as $notAllowedUser): ?>
        <?php echo $notAllowedUser['user_name']; ?>
      <?php endforeach; ?>
    <?php endif; ?>
	</div>
</div>


<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>
