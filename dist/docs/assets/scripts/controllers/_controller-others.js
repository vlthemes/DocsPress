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
		$().fancybox({
			selector: '.wp-block-image > a',
			animationEffect: 'fade',
			infobar: false,
			clickContent: function(current, event) {
				return false;
			},
			buttons: [
				'close'
			],
			btnTpl: {
				close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' +
					'<span><i class="icofont icofont-close"></i></span>' +
					'</button>'
			}
		});
	}

})(jQuery);