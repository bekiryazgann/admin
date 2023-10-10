let menuButton = document.querySelectorAll('[data-role="menu-button"]');
let menuContent = document.querySelector('[data-role="menu-content"]');
let exitButton = menuContent.querySelector('[data-role="exit-button"]');
let backdrop = menuContent.querySelector('[data-role="backdrop"]');


menuButton.forEach(elem => {
    elem.addEventListener('click', e => {
        menuContent.classList.toggle('-translate-x-full')
        document.querySelector('body, #root').classList.toggle('overflow-hidden')
    })
})

backdrop.addEventListener('click', e => {
    menuContent.classList.toggle('-translate-x-full')
    document.querySelector('body, #root').classList.toggle('overflow-hidden')
})

exitButton.addEventListener('click', e => {
    menuContent.classList.toggle('-translate-x-full')
    document.querySelector('body, #root').classList.toggle('overflow-hidden')
})

let SearchButton = document.querySelector("[data-role='search-button']");
let SearchArea = document.querySelector('#' + SearchButton.dataset.search)


SearchButton.addEventListener('click', function () {
    SearchArea.classList.toggle('translate-y-16')
    if (SearchArea.classList.contains('translate-y-16')) {
        setTimeout(e => {
            SearchArea.classList.toggle('-z-10')
        }, 500)
    } else {
        SearchArea.classList.toggle('-z-10')
    }
});
