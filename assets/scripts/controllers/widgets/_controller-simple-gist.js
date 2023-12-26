/***********************************************
 * WIDGET: SIMPLE GIST
 ***********************************************/
(function ($) {

	'use strict';

	// check if plugin defined
	if (typeof $.fn.gistSimple === 'undefined') {
		return;
	}

	VLTJS.simpleGist = {
		init: function ($scope) {

			$scope = typeof $scope === 'undefined' ? VLTJS.body : $scope;

			const $gist = $scope.find('.vlt-gist-simple');

			$gist.each(function () {

				const $this = $(this),
					match = /^https:\/\/gist.github.com?.+\/(.+)/g.exec($this.data('url'));

				if (match && typeof match[1] !== 'undefined') {
					gistSimple($this, {
						id: match[1].split('#')[0],
						file: $this.data('file'),
						lines: $this.data('lines'),
						caption: $this.data('caption'),
						highlightLines: $this.data('highlight-lines'),
						showFooter: $this.data('show-footer') == 'yes' ? true : false,
						showLineNumbers: $this.data('show-line-numbers') == 'yes' ? true : false
					});
				}

			});

		}

	};

	VLTJS.window.on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/vlt-simple-gist.default',
			VLTJS.simpleGist.init
		);
	});

	VLTJS.simpleGist.init();

	VLTJS.document.on('docspress_ajax_loaded', function () {
		VLTJS.simpleGist.init();
	});

})(jQuery);