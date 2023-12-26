/***********************************************
 * HEADER: MENU MOBILE
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.superclick == 'undefined') {
		return;
	}

	VLTJS.menuMobile = {
		init: function () {
			const $menu = $('.vlt-nav--mobile');

			$menu.find('ul.sf-menu').superclick({
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

		}
	};

	VLTJS.menuMobile.init();

})(jQuery);