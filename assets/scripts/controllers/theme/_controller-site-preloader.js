/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {

	'use strict';

	const $preloader = $('.animsition'),
		preloaderStyle = $preloader.data('animsition-style'); //animsition-bounce, animsition-image

	let preloaderMarkup = '';

	// check if plugin defined
	if (typeof $.fn.animsition == 'undefined' || !$preloader.length) {
		VLTJS.window.trigger('vlt.site-loaded');
		VLTJS.html.addClass('vlt-is-page-loaded');
		return;
	}

	switch (preloaderStyle) {
		case 'animsition-spinner':
			preloaderMarkup = '<span class="spinner"></span>';
			break;

		case 'animsition-image':
			preloaderMarkup = '<img src="' + VLT_LOCALIZE_DATAS.preloader_image + '" alt="preloader">';
			break;
	}

	$preloader.animsition({
		inDuration: 500,
		outDuration: 500,
		loadingParentElement: 'html',
		linkElement: 'a:not(.remove):not(.vp-pagination__load-more):not(.elementor-accordion-title):not([href="javascript:;"]):not([href="javascript:void(0);"]):not([role="slider"]):not([data-elementor-open-lightbox]):not([data-fancybox]):not([data-vp-filter]):not([target="_blank"]):not([href^="#"]):not([rel="nofollow"]):not([href~="#"]):not([href^=mailto]):not([href^=tel]):not(.sf-with-ul):not(.elementor-toggle-title)',
		loadingClass: preloaderStyle,
		loadingInner: preloaderMarkup
	});

	$preloader.on('animsition.inEnd', function () {
		VLTJS.window.trigger('vlt.site-loaded');
		VLTJS.html.addClass('vlt-is-page-loaded');
	});

})(jQuery);