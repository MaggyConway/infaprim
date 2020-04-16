jQuery(document).ready(function($) {

	$('.profile_card__part--right .name').click(function(event) {
		$('#modal_error_login').addClass('animate_modal');
		$('#modal_error_password').addClass('animate_modal');
	});

	//Close function
	$('.modal--background, .modal-close').click(function(){
		$('#modal_error_login').removeClass('animate_modal');
		$('#modal_error_password').removeClass('animate_modal');
	});


	//клик на тэг
	$('.elemTags li').click(function(event) {

		//$('.transition-loader').css('display', 'block');

		$(this).toggleClass('active'); 
		var activeElements = [];
		$('.elemTags li').each(function( index ) { 
			if($(this).hasClass('active')){
				activeElements.push($(this).attr('data-name'));
			}
		});

		if(activeElements.length == 0){
			$(location).attr('href','/docs/');
		}
		var json = JSON.stringify(activeElements);
		var dataPost = { 
			tags: json
		};

		$.post( "/include/filter_docs.php", dataPost,  function( data ) {

			$('.docs__box').html(' ');
			$('.docs__box').append(data);
			//из родительского блока удаляю секцию статей 
			//и вставляю новую c нужными статьями (section.articles)

			//$('.transition-loader').css('display', 'none');
		});

		event.preventDefault();

	});

	// $(document).click(function(event) {
	// 	if (!$('.itemTag').hasClass('active')) {
	// 		$(location).attr('href','/docs/');
	// 	}
	// });

	/*
	при клике на крестик в строке 
	над календариком - стирается введенное значение
	*/

	$('.calendar_close').click(function(event) {
		$('#picker_input')[0].value = '';
	});

    //
    //  Events Datepicker
    //
    var arraySelectedDays = [];
    var trueLoad = false;
    var monthName = 'Январь,Февраль,Март,Апрель,Май,Июнь,Июль,Август,Сентябрь,Октябрь,Ноябрь,Декабрь'.split(',');
    $('#picker_input').datepicker({
        onSelect: function (formattedDate, date, inst) {
        	if(formattedDate.length){
            var d = new Date();
            var n = ("0" + (parseInt(d.getMonth()) + 1)).slice(-2);
            var dateSelect = formattedDate.split('.');
           
            if(n == dateSelect[1] && trueLoad == false){ // for current month

            	// delete active class
                $('.calendar_table table td').each(function(){
                    if ( jQuery.inArray( $(this).attr('data-date'), arraySelectedDays ) >= 0){
                        $(this).removeClass('active');
                    }
                });

                arraySelectedDays.push(dateSelect[0]);
                $('.calendar_table table td').each(function(){  // add active class
                	if($(this).attr('data-date') == dateSelect[0]){
                		$(this).addClass('active');
					}
				});

			}else{
				trueLoad = true;
            	//TODO  нужен прелоадер

                $.post('/include/calendarAjax.php',  { date:  formattedDate , action: 'get' }, function (data) {
                    if (data) {
                    	// insert in table head
						$('.calendar_table .date').html(' ').text(monthName[dateSelect[1]-1]+', '+dateSelect[2]);
						//insert data in table
                    	$('.calendar_table table tbody').html(' ').append(data);
                        //console.log(data);

                    }else{
                        //console.log(data);
                    }

                });
			}
		}
        }
    });


	/*
		синхронизация классов для анимации, которая навешана на класс open
	*/
	//console.log(location.pathname);
	if (location.pathname == '/calendar/') {
		document.addEventListener("click", function(){
			if ($('.datepicker').hasClass('active')) {
				$('.picker').addClass('open');
			} else {
				$('.picker').removeClass('open');
			}

			if ($('#picker_input')[0].value == '') {
				$('.calendar_close').css('display', 'none');
			} else {
				$('.calendar_close').css('display', 'block');
			}
		});
	}

	$('.news__item__content .name').ellipsis({
	  lines: 2,
	  ellipClass: 'ellip',
	  responsive: true
	});
	$('.news__item__content p').ellipsis({
	  lines: 3,
	  ellipClass: 'ellip',
	  responsive: true
	});

	if ($('.flexbox-status-date .status').length == 0) {
		$('.flexbox-status-date .date').css('top', '20px');
		$('.center-info-grid').css({
			marginTop: '-30px',
			marginRight: '220px'
		});
	}

	if ($('.flexbox-status-date .status').length == 0 && $('.flexbox-status-date .date').length == 0) {
		$('.center-info-grid').css({
			marginTop: '20px',
			marginRight: '0px'
		});
	}

	var all_w = $(window).width();
	var wrap_w = $('.wrapper').width();
	var result_w = (all_w - wrap_w) / 2;
	var locate = location.pathname;
	var new_people_loc = location.pathname;
	locate = locate.slice(0,13);
	new_people_loc = new_people_loc.slice(0,6);
	if (locate == '/calendar/') {
		$('body').addClass('over');

		if ($('#picker_input')[0].value == '') {
			$('.calendar_close').css('display', 'none');
		} else {
			$('.calendar_close').css('display', 'block');
		}
	} else {
		$('body').removeClass('over');
	}
	if (all_w > 1300 && locate !== '/profile/' && locate !== '/adress-book/' && locate !== '/' && locate !== '/calendar/') {
		console.log(locate);
		$('.wrapper').css({
			margin: '0',
			marginLeft: result_w,
			width: wrap_w + result_w
		});

		$('header .wrapper').css({
			width: wrap_w,
			marginRight: result_w
		});

		$('.docs_image').css({
			width: $('.docs_image').width() + result_w
		});
		$('.docs_elements .element').css('margin-right', result_w);
		$('.news_image').css({
			width: $('.news_image').width() + result_w
		});
		$('.about_image').css({
			minWidth: $('.about_image').width() + result_w
		});

		$('.docs__grid').css('margin-right', result_w);
		$('.news__grid').css('margin-right', result_w);
		$('.about__clients').css('margin-right', result_w);
		$('.about__geography').css('margin-right', result_w);
		$('.about__strategy').css('margin-right', result_w);
		$('.about__values').css('margin-right', result_w);
		$('.new_people_card').css('margin-right', result_w);

		$('.detail_new .wrapper').css({
			marginRight: result_w,
			width: wrap_w
		});

		$('footer .wrapper').css({
			width: wrap_w,
			marginRight: result_w
		});

		$('.pagination').css('margin-right', result_w);
	}

	if (all_w > 1200 && locate == '/about/') {
		$('.about .wrapper').css({
			paddingRight: 0
		});

		$('.about__clients').css('margin-right', result_w);
		$('.about__geography').css('margin-right', result_w);
		$('.about__strategy').css('margin-right', result_w);
		$('.about__values').css('margin-right', result_w);
	}

	// if (new_people_loc == '/news/') {
	// 	//console.log(new_people_loc);

	// }

	//показывает при наведение на логин ссылку для выхода из аккаунта
	$('.header__lk').mouseover(function(event) {
		$('.logout').addClass('show');
	});
	$('.logout').mouseleave(function(event) {
		$(this).removeClass('show');
	});
	$('header').mouseleave(function(event) {
		$('.logout').removeClass('show');
	});

	//на некоторых страницах по макету нужен белый фон, я проверяю на урл раздела
	var loc = window.location.pathname;
	if (loc == '/about/') {
		$('body').addClass('about');
		$('.header__menu .menu__item:nth-child(5)').addClass('now');
	}

	if (loc == '/docs/') {
		$('body').addClass('docs');
	} else {
		$('body').removeClass('docs');
	}
	//достаю все дочерние элементы раздела /docs/
	loc = loc.slice(0,6); 
	//console.log(loc); //  "/docs/"
	if (loc == '/docs/') {
		$('body').addClass('docs');
		$('.header__menu .menu__item:nth-child(2)').addClass('now');
	} else {
		$('body').removeClass('docs');
	}
	//console.log(loc);
	if (loc == '/adres') {
		$('.header__menu .menu__item:first-child').addClass('now');
	}
	if (loc == '/news/') {
		$('.header__menu .menu__item:nth-child(3)').addClass('now');
	}
	if (loc == '/calen') {
		$('.header__menu .menu__item:nth-child(4)').addClass('now');
	}
	if (loc == '/profi') {
		$("#input_profile_photo").on('change', function(event) {
			alert('Фотография успешно загружена, не забудьте сохранить изменения!');
		});

		//макс.кол-во символов для полей в профиле
		var textAbout = $('.profile_card_form .about textarea');
		var textStatus = $('.profile_card_form .status textarea');

		//console.log(textStatus[0].value.length);
		if (textAbout[0].value.length > 50)
		    	$(textAbout).css('height', '210px');

		if (textStatus[0].value.length > 50)
		    	$(textStatus).css('height', '90px');


		$(textAbout).keyup(function() {
		    if (this.value.length > 300)
		        this.value = this.value.substr(0, 300);

		    if (this.value.length > 50)
		    	$(this).css('height', '210px');
		});
		$(textStatus).keyup(function() {
		    if (this.value.length > 140)
		        this.value = this.value.substr(0, 140);

		    if (this.value.length > 50)
		    	$(this).css('height', '90px');
		});
	}


	//подсветка при клике в профиле на "изменить данные"
	var change = $('.btn_change');
	var save = $('.btn_save');
	var profile_photo = $('.profile_photo');
	var uf_about = $('.about');
	var uf_status = $('.status');

	$(change).click(function(event) {
		$(this).css('display', 'none');
		$(save).css('display', 'flex');
		$(profile_photo).addClass('chg');
		$(uf_about).addClass('chg');
		$(uf_status).addClass('chg');
		$('.about textarea').removeAttr('readonly');
		$('.status textarea').removeAttr('readonly');


	});

	$('.profile_save .close').click(function(event) {
		$(this).parent('.profile_save').removeClass('show');
	});

	setTimeout(function() {
		$('.profile_save').removeClass('show');
	}, 5000);







	//выпадающие списки
	$('.select-listbox--region').select2({
		placeholder: 'Выберите регион',
		'width': '100%',
    	//allowClear: true,	
	});

	$('.select-listbox--otdel').select2({
		placeholder: 'Выберите отдел',
		'width': '100%',
    	//allowClear: true,	
	});

	$('.select2-search').click(function() {
		$(this).toggleClass('rotate');
	});

	var $page = $('html, body');
	$('.lupa').click(function() {
		$page.animate({
			scrollTop: $('.our_team h2').offset().top - 50
		}, 600);
		return false;
	});

	$("#adress-book-search").keyup(function(event){
	    if(event.keyCode == 13){
			$page.animate({
				scrollTop: $('.our_team h2').offset().top - 50
			}, 600);
			return false;	        
	    }
	});

	$(document).mouseup(function (e){ // событие по веб-документу
		var select2Search = $(".select2-search"); // тут указываем элемент
		if (!select2Search.is(e.target) // если клик был не по нашему блоку
		    && select2Search.has(e.target).length === 0) { // и не по его дочерним элементам
			//select2Search.hide(); // скрываем его
			$('.select2-search').removeClass('rotate');
		}
	});


	//слайдеры
	$('#our_team_new').slick({
		dots: false,
		arrows: true,
		infinite: false,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 2,
		responsive: [
			{
				breakpoint: 1000,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 801,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 546,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
	    ]
	});
	$('#news_another').slick({
		dots: false,
		arrows: true,
		infinite: false,
		speed: 500,
		slidesToShow: 3,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 801,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
				}
			},
			{
				breakpoint: 601,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				}
			},
	    ]
	});







	//
	  //  ajax  for page address book  select
	  //
	    $('.select-listbox--region, .select-listbox--otdel').on('select2:select', function (e) {

	        getRequestAddressBook({
	            personal_state:  $('.select-listbox--region').val(),
	            work_department: $('.select-listbox--otdel').val(),
	        });
	    });
	  //
	  //  ajax for page address book   search by last name
	  //
	    $( ".adress-book__form .select2-search   input" ).change(function() {
	        getRequestAddressBook({
	            last_name: $(this).val()
	    	});
	    });


    /*
    * Custom login
    */

    var loginForm =  $('.login_form');
    loginForm.submit(function (e) {
        loginForm.find('#error_block').remove();
        e.preventDefault();
        $.post("/include/login.php", {
                action: 'login',
                user: loginForm.find('input[name="USER_LOGIN"]').val() ,
                password: loginForm.find('input[name="USER_PASSWORD"]').val() ,
            }
            , function (data) {
                var data = JSON.parse(data);
                console.log(data);
                if(data.errors ==''){
                    $(location).attr('href','/docs/');
                }
                if(data.errors){
                    loginForm.prepend('<div id="error_block"><div id="content"><p>'+data.message+'</p></div></div>');
                    $('#error_block').fadeIn();
                }

            });
    });




}); //end of ready function


//
// Function send get request in address book
//
function getRequestAddressBook(data = null) {
    // TODO  добавить прелоадер

    $.get('/adress-book/load.php', data, function (data) {

        if (data) {
            console.log(data);
            $('.our_team__grid').html(' ') .append(data);
        }else{
            // TODO   Добавить  действие если нет данных по данному запросу   "нет данных по данному звпросу"
        }
    });
}