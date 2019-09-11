<?php include_once(ROOT . '/views/layouts/header.php'); ?>

<?php include_once(ROOT . '/views/layouts/menu.php'); ?>


<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-danger font-weight-bold">JAVASCRIPT</h1>
  </div>
</div>


<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="card border-dark mb-3" >
			  <div class="card-header font-weight-bold text-white bg-dark">DOKUMENTATION</div>
			  <div class="card-body text-dark">
          <?php if(isset($documentation) && $documentation != ''): ?>
            <?php foreach ($documentation as $value): ?>
              <h5 class="card-title">
                <?php echo $value['titel']; ?>
                <a href="<?php echo $value['link']; ?>" class="text-dark text-decoration-none" target="_blank">
                  <i class="fas fa-external-link-square-alt text-dark" style="font-size: 20px;"></i>
                </a>
              </h5>
            <?php endforeach; ?>
          <?php endif; ?>
			  </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card border-dark mb-3" >
			  <div class="card-header font-weight-bold text-white bg-dark">TUTORIALS</div>
			  <div class="card-body text-dark">
          <?php if(isset($tutorials) && $tutorials != ''): ?>
            <?php foreach ($tutorials as $value): ?>
              <h5 class="card-title">
                <?php echo $value['titel']; ?>
                <a href="<?php echo $value['link']; ?>" class="text-dark text-decoration-none" target="_blank">
                  <i class="fas fa-external-link-square-alt text-dark" style="font-size: 20px;"></i>
                </a>
              </h5>
            <?php endforeach; ?>
          <?php endif; ?>
			  </div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="card border-dark mb-3">
			  <div class="card-header font-weight-bold text-white bg-dark">FRAMEWORKS</div>
			  <div class="card-body text-dark">
          <?php if(isset($frameworks) && $frameworks != ''): ?>
            <?php foreach ($frameworks as $value): ?>
              <h5 class="card-title">
                <?php echo $value['titel']; ?>
                <a href="<?php echo $value['link']; ?>" class="text-dark text-decoration-none" target="_blank">
                  <i class="fas fa-external-link-square-alt text-dark" style="font-size: 20px;"></i>
                </a>
              </h5>
            <?php endforeach; ?>
          <?php endif; ?>
			  </div>
			</div>
		</div>
	</div>
</div>


<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
