let $ = jQuery;

export default {
  elements: {},
  init() {
    let s = this;

    s.initElement();
    s.initVideo();
  },
  initElement() {
    let e = this.elements;

    e.$window = $(window);
    e.$document = $(document);
    e.$video = $('.js-video');
  },
  initVideo() {
    let s = this;
    let e = s.elements;

    e.$video.each(function() {
      let $video = $(this);
      let $play = $video.children('.js-video-play');
      let video = $video.children('iframe').get(0);

      $play.click(function() {
        $play.addClass('is-hidden');
        video.src += '&autoplay=1';
      });
    });
  },
  finalize() {},
};
