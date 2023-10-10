new Swiper("#product-per-view", {
    spaceBetween: 30,
    breakpoints: {
        100: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        640: {
            slidesPerView: 20,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 30,
            spaceBetween: 40,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 20,
        },
    },
});
