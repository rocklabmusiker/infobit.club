$(".set_new_cat").on("click", function(){

  var catTitel = $(".cat_titel").val();
  var catTheme = $(".cat_theme").val();

  if(catTitel != '' && catTheme != ''){

    $.ajax({

      url: "/views/admin/adminIhkWirt/catErstellenAjax.php",
      method: "POST",
      data:{
        "cat_titel": catTitel,
        "cat_theme": catTheme
      },
      success: function(data){

        if(data) {
          $(".response").removeClass('alert-danger');
          $(".response").html('Alles super. Die Kategorie wurde erstellt!').css({'opacity':1, 'left':0}).addClass('alert-success');
          $(".cat_titel").val('');
          $(".cat_theme").val('');
          setTimeout(function(){
            location.reload();
          },4000);

        } else {
          $(".response").html('Es hat nicht geklappt! Bitte, versuche es wieder!').css({'opacity':1, 'left':0});
          setTimeout(function(){
            location.reload();
          },4000);
        }


      }
    });
  } else{
    $(".cat_titel").css({"border": "1px solid red"});
    $(".cat_theme").css({"border": "1px solid red"});
  }


});
