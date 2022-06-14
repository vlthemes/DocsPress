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
          if (!event.target.classList[0].includes('vlt-search-form--ajax')) {
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
          datas = [currentInput.siblings('input[name="post_type"]').val(), currentInput.siblings('input[name="post_taxonomy"]').val(), currentInput.siblings('input[name="post_term_id"]').val()],
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
        error: function (request, status, error) {}
      });
    }

    onInit() {
      this.visible = false;
    }

  }

  new AjaxLiveSearchForm();
})(jQuery);
/***********************************************
 * Header default
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof $.fn.superfish == 'undefined') {
    return;
  }

  $('.vlt-default-navigation ul.sf-menu').superfish({
    delay: 0,
    speed: 300,
    speedOut: 300,
    cssArrows: false,
    animation: {
      opacity: 'show',
      visibility: 'visible'
    },
    animationOut: {
      opacity: 'hide',
      visibility: 'hidden'
    }
  });
})(jQuery);
/***********************************************
 * Header mobile
 ***********************************************/


(function ($) {
  'use strict'; // check if plugin defined

  if (typeof $.fn.superclick == 'undefined') {
    return;
  }

  var menu = $('.vlt-mobile-navigation');
  menu.find('ul.sf-menu').superclick({
    delay: 300,
    cssArrows: false,
    animation: {
      opacity: 'show',
      height: 'show'
    },
    animationOut: {
      opacity: 'hide',
      height: 'hide'
    }
  });
})(jQuery);
/***********************************************
 * Init third party scripts
 ***********************************************/
(function ($) {
  'use strict'; // Back button

  $('.btn-go-back').on('click', function (e) {
    e.preventDefault();
    window.history.back();
  }); // Highlight JS

  var highlight = document.querySelectorAll("pre");
  "undefined" !== typeof hljs && highlight && [].forEach.call(highlight, function (highlight) {
    hljs.highlightBlock(highlight);
  }); // Fitvids

  if (typeof $.fn.fitVids !== 'undefined') {
    VLTJS.body.fitVids();
  } // Widget menu


  if (typeof $.fn.superclick !== 'undefined') {
    $('.widget_pages > ul, .widget_nav_menu ul.menu').superclick({
      delay: 500,
      cssArrows: false,
      animation: {
        opacity: 'show',
        height: 'show'
      },
      animationOut: {
        opacity: 'hide',
        height: 'hide'
      }
    });
  } // Fancybox


  if (typeof $.fn.fancybox !== 'undefined') {
    $.fancybox.defaults.animationEffect = 'fade';
    $.fancybox.defaults.infobar = false;
    $().fancybox({
      selector: '.wp-block-image a:has(img)',
      buttons: ['close'],
      btnTpl: {
        close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' + '<span>✕</span>' + '</button>'
      }
    });
    $('.vlt-subscribe-form-toggle').fancybox({
      buttons: ['close'],
      btnTpl: {
        smallBtn: '<button data-fancybox-close class="fancybox-button fancybox-close-small">' + '<span>✕</span>' + '</button>'
      }
    });
  }
})(jQuery);
/***********************************************
 * Preloader
 ***********************************************/
(function ($) {
  'use strict';

  VLTJS.window.on('load', function () {
    VLTJS.window.trigger('vlt.preloader_done');
    VLTJS.html.addClass('vlt-is-page-loaded');
  });
})(jQuery);
/***********************************************
 * Scroll to top
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof $.fn.scrollTo == 'undefined') {
    return;
  }

  VLTJS.window.on('scroll', function () {
    if (VLTJS.window.scrollTop() > 100) {
      $('.vlt-back-to-top').removeClass('hidden').addClass('visible');
    } else {
      $('.vlt-back-to-top').removeClass('visible').addClass('hidden');
    }
  });
  VLTJS.document.on('click', '.vlt-back-to-top', function (e) {
    e.preventDefault();
    VLTJS.html.scrollTo(0, 500);
  });
})(jQuery);