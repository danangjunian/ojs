(function () {
  function ready(callback) {
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
      callback();
    } else {
      document.addEventListener('DOMContentLoaded', callback, { once: true });
    }
  }

  ready(function () {
    if (typeof Swiper === 'undefined') {
      return;
    }

    var i18n = window.nusantaraSwiperI18N || { prevSlide: 'Previous slide', nextSlide: 'Next slide' };

    document.querySelectorAll('.swiper').forEach(function (container) {
      var pagination = container.querySelector('.swiper-pagination');
      var prev = container.querySelector('.swiper-button-prev');
      var next = container.querySelector('.swiper-button-next');

      // Prevent initializing twice
      if (container.swiper) {
        return;
      }

      new Swiper(container, {
        a11y: {
          prevSlideMessage: i18n.prevSlide,
          nextSlideMessage: i18n.nextSlide,
        },
        autoHeight: true,
        slidesPerView: 1,
        pagination: pagination
          ? {
              el: pagination,
              clickable: true,
            }
          : undefined,
        navigation:
          next || prev
            ? {
                nextEl: next,
                prevEl: prev,
              }
            : undefined,
      });
    });
  });
})();
