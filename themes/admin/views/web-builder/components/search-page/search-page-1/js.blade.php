class Filter {
    constructor() {
        this.filterButton = document.querySelectorAll('[data-role="filters-button"]')
        this.filter = document.querySelector('[data-filter-content="true"]')

        this.filterBackdrop = this.filter.querySelector('[data-role="filter-backdrop"]')
        this.filterContent = this.filter.querySelector('[data-role="filter-content"]')

        this.filterExit = this.filter.querySelectorAll('[data-role="filter-exit"]')

        this.filterButton.forEach(e => this.eachButton(e))
        this.filterExit.forEach(elem => elem.addEventListener('click', e => this.exitFilter()))
        this.filterBackdrop.addEventListener('click', e => this.exitFilter())
        this.filterDetails = this.filterContent.querySelectorAll('[data-role="filter-detail-container"]')

        this.filterDetails.forEach(elem => this.eachDetails(elem))

        this.eachCategories();
    }

    eachButton(elem) {
        elem.addEventListener('click', e => {
            this.openFilter()
            e.preventDefault();
        })
    }

    openFilter() {
        document.querySelector('body, #root').classList.toggle('overflow-hidden')
        this.filterBackdrop.classList.toggle('translate-x-full')
        this.filterContent.classList.toggle('translate-x-full')
    }

    exitFilter(e) {
        document.querySelector('body, #root').classList.toggle('overflow-hidden')
        this.filterBackdrop.classList.add('translate-x-full')
        this.filterContent.classList.add('translate-x-full')
    }

    eachDetails(elem) {
        elem.querySelector('[data-role="filter-detail-button"]').addEventListener('click', e => {
            elem.querySelector('[data-role="filter-detail-content"]').classList.toggle('opacity-0')
            elem.querySelector('[data-role="filter-detail-content"]').classList.toggle('invisible')
        });
        elem.querySelector('[data-role="filter-detail-exit"]').addEventListener('click', e => {
            elem.querySelector('[data-role="filter-detail-content"]').classList.toggle('opacity-0');
            elem.querySelector('[data-role="filter-detail-content"]').classList.toggle('invisible');
        });
    }

    eachCategories() {
        this.categoiresContainer = this.filterContent.querySelector('[data-role="categories-container"]');
        this.categoryList = this.categoiresContainer.querySelector('ul.category-list');
        this.categoryListItems = this.categoryList.querySelectorAll('li');

        this.categoryListItems.forEach(elem => {
            if (elem.querySelector('ul')) {
                elem.querySelector('ul').classList.add('h-0');
                elem.querySelector('ul').classList.add('p-0');
                elem.querySelector('ul').classList.add('opacity-0');
                elem.querySelector('ul').classList.add('invisible');
                elem.querySelector('ul').style.paddingTop = '0';


                elem.querySelector('div').addEventListener('click', e => {
                    elem.querySelector('ul').classList.toggle('h-0');
                    elem.querySelector('ul').classList.toggle('border-t');
                    elem.querySelector('ul').classList.toggle('mt-2');
                    elem.querySelector('ul').classList.toggle('p-0');
                    elem.querySelector('ul').classList.toggle('opacity-0');
                    elem.querySelector('ul').classList.toggle('invisible');
                    elem.querySelector('div i').classList.toggle('rotate-90')

                    if (elem.querySelector('ul').classList.contains('h-0')) {
                        elem.querySelector('ul').style.paddingTop = '0px';
                    } else {
                        elem.querySelector('ul').style.paddingTop = '8px';
                    }
                })
            } else {
                elem.querySelector('div i').classList.add('hidden')
            }
        })
    }
}

let filter = new Filter();
