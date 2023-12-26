/***********************************************
 * VLThemes
 ***********************************************/

'use strict';

/**
 * Initialize main helper object
 */
var VLTJS = {
	window: jQuery(window),
	document: jQuery(document),
	html: jQuery('html'),
	body: jQuery('body'),
	is_safari: /^((?!chrome|android).)*safari/i.test(navigator.userAgent),
	is_firefox: navigator.userAgent.toLowerCase().indexOf('firefox') > -1,
	is_chrome: /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor),
	is_ie10: navigator.appVersion.indexOf('MSIE 10') !== -1,
	transitionEnd: 'transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd',
	animIteration: 'animationiteration webkitAnimationIteration oAnimationIteration MSAnimationIteration',
	animationEnd: 'animationend webkitAnimationEnd',
	debounce: function (func, wait, immediate) {
		var timeout;
		return function () {
			var context = this, args = arguments;
			var later = function () {
				timeout = null;
				if (!immediate) func.apply(context, args);
			};
			var callNow = immediate && !timeout;
			clearTimeout(timeout);
			timeout = setTimeout(later, wait);
			if (callNow) func.apply(context, args);
		}
	}
};

/**
 * Detects whether user is viewing site from a mobile device
 */
VLTJS.isMobile = function (agent) {
	agent = agent || navigator.userAgent;
	return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(agent);
};

/**
 * Debounce resize
 */
var resizeArr = [];
var resizeTimeout;
VLTJS.window.on('load resize orientationchange', function (e) {
	if (resizeArr.length) {
		clearTimeout(resizeTimeout);
		resizeTimeout = setTimeout(function () {
			for (var i = 0; i < resizeArr.length; i++) {
				resizeArr[i](e);
			}
		}, 250);
	}
});

VLTJS.debounceResize = function (callback) {
	if (typeof callback === 'function') {
		resizeArr.push(callback);
	} else {
		window.dispatchEvent(new Event('resize'));
	}
}

/**
 * Throttle scroll
 */
var throttleArr = [];
var didScroll;
var delta = 5;
var lastScrollTop = 0;

VLTJS.window.on('load resize scroll orientationchange', function () {
	if (throttleArr.length) {
		didScroll = true;
	}
});

function hasScrolled() {

	var scrollTop = VLTJS.window.scrollTop(),
		windowHeight = VLTJS.window.height(),
		documentHeight = VLTJS.document.height(),
		scrollState = '';

	// Make sure they scroll more than delta
	if (Math.abs(lastScrollTop - scrollTop) <= delta) {
		return;
	}

	if (scrollTop > lastScrollTop) {
		scrollState = 'down';
	} else if (scrollTop < lastScrollTop) {
		scrollState = 'up';
	} else {
		scrollState = 'none';
	}

	if (scrollTop === 0) {
		scrollState = 'start';
	} else if (scrollTop >= documentHeight - windowHeight) {
		scrollState = 'end';
	}

	for (var i in throttleArr) {
		if (typeof throttleArr[i] === 'function') {
			throttleArr[i](scrollState, scrollTop, lastScrollTop, VLTJS.window);
		}
	}

	lastScrollTop = scrollTop;
}

setInterval(function () {
	if (didScroll) {
		didScroll = false;
		window.requestAnimationFrame(hasScrolled);
	}
}, 250);

VLTJS.throttleScroll = function (callback) {
	if (typeof callback === 'function') {
		throttleArr.push(callback);
	}
}

/**
 * Tippy
 */
if (typeof tippy !== 'undefined') {
	tippy.setDefaultProps({
		theme: 'vlt',
		animation: 'fade',
		delay: 500,
		hideOnClick: true,
		allowHTML: true
	});
}