let $ = jQuery;

export default {
  elements: {},
  init() {
    let s = this;

    s.initPage();
    s.initVideo();
  },
  initPage() {
    let e = this.elements;

    e.$window = $(window);
    e.$document = $(document);
    e.$play = $('.js-video-play');
    e.$video = $('.js-video iframe').get(0);
  },
  initVideo() {
    let s = this;
    let e = s.elements;

    e.$play.click(function() {
      e.$play.addClass('is-hidden');
      e.$video.src += '&autoplay=1';
    });
  },
};
