/***********************************************
 * Init third party scripts
 ***********************************************/
(function($) {

	'use strict';

	// Back button
	$('.btn-go-back').on('click', function (e) {
		e.preventDefault();
		window.history.back();
	});

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

	// Fancybox
	if (typeof $.fn.fancybox !== 'undefined') {

		$.fancybox.defaults.animationEffect = 'fade';
		$.fancybox.defaults.infobar = false;

		$().fancybox({
			selector : '.wp-block-image a:has(img)',
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