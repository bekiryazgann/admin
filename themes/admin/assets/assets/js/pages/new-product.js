let x = new class Variant {
    variants = {
        "variants": {},
        "values": {}
    }


    constructor() {
        this.variants = JSON.parse(document.querySelector('#variants').value === '' ? '{"variants": {}, "values": {}}' : document.querySelector('#variants').value);
        this.all_variants_list = document.querySelector('#all_variants_list');
        this.variantsInput = document.querySelector('#variants');

        this.popup()
        this.valueRender()
    }

    popup() {
        let variants = {};
        this.variant_content_input = document.querySelector('input#variant_content');
        this.variants_list_canvas = document.querySelector('ul#variants_list_canvas');
        this.add_variant = document.querySelector('button#add_variant');
        this.variant_type = document.querySelector('select#variant_type');
        this.variant_type_name = document.querySelector('input#variant-type-name');

        this.variant_content_input.addEventListener('keydown', e => {
            if (e.keyCode === 13) {
                if (e.target.value !== '' && e.target.value !== ' ') {
                    variants[uuid()] = {
                        name: e.target.value,
                        color: '#000000'
                    };
                    console.log('36: ', variants)
                    render();
                    //console.log(variants)
                    e.target.value = '';
                }
            }
            e.target.value
        })

        this.add_variant.addEventListener('click', e => {
            // controls
            if (this.variant_type_name.value !== '' && this.variant_type_name.value !== ' ') {
                if (Object.entries(variants).length !== 0) {

                    let type = this.variant_type.value
                    let name = this.variant_type_name.value

                    this.variants.variants[uuid()] = {
                        metadata: {
                            type: type,
                            name: name
                        },
                        variants
                    }

                    console.log('61: ', typeof this.variants.variants)

                    this.variant_type_name.value = '';
                    this.variant_content_input.value = '';
                    variants = {};
                    document.querySelector('#closeButton')?.click();
                    render();
                    this.variants.values = {};
                    this.valueRender();
                } else {
                    toastr.error('Üzgünüz, henüz bir varyant eklenmemiştir. Lütfen bir varyant ekleyerek yeniden deneyin.', 'Varyant Eklenmemiş', {
                        closeButton: !0,
                        tapToDismiss: !1,
                        rtl: !1
                    })
                }
            } else {
                toastr.error('Lütfen geçerli bir varyant adı girerek yeniden deneyin.', 'Varyant Adı Belirtilmemiş', {
                    closeButton: !0,
                    tapToDismiss: !1,
                    rtl: !1
                })
            }
            e.preventDefault()
        })

        const self = this;

        function removeListener(e) {
            let newArray = {};
            Object.entries(variants).forEach(element => {
                if (element[0] !== e.target.dataset.remove) {
                    newArray[element[0]] = element[1];
                }
            })
            variants = newArray
            render();
        }

        function editListener(e) {
            let container = e.target.parentElement
            let element = container.querySelector('span')
            let input = container.querySelector('#input');

            element.style.display = 'none';
            input.style.display = 'block';
            input.focus();

            input.addEventListener('blur', e => {
                element.style.display = 'block';
                input.style.display = 'none';
            })

            input.addEventListener('keydown', event => {
                if (event.keyCode === 13) {
                    let newArray = {};
                    Object.entries(variants).forEach(elem => {
                        let key = elem[0];
                        let object = elem[1];
                        if (e.target.dataset.edit === key) {
                            newArray[key] = {
                                color: object.color,
                                name: event.target.value
                            }
                        } else {
                            newArray[key] = object;
                        }
                    })
                    variants = newArray;
                    render();
                }
            })
        }

        function colorListener(e) {
            let key = e.target.dataset.color
            let changedColor = e.target.value

            let newArray = {};

            Object.entries(variants).forEach(elem => {
                let elemKey = elem[0]
                let elemObject = elem[1];

                if (elemKey === key) {
                    newArray[key] = {
                        name: elemObject.name,
                        color: changedColor
                    }
                } else {
                    newArray[elemKey] = elemObject
                }
            })

            variants = newArray;
            render();
        }

        function render() {
            //console.log('liste render edildi', variants);
            let html = '';
            Object.entries(variants).forEach((val) => {
                let key = val[0]
                if (self.variant_type.value === 'option') {
                    html = html + `
                        <li class="list-group-item d-flex align-items-center">                
                            <div style="display: flex; flex-direction: column; gap: 3px" class="me-1">
                                <i class="font-small-1 fas fa-chevron-up"></i>
                                <i class="font-small-1 fas fa-chevron-down"></i>
                            </div>
                            
                            <span> ${val[1].name} </span>    
                            <input type="text" style="display: none; border: 0; width: 100%; padding: 0;" id="input" value="${val[1].name}">
                            
                            <i class="fas fa-pen ms-auto hover:brand-color cursor-pointer" data-edit="${key}"></i>
                            <i class="fas fa-trash ms-50 hover:brand-color cursor-pointer" data-remove="${key}"></i>
                        </li>
                    `;
                }

                if (self.variant_type.value === 'color') {
                    html = html + `
                        <li class="list-group-item d-flex align-items-center">                           
                            <!--
                            <div style="display: flex; flex-direction: column; gap: 3px" class="me-1">
                                <i class="font-small-1 fas fa-chevron-up"></i>
                                <i class="font-small-1 fas fa-chevron-down"></i>
                            </div>
                            -->
                            <input value="${val[1].color}" data-color="${key}" type="color" style="border: 0; width: 16px; height: 16px; padding: 0; border-color: transparent; border-radius: 20px; margin-right: 5px;" id="color">
                            
                            <span style="flex: 1;"> ${val[1].name} </span>
                            <input type="text" style="flex: 1; display: none; border: 0; width: 100%; padding: 0;" id="input" value="${val[1].name}">
                            
                            <i class="fas fa-pen ms-auto hover:brand-color cursor-pointer" data-edit="${key}"></i>
                            <i class="fas fa-trash ms-50 hover:brand-color cursor-pointer" data-remove="${key}"></i>
                        </li>
                    `;
                }
            })
            self.variants_list_canvas.innerHTML = html;

            self.variants_list_canvas.querySelectorAll('ul [data-color]').forEach(element => {
                element.addEventListener('change', colorListener)
            })

            self.variants_list_canvas.querySelectorAll('ul [data-remove]').forEach(element => {
                element.addEventListener('click', removeListener);
            })

            self.variants_list_canvas.querySelectorAll('ul [data-edit]').forEach(element => {
                element.addEventListener('click', editListener);
            })
        }
    }

    valueRender() {

        let obj = Object.entries(this.variants.variants)
        if(Object.entries(this.variants.values).length === 0){
            if (obj.length === 0) {
                this.variants.values = {};
            }

            if (obj.length === 1) {
                let obj1 = obj[0][1].variants


                let newObject = {};

                Object.entries(obj1).forEach(key1 => {
                    newObject[uuid()] = {
                        keys: [
                            key1[0],
                        ],
                        name: [
                            key1[1].name,
                        ],
                        fee: "",
                        sale_fee: "",
                        image: "",
                        stock_code: sku(),
                        stock_desi: "",
                        stock_barcode: "",
                        stock_qty: ""
                    }
                })
                this.variants.values = newObject
            }

            if (obj.length === 2) {
                let obj1 = obj[0][1].variants
                let obj2 = obj[1][1].variants


                let newObject = {};

                Object.entries(obj1).forEach(key1 => {
                    Object.entries(obj2).forEach(key2 => {
                        newObject[uuid()] = {
                            keys: [
                                key1[0],
                                key2[0],
                            ],
                            name: [
                                key1[1].name,
                                key2[1].name,
                            ],
                            fee: "",
                            sale_fee: "",
                            image: "",
                            stock_code: sku(),
                            stock_desi: "",
                            stock_barcode: "",
                            stock_qty: ""
                        }
                    })
                })
                this.variants.values = newObject
            }

            if (obj.length === 3) {
                let obj1 = obj[0][1].variants
                let obj2 = obj[1][1].variants
                let obj3 = obj[2][1].variants


                let newObject = {};

                Object.entries(obj1).forEach(key1 => {
                    Object.entries(obj2).forEach(key2 => {
                        Object.entries(obj3).forEach(key3 => {

                            newObject[uuid()] = {
                                keys: [
                                    key1[0],
                                    key2[0],
                                    key3[0],
                                ],
                                name: [
                                    key1[1].name,
                                    key2[1].name,
                                    key3[1].name,
                                ],
                                fee: "",
                                sale_fee: "",
                                image: "",
                                stock_code: sku(),
                                stock_desi: "",
                                stock_barcode: "",
                                stock_qty: ""
                            }
                        })
                    })
                })
                this.variants.values = newObject
            }
        }

        let content = '';
        let id = uuid()
        obj.forEach(elem => {
            let key = elem[0];
            let array = elem[1];

            let listElems = '';
            Object.entries(array.variants).forEach((variant, index) => {
                if (Object.entries(array.variants).length === index + 1) {
                    listElems = listElems + `
                        <li>
                            ${variant[1].name}
                        </li>
                    `
                } else {
                    listElems = listElems + `
                        <li>
                            ${variant[1].name}
                        </li>
                        <li><i style="display: block;width: 4px; height: 4px; background: #6e6b7b; border-radius: 2px;"></i></li>
                    `
                }
            })


            let html = `
                <li class="list-group-item d-flex align-items-center drag-${id}" style="width: ${this.all_variants_list.offsetWidth}px" data-key="${key}">
                    <!-- <i class="me-1 font-medium-2 fas fa-grip-lines drag-handler" data-key="${key}"></i> -->
                    <span> ${array.metadata.name}: </span>

                    <div style="flex: 1; display: flex; align-items: center; justify-content: center;">
                        <ul style="display: flex; align-items: center; list-style: none; padding: 0; gap: 10px">
                            ${listElems}
                        </ul>
                    </div>

                    <i class="fas fa-pen ms-auto hover:brand-color cursor-pointer" data-edit="${key}"></i>
                    <i class="fas fa-trash ms-50 hover:brand-color cursor-pointer" data-remove="${key}"></i>
                </li>
            `
            content = content + html;
        })

        this.all_variants_list.innerHTML = content
        this.tableRender()

        //console.log(this.variants)


        this.all_variants_list.querySelectorAll('[data-remove]').forEach(elem => {
            elem.addEventListener('click', e => {
                let obj = Object.entries(this.variants);
                let newVariants = {};

                Object.entries(obj[0][1]).forEach(item => {
                    //console.log(item);
                    if (item[0] !== e.target.dataset.remove) {
                        newVariants[item[0]] = item[1];
                    }
                })

                this.variants = {
                    variants: newVariants,
                    values: this.variants.values
                }
                //console.log(this.variants)
                this.variants.values = {};
                this.valueRender();
                this.setVariants()
            })
        })
    }

    tableRender() {
        this.variants_table = document.querySelector('#variants_table');
        this.tbody = this.variants_table.querySelector('tbody');

        let html = '';
        Object.entries(this.variants.values).forEach(elem => {

            let name = '<span style="display: flex; align-items: center">';

            Object.entries(elem[1].name).forEach((el, index) => {
                let separator = '';
                if (Object.entries(elem[1].name).length !== Number((index + 1))) {
                    separator = '<i style="display: block;width: 4px; height: 4px; background: #6e6b7b; border-radius: 2px; margin: 0 10px"></i>'
                }
                name = name + el[1] + separator;
            })
            name = name + '</span>'


            html = html + `
            <tr>
                <td><input type="checkbox" id="checkbox_item" class="form-check-input" data-checkbox="${elem[0]}"></td>
                <td> ${name} </td>
                <td><input type="text" class="form-control" data-table="${elem[0]}" name="table_fee" value="${elem[1].fee}"></td>
                <td><input type="text" class="form-control" data-table="${elem[0]}" name="table_sale_fee" value="${elem[1].sale_fee}"></td>
                <td><input type="text" class="form-control" data-table="${elem[0]}" name="table_stock_code" value="${(elem[1].stock_code === '') ? sku() : elem[1].stock_code}"></td>
                <td><input type="text" class="form-control" data-table="${elem[0]}" name="table_stock_desi" value="${elem[1].stock_desi}"></td>
                <td><input type="text" class="form-control" data-table="${elem[0]}" name="table_stock_barcode" value="${elem[1].stock_barcode}"></td>
                <td><input type="text" class="form-control" data-table="${elem[0]}" name="table_stock_qty" value="${elem[1].stock_qty}"></td>
            </tr>
        `;

            setTimeout(() => {
                new Cleave($(`[name="table_fee"][data-table="${elem[0]}"]`), {
                    numeral: !0,
                    numeralThousandsGroupStyle: "thousand",
                    delimiter: '.',
                    numeralDecimalMark: ','
                })

                new Cleave($(`[name="table_sale_fee"][data-table="${elem[0]}"]`), {
                    numeral: !0,
                    delimiters: ['.', ','],
                    numeralThousandsGroupStyle: "thousand",
                    delimiter: '.',
                    numeralDecimalMark: ','
                })
            }, 200)
            this.setVariants()
        })
        this.tbody.innerHTML = html;


        document.querySelector('table input#check_all_table').addEventListener('change', e => {
            document.querySelectorAll('table input#checkbox_item').forEach(element => {
                element.checked = e.target.checked
            })
        })


        document.querySelectorAll('input[data-table]').forEach(e => {
            e.addEventListener('keydown', event => {
                setTimeout(() => {
                    let element = event.target.parentElement.parentElement.querySelector('input[type=checkbox]')
                    if (element.checked) {
                        this.variants_table.querySelectorAll('input[type=checkbox][data-checkbox]').forEach(checkbox => {
                            if (checkbox.checked) {
                                let field = event.target.getAttribute('name').replace('table_', '');
                                let checkboxUpdate = this.variants_table.querySelector(`input[name="table_${field}"][data-table="${checkbox.dataset.checkbox}"]`);
                                this.variants.values[checkbox.dataset.checkbox][field] = event.target.value;
                                checkboxUpdate.value = event.target.value
                                this.setVariants()
                            }
                        })

                    } else {
                        let name = event.target.getAttribute('name').replace('table_', '')
                        let key = event.target.dataset.table
                        this.variants.values[key][name] = event.target.value
                        this.setVariants()
                    }
                    this.setVariants()
                }, 50)
            })
        })
    }

    setVariants() {
        setTimeout(() => {
            this.variantsInput.value = JSON.stringify(this.variants)
            console.log(JSON.stringify(this.variants));
        }, 100)
    }
}


MediaSelect.main("#product-images")

tinymce.init({
    selector: "#product-features-and-detailed-description",
    ...tinymceConfig
});
let tagMultiSelect = $("select#tags");

tagMultiSelect.select2({
    dropdownAutoWidth: !1,
    width: tagMultiSelect.width(),
    dropdownParent: tagMultiSelect.parent()
})

$("select#categories").select2({
    dropdownAutoWidth: !1,
    width: tagMultiSelect.width(),
    dropdownParent: tagMultiSelect.parent()
})

seoPreview.main(
    "#seo-preview",
    "#seo-description",
    "#seo-category-extension",
    "#seo-tag-title",
    "#seo-keywords",
    "product"
)

new Cleave($(".product-fee"), {
    numeral: !0,
    numeralThousandsGroupStyle: "thousand",

    delimiter: '.',
    numeralDecimalMark: ','
})
new Cleave($(".product-sale-fee"), {
    numeral: !0,
    numeralThousandsGroupStyle: "thousand",
    delimiter: '.',
    numeralDecimalMark: ','
});