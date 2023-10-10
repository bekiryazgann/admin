let MediaSelect = {
    main: function (element) {
        let mediaSelectInput = document.querySelectorAll(".media-select");

        let el = document.querySelector(element);
        let selected = [];
        let key;
        let val = el.getAttribute("value");


        mediaSelectInput.forEach(function (elem) {
            let key = elem.getAttribute("key");
            val.includes(key) && (elem.checked = !0)
        });

        el.style.display = "none";
        el.style.opacity = "0";
        mediaSelectInput.forEach(function (input) {
            input.addEventListener("change", function () {
                console.log(key);
                key = this.getAttribute("key");
                this.checked ? selected.push(key) : selected = arrayRemove(selected, key);
                el.setAttribute("value", JSON.stringify(selected))
            })
        })
    }
};

function arrayRemove(e, t) {
    return e.filter(function (e) {
        return e !== t
    })
}