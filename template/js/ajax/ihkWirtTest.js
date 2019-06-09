//=============IhkFachTest считает кол-во поставленных checkbox=============================//

$(document).ready(function () {

    $('.form_mehrere_antworten input').on('click',function () {

    	var einzelneAntwortGesamtzahl = $(".form_mehrere_antworten").attr("data-antwort-gesamt");

    	if(einzelneAntwortGesamtzahl >= 1) {

    		if($(this).is(':checked')) {

          	var zahlMin = parseInt(einzelneAntwortGesamtzahl) - 1;

	        $(".form_mehrere_antworten").attr("data-antwort-gesamt", zahlMin);


	        } else {
	        	var zahlAdd = parseInt(einzelneAntwortGesamtzahl) + 1;
	            $(".form_mehrere_antworten").attr("data-antwort-gesamt", zahlAdd);
	        }

    	} else if(einzelneAntwortGesamtzahl == 0){

    		$('.form_mehrere_antworten input').each(function(i) {
    		 	if(!$(this).is(':checked')){
    		 		$(this).prop("disabled",true);
    		 		$(".form_mehrere_antworten").attr("data-antwort-gesamt", -1);
    		 	}

    		});

    	}

		if(!$(this).is(':checked')){

    		var zahlAdd = parseInt(einzelneAntwortGesamtzahl) + 1;
	        $(".form_mehrere_antworten").attr("data-antwort-gesamt", zahlAdd);

	        $('.form_mehrere_antworten input').each(function(i) {
	    		$(this).prop("disabled",false);
	    	});
    	}

    });
});



/*==============Ergebnis zählen SESSION======================*/

$(".ihkWirtTest .ihkWirt_antwort_speichern").on("click", function() {

    // сначало нужно получить айди вопроса
    var frage_id = $(".ihkWirtTest_frage_id").attr("data-frage-id");

	// дальше получаем все ответы и помещаем их в один массив
	var alle_antworten = [];

	if($(".form_mehrere_antworten .check_antwort_1").is(':checked')) {
		var check_antwort_1 = $(".form_mehrere_antworten .check_antwort_1").val();
    		// alle_antworten.push(antwort);
    	alle_antworten.push(check_antwort_1);

    }

    if($(".form_mehrere_antworten .check_antwort_2").is(':checked')) {

    	var check_antwort_2 = $(".form_mehrere_antworten .check_antwort_2").val();
    		// alle_antworten.push(antwort);
    	alle_antworten.push(check_antwort_2);
    }

    if($(".form_mehrere_antworten .check_antwort_3").is(':checked')) {

    	var check_antwort_3 = $(".form_mehrere_antworten .check_antwort_3").val();
    		// alle_antworten.push(antwort);
    	alle_antworten.push(check_antwort_3);
    }

    if($(".form_mehrere_antworten .check_antwort_4").is(':checked')) {

    	var check_antwort_4 = $(".form_mehrere_antworten .check_antwort_4").val();
    		// alle_antworten.push(antwort);
    	alle_antworten.push(check_antwort_4);
    }

    if($(".form_mehrere_antworten .check_antwort_5").is(':checked')) {

    	var check_antwort_5 = $(".form_mehrere_antworten .check_antwort_5").val();
    		// alle_antworten.push(antwort);
    	alle_antworten.push(check_antwort_5);
    }

    if($(".form_mehrere_antworten .check_antwort_6").is(':checked')) {

    	var check_antwort_6 = $(".form_mehrere_antworten .check_antwort_6").val();
    		// alle_antworten.push(antwort);
    	alle_antworten.push(check_antwort_6);
    }


    /*RADIO ANTWORTEN*/

    if($(".form_eine_antwort .radio_antwort_1").is(':checked')) {

        var radio_antwort_1 = $(".form_eine_antwort .radio_antwort_1").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_1);
    }

    if($(".form_eine_antwort .radio_antwort_2").is(':checked')) {

        var radio_antwort_2 = $(".form_eine_antwort .radio_antwort_2").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_2);
    }

    if($(".form_eine_antwort .radio_antwort_3").is(':checked')) {

        var radio_antwort_3 = $(".form_eine_antwort .radio_antwort_3").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_3);
    }

    if($(".form_eine_antwort .radio_antwort_4").is(':checked')) {

        var radio_antwort_4 = $(".form_eine_antwort .radio_antwort_4").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_4);
    }

    if($(".form_eine_antwort .radio_antwort_5").is(':checked')) {

        var radio_antwort_5 = $(".form_eine_antwort .radio_antwort_5").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_5);
    }

    if($(".form_eine_antwort .radio_antwort_6").is(':checked')) {

        var radio_antwort_6 = $(".form_eine_antwort .radio_antwort_6").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_6);
    }

    var user_antworten = alle_antworten.toString();


    // timer
    var user_id = $(".ihkWirtTest").attr("data-user-id");
    var secondsFromTimer = $('.ihkWirtTest_timer').data('seconds');


    $.ajax({

    	url: "/views/ihkWirt/ihkWirtTestAjax.php",
  		method: "POST",
  		dataType:"text",
  		data:{  'user_id': user_id,
                  'frage_id':frage_id,
                  'user_antworten':user_antworten,
                  'secondsFromTimer': secondsFromTimer},
      success: function(data){
        $(".ihkWirt_antwort_speichern").css("display", "none");
        setTimeout(function(){
          $(".btn_ihk_wirt_test").css("display", "block");
        }, 100);

      }

    });



});
