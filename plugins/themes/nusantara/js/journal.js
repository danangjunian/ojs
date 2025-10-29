(function () {
  function ready(callback) {
    if (document.readyState === "complete" || document.readyState === "interactive") {
      callback();
    } else {
      document.addEventListener("DOMContentLoaded", callback, { once: true });
    }
  }

  ready(function () {
    if (!document.querySelector('.nusantara-page--journal')) {
      return;
    }

    // Tempatkan interaksi khusus beranda jurnal di sini bila diperlukan.
  });
})();
