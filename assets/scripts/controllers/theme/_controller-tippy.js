/***********************************************
 * THEME: TIPPY
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof tippy === 'undefined') {
		return;
	}

	VLTJS.tippy = {

		init: function () {

			tippy('[data-tippy-content]:not(.copy-shortlink)');

			function copyInput(el, text) {

				const copiedTippy = tippy(el);

				$(el).on('click', function (e) {
					const copyText = $(this).attr('data-tippy-content');
					copiedTippy.setContent($(this).attr('data-clipboard-label'));
					navigator.clipboard.writeText(text).then(function () {
						copiedTippy.show();
						setTimeout(function () {
							copiedTippy.hide();
							setTimeout(function () {
								copiedTippy.setContent(copyText);
							}, 150);
						}, 2000);
					});
					return false;
				});

			}

			$('.copy-shortlink').each(function () {
				const target = $('input' + $(this).data('clipboard-target')).val();
				copyInput(this, target);
			});

		}

	};

	VLTJS.tippy.init();

	VLTJS.document.on('docspress_ajax_loaded', function () {
		VLTJS.tippy.init();
	});

})(jQuery);