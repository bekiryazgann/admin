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
});