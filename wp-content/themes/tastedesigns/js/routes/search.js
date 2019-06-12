let $ = jQuery;

export default {
  elements: {},
  init() {
    let s = this;

    s.initElement();
    s.initSearch();
  },
  initElement() {
    let e = this.elements;

    e.$document = $(document);
    e.$title = $('.js-search-title');
    e.$input = $('.js-search-input');
  },
  initSearch() {
    let s = this;
    let e = s.elements;

    e.$document.on('facetwp-refresh', function() {
      e.$title.html(FWP.facets.search);
      e.$input.val(FWP.facets.search);
    });
  },
  finalize() {},
};
