const MultiMediaSelect = {
    main: function (input, button) {
        this.button = document.querySelector(button);
        this.element = this.button.querySelector('input');
        this.value = this.element.value;
        this.selected = [];
        const self = this;
        this.selectButton = undefined;

        if (this.value === '') this.element.setAttribute('value', JSON.stringify([]));

        this.button.addEventListener('click', function (e) {
            self.selectButton = e.target.dataset.key;
            self.element = document.querySelector('input[data-inputid="' + self.selectButton + '"]')
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
                        self.mediaSelectInputs.forEach(input => {
                            if (input !== elem){
                                input.checked = false
                            }
                        })

                        let key = e.target.getAttribute('key');
                        if (e.target.checked) {
                            self.selected = [];
                            self.selected.push(key);
                        } else {
                            self.selected = self.arrayRemove(self.selected, key);
                        }
                        self.element.setAttribute('value', JSON.stringify(self.selected));

                        $('#selectMedia').on('hide.bs.modal', () => {
                            self.selected = [];
                            self.selectButton = undefined;
                        })
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

(function () {
    let newSlideButton = document.querySelector('#newSlide');

    $(document).on('click', '#sliderDelete', (e) => {
        $('#containerElement[data-id="'+ e.target.dataset.key +'"]').remove();
    });

    newSlideButton.addEventListener('click', () => addElement())

    const addElement = () => {
            let appendElement = $('#appendElement');
            let id = uuid();
            appendElement.append(`
            <div class="col-12 row" style="gap: 20px 0" id="containerElement" data-id="${id}">
                <div style="padding-left: calc(var(--bs-gutter-x) * .5); width: 100%">
                    <hr>
                </div>
              
                <div class="col-2">
                    <span class="form-label"> Görsel <span class="text-muted"> Masaüstü İçin </span> </span>
                    <button type="button"
                            class="btn btn-outline-primary text-primary"
                            data-bs-toggle="modal"
                            data-key="desktop_${id}"
                            data-buttonId="desktop_${id}"
                            data-bs-target="#selectMedia"
                            aria-controls="selectMedia">
                        <input type="hidden" id="slider_image_desktop_${id}" name="slider[${id}][slider_image_desktop]"
                            data-inputId="desktop_${id}">
                        Medyayı Kullan
                    </button>
                </div>
                <div class="col-2">
                    <span class="form-label"> Görsel <span class="text-muted"> Telefon İçin </span></span>
                    <button type="button"
                            class="btn btn-outline-primary text-primary"
                            data-bs-toggle="modal"
                            data-key="mobile_${id}"
                            data-buttonId="mobile_${id}"
                            data-bs-target="#selectMedia"
                            aria-controls="selectMedia">
                            
                    <input type="hidden" id="slider_image_mobile_${id}" name="slider[${id}][slider_image_mobile]" 
                            data-inputId="mobile_${id}">
                        Medyayı Kullan
                    </button>
                </div>
                <div class="col-4">
                    <span class="form-span"> Açıklama </span>
                    <input type="text" name="slider[${id}][slider_description]" class="form-control" placeholder="Açıklama" id="slider_description">
                </div>
                <div class="col-2">
                    <span class="form-label"> Bağlantı </span>
                    <input type="text" name="slider[${id}][slider_link]" class="form-control" placeholder="https://socore.net" id="slider_link">
                </div>
                <div class="col-2 d-flex align-items-end">
                    <button class="btn btn-danger w-100" type="button" id="sliderDelete" data-key="${id}">
                        <i class="fas fa-trash"></i>
                        <span> Sil </span>
                    </button>
                </div>
                <div class="col-2">
                    <div class="form-check form-check-primary form-switch">
                        <input type="checkbox" checked="" class="form-check-input no-size" id="slide_active" name="slider[${id}][slide_active]">
                        <span class="form-label"> Aktif </span>
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-check form-check-primary form-switch">
                        <input type="checkbox" class="form-check-input no-size" id="slide_target" name="slider[${id}][slide_target]">
                        <span class="form-label"> Bağlantıyı Yeni Sekmede Aç </span>
                    </div>
                </div>
            </div>`)
            MultiMediaSelect.main(`#slider_image_mobile_${id}`, `[data-key="mobile_${id}"]`, id)
            MultiMediaSelect.main(`#slider_image_desktop_${id}`, `[data-key="desktop_${id}"]`, id)
    }
})()