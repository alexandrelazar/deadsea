(function($){
	var Classes = {
		CAROUSEL : '.carousel',
		CAROUSEL_ITEM : '.carousel-item',
		ACTIVE : '.active',
		CAROUSEL_PROMO : '.carousel-promo',
		AFTER_CAROUSEL : '.after-carousel',
		CARD : '.card',
		CARDSHADOW : '.card-shadow',
		PROMO_SLIDER : '.promo-slider',
		PROMO : '.promo',
	}

	var promoTop = $(Classes.PROMO).offset().top();
	function carouselPromoFade(){
		var carouselArray = $.makeArray($(Classes.CAROUSEL).find($(Classes.CAROUSEL_ITEM)));
		var carouselPromoArray = $.makeArray($(Classes.CAROUSEL).find($(Classes.CAROUSEL_PROMO)));
		var activeElement = $(Classes.CAROUSEL).find(Classes.ACTIVE)[0];
		var index = carouselArray.indexOf(activeElement);
		var directionalIndex = index > 0 ? index - 1 : carouselArray.length - 1;
		$(carouselPromoArray[directionalIndex]).hide();
		setTimeout(function(){
			$(carouselPromoArray[index]).fadeIn();
		}, 750);
	}
	function afterCarouselHeight(){
		var carouselHeight = $(Classes.CAROUSEL_ITEM).height();
		$(Classes.AFTER_CAROUSEL).height(carouselHeight);
	}
	function slidingPromos(){
		var windowBottom = $(document).scrollTop() + $(window).height();
		if(windowBottom > promoTop){
			$(Classes.PROMO_SLIDER).addClass('promo-slider-visible');
		}
	}
	$(window).resize(() => afterCarouselHeight());
	$(Classes.CAROUSEL).on('slid.bs.carousel', () => carouselPromoFade());
	$(document).ready(function(){
		$(this).trigger('resize');
		$(Classes.CAROUSEL).trigger('slid.bs.carousel');
		$(this).on('scroll', () => slidingPromos());
	});
	$(Classes.CARD).mouseenter(function(){
		$(this).find($(Classes.CARDSHADOW)).fadeTo(0.3, 0, function(){
			$(this).hide();
		});
	})
	.mouseleave(function(){
		$(this).find($(Classes.CARDSHADOW)).fadeTo(0.25, 0.4);
	});
})(jQuery);
