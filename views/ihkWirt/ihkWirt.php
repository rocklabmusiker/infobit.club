<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>




<div class="container">
		<div class="seller-trenner py-2">
			<h5 class="text-center">Jeder Test enthält 30 Aufgaben!</h5>
			<h6 class="text-center">Die Prüfungszeit bei IHK beträgt 60 Minuten!</h6>
		</div>

	<div class="row">
		<?php if(isset($cat_ihk_wirt_abschluss)): ?>
			<?php foreach($cat_ihk_wirt_abschluss as $ihk_wirt_abschluss): ?>
				<div class="col-md-3">
					<div class="card <?php if($test_durchlauf > 0){echo 'border-success';} else{echo 'border-dark';} ?>  mb-3"
						style="max-width: 18rem; border: 2px solid;">
					  <div class="card-header text-center"><?php echo $ihk_wirt_abschluss['cat_titel']; ?></div>
					  <div class="card-body text-dark p-0">
					  	<table class="table table-bordered text-center">
								<thead>
									<tr>
						  			<th scope="col">Gemacht</th>
										<th scope="col">Letzte Note</th>
						  		</tr>
								</thead>
					  		<tbody>
									<tr>
										<td><?php echo $test_durchlauf; ?> Mal</td>
										<td><?php echo $letzte_note; ?></td>
									</tr>
					  		</tbody>
					  	</table>
					  </div>
						<div class="card-body text-dark pt-0">
					  	<a href="ihkWirtTest/<?php echo $ihk_wirt_abschluss['cat_id']; ?>?cat_id=<?php echo $ihk_wirt_abschluss['cat_id']; ?>&frage_num=<?php echo $frage_num; ?>" class="btn btn-dark btn-block">Zum Test <i class="fal fa-comment-alt-edit"></i></a>
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
		$.cookie('timestamp_timer_ihk_wirt_pause', usedTime, { path: '/ihkWirtTest/' });
	});

</script>
