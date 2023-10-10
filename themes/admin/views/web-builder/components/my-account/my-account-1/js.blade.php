new class TabManager {
    constructor() {
        this.container = document.querySelector('[data-role="my-account-tab"]');
        this.navigationItems = this.container.querySelectorAll('[data-navName]');
        this.contents = this.container.querySelectorAll('[data-content-name]');

        this.navigationItems.forEach(item => {
            item.addEventListener('click', this.handleNavigationClick.bind(this));
        });
    }

    handleNavigationClick(event) {
        const clickedNavItem = event.target;
        const targetContentName = clickedNavItem.getAttribute('data-navName');

        this.contents.forEach(content => {
            if (content.getAttribute('data-content-name') === targetContentName) {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        });

        this.navigationItems.forEach(item => {
            if (item === clickedNavItem) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });
    }
}
