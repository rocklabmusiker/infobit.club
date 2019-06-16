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
  <div class="jumbotron jumbotron-fluid py-2 mt-4 bg-dark text-white">
      <h4 class="display-3 text-center " style="font-size: 30px; font-weight: 600;">
        IHK-Zwischenprüfung
      </h4>
  </div>
	<div class="row">
    <div class="col-md-12">
      <form method="post">
        <div class="form-row">
          <div class="form-group col-md-10">
            <label for="exampleInputEmail1">Titel</label>
            <input type="text" name="cat_titel" class="form-control" >
          </div>
          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Das Jahr</label>
            <input type="text" name="cat_jahr" class="form-control cat_jahr" >
          </div>
        </div>
        <div class="form-group">
          <input type="submit" name="neue_cat_erstellen" value="Titel einlegen" class="btn btn-dark">
        </div>
      </form>
    </div>
	</div>

  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h5 class="display-2  text-center" style="font-size: 25px; font-weight: 600;">
            Frage einlegen
      </h5>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <form enctype="multipart/form-data" id="picUploadForm" method="post">
        <?php if(isset($last_cat)): ?>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="cat_titel">Kategorie Titel</label>
              <input type="text" class="form-control cat_titel" value="<?php echo $last_cat['cat_titel'];  ?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="cat_theme">Kategorie Theme</label>
              <input type="text" name="frage_cat_theme" class="form-control cat_theme" value="<?php echo $last_cat['cat_theme']; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
              <label for="cat_id">Kategorie ID</label>
              <input type="text" name="frage_cat_id" class="form-control frage_cat_id" value="<?php echo $last_cat['cat_id']; ?>" readonly>
            </div>
          </div>
        <?php endif; ?>
        <div class="form-row">
          <label for="cat_theme">Frage</label>
          <textarea class="form-control frage_titel" name="frage_titel"></textarea>
        </div>
        <div class="form-row mt-3">
          <div class="form-group col-md-8">
            <label for="frage_info">Frage Info (z.B. Suchen Sie 4 richtige Antworten aus)</label>
            <input type="text" class="form-control frage_info" name="frage_info">
          </div>
          <div class="form-group col-md-4">
            <label for="richtige_antwort">Richtige Antwort(en)</label>
            <input type="text" class="form-control richtige_antwort" name="richtige_antwort">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="antwort_1">Antwort 1</label>
            <input type="text" class="form-control antwort_1" name="antwort_1">
          </div>
          <div class="form-group col-md-4">
            <label for="antwort_2">Antwort 2</label>
            <input type="text" class="form-control antwort_2" name="antwort_2">
          </div>
          <div class="form-group col-md-4">
            <label for="antwort_3">Antwort 3</label>
            <input type="text" class="form-control antwort_3" name="antwort_3">
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="antwort_4">Antwort 4</label>
            <input type="text" class="form-control antwort_4" name="antwort_4">
          </div>
          <div class="form-group col-md-4">
            <label for="antwort_5">Antwort 5</label>
            <input type="text" class="form-control antwort_5" name="antwort_5">
          </div>
          <div class="form-group col-md-4">
            <label for="antwort_6">Antwort 6</label>
            <input type="text" class="form-control antwort_6" name="antwort_6">
          </div>
        </div>

        <div class="form-row">
          <span class="badge badge-warning p-2 mb-4">
            Maximal erlaubte Upload-Größe: 1000 kB <br>
            Erlaubte Dateitypen: .jpg, .jpeg, .png, .gif
          </span>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="frage_bild" class="custom-file-input frage_bild" id="fileInput" value="suchen">
              <label class="custom-file-label" for="fileInput"></label>
            </div>
          </div>
        </div>
        <input type="submit" name="frage_speichern" class="btn btn-dark my-4 frage_speichern"  value="Frage speichern">
      </form>
    </div>


  </div>

</div>


<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>

<script>

	 $('#fileInput').on('change',function(){
                //get the file name
      var fileName = $(this).val();
                //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  });

</script>
