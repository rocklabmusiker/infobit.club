<?php include_once(ROOT . '/views/admin/adminLayouts/adminHeader.php'); ?>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminMenu.php'); ?>

<!-- Error messages -->
<p class="error_true alert alert-danger text-center rounded-0 response" role="alert" style="opacity: 0;"></p>
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
      <h4 class="display-3 text-center" style="font-size: 30px; font-weight: 600;">
        IHK-Fachqualifikation
      </h4>
  </div>
	<div class="row">
    <div class="col-md-12">
      <form method="post">
        <div class="form-row">
          <div class="form-group col-md-10">
            <label for="exampleInputEmail1">Titel</label>
            <input type="text" name="cat_titel" class="form-control cat_titel" >
          </div>
          <div class="form-group col-md-2">
            <label for="exampleInputEmail1">Das Jahr</label>
            <input type="text" name="cat_jahr" class="form-control cat_jahr" >
          </div>
        </div>
        <div class="form-group">
          <input type="submit" value="Titel einlegen" name="neue_cat_erstellen" class="btn btn-dark">
        </div>
      </form>
    </div>
	</div>

  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h4 class="display-3 text-center" style="font-size: 30px;">Frage einlegen</h4>
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
              <input type="text" name="cat_theme" class="form-control cat_theme" value="<?php echo $last_cat['cat_theme']; ?>" readonly>
            </div>
            <div class="form-group col-md-2">
              <label for="cat_id">Kategorie ID</label>
              <input type="text" name="cat_id" class="form-control cat_id" value="<?php echo $last_cat['cat_id']; ?>" readonly>
            </div>
          </div>
        <?php endif; ?>
        <div class="form-row">
          <div class="form-group col-md-8">
            <label for="titel">Titel</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="titel" class="custom-file-input titel fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="titel"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_info">Anzahl der Fragen</label>
            <input type="text" class="form-control fragen_anzahl" name="fragen_anzahl">
          </div>
        </div>
        <!-- Frage 1-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_1">Frage Bild 1</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_1" class="custom-file-input frage_bild_1 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_1"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_1">Antwort auf Frage 1</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_1" class="custom-file-input antwort_bild_1 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_1"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_1">Punktzahl Frage 1 </label>
            <input type="text" class="form-control frage_punktzahl_1" name="frage_punktzahl_1">
          </div>
        </div>

        <!-- Frage 2-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_2">Frage Bild 2</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_2" class="custom-file-input frage_bild_2 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_2"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_2">Antwort auf Frage 2</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_2" class="custom-file-input antwort_bild_2 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_2"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_1">Punktzahl Frage 2 </label>
            <input type="text" class="form-control frage_punktzahl_2" name="frage_punktzahl_2">
          </div>
        </div>

        <!-- Frage 3-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_3">Frage Bild 3</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_3" class="custom-file-input frage_bild_3 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_3"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_3">Antwort auf Frage 3</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_3" class="custom-file-input antwort_bild_3 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_3"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_3">Punktzahl Frage 3 </label>
            <input type="text" class="form-control frage_punktzahl_3" name="frage_punktzahl_3">
          </div>
        </div>

        <!-- Frage 4-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_4">Frage Bild 4</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_4" class="custom-file-input frage_bild_4 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_4"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_4">Antwort auf Frage 4</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_4" class="custom-file-input antwort_bild_4 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_4"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_4">Punktzahl Frage 4 </label>
            <input type="text" class="form-control frage_punktzahl_4" name="frage_punktzahl_4">
          </div>
        </div>

        <!-- Frage 5-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_5">Frage Bild 5</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_5" class="custom-file-input frage_bild_5 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_5"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_5">Antwort auf Frage 5</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_5" class="custom-file-input antwort_bild_5 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_5"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_5">Punktzahl Frage 5</label>
            <input type="text" class="form-control frage_punktzahl_5" name="frage_punktzahl_5">
          </div>
        </div>

        <!-- Frage 6-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_6">Frage Bild 6</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_6" class="custom-file-input frage_bild_6 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_6"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_6">Antwort auf Frage 6</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_6" class="custom-file-input antwort_bild_6 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_6"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_6">Punktzahl Frage 6</label>
            <input type="text" class="form-control frage_punktzahl_6" name="frage_punktzahl_6">
          </div>
        </div>


        <!-- Frage 7-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_7">Frage Bild 7</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_7" class="custom-file-input frage_bild_7 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_7"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_7">Antwort auf Frage 7</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_7" class="custom-file-input antwort_bild_7 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_7"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_7">Punktzahl Frage 7</label>
            <input type="text" class="form-control frage_punktzahl_7" name="frage_punktzahl_7">
          </div>
        </div>

        <!-- Frage 8-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_8">Frage Bild 8</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_8" class="custom-file-input frage_bild_8 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_8"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_8">Antwort auf Frage 8</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_8" class="custom-file-input antwort_bild_8 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_8"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_8">Punktzahl Frage 8</label>
            <input type="text" class="form-control frage_punktzahl_8" name="frage_punktzahl_8">
          </div>
        </div>

        <!-- Frage 9-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_9">Frage Bild 9</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_9" class="custom-file-input frage_bild_9 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_9"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_9">Antwort auf Frage 9</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_9" class="custom-file-input antwort_bild_9 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_9"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_9">Punktzahl Frage 9</label>
            <input type="text" class="form-control frage_punktzahl_9" name="frage_punktzahl_9">
          </div>
        </div>


        <!-- Frage 10-->
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="frage_bild_10">Frage Bild 10</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="frage_bild_10" class="custom-file-input frage_bild_10 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="frage_bild_10"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_antwort_10">Antwort auf Frage 10</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="antwort_bild_10" class="custom-file-input antwort_bild_10 fileInput" aria-describedby="inputGroupFileAddon04" value="suchen">
                <label class="custom-file-label" for="antwort_bild_10"></label>
              </div>
            </div>
          </div>
          <div class="form-group col-md-4">
            <label for="frage_punktzahl_10">Punktzahl Frage 10</label>
            <input type="text" class="form-control frage_punktzahl_10" name="frage_punktzahl_10">
          </div>
        </div>


        <input type="submit" name="selfTest_frage_speichern" class="btn btn-dark my-4 selfTest_frage_speichern"  value="Frage speichern">
      </form>
    </div>


  </div>

</div>

<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>

<script>

	 $('.fileInput').on('change',function(){
                //get the file name
      var fileName = $(this).val();
                //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  });

</script>
