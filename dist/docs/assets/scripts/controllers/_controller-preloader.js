/***********************************************
 * Preloader
 ***********************************************/
(function($) {

	'use strict';

	VLTJS.window.on('load', function() {
		VLTJS.window.trigger('vlt.preloader_done');
		setTimeout(function() {
			VLTJS.html.addClass('vlt-is-page-loaded');
		}, 500);
	});

})(jQuery);