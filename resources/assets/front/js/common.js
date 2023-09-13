// Image loadz
window.lozad = require("lozad");
require("intersection-observer");
require("./E-v1"); // This File Is For Wistia Video
require("./usphone-mask"); // This File Is For Phone Input Mask
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
$(window).on("scroll", function () {
    var headerHeight = $('#header-scroll').height();
    var scroll = $(window).scrollTop();
    if (scroll >= headerHeight) {
        $("#header-scroll").addClass("maz_header_sticky");
        $(".maz__main__webcontent").css({'padding-top': headerHeight});
    } else {
        $("#header-scroll").removeClass("maz_header_sticky");
        $(".maz__main__webcontent").css({'padding-top': 0});
    }
});

// Auto Hide Alert Script
$(".alert").fadeTo(2000, 500).slideUp(500, function() {
    $(".alert").slideUp(500);
});
