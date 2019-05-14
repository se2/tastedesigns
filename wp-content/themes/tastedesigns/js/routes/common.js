import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initCommon();
    s.initMenu();
  },
  initCommon() {
    let e = this.elements;

    e.$menu = $('.js-menu');
    e.$menuTrigger = $('.js-menu-trigger');
  },
  initMenu() {
    let s = this;
    let e = s.elements;

    e.$menuTrigger.click(function(event) {
      event.preventDefault();

      e.$menu.toggleClass('is-active');
    })
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
