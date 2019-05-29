import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initBlog();
    s.initSidebar();
  },
  initBlog() {
    let e = this.elements;

    e.$window = $(window);
    e.$header = $('.js-header-blog');
    e.$content = $('.js-content-blog');
    e.$sidebar = $('.js-sidebar-blog');
  },
  initSidebar() {
    let s = this;
    let e = s.elements;

    e.$window.scroll(function() {
      let winTop = e.$window.scrollTop();
      let winBottom = winTop + e.$window.height();
      let top = e.$header.offset().top;
      let height = e.$header.outerHeight();
      let sidebarBottom = e.$window.height() - (height + e.$sidebar.outerHeight());
      let bottom = e.$content.offset().top + e.$content.outerHeight() + sidebarBottom;

      if (winBottom > bottom) {
        e.$sidebar.css('top', 'auto');
        e.$sidebar.css('bottom', 0);
        e.$sidebar.removeClass('is-active');
      } else if (winTop >= top) {
        e.$sidebar.css('top', height);
        e.$sidebar.css('bottom', 'auto');
        e.$sidebar.addClass('is-active');
      } else {
        e.$sidebar.css('top', 0);
        e.$sidebar.css('bottom', 'auto');
        e.$sidebar.removeClass('is-active');
      }
    });
  },
};
