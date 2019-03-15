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