class Accordion {
    constructor(element) {
        this.accordion = element.querySelectorAll('[data-container="true"]');
        this.addListeners();
    }

    addListeners() {
        this.accordion.forEach((e) => {
            const title = e.querySelector('[data-title="true"]');
            const content = e.querySelector('[data-content="true"]');

            title.addEventListener('click', () => {
                if (content.classList.contains('hidden')) {
                    this.hideAll();
                    content.classList.remove('hidden');
                    title.querySelector('i').style.transform = 'rotate(180deg)';
                } else {
                    content.classList.add('hidden');
                    title.querySelector('i').style.transform = 'rotate(0deg)';
                }
            });
        });
    }

    hideAll() {
        this.accordion.forEach((e) => {
            const title = e.querySelector('[data-title="true"]');
            const content = e.querySelector('[data-content="true"]');

            content.classList.add('hidden');
            title.querySelector('i').style.transform = 'rotate(0deg)';
        });
    }
}

document.querySelectorAll('[data-accordion="true"]').forEach(elem => {
    new Accordion(elem);
})