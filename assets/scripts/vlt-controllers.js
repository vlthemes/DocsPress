/***********************************************
 * Header default
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superfish == 'undefined') {
		return;
	}

	$('.vlt-default-navigation ul.sf-menu').superfish({
		delay: 0,
		speed: 300,
		speedOut: 300,
		cssArrows: false,
		animation: {
			opacity: 'show',
			visibility: 'visible'
		},
		animationOut: {
			opacity: 'hide',
			visibility: 'hidden'
		}
	});

})(jQuery);

/***********************************************
 * Header mobile
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	var menu = $('.vlt-mobile-navigation');

	menu.find('ul.sf-menu').superclick({
		delay: 300,
		cssArrows: false,
		animation: {
			opacity: 'show',
			height: 'show'
		},
		animationOut: {
			opacity: 'hide',
			height: 'hide'
		},
	});

})(jQuery);
/***********************************************
 * Init third party scripts
 ***********************************************/
(function($) {

	'use strict';

	// Fitvids
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids();
	}

	// Widget menu
	if (typeof $.fn.superclick !== 'undefined') {
		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
			delay: 500,
			cssArrows: false,
			animation: {
				opacity: 'show',
				height: 'show'
			},
			animationOut: {
				opacity: 'hide',
				height: 'hide'
			},
		});
	}

	// Remove p / br tags from contact form 7
	$('.wpcf7-form').find('p').contents().unwrap();
	$('.wpcf7-form').find('p, br').remove();

	// Fast click
	if (typeof FastClick === 'function') {
		FastClick.attach(document.body);
	}

	// Fancybox
	if (typeof $.fn.fancybox !== 'undefined') {

		$.fancybox.defaults.animationEffect = 'fade';
		$.fancybox.defaults.infobar = false;

		$('.wp-block-image a:has(img)').fancybox({
			buttons: [
				'close'
			],
			btnTpl: {
				close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' +
					'<span>✕</span>' +
					'</button>'
			}
		});

		$('.vlt-subscribe-form-toggle').fancybox({
			buttons: [
				'close'
			],
			btnTpl: {
				smallBtn: '<button data-fancybox-close class="fancybox-button fancybox-close-small">' +
					'<span>✕</span>' +
					'</button>'
			}
		});
	}

})(jQuery);
/***********************************************
 * Preloader
 ***********************************************/
(function($) {

	'use strict';

	VLTJS.window.on('load', function() {
		VLTJS.window.trigger('vlt.preloader_done');
		VLTJS.html.addClass('vlt-is-page-loaded');
	});

})(jQuery);
/***********************************************
 * Scroll to top
 ***********************************************/
(function($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.scrollTo == 'undefined') {
		return;
	}

	VLTJS.window.on('scroll', function() {
		if (VLTJS.window.scrollTop() > 100) {
			$('.vlt-back-to-top').removeClass('hidden').addClass('visible');
		} else {
			$('.vlt-back-to-top').removeClass('visible').addClass('hidden');
		}
	});

	VLTJS.document.on('click', '.vlt-back-to-top', function(e) {
		e.preventDefault();
		VLTJS.html.scrollTo(0, 500);
	});

})(jQuery);