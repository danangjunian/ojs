/**
 * Nusantara Theme interactions:
 * - Toggle mobile navigation
 * - Toggle header search panel
 * - Hide/show header based on scroll direction
 * - Close panels via Escape key/outside click
 */

(function () {
  function ready(callback) {
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
      callback();
    } else {
      document.addEventListener('DOMContentLoaded', callback, { once: true });
    }
  }

  ready(function () {
    var header = document.querySelector('.nusantara-header');
    var shell = document.querySelector('.nusantara-shell');
    var navToggle = document.querySelector('.nusantara-header__toggle');
    var nav = document.getElementById('nusantaraPrimaryNav');
    if (nav) {
      nav.setAttribute('aria-hidden', 'true');
    }
    var searchToggle = document.querySelector('.nusantara-header__searchToggle');
    var searchPanel = document.getElementById('nusantaraSearchPanel');
    var searchInput = document.getElementById('nusantaraHeaderSearch');
    var lastScrollY = window.scrollY;
    var scrollThreshold = 6;
    var navIsOpen = false;
    var DESKTOP_BREAKPOINT = 1025;

    function isDesktop() {
      return window.innerWidth >= DESKTOP_BREAKPOINT;
    }

    function updateNavFixedMetrics() {
      if (!nav) {
        return;
      }
      if (navIsOpen && isDesktop()) {
        var offset = 88;
        if (header) {
          var headerRect = header.getBoundingClientRect();
          offset = Math.max(12, Math.round(headerRect.bottom + 16));
        }
        var maxHeight = Math.max(240, Math.round(window.innerHeight - offset - 24));
        nav.style.setProperty('--nusantara-nav-fixed-top', offset + 'px');
        nav.style.setProperty('--nusantara-nav-fixed-max-height', maxHeight + 'px');
        nav.classList.add('is-fixed');
      } else {
        nav.classList.remove('is-fixed');
        nav.style.removeProperty('--nusantara-nav-fixed-top');
        nav.style.removeProperty('--nusantara-nav-fixed-max-height');
      }
    }

    function updateHeaderState(forceReveal) {
      if (!header) {
        return;
      }

      if (navIsOpen) {
        header.classList.remove('nusantara-header--hidden');
        header.classList.add('nusantara-header--revealed');
        lastScrollY = window.scrollY;
        return;
      }

      var currentScroll = window.scrollY;
      var delta = currentScroll - lastScrollY;

      if (forceReveal || currentScroll < 40) {
        header.classList.remove('nusantara-header--hidden');
        header.classList.remove('nusantara-header--revealed');
        lastScrollY = currentScroll;
        return;
      }

      if (Math.abs(delta) < scrollThreshold) {
        return;
      }

      if (delta > 0) {
        header.classList.add('nusantara-header--hidden');
        header.classList.remove('nusantara-header--revealed');
      } else {
        header.classList.remove('nusantara-header--hidden');
        header.classList.add('nusantara-header--revealed');
      }

      lastScrollY = currentScroll;
    }

    function closeNav() {
      if (!nav) {
        return;
      }
      nav.classList.remove('is-open');
      nav.setAttribute('aria-hidden', 'true');
      navIsOpen = false;
      if (navToggle) {
        navToggle.setAttribute('aria-expanded', 'false');
        navToggle.classList.remove('is-active');
      }
      shell && shell.classList.remove('nav-open');
      header && header.classList.remove('nusantara-header--menu');
      updateNavFixedMetrics();
    }

    if (navToggle && nav) {
      navToggle.addEventListener('click', function () {
        var isOpen = nav.classList.toggle('is-open');
        navToggle.setAttribute('aria-expanded', String(isOpen));
        navToggle.classList.toggle('is-active', isOpen);
        navIsOpen = isOpen;
        nav.setAttribute('aria-hidden', String(!isOpen));
        if (shell) {
          shell.classList.toggle('nav-open', isOpen);
        }
        if (header) {
          header.classList.toggle('nusantara-header--menu', isOpen);
        }
        if (header) {
          if (isOpen) {
            header.classList.remove('nusantara-header--hidden');
            header.classList.add('nusantara-header--revealed');
          } else {
            header.classList.remove('nusantara-header--hidden');
          }
        }
        updateNavFixedMetrics();
      });
    }

    function closeSearchPanel() {
      if (!searchPanel) {
        return;
      }
      searchPanel.classList.remove('is-open');
      if (searchToggle) {
        searchToggle.setAttribute('aria-expanded', 'false');
      }
    }

    if (searchToggle && searchPanel) {
      searchToggle.addEventListener('click', function () {
        var isOpen = searchPanel.classList.toggle('is-open');
        searchToggle.setAttribute('aria-expanded', String(isOpen));
        if (isOpen && searchInput) {
          setTimeout(function () {
            searchInput.focus();
          }, 120);
        }
      });
    }

    document.addEventListener('click', function (event) {
      if (navIsOpen && nav && !nav.contains(event.target) && !navToggle.contains(event.target)) {
        closeNav();
      }

      if (searchPanel && searchPanel.classList.contains('is-open')) {
        var clickedInside = searchPanel.contains(event.target);
        var toggleClicked = searchToggle && searchToggle.contains(event.target);
        if (!clickedInside && !toggleClicked) {
          closeSearchPanel();
        }
      }
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') {
        if (nav && nav.classList.contains('is-open')) {
          closeNav();
          navToggle && navToggle.focus();
        }
        closeSearchPanel();
      }
    });

    window.addEventListener(
      'scroll',
      function () {
        updateHeaderState(false);
        if (navIsOpen) {
          updateNavFixedMetrics();
        }
      },
      { passive: true }
    );
    updateHeaderState(true);

    window.addEventListener('resize', function () {
      if (!nav) {
        return;
      }
      updateNavFixedMetrics();
      if (window.innerWidth > 720 && nav.classList.contains('is-open')) {
        closeNav();
      }
    });
  });
})();
