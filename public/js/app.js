$( document ).ready(function() {

	$(document.body).on('click', '.clickable-row', function() {
      window.document.location = $(this).data("href");
  });

	$('#cardsTable').DataTable({
      stateSave: true
  });

	$('#datetimepicker').datetimepicker();

	function sticky_relocate() {
		var window_top = $(window).scrollTop();
		var div_top = $('#sticky-anchor').offset().top;
		if (window_top > div_top) {
			$('#sticky').addClass('stick');
		} else {
			$('#sticky').removeClass('stick');
		}
	}

	$(function () {
		$(window).scroll(sticky_relocate);
		sticky_relocate();
	});

	$(document.body).on('click', '.createCards', function() {
		$.blockUI({
			message: '<h3>Идет создание карт, подождите немного</><div><img src="/img/loader.gif"/></>'
		});
		$.ajax({
	    type: 'POST',
	    url: '/generatecards',
	    dataType: 'json',
	    data:
			{
				'series':$('input[name=series]').val(),
				'count':$('input[name=count]').val(),
				'activity':$('select[name=activity]').val(),
			 	'_token': $('input[name=_token]').val()
		 	},
	    success: function(data) {
				$.unblockUI();
				setTimeout(function(){
					$.growlUI('Успех', 'Все карты созданны!');
	      },1000);
				$('input[name=series]').val("");
				$('input[name=count]').val("");
	    },
	    error: function(xhr, errmsg, err) {
				$.unblockUI();
				setTimeout(function(){
					$.growlUI('Ошибка', errmsg);
	      },1000);
	    }
	  });
	});

	$(document.body).on('click', '.add', function() {
		$.ajax({
	    type: 'POST',
	    url: '/addprise',
	    dataType: 'json',
	    data:
			{
				'pay_day':$('input[name=pay_day]').val(),
				'price':$('input[name=price]').val(),
			 	'_token': $('input[name=_token]').val()
		 	},
	    success: function(data) {
				$.growlUI('Успех', 'Оплата по карте проведена!');
				$('input[name=pay_day]').val("");
				$('input[name=price]').val("");
	    },
	    error: function(xhr, errmsg, err) {
				console.log(errmsg);
				console.log(err);
				$.growlUI('Ошибка', errmsg);
	    }
	  });
	});

	$(document.body).on('click', '.editcard', function() {
		$.ajax({
	    type: 'POST',
	    url: '/editcard',
	    dataType: 'json',
	    data:
			{
				'sum':$('input[name=sum]').val(),
				'status':$('select[name=status]').val(),
			 	'_token': $('input[name=_token]').val()
		 	},
	    success: function(data) {
				$.growlUI('Успех', 'Статус изменен!');
	    },
	    error: function(xhr, errmsg, err) {
				$.growlUI('Ошибка', errmsg);
	    }
	  });
	});

});
