
/*==============Ergebnisse anzeigen======================*/

$(".ihkZwischenTest .ihkZwischenTest_ergebnisse_einsehen_button").on("click", function() {


      // cat_id
    var cat_id = $(this).attr("data-cat-id");
    // user_id
    var user_id = $(".ihkZwischenTest").attr("data-user-id");
    // erreichte_punktzahl
    var gesamtprozentzahl = $(".ihkZwischenTest .ihkZwischenTest_gesamtprozentzahl").attr("data-gesamtprozentzahl");
    // vergangene_zeit
    var vergangene_zeit = $(".ihkZwischenTest .ihkZwischenTest_vergangene_zeit").attr("data-vergangene-zeit");
    var erreichte_note = $(".ihkZwischenTest .ihkZwischenTest_erreichte_note").attr("data-erreichte-note");
    var cat_theme = $(".ihkZwischenTest").attr("data-cat-theme");


    $.ajax({

        url: "/views/ihkZwischen/ihkZwischenTestSaveResultAjax.php",
        method: "POST",
        dataType:"text",
        data:{  'user_id': user_id,
                'cat_id': cat_id,
                'cat_theme' : cat_theme,
                'gesamtprozentzahl':gesamtprozentzahl,
                'erreichte_note': erreichte_note,
                'vergangene_zeit': vergangene_zeit},
        success: function(data){
            // если всё записали в таблицу user_history
            if(data == true){

                $(".ihkZwischenTest .ihkZwischenTest_ergebnisse_einsehen_button").css({'display':'none'});
                $(".ihkZwischenTest .ihkZwischenTest_test_beenden").css({'display':'inline-block'});

                $.ajax({

                    url: "/views/ihkZwischen/ihkZwischenTestShowResultAjax.php",
                    method: "POST",
                    dataType:"text",
                    data:{  'cat_id': cat_id},
                   success: function(data){

                       $(".ihkZwischenTest_ergebnisse_einsehen_content").html(data);

                    }

                });


            }

        }

    });







});
