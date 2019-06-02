
		var email = $("#email");

		$(document).ready(function(){
			$(".btn_reset_password").on("click", function(){

				if(email.val() != ""){
					email.css({border: "2px solid #19692c"}); // green

					$.ajax({
							url: 'views/passwortVergessen/passwortZurucksetzenAjax.php',
							method: 'POST',
							dataType: 'json',
							data: {
								email: email.val()
							},
							success: function(data){
								if(!data.success){
									$("#response").html(data.msg);
									$("#response").html(data.error);

								} else {
									$("#response").html(data.msg);
								}
							}

					});
				} else {
					email.css({border: "2px solid #dc3545"}); // red
				}


			});
		});

