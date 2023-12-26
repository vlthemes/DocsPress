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
    hljs.highlightBlock(highlight);
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
      }
    });
  }
  /**
   * Fancybox
   */


  if (typeof $.fn.fancybox !== 'undefined') {
    $.fancybox.defaults.btnTpl = {
      close: '<button data-fancybox-close class="fancybox-button fancybox-button--close">' + '<i class="ri-close-line"></i>' + '</button>',
      arrowLeft: '<a data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" href="javascript:;">' + '<i class="ri-arrow-left-line"></i>' + '</a>',
      arrowRight: '<a data-fancybox-next class="fancybox-button fancybox-button--arrow_right" href="javascript:;">' + '<i class="ri-arrow-right-line"></i>' + '</a>',
      smallBtn: '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small">' + '<i class="ri-close-line"></i>' + '</button>'
    };
    $.fancybox.defaults.buttons = ['close'];
    $.fancybox.defaults.infobar = false;
    $.fancybox.defaults.transitionEffect = 'slide';
  }
})(jQuery);
/***********************************************
 * HEADER: MENU DEFAULT
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof $.fn.superfish == 'undefined') {
    return;
  }

  VLTJS.menuDefault = {
    init: function () {
      const $menu = $('.vlt-nav--default ');
      $menu.find('ul.sf-menu').superfish({
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
    }
  };
  VLTJS.menuDefault.init();
})(jQuery);
/***********************************************
 * HEADER: MENU MOBILE
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

  if (typeof $.fn.superclick == 'undefined') {
    return;
  }

  VLTJS.menuMobile = {
    init: function () {
      const $menu = $('.vlt-nav--mobile');
      $menu.find('ul.sf-menu').superclick({
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
    }
  };
  VLTJS.menuMobile.init();
})(jQuery);
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
        $resultsArea: $('.vlt-deactivate-form__result')
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
          datas = [currentInput.find('input[name="your_domain"]').val(), currentInput.find('input[name="purchase_code"]').val()],
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

  new AjaxDeactivateForm();
})(jQuery);
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
 * THEME: SCROLL TO TOP
 ***********************************************/
(function ($) {
  'use strict';

  const $backToTopBtn = $('.vlt-site-back-to-top');

  if (!$backToTopBtn.length) {
    return;
  } // Back to top


  $backToTopBtn.on('click', function (e) {
    e.preventDefault();
    setTimeout(function () {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }, 2);
  });

  function _show_btn() {
    $backToTopBtn.removeClass('is-hidden').addClass('is-visible');
  }

  function _hide_btn() {
    $backToTopBtn.removeClass('is-visible').addClass('is-hidden');
  }

  _hide_btn();

  VLTJS.throttleScroll(function (type, scroll) {
    const offset = VLTJS.window.outerHeight() + 100;

    if (scroll > offset) {
      if (type === 'down') {
        _hide_btn();
      } else if (type === 'up') {
        _show_btn();
      }
    } else {
      _hide_btn();
    }
  });
})(jQuery);
/***********************************************
 * THEME: PRELOADER
 ***********************************************/
(function ($) {
  'use strict';

  const $preloader = $('.animsition'),
        preloaderStyle = $preloader.data('animsition-style'); //animsition-bounce, animsition-image

  let preloaderMarkup = ''; // check if plugin defined

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
/***********************************************
 * THEME: TIPPY
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
  };
  VLTJS.window.on('elementor/frontend/init', function () {
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-alert-message.default', VLTJS.alertMessage.init);
  });
  VLTJS.alertMessage.init();
  VLTJS.document.on('docspress_ajax_loaded', function () {
    VLTJS.alertMessage.init();
  });
})(jQuery);
/***********************************************
 * WIDGET: SIMPLE GIST
 ***********************************************/
(function ($) {
  'use strict'; // check if plugin defined

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
    elementorFrontend.hooks.addAction('frontend/element_ready/vlt-simple-gist.default', VLTJS.simpleGist.init);
  });
  VLTJS.simpleGist.init();
  VLTJS.document.on('docspress_ajax_loaded', function () {
    VLTJS.simpleGist.init();
  });
})(jQuery);