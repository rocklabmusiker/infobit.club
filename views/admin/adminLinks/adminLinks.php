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
  <div class="jumbotron jumbotron-fluid py-2 mt-4">
    <div class="container">
      <h4 class="display-3 text-center" style="font-size: 30px;">Links einlegen</h4>
    </div>
  </div>
	<div class="row">
    <div class="col-md-12">
      <form method="post">
        <div class="form-row align-items-center">
          <div class="col-md-6">
            <label class="" for="inlineFormCustomSelect">Themen</label>
            <select class="custom-select" name="theme">
              <option selected>auswählen...</option>
              <option value="php">PHP</option>
              <option value="javascript">JAVASCRIPT</option>
              <option value="cSharp">CSHARP</option>
              <option value="htmlCss">HTML/CSS</option>
              <option value="sql">SQL</option>
              <option value="linuxWindows">LINUX/WINDOWS</option>
              <option value="netzwerk">NETZWERK</option>
              <option value="webentwicklung">WEBENTWICKLUNG</option>
            </select>
          </div>

          <div class="col-md-6">
            <label for="inlineFormCustomSelect2">Kategorie</label>
            <select class="custom-select" id="inlineFormCustomSelect2" name="category">
              <option selected>auswählen...</option>
              <option value="documentation">Documentation</option>
              <option value="buecher">Buecher</option>
              <option value="tutorials">Tutorials</option>
              <option value="frameworks">Frameworks</option>
            </select>
          </div>
        </div>

          <div class="form-row align-items-center mt-3">
            <div class="form-group col-md-6">
              <label for="titel">Titel</label>
              <input type="text" name="titel" class="form-control titel">
            </div>
            <div class="form-group col-md-6">
              <label for="link">Link</label>
              <input type="text" name="link" class="form-control link" >
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4">
              <button type="submit" name="link_speichern" class="btn btn-dark d-block">speichern</button>
            </div>
          </div>

      </form>

    </div>
	</div>
</div>


<?php include_once(ROOT . '/views/admin/adminLayouts/adminFooter.php'); ?>

<!-- errors messages -->
<script>
  $(".error_true").animate({left: "0"}, 1000);
  setTimeout(function(){
    $(".error_true").animate({left: "-1000px"}, 1000);
  }, 5000);

  $(".error_false").animate({left: "0"}, 1000);
  setTimeout(function(){
    $(".error_false").animate({left: "-1000px"}, 1000);
  }, 5000);
</script>
