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