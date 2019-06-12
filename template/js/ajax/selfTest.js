

/*==============Ergebnis zählen SESSION======================*/

$(".btn_self .btn_self_test_weiter").on("click", function() {

    // сначало нужно получить айди вопроса
    var frage_id = $(".self_test_frage_id").attr("data-frage-id");

	// дальше получаем все ответы и помещаем их в один массив
	var alle_antworten = [];


    /*RADIO ANTWORTEN*/

    if($(".form_deine_antwort .radio_antwort_1").is(':checked')) {

        var radio_antwort_1 = $(".form_deine_antwort .radio_antwort_1").val();
            // alle_antworten.push(antwort);
        alle_antworten.push(radio_antwort_1);
    }

    if($(".form_deine_antwort .radio_antwort_2").is(':checked')) {

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
    var user_id = $(".ihkFachTest").attr("data-user-id");
    var secondsFromTimer = $('.ihkFachTest_timer').data('seconds');


    $.ajax({

    	url: "/views/ihkFach/ihkFachTestAjax.php",
		method: "POST",
		dataType:"text",
		data:{  'user_id': user_id,
                'frage_id':frage_id,
                'user_antworten':user_antworten,
                'secondsFromTimer': secondsFromTimer},
       /* success: function(data){
            console.log(data);
        }*/

    });



});
