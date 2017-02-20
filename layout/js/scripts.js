$(document).ready(function(){

	// Фиксед меню.
	$(window).scroll(function() {
		if($(this).scrollTop() >= 87 && $(this).width() > '991') { // 135-48
			//$('body').css("padding-top", "125px");
			$('#top').addClass("fixed");
		} else {
			//$('body').css("padding-top", "0");
			$('#top').removeClass("fixed");
		}
	});

	// Флиппер.
	if ($('.flip-container').length) {

		//flipper
		$('.servise__front, .close-flipp').on('click', function(){
			$(this).closest('.flip-container').toggleClass('goFlip');
		})

		$('.price-card-arrow, .price-card__button a').on('click', function(){
			$(this).closest('.flip-container').toggleClass('goFlip');
		})

		//open prev flipper
		$('.pills').on('click', function(){
			console.log(1);
			$(this).closest('.flip-container').prev('.price-card__item').addClass('goFlip');
		})
	}

	// Портфолио табы.
	if ($('#work').length) {
		var masonryGrid = $('.work__cont-list');

		masonryGrid.masonry({
			// options
			itemSelector: '.portfolio__item'
		});

		function tab(tab, cont){
			var itemTab = $(tab);
			var itemCont = $(cont);

			itemTab.click(function(){
				var self = $(this);
				var coutn = itemTab.index($(this));

				itemTab.removeClass('active');
				$(this).addClass('active');

				itemCont.removeClass('active');
				itemCont.eq(coutn).addClass('active');

				masonryGrid.masonry();
			});
		}

		tab('.work__tab-item','.work__cont-item');
	}

	// Левое меню.
	if ($('.left-menu').length) {

		$('.left-menu > .have-sub > a').on('click', function(){
			var self = $(this);

			$('.left-menu .have-sub > a').not(self).next('.sub-menu__1').slideUp();

			self.parent('.have-sub').toggleClass('active');
			self.next('.sub-menu__1').stop().slideToggle();
			$('.left-menu .have-sub > a').not(self).parent('.have-sub').removeClass('active');
		})
	}

	// AFFIX Левого меню.
	// $('.left-menu-box').affix({
	//     offset: {
	//     	top: 100,
	//     	bottom: function () {
	//         	return (this.bottom = $('.footer').outerHeight(true))
	//     	}
	//     }
 //  	});


	if ($('.fancybox').length){
		$(".fancybox").fancybox({
			prevEffect    : 'none',
			nextEffect    : 'none',
			// closeBtn    : false,
			padding: 0,
			helpers   : {
			    title : { type : 'inside' },
			    buttons : {},
				overlay: {
				  	locked: false
				}
			}
		});
	}

	// Карусель сертефикатов
 	if ($('#reviews-carousel').length){
		$('#reviews-carousel').bxSlider({
			// auto: true,
			pause: 7000,
			pager: false,
			//controls: false,
			autoHover: true,
			slideWidth: 250,
			minSlides: 3,
			maxSlides: 5,
			slideMargin: 24,
			moveSlides: 1,
			prevSelector  : ".reviews-carousel__control",
			nextSelector : ".reviews-carousel__control",
			useCSS: false
		});
	}

	// Слайдер проектов на главной странице.
	if ($('#project').length){
		$('#project').bxSlider({
			auto: false,
			pagerCustom: '#bx-pager',
			autoHover: true,
			prevSelector  : ".project_control",
			nextSelector : ".project_control",
			useCSS: false
		});
	}


	// Вопрос - Ответ.
	if ($('.fag-accordion').length) {
		function tab(tab, cont){
			var itemTab = $(tab);
			var itemCont = $(cont);

			itemTab.click(function(){
				var self = $(this);

				itemTab.not(self).next().slideUp();

				self.next().slideToggle(function(){
					self.toggleClass('active');
					itemTab.not(self).removeClass('active');
				});
			});
		}
		tab('.fag-accordion__item-head','.fag-accordion__item-text');
	}


	//http://dimsemenov.com/plugins/magnific-popup
	if ($('.open-popup-link').length) {
		$('.open-popup-link').magnificPopup({
			type:'inline',
			midClick: true
		});
	}

	//animation scroll
	// if($('.scroll').length){
	// 	$(".scroll").each(function () {
	// 	  var  block = $(this);
	// 	  $( window ).scroll(function() {

	// 	   var top = block.offset().top;
	// 	   var bottom = block.height()+top;
	// 	   top = top - $(window).height();
	// 	   var scroll_top = $(this).scrollTop();

	// 	   if( ( scroll_top > top ) && ( scroll_top < bottom ) ) {
	// 	     if( !block.hasClass( 'animated' )) {
	// 	      block.addClass( 'animated' );
	// 	     }
	// 	   } else {
	// 	     block.removeClass( 'animated' );
	// 	   }
	// 	  });
	// 	});
	// }


	// var workClickCount = 0;
	// $('#work').on('click', function() {
	// 	workClickCount++;
	// 	if(workClickCount > 15) {
	// 		yaCounter38644345.reachGoal('CLICK_TO_PORTFOLIO')
	// 	}
	// });

});
