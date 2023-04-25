const swiper = new Swiper(".swiper", {
    // Default parameters
    slidesPerView: 2,
    spaceBetween: 10,
    // Responsive breakpoints
    breakpoints: {
        // when window width is >= 320px
        0: {
            slidesPerView: 1,
            spaceBetween: 20,
        },
        // when window width is >= 480px
        1080: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        // when window width is >= 640px
    },
});
