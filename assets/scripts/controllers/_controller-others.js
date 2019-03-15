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