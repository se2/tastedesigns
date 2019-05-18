import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initHome();
    s.initFeaturedProject();
  },
  initHome() {
    let e = this.elements;

    e.$gallery = $('.js-project-gallery');
    e.$galleryItem = $('.js-project-gallery-item');
  },
  initFeaturedProject() {
    let s = this;
    let e = s.elements;

    e.$gallery.slick({
      infinite: false,
      autoplay: true,
      autoplaySpeed: 5000,
      centerMode: true,
      centerPadding: '40px',
      rows: 0,
      arrows: false,
      speed: 1000,
      // cssEase: 'cubic-bezier(0.86, 0, 0.07, 1)',
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
    });

    e.$galleryItem.click(function() {
      let $item = $(this);
      let index = $item.data('slick-index');

      e.$gallery.slick('slickGoTo', index);
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
