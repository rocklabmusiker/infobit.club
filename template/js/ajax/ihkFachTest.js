

/*==============Ergebnis zählen SESSION======================*/

$(".btn_ihkFach_test_weiter").on("click", function() {

    // сначало нужно получить айди вопроса
    var frage_id = $(".fach_test_frage").attr("data-frage-id");

	  // дальше получаем все ответы и помещаем их в один массив
	  var alle_antworten = [];


    /*RADIO ANTWORTEN*/

    $(".bewerte_dich .radio_antwort").each(function() {
      if($(this).is(':checked')) {

          var radio_antwort = $(this).val();
              // alle_antworten.push(antwort);
          alle_antworten.push(radio_antwort);
      }
    });

    var user_antworten = alle_antworten.toString();

    $.ajax({

    	url: "/views/ihkFach/ihkFachTestAjax.php",
  		method: "POST",
  		dataType:"text",
  		data:{  'frage_id' : frage_id,
              'user_antworten' : user_antworten},
      success: function(data){
        // console.log(user_antworten);
        var link = $(".btn_ihkFach_test_weiter").attr("data-link");
        location.replace(link);

      }

    });



});
