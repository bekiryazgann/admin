"use strict";
$(function () {
    (e = Quill.import("formats/font")).whitelist = ["sofia", "slabo", "roboto", "inconsolata", "ubuntu"], Quill.register(e, !0);
    var e = $(".compose-email"), t = $("#compose-mail"), o = $(".menu-toggle"), s = $(".sidebar-toggle"),
        a = $(".sidebar-left"), l = $(".sidebar-menu-list"), i = $(".email-app-list"), n = $(".email-user-list"),
        c = $(".email-user-list .form-check"), r = $(".email-scroll-area"), d = $("#email-to"), m = $("#emailCC"),
        h = $("#emailBCC"), p = $(".toggle-cc"), f = $(".toggle-bcc"), g = $(".cc-wrapper"), u = $(".bcc-wrapper"),
        v = $(".email-app-details"), k = $(".list-group-messages"), w = $(".go-back"),
        C = $(".email-application .email-favorite"), b = $(".user-action"), S = $(".mail-delete"),
        y = $(".mail-unread"), P = $("#email-search"), x = $(".modal"), M = $(".modal-dialog"),
        z = $("#message-editor .editor"), O = $(".body-content-overlay"), T = $(".compose-maximize"),
        B = "rtl" === $("html").attr("data-textdirection"), D = "../../../app-assets/";

    function L(e) {
        var t;
        return e.id ? (t = feather.icons.user.toSvg({class: "me-0"}), "<div class='d-flex flex-wrap align-items-center'><div class='avatar avatar-sm my-0 me-50'><span class='avatar-content'>" + ($(e.element).data("avatar") ? "<img src='" + D + "images/avatars/" + $(e.element).data("avatar") + "' alt='avatar' />" : t) + "</span></div>" + e.text + "</div>") : e.text
    }

    "laravel" === $("body").attr("data-framework") && (D = $("body").attr("data-asset-path")), u.length && u.toggle(), g && g.toggle(), f.length && f.on("click", function () {
        u.toggle()
    }), p.length && p.on("click", function () {
        g.toggle()
    }), $.app.menu.is_touch_device() ? ($(l).css("overflow", "scroll"), $(n).css("overflow", "scroll"), $(r).css("overflow", "scroll")) : (0 < $(l).length && new PerfectScrollbar(l[0]), 0 < $(n).length && new PerfectScrollbar(n[0]), 0 < $(r).length && new PerfectScrollbar(r[0])), $(document).keyup(function (e) {
        "Escape" === e.key && t.find(".modal-dialog").hasClass("modal-fullscreen") && T.click()
    }), d.length && d.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: d.parent(),
        closeOnSelect: !1,
        templateResult: L,
        templateSelection: L,
        tags: !0,
        tokenSeparators: [",", " "],
        escapeMarkup: function (e) {
            return e
        }
    }), m.length && m.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: m.parent(),
        closeOnSelect: !1,
        templateResult: L,
        templateSelection: L,
        tags: !0,
        tokenSeparators: [",", " "],
        escapeMarkup: function (e) {
            return e
        }
    }), h.length && h.wrap('<div class="position-relative"></div>').select2({
        dropdownParent: h.parent(),
        closeOnSelect: !1,
        templateResult: L,
        templateSelection: L,
        tags: !0,
        tokenSeparators: [",", " "],
        escapeMarkup: function (e) {
            return e
        }
    }), e.length && e.on("click", function () {
        O.removeClass("show"), a.removeClass("show"), $(".compose-form input").val(""), d.val([]).trigger("change"), m.val([]).trigger("change"), h.val([]).trigger("change"), g.hide(), u.hide(), $(".compose-form .ql-editor")[0].innerHTML = ""
    }), o.length && o.on("click", function (e) {
        a.removeClass("show"), O.removeClass("show")
    }), s.length && s.on("click", function (e) {
        e.stopPropagation(), a.toggleClass("show"), O.addClass("show")
    }), T && T.on("click", function () {
        x.toggleClass("modal-sticky"), M.toggleClass("modal-fullscreen"), M.hasClass("modal-fullscreen") ? $(this).html(feather.icons["minimize-2"].toSvg()) : $(this).html(feather.icons["maximize-2"].toSvg())
    }), O.length && O.on("click", function (e) {
        a.removeClass("show"), O.removeClass("show")
    }), n.find("li").length && n.find("li").on("click", function (e) {
        v.toggleClass("show")
    }), k.find("a").length && k.find("a").on("click", function () {
        k.find("a").hasClass("active") && k.find("a").removeClass("active"), $(this).addClass("active")
    }), w.length && w.on("click", function (e) {
        e.stopPropagation(), v.removeClass("show")
    }), C.length && C.on("click", function (e) {
        $(this).find("svg").toggleClass("favorite"), e.stopPropagation(), $(this).find("svg").hasClass("favorite") && toastr.success("Updated mail to favorite", "Favorite Mail ⭐️", {
            closeButton: !0,
            tapToDismiss: !1,
            rtl: B
        })
    }), 768 < $(window).width() && O.hasClass("show") && O.removeClass("show"), c.length && (c.on("click", function (e) {
        e.stopPropagation()
    }), c.find("input").on("change", function (e) {
        e.stopPropagation(), (e = $(this)).is(":checked") ? e.closest(".user-mail").addClass("selected-row-bg") : e.closest(".user-mail").removeClass("selected-row-bg")
    })), $(document).on("click", ".email-app-list .selectAll input", function () {
        $(this).is(":checked") ? b.find(".form-check .form-check-input").prop("checked", this.checked).closest(".user-mail").addClass("selected-row-bg") : b.find(".form-check .form-check-input").prop("checked", "").closest(".user-mail").removeClass("selected-row-bg")
    }), S.length && S.on("click", function () {
        b.find(".form-check .form-check-input:checked").length && (b.find(".form-check .form-check-input:checked").closest(".user-mail").remove(), i.find(".selectAll input").prop("checked", !1), toastr.error("You have removed email.", "Mail Deleted!", {
            closeButton: !0,
            tapToDismiss: !1,
            rtl: B
        }), b.find(".form-check .form-check-input").prop("checked", ""))
    }), y.length && y.on("click", function () {
        b.find(".form-check .form-check-input:checked").closest(".user-mail").removeClass("mail-read")
    }), P.length && P.on("keyup", function () {
        var e = $(this).val().toLowerCase();
        "" !== e ? (n.find(".email-media-list li").filter(function () {
            $(this).toggle(-1 < $(this).text().toLowerCase().indexOf(e))
        }), 0 == n.find(".email-media-list li:visible").length ? (n.find(".no-results").addClass("show"), n.animate({scrollTop: "0"}, 500)) : n.find(".no-results").hasClass("show") && n.find(".no-results").removeClass("show")) : (n.find(".email-media-list li").show(), n.find(".no-results").hasClass("show") && n.find(".no-results").removeClass("show"))
    }), z.length && new Quill(z[0], {
        bounds: "#message-editor .editor",
        modules: {formula: !0, syntax: !0, toolbar: ".compose-editor-toolbar"},
        placeholder: "Message",
        theme: "snow"
    }), $(".nav-link-search, .bookmark-star").on("click", function () {
        x.modal("hide")
    })
}), $(window).on("resize", function () {
    var e = $(".sidebar-left");
    768 < $(window).width() && $(".app-content .body-content-overlay").hasClass("show") && (e.removeClass("show"), $(".app-content .body-content-overlay").removeClass("show"))
});