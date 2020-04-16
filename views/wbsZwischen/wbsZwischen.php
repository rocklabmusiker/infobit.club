<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>




<div class="container pb-5">
		<div class="seller-trenner py-2">
			<h5 class="text-center">Jeder Test enthält 30 bis 40 Aufgaben! Bei der IHK sind es immer 30</h5>
			<h6 class="text-center">Die Prüfungszeit bei IHK beträgt 60 Minuten!</h6>
		</div>

	<div class="row">
		<?php if(isset($cat_wbs_zwischen_abschluss)): ?>
			<?php foreach($cat_wbs_zwischen_abschluss as $value): ?>
				<div class="col-md-3">
					<div class="card <?php if($value['anzahl'] > 0){echo 'border-success';} else{echo 'border-dark';} ?>  mb-3"
						style="border: 2px solid;">
					  <div class="card-header text-center"><?php echo $value['cat_titel']; ?></div>
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
						<div class="card-body text-dark pt-0">
					  	<a href="wbsZwischenTest/<?php echo $value['cat_id']; ?>?cat_id=<?php echo $value['cat_id']; ?>&frage_num=<?php echo $frage_num; ?>" class="btn btn-dark btn-block">Zum Test <i class="fal fa-comment-alt-edit"></i></a>
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
		$.cookie('timestamp_timer_wbs_zwischen_pause', usedTime, { path: '/wbsZwischenTest' });
	});

</script>
