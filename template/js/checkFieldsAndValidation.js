
 //=================ОБЩИЕ ФУНКЦИИ=========================//





// таблица новый клиент
function clearForm() {

	$('.client_number').val('');
	$('.client_name').val('');
	$('.client_lastname').val('');
	$('.client_phone').val('');
	$('.client_email').val('');
	$('.client_city').val('');
	$('.client_street').val('');
	$('.client_home_number').val('');
	$('.client_birthday').val('');
	$('.search_client_alt').val('');

}

function readonlyClientFields() {

	$('.client_number').attr('readonly','readonly');
	$('.client_name').attr('readonly','readonly');
	$('.client_lastname').attr('readonly','readonly');
	$('.client_phone').attr('readonly','readonly');
	$('.client_email').attr('readonly','readonly');
	$('.client_city').attr('readonly','readonly');
	$('.client_street').attr('readonly','readonly');
	$('.client_home_number').attr('readonly','readonly');
	$('.client_birthday').attr('readonly','readonly');

}

function removeAttrReadonlyClientFields() {
	$('.client_name').removeAttr('readonly');
	$('.client_lastname').removeAttr('readonly');
	$('.client_phone').removeAttr('readonly');
	$('.client_email').removeAttr('readonly');
	$('.client_city').removeAttr('readonly');
	$('.client_street').removeAttr('readonly');
	$('.client_home_number').removeAttr('readonly');
	$('.client_birthday').removeAttr('readonly');
}






/*================ЗАКАЗЫ==================*/
// выезжающее окно с данными заказа и клиента
// проверяем поле на номер и не пустое
$('.order_online_new_and_ordered-order_price').keyup(function() {
 	var priceValue = $(this).val();
 	var depositValue = $('.order_online_new_and_ordered-order_deposit').val();

 	if(depositValue == ''){
 		depositValue = 0;
 	}
 	// если сумма цена - задаток меньше 0 то задаток слишком большой
 	var summe =  priceValue - depositValue;
 
	var regex = /^[0-9]+$/;

	if(!priceValue.match(regex) || summe < 0) {
		// подсвечиваем поля красным и деактивируем кнопку обновить заказ
		$('.order_online_new_and_ordered-order_price').css({'border':'1px solid #dc3545'});
		$('.order_online_new_and_ordered-update').attr('disabled','disabled');
		

	} else {
			$('.order_online_new_and_ordered-order_price').css({'border':'1px solid #ced4da'});
			$('.order_online_new_and_ordered-update').removeAttr('disabled');
	}

});


// проверяем поле на номер и не пустое
$('.order_online_new_and_ordered-order_deposit').keyup(function() {
 	var depositValue = $(this).val();
 	var priceValue = $('.order_online_new_and_ordered-order_price').val();

 	if(depositValue == ''){
 		depositValue = 0;
 	}

 	var summe =  priceValue - depositValue;
	var regex = /^[0-9]+$/;

	if(!depositValue.match(regex) || summe < 0 && $(this).val() != '') {
		// подсвечиваем поля красным и деактивируем кнопку обновить заказ
		$('.order_online_new_and_ordered-order_deposit').css({'border':'1px solid #dc3545'});
		$('.order_online_new_and_ordered-update').attr('disabled','disabled');

	} else {
		$('.order_online_new_and_ordered-order_deposit').css({'border':'1px solid #ced4da'});
		$('.order_online_new_and_ordered-update').removeAttr('disabled');
	}


});


// выезжающее окно с данными заказа и клиента
var order_amount = $('.order_online_new_and_ordered-order_amount');
var order_name = $('.order_online_new_and_ordered-order_name');
var order_color = $('.order_online_new_and_ordered-order_color');
var order_size = $('.order_online_new_and_ordered-order_size');
var order_link = $('.order_online_new_and_ordered-order_link');
var buttonUpdate = $('.order_online_new_and_ordered-update');
var errors = 0;
	

	// при удаление с поля контента, делаем тоже самое
	order_amount.keyup(function() {
		if($(this).val() == '') {
			errors += 1;
			$(this).css({'border':'1px solid #dc3545'});
			buttonUpdate.attr('disabled','disabled');
		} else {
			errors -= 1;
			$(this).css({'border':'1px solid #ced4da'});
			if(errors == 0) {
				buttonUpdate.removeAttr('disabled');
			}
		}

	});

	// при удаление с поля контента, делаем тоже самое
	order_name.keyup(function() {
		if($(this).val() == '') {
			errors += 1;
			$(this).css({'border':'1px solid #dc3545'});
			buttonUpdate.attr('disabled','disabled');
		} else {
			errors -= 1;
			$(this).css({'border':'1px solid #ced4da'});
			if(errors == 0) {
				buttonUpdate.removeAttr('disabled');
			}
		}

	});


	// при удаление с поля контента, делаем тоже самое
	order_color.keyup(function() {
		if($(this).val() == '') {
			errors += 1;
			$(this).css({'border':'1px solid #dc3545'});
			buttonUpdate.attr('disabled','disabled');
		} else {
			errors -= 1;
			$(this).css({'border':'1px solid #ced4da'});
			if(errors == 0) {
				buttonUpdate.removeAttr('disabled');
			}
		}

	});


	// при удаление с поля контента, делаем тоже самое
	order_size.keyup(function() {
		if($(this).val() == '') {
			errors += 1;
			$(this).css({'border':'1px solid #dc3545'});
			buttonUpdate.attr('disabled','disabled');
		} else {
			errors -= 1;
			$(this).css({'border':'1px solid #ced4da'});
			if(errors == 0) {
				buttonUpdate.removeAttr('disabled');
			}
		}

	});


	// при удаление с поля контента, делаем тоже самое
	order_link.keyup(function() {
		if($(this).val() == '') {
			errors += 1;
			$(this).css({'border':'1px solid #dc3545'});
			buttonUpdate.attr('disabled','disabled');
		} else {
			errors -= 1;
			$(this).css({'border':'1px solid #ced4da'});
			if(errors == 0) {
				buttonUpdate.removeAttr('disabled');
			}
		}

	});








