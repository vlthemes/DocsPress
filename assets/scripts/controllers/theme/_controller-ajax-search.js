/***********************************************
 * THEME: AJAX LIVE SEARCH FORM
 ***********************************************/
(function ($) {

	'use strict';

	class AjaxLiveSearchForm {

		constructor() {
			this.onInit();
			this.bindEvents();
		}

		getElements() {
			return {
				$form: $('.vlt-search-form--ajax'),
				$input: $('.vlt-search-form--ajax input[type="text"]'),
				$resultsArea: $('.vlt-search-form__results'),
				ajaxURL: VLT_LOCALIZE_DATAS.admin_ajax
			};
		}

		bindEvents() {
			this.getElements().$input.on('keyup', VLTJS.debounce(this.startSearch.bind(this), 500));
			this.getElements().$form.on('submit', function (event) {
				event.preventDefault();
			}.bind(this));
			VLTJS.document.on('click', function (event) {
				if (this.visible) {
					if ( ! event.target.classList[0].includes('vlt-search-form--ajax') ) {
						this.visible = false;
						this.getElements().$input.val('');
						this.getElements().$resultsArea.fadeOut();
						setTimeout(() => {
							this.getElements().$resultsArea.html('');
						}, 600);
					}
				}
			}.bind(this));
		}

		startSearch(event) {
			var currentInput = $(event.target),
				datas = [
					currentInput.siblings('input[name="post_type"]').val(),
					currentInput.siblings('input[name="post_taxonomy"]').val(),
					currentInput.siblings('input[name="post_term_id"]').val()
				],
				self = this;
			if (currentInput.val().length >= 3) {
				self.getElements().$resultsArea.fadeIn();
				self.runAjaxFiltering(currentInput.val(), datas);
				self.visible = true;
			} else {
				self.getElements().$resultsArea.fadeOut();
				self.visible = false;
			}
		}

		runAjaxFiltering(searchTarget, datas) {
			var self = this;
			$.ajax({
				type: 'POST',
				url: this.getElements().ajaxURL,
				data: {
					action: 'ajax-search-results',
					searchType: datas[0],
					searchTaxonomy: datas[1],
					searchTermID: datas[2],
					searchTarget: searchTarget
				},
				beforeSend: function () {
					self.getElements().$resultsArea.html(VLT_LOCALIZE_DATAS.search_loading);
				},
				success: function (data) {
					if (data.length) {
						self.getElements().$resultsArea.html(data);
					} else {
						self.getElements().$resultsArea.html(VLT_LOCALIZE_DATAS.search_no_found);
					}
				},
				error: function (request, status, error) {},
			});
		}

		onInit() {
			this.visible = false;
		}

	}

	new AjaxLiveSearchForm;

})(jQuery);