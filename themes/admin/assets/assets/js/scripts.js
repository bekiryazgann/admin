!function () {
    var e = document.querySelectorAll(".main-menu-content ul li");
    let n = "" + document.location;
    n = (n = n.replace("http://", "")).replace("https://", ""), e.forEach(function (e, t) {
        var l = e.querySelector("a");
        null !== l && l.getAttribute("href").replace("//", "") === n && e.classList.add("active")
    })
}(), function () {
    let r = document;
    r.querySelectorAll("label.custom-color").forEach(function (e) {
        var t = e;
        let l = e.querySelector("input.color"), n = (e.querySelector("input.value"), r.createElement("span")),
            a = r.createElement("b");
        n.style.width = "100%", n.style.height = "100%", setInterval(function () {
            var e = l.value;
            a.innerText = e, n.style.background = e
        }, 100), t.appendChild(a), t.appendChild(n)
    }), document.querySelectorAll(".custom-file").forEach(function (l, e) {
        var t = l.querySelector("input[type=file]"), n = "id-" + Math.random();
        let a = document.createElement("span");
        var r = document.createElement("label");
        l.style.border = "1px dashed #7666F8", l.style.borderRadius = "6px", l.style.position = "relative", l.style.overflow = "hidden", setInterval(function () {
            var e = l.querySelectorAll("img").length, t = l.getBoundingClientRect().width, t = Math.round(t / 74);
            l.style.height = (74 * Math.round(e / t) ? 74 * Math.round(e / t) : 74) + "px"
        }, 100), t.setAttribute("id", n), r.setAttribute("for", n), r.style.position = "absolute", r.style.top = "0", r.style.left = "0", r.style.width = "100%", r.style.height = "100%", a.innerText = "Dosyalarınızı buraya bırakın veya tıklayıp seçin.", a.classList.add("text-center"), a.style.display = "block", a.style.padding = "10px", a.style.fontSize = "18px", a.style.color = "#7666F8", t.style.display = "none", t.addEventListener("change", function (e) {
            [...this.files].map(e => {
                var t;
                e.name.match(/\.jpe?g|png|gif/) && ((t = new FileReader).addEventListener("load", function () {
                    document.createElement("div"), document.createElement("i");
                    var e = document.createElement("img");
                    e.src = this.result, e.style.width = "54px", e.style.height = "54px", e.style.borderRadius = "6px", e.style.margin = "10px", e.style.objectFit = "cover", e.style.background = "#000000", l.appendChild(e)
                }), t.readAsDataURL(e))
            }), a.style.display = "none", e.preventDefault()
        }), l.appendChild(a), l.appendChild(r)
    })
}();