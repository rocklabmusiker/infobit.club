<?php include_once(ROOT . '/views/admin/adminLayouts/adminHeader.php'); ?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminMenu.php'); ?>

<p class="error_true alert alert-danger text-center rounded-0 response response" role="alert" style="opacity: 0;"></p>


<div class="container">
  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h4 class="display-3 text-center" style="font-size: 30px;">Neue Kategorie erstellen</h4>
    </div>
  </div>
	<div class="row">
    <div class="col-md-12">
      <form>
        <div class="form-group">
          <label for="exampleInputEmail1">Kategorie Titel</label>
          <input type="text" class="form-control cat_titel">
        </div>
        <div class="form-group">
          <label for="cat_theme">Kategorie Theme</label>
          <input type="text" class="form-control cat_theme">
        </div>
        <input type="button" value="Kategorie erstellen" class="btn btn-dark set_new_cat">
      </form>
    </div>
	</div>

  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h4 class="display-3 text-center" style="font-size: 30px;">Frage einlegen</h4>
    </div>
  </div>


</div>


<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>

<script src="/template/js/adminAjax/catErstellen.js"></script>
