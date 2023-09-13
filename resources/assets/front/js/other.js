require("./bootstrap");
require("./common");
require("../../../../node_modules/swiper/swiper-bundle");
require("./instructor-dashboard");
require("./jquery.validate"); // This File Is For Jquery Validation
require("./additional-methods"); // This File Is For Jquery Validation
require("../../../../node_modules/bootstrap/js/src/offcanvas");
require("../../../../node_modules/bootstrap/js/src/dropdown");
require("../../../../node_modules/bootstrap/js/src/modal");
require("../../../../node_modules/bootstrap/js/src/tab");
require("../../../../node_modules/bootstrap/js/src/collapse");

import Vue from 'vue';
window.Vue = Vue;

import ImageCropComponent from './components/ImageCropComponent.vue';

if (document.getElementById('crop_certificate')) {
    const logoUpload = new Vue({
        el: '#crop_certificate',
        components: { ImageCropComponent }
    });
}

if (document.getElementById('crop_profile_picture')) {
    const logoUpload = new Vue({
        el: '#crop_profile_picture',
        components: { ImageCropComponent }
    });
}

if (document.getElementById('crop_banner')) {
    const logoUpload = new Vue({
        el: '#crop_banner',
        components: { ImageCropComponent }
    });
}

var swiper = new Swiper(".schools_and_instructors", {
    slidesPerView: 1,
    spaceBetween: 20,
    cssMode: true,
    navigation: {
        nextEl: ".category-swiper-button-next",
        prevEl: ".category-swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
        },
    },
});

var swiper2 = new Swiper(".free_videos", {
    slidesPerView: 1,
    spaceBetween: 20,
    cssMode: true,
    navigation: {
        nextEl: ".category-swiper-button-next",
        prevEl: ".category-swiper-button-prev",
    },
    lazy: {
        loadPrevNext: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
        },
    },
});

var swiper3 = new Swiper(".recommended_for_you", {
    slidesPerView: 1,
    spaceBetween: 20,
    cssMode: true,
    navigation: {
        nextEl: ".category-swiper-button-next",
        prevEl: ".category-swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
        },
    },
});
var swiper4 = new Swiper(".bronze_videos", {
    slidesPerView: 1,
    spaceBetween: 20,
    cssMode: true,
    navigation: {
        nextEl: ".category-swiper-button-next",
        prevEl: ".category-swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
        },
    },
});
var swiper5 = new Swiper(".silver_videos", {
    slidesPerView: 1,
    spaceBetween: 20,
    cssMode: true,
    navigation: {
        nextEl: ".category-swiper-button-next",
        prevEl: ".category-swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
        },
    },
});
var swiper6 = new Swiper(".gold_videos", {
    slidesPerView: 1,
    spaceBetween: 20,
    cssMode: true,
    navigation: {
        nextEl: ".category-swiper-button-next",
        prevEl: ".category-swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1440: {
            slidesPerView: 4,
        },
    },
});

// Init Toastr
toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000,
    extendedTimeOut: 4000,
    preventDuplicates: true
};
