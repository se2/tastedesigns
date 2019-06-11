import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initElement();
    s.initGalleries();
  },
  initElement() {
    let e = this.elements;

    e.$window = $(window);
    e.$document = $(document);
    e.$gallery = $('.js-gallery');
  },
  initGalleries() {
    let s = this;
    let e = s.elements;

    e.$gallery.each(function() {
      let $gallery = $(this);

      s.initGallery($gallery);
    });
  },
  initGallery($gallery) {
    let s = this;
    let e = s.elements;
    let $slider = $gallery.find('.js-gallery-slider');
    let $thumbnails = $gallery.find('.js-gallery-thumbnails');
    let $items = $gallery.find('.js-gallery-item');
    let $index = $gallery.find('.js-gallery-index');
    let $images = $gallery.find('.js-gallery-image');
    let $popup = $gallery.find('.js-gallery-popup');
    let $overlay = $gallery.find('.js-gallery-overlay');
    let $close = $gallery.find('.js-gallery-close');
    let $mobileSlider = $gallery.find('.js-gallery-slider-mobile');
    let $mobileIndex = $gallery.find('.js-gallery-index-mobile');
    let $mobileImages = $gallery.find('.js-gallery-image-mobile');
    let $mobilePopup = $gallery.find('.js-gallery-popup-mobile');
    let $mobileOverlay = $gallery.find('.js-gallery-overlay-mobile');
    let $mobileClose = $gallery.find('.js-gallery-close-mobile');
    let total = $items.length;

    $slider.slick({
      infinite: false,
      rows: 0,
      arrows: false,
      speed: 1000,
      asNavFor: '.js-gallery-thumbnails',
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
    });

    $thumbnails.slick({
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
      $index.html('Image ' + s.pad(nextSlide + 1, 2) + '/' + total);
    });

    $items.click(function() {
      let $item = $(this);
      let index = $item.data('slick-index');

      $thumbnails.slick('slickGoTo', index);
    });

    $images.click(function() {
      let $image = $(this);
      let index = $image.data('index');

      $popup.addClass('is-active');
      $thumbnails.slick('slickGoTo', index);
    });

    $overlay.click(function() {
      $popup.removeClass('is-active');
    });

    $close.click(function() {
      $popup.removeClass('is-active');
    });

    $mobileSlider.slick({
      infinite: false,
      rows: 0,
      arrows: false,
      speed: 700,
      cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1)',
      touchMove: false,
    }).on('beforeChange', function(event, slick, currentSlide, nextSlide){
      $mobileIndex.html('Image ' + s.pad(nextSlide + 1, 2) + '/' + total);
    });

    $mobileImages.click(function() {
      let $image = $(this);
      let index = $image.data('index');

      $mobilePopup.addClass('is-active');
      $mobileSlider.slick('slickGoTo', index);
    });

    $mobileOverlay.click(function() {
      $mobilePopup.removeClass('is-active');
    });

    $mobileClose.click(function() {
      $mobilePopup.removeClass('is-active');
    });
  },
  pad(num, size) {
    let s = '000000000' + num;

    return s.substr(s.length - size);
  },
  finalize() {},
};
