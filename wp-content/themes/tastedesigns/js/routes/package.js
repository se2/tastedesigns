let $ = jQuery;

export default {
  elements: {},
  init() {
    let s = this;

    s.initElement();
    s.initPackage();
  },
  initElement() {
    let e = this.elements;

    e.$window = $(window);
    e.$root = $('html, body');
    e.$anchors = $('.js-service-package');
    e.$packages = $('.js-package');
  },
  initPackage() {
    let s = this;
    let e = s.elements;

    e.$anchors.click(function(event) {
      let $anchor = $(this);
      let link = $anchor.attr('href');
      let anchor = link.substring(1);
      let $package = e.$packages.filter('[data-id="' + anchor + '"]');

      if ($package.length) {
        event.preventDefault();

        let top = $package.offset().top;

        e.$root.animate({
          scrollTop: top,
        }, 1000);
      }
    });
  },
  finalize() {},
};
