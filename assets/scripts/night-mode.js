/***********************************************
 * INIT NIGHT MODE
 ***********************************************/
(function ($) {

	'use strict';

	if ('undefined' === typeof VLT_NIGHT_MODE) {
		return;
	}

	const $doc = $(document);

	let $html = $('html');

	function switchMode(toggle = true) {

		if (!$html || !$html.length) {
			return;
		}

		const storedState = localStorage.getItem('night-mode');
		let defaultValue = VLT_NIGHT_MODE.defaultValue;

		// Get local storage value.
		if (VLT_NIGHT_MODE.useLocalStorage && storedState) {
			defaultValue = storedState;
			// Get system color scheme.
		} else if (window.matchMedia && 'auto' === defaultValue) {
			defaultValue = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'night' : 'day';
		}

		// Toggle night mode.
		if (toggle) {
			defaultValue = 'day' === defaultValue ? 'night' : 'day';
		}

		$html.addClass('no-transition');

		// Enable Night.
		if ('night' === defaultValue) {

			$html.addClass('night-mode').trigger('vlt.night-mode');

			if (toggle) {
				localStorage.setItem('night-mode', 'night');
			}

			// Disable Night.
		} else {

			$html.removeClass('night-mode').trigger('vlt.night-mode');

			if (toggle) {
				localStorage.setItem('night-mode', 'day');
			}

		}

		// Trigger a reflow, flushing the CSS changes. This need to apply the changes from the new class added.
		// Info here - https://stackoverflow.com/questions/11131875/what-is-the-cleanest-way-to-disable-css-transition-effects-temporarily
		// eslint-disable-next-line no-unused-expressions
		if ($html[0]) {
			$html[0].offsetHeight;
		}

		$html.removeClass('no-transition');
	}

	// Call.
	switchMode(false);

	// Toggle state when switched system color scheme.
	if (window.matchMedia) {
		window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
			const storedState = localStorage.getItem('night-mode');
			const defaultValue = VLT_NIGHT_MODE.defaultValue;
			if (!(VLT_NIGHT_MODE.useLocalStorage && storedState) && 'auto' === defaultValue) {
				switchMode(false);
			}
		});
	}

	// Click on switch button.
	$doc.on('click', '.js-night-mode-trigger', function (e) {
		e.preventDefault();
		switchMode();
	});

})(jQuery);