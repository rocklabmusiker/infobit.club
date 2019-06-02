
		var email = $("#email");

		$(document).ready(function(){
			$(".btn_reset_password").on("click", function(){

				if(email.val() != ""){
					email.css({border: "2px solid #19692c"}); // green

					$.ajax({
							url: 'views/passwortVergessen/passwortZurucksetzenAjax.php',
							method: 'POST',
							dataType: 'text',
							data: {
								email: email.val()
							},
							success: function(data){
								if(data == 1){
									$("#response").removeClass('alert-danger');
									$("#response").html('Bitte überprüfen Sie ihre Email-Postfach!').css('display', 'block').addClass('alert-success');
									setTimeout(function(){
										location.replace("/")
									},3000);

								} else if(data == 2){
									$("#response").html('Es hat nicht geklappt! Bitte, versuhen Sie es wieder!').css('display', 'block');
									setTimeout(function(){
										location.reload();
									},2000);

								}
								else if(data == 3){
									$("#response").html('Diese Email-Adresse kennen wir nicht!').css('display', 'block');
									setTimeout(function(){
										location.reload();
									},2000);

								}
							}

					});
				} else {
					email.css({border: "2px solid #dc3545"}); // red
				}


			});
		});
