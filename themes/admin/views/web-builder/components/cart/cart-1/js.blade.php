new class Cart{
    constructor() {
        this.cartButton = document.querySelectorAll('[data-cart-button="true"]')
        this.cart = document.querySelector('[data-cart-content="true"]')

        this.cartBackdrop = this.cart.querySelector('[data-role="cart-backdrop"]')
        this.cartContent = this.cart.querySelector('[data-role="cart-content"]')

        this.cartExit = this.cart.querySelectorAll('[data-role="cart-exit"]')

        this.cartButton.forEach(e => this.eachButton(e))
        this.cartExit.forEach(elem => elem.addEventListener('click', e => this.exitCart()))
        this.cartBackdrop.addEventListener('click', e => this.exitCart())
    }

    eachButton(elem) {
        elem.addEventListener('click', e => {
            this.cartBackdrop.classList.toggle('translate-x-full')
            this.cartContent.classList.toggle('translate-x-full')
            document.querySelector('#root').classList.toggle('overflow-hidden')
        })
    }

    exitCart(){
        this.cartBackdrop.classList.add('translate-x-full')
        this.cartContent.classList.add('translate-x-full')
        document.querySelector('#root').classList.remove('overflow-hidden')
    }
}

class Counter {
    constructor(element) {
        this.dataCounter = element
        this.btnMinus = this.dataCounter.querySelector('button[data-role="minus"]')
        this.btnPlus = this.dataCounter.querySelector('button[data-role="plus"]')
        this.input = this.dataCounter.querySelector('input[data-input="true"]')
        this.count = this.input.value
        this.input.addEventListener('keyup', this.handleInputKeyup.bind(this))
        this.btnMinus.addEventListener('click', this.handleMinusClick.bind(this))
        this.btnPlus.addEventListener('click', this.handlePlusClick.bind(this))
        this.maxLenght = this.dataCounter.dataset.maxlength
    }

    handleInputKeyup(event) {
        if (/[^0-9]/.test(event.target.value)) {
            this.input.value = this.count
        } else {
            if (Number(this.input.value) === 0){
                this.input.value = this.count
            } else {
                this.count = this.input.value
            }
        }
    }

    handleMinusClick() {
        if (Number(this.count) !== 1) {
            this.count--
            this.input.value = this.count
        }
    }

    handlePlusClick() {
        if (Number(this.count) !== Number(this.maxLenght)) {
            this.count++
            this.input.value = this.count
        }
    }
}

const counters = document.querySelectorAll('[data-counter="true"]')
counters.forEach((counter) => {
    new Counter(counter)
})