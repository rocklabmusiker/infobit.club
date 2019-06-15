
/*==============Ergebnisse anzeigen======================*/

$(".wbsZwischen .wbsZwischenTest_ergebnisse_einsehen_button").on("click", function() {


      // cat_id
    var cat_id = $(this).attr("data-cat-id");
    // cat_theme
    var cat_theme = $(".wbsZwischenTest").attr("data-cat-theme");
    // user_id
    var user_id = $(".wbsZwischenTest").attr("data-user-id");
    // erreichte_punktzahl
    var gesamtprozentzahl = $(".wbsZwischenTest .wbsZwischenTest_gesamtprozentzahl").attr("data-gesamtprozentzahl");
    // vergangene_zeit
    var vergangene_zeit = $(".wbsZwischenTest .wbsZwischenTest_vergangene_zeit").attr("data-vergangene-zeit");
    var erreichte_note = $(".wbsZwischenTest .wbsZwischenTest_erreichte_note").attr("data-erreichte-note");




    $.ajax({

        url: "/views/wbsZwischen/wbsZwischenTestSaveResultAjax.php",
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

                $(".wbsZwischenTest .wbsZwischenTest_ergebnisse_einsehen_button").css({'display':'none'});
                $(".wbsZwischenTest .wbsZwischenTest_test_beenden").css({'display':'inline-block'});

                $.ajax({

                    url: "/views/wbsZwischen/wbsZwischenTestShowResultAjax.php",
                    method: "POST",
                    dataType:"text",
                    data:{  'cat_id': cat_id},
                   success: function(data){

                       $(".wbsZwischenTest_ergebnisse_einsehen_content").html(data);

                    }

                });


            }

        }

    });







});
