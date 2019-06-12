<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>




<div class="container">

	<div class="seller-trenner"></div>

	<div class="row">
		<?php if(isset($cat)): ?>
			<?php foreach($cat as $value): ?>
				<div class="col-md-3">
					<div class="card border-dark mb-3" style="max-width: 18rem;">
					  <div class="card-header"><?php echo $value['cat_titel']; ?></div>
					  <div class="card-body text-dark">
					  	<a href="ihkFachTest/<?php echo $value['cat_id']; ?>?cat_id=<?php echo $value['cat_id']; ?>&frage_num=<?php echo $frage_num; ?>" class="btn btn-dark btn-block">Zum Test <i class="fal fa-comment-alt-edit"></i></a>
					  </div>
					</div>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
