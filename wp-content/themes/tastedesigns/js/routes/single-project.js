import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initSingleProject();
    s.initGallery();
  },
  initSingleProject() {
    let e = this.elements;

    e.$window = $(window);
    e.$document = $(document);
    e.$gallery = $('.js-gallery-slider');
    e.$thumbnails = $('.js-gallery-thumbnails');
  },
  initGallery() {
    let s = this;
    let e = s.elements;

    e.$gallery.slick({
      infinite: false,
      rows: 0,
      arrows: false,
    });

    e.$thumbnails.slick({
      infinite: false,
      rows: 0,
      centerMode: true,
      variableWidth: true,
      slidesToShow: 1,
    });
  },
};
