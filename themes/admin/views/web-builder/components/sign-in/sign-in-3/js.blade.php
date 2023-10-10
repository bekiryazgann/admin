new class OffCanvas {
    constructor() {
        this.container = document.querySelector('[data-role="off-canvas-container"]')
        this.openButton = document.querySelectorAll('[data-role="off-canvas-button"]')
        this.backdrop = this.container.querySelector('[data-role="off-canvas-backdrop"]')
        this.content = this.container.querySelector('[data-role="off-canvas-content"]')
        this.exitButton = this.container.querySelector('[data-role="off-canvas-exit"]')

        this.openButton.forEach(elem => {
            elem.addEventListener('click', e => this.toggle())
        });
        this.backdrop.addEventListener('click', e => this.toggle())
        this.exitButton.addEventListener('click', e => this.toggle())
    }

    toggle(){
        this.backdrop.classList.toggle('translate-x-full')
        this.content.classList.toggle('translate-x-full')
        document.querySelector('#root').classList.toggle('overflow-hidden')
    }
}