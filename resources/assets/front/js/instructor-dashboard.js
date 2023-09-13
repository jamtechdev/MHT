// instructor my course page slider
var swiper6 = new Swiper(".ins_bronze_video", {
	slidesPerView: 1,
	spaceBetween: 20,
	cssMode: true,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
	breakpoints: {
		0: {
			slidesPerView: 1,
			spaceBetween: 20,
		},
		560: {
			slidesPerView: 2,
			spaceBetween: 20,
		},
		768: {
			slidesPerView: 3, 
			spaceBetween: 24,
		},
		1366: {
			slidesPerView: 4,
		},
  	},
});