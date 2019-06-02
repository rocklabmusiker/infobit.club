
/*==============Ergebnisse anzeigen======================*/

$(".ihkFachTest .ihkFachTest_ergebnisse_einsehen_button").on("click", function() {


      // cat_id
    var cat_id = $(this).attr("data-cat-id");
    // user_id
    var user_id = $(".ihkFachTest").attr("data-user-id");
    // erreichte_punktzahl
    var gesamtprozentzahl = $(".ihkFachTest .ihkFachTest_gesamtprozentzahl").attr("data-gesamtprozentzahl");
    // vergangene_zeit
    var vergangene_zeit = $(".ihkFachTest .ihkFachTest_vergangene_zeit").attr("data-vergangene-zeit");
    var erreichte_note = $(".ihkFachTest .ihkFachTest_erreichte_note").attr("data-erreichte-note");


    $.ajax({

        url: "/views/ihkFach/ihkFachTestSaveResultAjax.php",
        method: "POST",
        dataType:"text",
        data:{  'user_id': user_id,
                'cat_id': cat_id,
                'gesamtprozentzahl':gesamtprozentzahl,
                'erreichte_note': erreichte_note,
                'vergangene_zeit': vergangene_zeit},
        success: function(data){
            // если всё записали в таблицу user_history
            if(data == true){

                $(".ihkFachTest .ihkFachTest_ergebnisse_einsehen_button").css({'display':'none'});
                $(".ihkFachTest .ihkFachTest_test_beenden").css({'display':'inline-block'});

                $.ajax({

                    url: "/views/ihkFach/ihkFachTestShowResultAjax.php",
                    method: "POST",
                    dataType:"text",
                    data:{  'cat_id': cat_id},
                   success: function(data){

                       $(".ihkFachTest_ergebnisse_einsehen_content").html(data);

                    }

                });


            }
           
        }

    });



    



});
