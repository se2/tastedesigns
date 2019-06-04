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
    e.$items = $('.js-gallery-item');
    e.$index = $('.js-gallery-index');
    e.$images = $('.js-gallery-image');
    e.$popup = $('.js-gallery-popup');
    e.$overlay = $('.js-gallery-overlay');
    e.$close = $('.js-gallery-close');
    e.$mobileGallery = $('.js-gallery-slider-mobile');
    e.$mobileIndex = $('.js-gallery-index-mobile');
    e.$mobileImages = $('.js-gallery-image-mobile');
    e.$mobileIndex = $('.js-gallery-index-mobile');
    e.$mobilePopup = $('.js-gallery-popup-mobile');
    e.$mobileOverlay = $('.js-gallery-overlay-mobile');
    e.$mobileClose = $('.js-gallery-close-mobile');
  },
  initGallery() {
    let s = this;
    let e = s.elements;
    let total = e.$items.length;

    e.$gallery.slick({
      infinite: false,
      rows: 0,
      arrows: false,
      speed: 1000,
      asNavFor: '.js-gallery-thumbnails',
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
    });

    e.$thumbnails.slick({
      infinite: false,
      rows: 0,
      centerMode: true,
      variableWidth: true,
      slidesToShow: 1,
      speed: 1000,
      asNavFor: '.js-gallery-slider',
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
      touchMove: false,
    }).on('beforeChange', function(event, slick, currentSlide, nextSlide){
      e.$index.html('Image ' + s.pad(nextSlide + 1, 2) + '/' + total);
    });

    e.$items.click(function() {
      let $item = $(this);
      let index = $item.data('slick-index');

      e.$thumbnails.slick('slickGoTo', index);
    });

    e.$images.click(function() {
      let $image = $(this);
      let index = $image.data('index');

      e.$popup.addClass('is-active');
      e.$thumbnails.slick('slickGoTo', index);
    });

    e.$overlay.click(function() {
      e.$popup.removeClass('is-active');
    });

    e.$close.click(function() {
      e.$popup.removeClass('is-active');
    });

    e.$mobileGallery.slick({
      infinite: false,
      rows: 0,
      arrows: false,
      speed: 700,
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
      touchMove: false,
    }).on('beforeChange', function(event, slick, currentSlide, nextSlide){
      e.$mobileIndex.html('Image ' + s.pad(nextSlide + 1, 2) + '/' + total);
    });

    e.$mobileImages.click(function() {
      let $image = $(this);
      let index = $image.data('index');

      e.$mobilePopup.addClass('is-active');
      e.$mobileGallery.slick('slickGoTo', index);
    });

    e.$mobileOverlay.click(function() {
      e.$mobilePopup.removeClass('is-active');
    });

    e.$mobileClose.click(function() {
      e.$mobilePopup.removeClass('is-active');
    });
  },
  pad(num, size) {
    let s = '000000000' + num;

    return s.substr(s.length - size);
  },
};
