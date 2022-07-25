/***********************************************
 * THEME: AJAX DEACTIVATE FORM
 ***********************************************/
(function ($) {

	'use strict';

	class AjaxDeactivateForm {

		constructor() {
			this.bindEvents();
		}

		getElements() {
			return {
				$form: $('.vlt-deactivate-form'),
				$inputs: $('.vlt-deactivate-form input[type="text"]'),
				ajaxURL: VLT_LOCALIZE_DATAS.admin_ajax,
				$resultsArea: $('.vlt-deactivate-form__result'),
			};
		}

		bindEvents() {
			this.getElements().$form.on('submit', function (event) {
				event.preventDefault();
				this.startDeactivate(event);
			}.bind(this));
		}

		startDeactivate(event) {
			var currentInput = $(event.target),
				datas = [
					currentInput.find('input[name="your_domain"]').val(),
					currentInput.find('input[name="purchase_code"]').val()
				],
				self = this;

			self.runAjaxFiltering(datas);
		}

		runAjaxFiltering(datas) {
			var self = this;
			$.ajax({
				type: 'POST',
				url: this.getElements().ajaxURL,
				data: {
					action: 'ajax-deactivate-license',
					domain: datas[0],
					purchase_code: datas[1],
					nonce: VLT_LOCALIZE_DATAS.nonce
				},
				beforeSend: function () {
					self.getElements().$resultsArea.html(VLT_LOCALIZE_DATAS.search_loading).fadeIn();
				},
				success: function (data) {
					if (data.length) {
						self.getElements().$inputs.val('');
						self.getElements().$resultsArea.html(data).fadeIn();
						setTimeout(function () {
							self.getElements().$resultsArea.fadeOut();
						}, 6000);
					}
				}
			});
		}

	}

	new AjaxDeactivateForm;

})(jQuery);