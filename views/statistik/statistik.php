<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>




<div class="container">
		<div class="seller-trenner"></div>
	<div class="row">
		<?php //if(): ?>
				<div class="col-md-6">
					<div class="card border-dark my-3" >
					  <div class="card-header text-center bg-dark text-white" style="font-size:20px;">
              IHK-Fachqualifikation
            </div>
					  <div class="card-body text-dark p-0">
					  	<table class="table table-bordered text-center mb-0">
								<thead>
									<tr>
						  			<th scope="col">Insgesamt gemacht</th>
										<th scope="col">Durchschnittsnote</th>
						  		</tr>
								</thead>
					  		<tbody>
									<tr>
                    <td class="font-weight-bold"> <span class=" text-info border rounded px-3" style="font-size:25px;"><?php echo $ihk_fach_tests_insgesamt_gemacht; ?></span> Test(s)</td>
										<td class="font-weight-bold"> <span class=" text-success border rounded px-3" style="font-size:25px;"><?php echo $ihk_fach_durchschnittsnote; ?></td>
									</tr>
					  		</tbody>
					  	</table>
					  </div>
					</div>
				</div>
		<?php // endif; ?>

    <?php //if(): ?>
				<div class="col-md-6">
					<div class="card border-dark my-3" >
					  <div class="card-header text-center bg-dark text-white" style="font-size:20px;">
              IHK-Wirtschaft
            </div>
					  <div class="card-body text-dark p-0">
					  	<table class="table table-bordered text-center mb-0">
								<thead>
									<tr>
                    <th scope="col">Insgesamt gemacht</th>
										<th scope="col">Durchschnittsnote</th>
						  		</tr>
								</thead>
					  		<tbody>
									<tr>
										<td class="font-weight-bold"> <span class=" text-info border rounded px-3" style="font-size:25px;"><?php echo $ihk_wirt_tests_insgesamt_gemacht; ?></span> Test(s)</td>
										<td class="font-weight-bold"> <span class=" text-success border rounded px-3" style="font-size:25px;"><?php echo $ihk_wirt_durchschnittsnote; ?></td>
									</tr>
					  		</tbody>
					  	</table>
					  </div>
					</div>
				</div>
		<?php // endif; ?>

    <?php //if(): ?>
				<div class="col-md-6">
					<div class="card border-dark my-3" >
					  <div class="card-header text-center bg-dark text-white" style="font-size:20px;">
              IHK-Zwischenprüfung
            </div>
					  <div class="card-body text-dark p-0">
					  	<table class="table table-bordered text-center mb-0">
								<thead>
									<tr>
                    <th scope="col">Insgesamt gemacht</th>
										<th scope="col">Durchschnittsnote</th>
						  		</tr>
								</thead>
					  		<tbody>
									<tr>
                    <td class="font-weight-bold"> <span class=" text-info border rounded px-3" style="font-size:25px;"><?php echo $ihk_wirt_tests_insgesamt_gemacht; ?></span> Test(s)</td>
										<td class="font-weight-bold"> <span class=" text-success border rounded px-3" style="font-size:25px;"><?php echo $ihk_wirt_durchschnittsnote; ?></td>
									</tr>
					  		</tbody>
					  	</table>
					  </div>
					</div>
				</div>
		<?php // endif; ?>

    <?php //if(): ?>
				<div class="col-md-6">
					<div class="card border-dark my-3" >
					  <div class="card-header text-center bg-dark text-white" style="font-size:20px;">
              WBS-Zwischenprüfung
            </div>
					  <div class="card-body text-dark p-0">
					  	<table class="table table-bordered text-center mb-0">
								<thead>
									<tr>
                    <th scope="col">Insgesamt gemacht</th>
										<th scope="col">Durchschnittsnote</th>
						  		</tr>
								</thead>
					  		<tbody>
									<tr>
                    <td class="font-weight-bold"> <span class=" text-info border rounded px-3" style="font-size:25px;"><?php  echo $wbs_zwischen_tests_insgesamt_gemacht; ?></span> Test(s)</td>
										<td class="font-weight-bold"> <span class=" text-success border rounded px-3" style="font-size:25px;"><?php echo $wbs_zwischen_durchschnittsnote; ?></td>
									</tr>
					  		</tbody>
					  	</table>
					  </div>
					</div>
				</div>
		<?php // endif; ?>

	</div>
</div>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
