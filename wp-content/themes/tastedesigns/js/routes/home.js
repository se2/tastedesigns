import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initHome();
    s.initCover();
    s.initFeaturedProject();
  },
  initHome() {
    let e = this.elements;

    e.$window = $(window);
    e.$root = $('html, body');
    e.$scroll = $('.js-scroll');
    e.$gallery = $('.js-project-gallery');
    e.$galleryItem = $('.js-project-gallery-item');
  },
  initCover() {
    let s = this;
    let e = s.elements;

    e.$scroll.click(function() {
      let height = e.$window.height();

      e.$root.animate({
        scrollTop: height
      }, 1000);
    });
  },
  initFeaturedProject() {
    let s = this;
    let e = s.elements;

    e.$gallery.slick({
      infinite: false,
      autoplay: true,
      autoplaySpeed: 5000,
      rows: 0,
      arrows: false,
      speed: 1000,
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
      pauseOnFocus: false,
      pauseOnHover: false,
      pauseOnDotsHover: false,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            centerMode: true,
            centerPadding: '10px',
          }
        },
      ],
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
