(function () {
  function ready(callback) {
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
      callback();
    } else {
      document.addEventListener('DOMContentLoaded', callback, { once: true });
    }
  }

  ready(function () {
    var activeModal = null;
    var body = document.body;
    var lastFocusedElement = null;
    var focusableSelector = 'a[href]:not([tabindex="-1"]), button:not([disabled]):not([tabindex="-1"]), textarea:not([disabled]):not([tabindex="-1"]), input:not([type="hidden"]):not([disabled]):not([tabindex="-1"]), select:not([disabled]):not([tabindex="-1"]), [tabindex]:not([tabindex="-1"])';

    function getFocusableElements(container) {
      return Array.prototype.slice
        .call(container.querySelectorAll(focusableSelector))
        .filter(function (element) {
          return element.offsetParent !== null || element === document.activeElement;
        });
    }

    function openModal(modal) {
      if (!modal) {
        return;
      }
      closeModal();
      lastFocusedElement = document.activeElement instanceof HTMLElement ? document.activeElement : null;
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      body.classList.add('nusantara-modal-open');
      activeModal = modal;

      var focusTarget = modal.querySelector('[data-modal-autofocus]') || modal.querySelector('.nusantara-journalModal__close');
      if (focusTarget) {
        focusTarget.focus({ preventScroll: true });
      }
    }

    function closeModal() {
      if (!activeModal) {
        return;
      }
      activeModal.classList.remove('is-open');
      activeModal.setAttribute('aria-hidden', 'true');
      body.classList.remove('nusantara-modal-open');
      var toRestore = lastFocusedElement;
      activeModal = null;
      if (toRestore) {
        toRestore.focus({ preventScroll: true });
      }
      lastFocusedElement = null;
    }

    document.querySelectorAll('[data-journal-modal-trigger]').forEach(function (trigger) {
      trigger.addEventListener('click', function (event) {
        event.preventDefault();
        var targetId = trigger.getAttribute('data-journal-modal-trigger');
        if (!targetId) {
          return;
        }
        var modal = document.getElementById(targetId);
        if (modal) {
          openModal(modal);
        }
      });
    });

    document.addEventListener('click', function (event) {
      if (!activeModal) {
        return;
      }

      if (event.target.closest('[data-modal-close]')) {
        event.preventDefault();
        closeModal();
        return;
      }

      var backdrop = activeModal.querySelector('.nusantara-journalModal__backdrop');
      if (event.target === backdrop) {
        event.preventDefault();
        closeModal();
      }
    });

    document.addEventListener('keydown', function (event) {
      if (!activeModal) {
        return;
      }

      if (event.key === 'Escape') {
        closeModal();
        return;
      }

      if (event.key === 'Tab') {
        var focusable = getFocusableElements(activeModal);
        if (!focusable.length) {
          event.preventDefault();
          return;
        }

        var first = focusable[0];
        var last = focusable[focusable.length - 1];
        var active = document.activeElement;

        if (event.shiftKey) {
          if (active === first || !activeModal.contains(active)) {
            event.preventDefault();
            last.focus();
          }
        } else if (active === last) {
          event.preventDefault();
          first.focus();
        }
      }
    });
  });
})();
