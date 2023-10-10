function uuid() {
    const uuidPattern = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx';
    let timestamp = new Date().getTime();

    return uuidPattern.replace(/[xy]/g, function (char) {
        const randomValue = (timestamp + Math.random() * 16) % 16 | 0;
        timestamp = Math.floor(timestamp / 16);

        let generatedChar;
        if (char === 'x') {
            generatedChar = randomValue;
        } else {
            generatedChar = (randomValue & 0x3 | 0x8);
        }

        return generatedChar.toString(16);
    });
}

const MediaSelect = {
    main: function (element) {
        this.element = document.querySelector(element);
        this.value = this.element.value;
        this.selected = [];
        const self = this;

        if (this.value === '') this.element.setAttribute('value', JSON.stringify([]));

        $('#selectMedia').on('show.bs.modal', function (e) {
            setTimeout(() => {
                self.mediaSelectInputs = document.querySelectorAll('.media-select');

                self.mediaSelectInputs.forEach(input => {
                    let key = input.getAttribute('key');
                    let medias = JSON.parse(self.element.getAttribute('value'));

                    if (medias.includes(key)) {
                        input.checked = true;
                    }
                });

                self.mediaSelectInputs.forEach(elem => {
                    elem.addEventListener('change', e => {
                        let key = e.target.getAttribute('key');
                        if (e.target.checked) {
                            self.selected.push(key);
                        } else {
                            self.selected = self.arrayRemove(self.selected, key);
                        }
                        self.element.setAttribute('value', JSON.stringify(self.selected));
                        console.log(self.element.value);
                    });
                });
            }, 300);
        });
        this.element.style.display = 'none';
        this.element.style.opacity = '0';
    },

    arrayRemove: function (array, value) {
        return array.filter(elem => {
            return elem !== value;
        });
    }
};