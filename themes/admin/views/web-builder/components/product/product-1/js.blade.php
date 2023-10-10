new class Counter {
    constructor() {
        this.dataCounter = document.querySelector('[data-counter="true"]');
        this.count = 1;
        this.btnMinus = this.dataCounter.querySelector('button[data-role="minus"]');
        this.btnPlus = this.dataCounter.querySelector('button[data-role="plus"]');
        this.input = this.dataCounter.querySelector('input[data-input="true"]');
        this.input.value = this.count;
        this.input.addEventListener('keyup', this.handleInputKeyup.bind(this));
        this.btnMinus.addEventListener('click', this.handleMinusClick.bind(this));
        this.btnPlus.addEventListener('click', this.handlePlusClick.bind(this));
        this.maxLenght = this.dataCounter.dataset.maxlenght;
    }

    handleInputKeyup(event) {
        if (/[^0-9]/.test(event.target.value)) {
            this.input.value = this.count;
        } else {
            this.count = this.input.value
        }
    }

    handleMinusClick() {
        if (Number(this.count) !== 1) {
            this.count--;
            this.input.value = this.count;
        }
    }

    handlePlusClick() {
        if (Number(this.count) !== Number(this.maxLenght)){
            this.count++;
            this.input.value = this.count;
        }
    }
}

new class Tab {
    constructor() {
        this.container = document.querySelector('body');
        this.tabLinks = this.container.querySelectorAll('[data-tablink]');
        this.tabContents = this.container.querySelectorAll('[data-tabcontent]');

        this.tabLinks.forEach((tabLink) => {
            tabLink.addEventListener('click', () => {
                this.openTab(tabLink.dataset.tablink);
            });
        });

        this.openTab(this.tabLinks[0].dataset.tablink);
    }

    openTab(tabName) {
        this.tabContents.forEach((tabContent) => {
            if (Number(tabContent.dataset.tabcontent) === Number(tabName)) {
                tabContent.classList.add('block');
                tabContent.classList.remove('hidden');
            } else {
                tabContent.classList.add('hidden');
                tabContent.classList.remove('block');
            }
        });

        this.tabLinks.forEach((tabLink) => {
            if (tabLink.dataset.tablink === tabName) {
                tabLink.classList.add('bg-white', 'border-blue-500', 'text-blue-500');
                tabLink.classList.remove('border-transparent');
            } else {
                tabLink.classList.remove('bg-white', 'border-blue-500', 'text-blue-500');
                tabLink.classList.add('border-transparent');
            }
        });

    }
}

new Swiper("#product-image-slide", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

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
            slidesPerView: 5,
            spaceBetween: 20,
        },
    },
});
