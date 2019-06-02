
/*==============Ergebnisse anzeigen======================*/

$(".ihkWirtTest .ihkWirtTest_ergebnisse_einsehen_button").on("click", function() {


      // cat_id
    var cat_id = $(this).attr("data-cat-id");
    // user_id
    var user_id = $(".ihkWirtTest").attr("data-user-id");
    // erreichte_punktzahl
    var gesamtprozentzahl = $(".ihkWirtTest .ihkWirtTest_gesamtprozentzahl").attr("data-gesamtprozentzahl");
    // vergangene_zeit
    var vergangene_zeit = $(".ihkWirtTest .ihkWirtTest_vergangene_zeit").attr("data-vergangene-zeit");
    var erreichte_note = $(".ihkWirtTest .ihkWirtTest_erreichte_note").attr("data-erreichte-note");


    $.ajax({

        url: "/views/ihkWirt/ihkWirtTestSaveResultAjax.php",
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

                $(".ihkWirtTest .ihkWirtTest_ergebnisse_einsehen_button").css({'display':'none'});
                $(".ihkWirtTest .ihkWirtTest_test_beenden").css({'display':'inline-block'});

                $.ajax({

                    url: "/views/ihkWirt/ihkWirtTestShowResultAjax.php",
                    method: "POST",
                    dataType:"text",
                    data:{  'cat_id': cat_id},
                   success: function(data){

                       $(".ihkWirtTest_ergebnisse_einsehen_content").html(data);

                    }

                });


            }
           
        }

    });



    



});
