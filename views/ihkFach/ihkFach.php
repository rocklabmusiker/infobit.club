<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>




<div class="container">

	<div class="seller-trenner"></div>

	<div class="row">
		<?php if(isset($cat)): ?>
			<?php foreach($cat as $value): ?>
				<div class="col-md-3">
					<div class="card <?php if($value['anzahl'] > 0){echo 'border-success';} else{echo 'border-dark';} ?> mb-3" style="max-width: 18rem;">
					  <div class="card-header"><?php echo $value['cat_titel']; ?></div>
						<div class="card-body text-dark p-0">
					  	<table class="table table-bordered text-center">
								<thead>
									<tr>
						  			<th scope="col">Gemacht</th>
										<th scope="col">Beste Note</th>
						  		</tr>
								</thead>
					  		<tbody>
									<tr>
										<td><?php
										if($value['anzahl'] != NULL) {
											echo $value['anzahl'];
										} else {
											echo 0;
										}
										?> Mal
									</td>

										<td><?php
											if($value['note'] != NULL) {
												echo $value['note'];
											} else {
												echo 0;
											} ?>
										</td>
									</tr>
					  		</tbody>
					  	</table>
					  </div>
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

<script>

	$(document).ready(function(){
		var usedTime  = 0;
		$.cookie('timestamp_timer_ihk_fach_pause', usedTime, { path: '/ihkFachTest' });
	});

</script>
