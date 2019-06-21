let $ = jQuery;

export default {
  elements: {},
  init() {
    let s = this;

    s.initCommon();
    s.initMenu();
    s.initContactForm();
  },
  initCommon() {
    let e = this.elements;

    e.$window = $(window);
    e.$menu = $('.js-menu');
    e.$menuDecoy = $('.js-menu-decoy');
    e.$menuTrigger = $('.js-menu-trigger');
    e.$submenu = $('.menu-item-has-children');
    e.$submenuLink = $('.menu-item-has-children > a');
    e.$searchTrigger = $('.js-search-trigger');
    e.$searchClose = $('.js-search-close');
    e.$searchForm = $('.js-search-form');
    e.$searchInput = $('.js-search-input');
    e.$html = $('html');
    e.$form = $('.js-form');
    e.$formClose = $('.js-form-close');
    e.$formOpen = $('a[href="#work-with-taste"]');
  },
  initMenu() {
    let s = this;
    let e = s.elements;

    e.$menuTrigger.click(function(event) {
      event.preventDefault();

      e.$menu.toggleClass('is-active');
      e.$menuDecoy.toggleClass('is-active');
    });

    e.$menuDecoy.click(function() {
      e.$menu.toggleClass('is-active');
      e.$menuDecoy.toggleClass('is-active');
    });

    e.$submenuLink.click(function(event) {
      event.preventDefault();

      let $link = $(this);
      let $menu = $link.parent();
      let minHeight = $link.outerHeight();

      if ($link.hasClass('is-active')) {
        $menu.css('height', minHeight);
        $link.removeClass('is-active');
      } else {
        let $childMenu = $menu.children('.sub-menu');
        let maxHeight = minHeight + $childMenu.outerHeight();

        $menu.css('height', maxHeight);
        $link.addClass('is-active');
      }
    });

    e.$window.resize(function() {
      e.$submenu.each(function() {
        let $menu = $(this);
        let $link = $menu.children('a');
        let minHeight = $link.outerHeight();

        if (!$link.hasClass('is-active')) {
          $menu.css('height', minHeight);
        } else {
          let $childMenu = $menu.children('.sub-menu');
          let maxHeight = minHeight + $childMenu.outerHeight();

          $menu.css('height', maxHeight);
        }
      });
    });

    e.$searchInput.focus(function() {
      e.$searchInput.select();
    });

    e.$searchTrigger.click(function(event) {
      event.preventDefault();
      e.$searchForm.addClass('is-active');
      e.$searchInput.focus();
    });

    e.$searchClose.click(function() {
      e.$searchForm.removeClass('is-active');
    });
  },
  initContactForm() {
    let s = this;
    let e = s.elements;

    e.$formClose.click(function() {
      e.$form.removeClass('is-active');
      e.$html.removeClass('is-freeze');
    });

    e.$formOpen.click(function(event) {
      event.preventDefault();

      e.$form.addClass('is-active');
      e.$html.addClass('is-freeze');
    });
  },
  finalize() {
    let s = this;
    let e = s.elements;

    setTimeout(function() {
      e.$window.resize();
      e.$window.scroll();
    }, 300);
  },
};
