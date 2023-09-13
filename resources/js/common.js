// Image loadz
window.lozad = require("lozad");
require("intersection-observer");
window.imageObserver = {};
document.addEventListener("DOMContentLoaded", function () {
    // Initialize library
    window.imageObserver = lozad(".lazy", {
        threshold: 0.1,
        enableAutoReload: true,
        load: function (el) {
            el.src = el.dataset.src;
            el.onload = function () {
                el.classList.add("md-fade");
            };
        },
    });

    var videoObserver = lozad(".lazy-video", {
        threshold: 0.1,
    });

    var backgroundObserver = lozad(".lozad-background", {
        threshold: 0.1,
    });

    window.imageObserver.observe();
    videoObserver.observe();
    backgroundObserver.observe();
});
