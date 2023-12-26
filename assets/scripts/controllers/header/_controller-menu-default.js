/***********************************************
 * HEADER: MENU DEFAULT
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superfish == 'undefined') {
		return;
	}

	VLTJS.menuDefault = {
		init: function () {
			const $menu = $('.vlt-nav--default ');

			$menu.find('ul.sf-menu').superfish({
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

		}
	};

	VLTJS.menuDefault.init();

})(jQuery);