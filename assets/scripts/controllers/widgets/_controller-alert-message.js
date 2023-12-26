/***********************************************
 * WIDGET: ALERT MESSAGE
 ***********************************************/
(function ($) {

	'use strict';

	VLTJS.alertMessage = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $alertMessage = $scope.find('.vlt-alert-message');

			$alertMessage.each(function () {
				const $this = $(this);
				$this.on('click', '.vlt-alert-message__dismiss', function (e) {
					e.preventDefault();
					$this.fadeOut(500);
				});
			});

		}
	}

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-alert-message.default',
			VLTJS.alertMessage.init
		);
	});

	VLTJS.alertMessage.init();

	VLTJS.document.on('docspress_ajax_loaded', function () {
		VLTJS.alertMessage.init();
	});

})(jQuery);