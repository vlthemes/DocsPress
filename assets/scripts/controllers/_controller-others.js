/***********************************************
 * INIT THIRD PARTY SCRIPTS
 ***********************************************/
(function ($) {

	'use strict';

	$('.vlt-info-bar').on('click', function () {
		$(this).slideUp();
	});

	/**
	 * Add nofollow to child menu link
	 */
	$('.menu-item-has-children>a, .vlt-docspress-nav-list a').attr('rel', 'nofollow');

	VLTJS.document.on('docspress_ajax_loaded', function () {
		$('.menu-item-has-children>a, .vlt-docspress-nav-list a').attr('rel', 'nofollow');
	});

	/**
	 * Widget RSS
	 */
	$('.vlt-widget.widget_rss .rsswidget').addClass('h6');

	/**
	 * Back button
	 */
	$('.btn-go-back').on('click', function (e) {
		e.preventDefault();
		window.history.back();
	});

	/**
	 * Highlight JS
	 */
	var highlight = document.querySelectorAll("pre");
	"undefined" !== typeof hljs && highlight && [].forEach.call(highlight, function (highlight) {
		hljs.highlightBlock(highlight)
	});

	/**
	 * Fitvids
	 */
	if (typeof $.fn.fitVids !== 'undefined') {
		VLTJS.body.fitVids();
	}

	/**
	 * Widget menu
	 */
	if (typeof $.fn.superclick !== 'undefined') {

		$('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
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

	/**
	 * Fancybox
	 */
	if (typeof $.fn.fancybox !== 'undefined') {
		$.fancybox.defaults.btnTpl = {
			close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' +
				'<i class="ri-close-line"></i>' +
				'</button>',
			arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' +
				'<i class="ri-arrow-left-line"></i>' +
				'</a>',
			arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' +
				'<i class="ri-arrow-right-line"></i>' +
				'</a>',
			smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small">' +
				'<i class="ri-close-line"></i>' +
				'</button>'
		};
		$.fancybox.defaults.buttons = [
			'close'
		];
		$.fancybox.defaults.infobar = false;
		$.fancybox.defaults.transitionEffect = 'slide';
	}

})(jQuery);