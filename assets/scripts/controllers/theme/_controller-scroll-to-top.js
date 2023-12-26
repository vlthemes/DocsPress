/***********************************************
 * THEME: SCROLL TO TOP
 ***********************************************/
(function ($) {

	'use strict';

	const $backToTopBtn = $('.vlt-site-back-to-top');

	if (!$backToTopBtn.length) {
		return;
	}

	// Back to top
	$backToTopBtn.on('click', function (e) {
		e.preventDefault();
		setTimeout(function () {
			window.scrollTo({
				top: 0,
				behavior: 'smooth',
			});
		}, 2);
	});

	function _show_btn() {
		$backToTopBtn.removeClass('is-hidden').addClass('is-visible');
	}

	function _hide_btn() {
		$backToTopBtn.removeClass('is-visible').addClass('is-hidden');
	}

	_hide_btn();

	VLTJS.throttleScroll(function (type, scroll) {
		const offset = VLTJS.window.outerHeight() + 100;
		if (scroll > offset) {
			if (type === 'down') {
				_hide_btn();
			} else if (type === 'up') {
				_show_btn();
			}
		} else {
			_hide_btn();
		}
	});

})(jQuery);