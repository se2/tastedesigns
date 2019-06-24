import $ from 'jquery';

export default {
  elements: {},
  init() {
    let s = this;

    s.initHome();
    s.initCover();
    s.initFeaturedProject();
    s.initStayConnected();
  },
  initHome() {
    let e = this.elements;

    e.$window = $(window);
    e.$root = $('html, body');
    e.$scroll = $('.js-scroll');
    e.$gallery = $('.js-project-gallery');
    e.$galleryItem = $('.js-project-gallery-item');
    e.$instagram = $('.js-instagram');
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
      autoplaySpeed: 5000,
      rows: 0,
      arrows: true,
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
            arrows: false,
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
  initStayConnected() {
    let s = this;

    $.ajax({
      type: 'POST',
      url: '/wp-admin/admin-ajax.php',
      data: ({
        action: 'get_latest_insta_photo',
      }),
      success: function(result) {
        if (result) {
          let data = JSON.parse(result);

          s.assignPhoto(data);
        }
      },
      error: function(jqXHR, exception) {
        console.error(jqXHR.status, jqXHR.responseText);
      }
    });
  },
  assignPhoto(data) {
    let s = this;
    let e = s.elements;

    if (data && data.length) {
      let img = '<img class="c-stay-connected__instagram-cover w-full h-full" src="' + data[0].image_url + '" />';

      e.$instagram.html(img);
    }
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
