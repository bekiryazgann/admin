!function (s, a, o) {
    "use strict";
    var e = .01 * s.innerHeight;
    a.documentElement.style.setProperty("--vh", e + "px"), o.app = o.app || {};
    let l = o("body"), m = (o(s), o('div[data-menu="menu-wrapper"]').html()),
        r = o('div[data-menu="menu-wrapper"]').attr("class");
    o.app.menu = {
        expanded: null,
        collapsed: null,
        hidden: null,
        container: null,
        horizontalMenu: !1,
        is_touch_device: function () {
            var e = " -webkit- -moz- -o- -ms- ".split(" ");
            return !!("ontouchstart" in s || s.DocumentTouch && a instanceof DocumentTouch) || (e = ["(", e.join("touch-enabled),("), "heartz", ")"].join(""), s.matchMedia(e).matches)
        },
        manualScroller: {
            obj: null, init: function () {
                o(".main-menu").hasClass("menu-dark"), o.app.menu.is_touch_device() ? o(".main-menu").addClass("menu-native-scroll") : this.obj = new PerfectScrollbar(".main-menu-content", {
                    suppressScrollX: !0,
                    wheelPropagation: !1
                })
            }, update: function () {
                if (!0 === o(".main-menu").data("scroll-to-active")) {
                    let e, n;
                    e = a.querySelector(".main-menu-content li.active"), n = a.querySelector(".main-menu-content"), ((e = l.hasClass("menu-collapsed") && o(".main-menu-content li.sidebar-group-active").length ? a.querySelector(".main-menu-content li.sidebar-group-active") : e) ? e.getBoundingClientRect().top + n.scrollTop : void 0) > parseInt(2 * n.clientHeight / 3) && (n.scrollTop, parseInt(n.clientHeight / 2))
                }
            }, enable: function () {
                o(".main-menu-content").hasClass("ps") || this.init()
            }, disable: function () {
                this.obj && this.obj.destroy()
            }, updateHeight: function () {
                "vertical-menu" != l.data("menu") && "vertical-menu-modern" != l.data("menu") && "vertical-overlay-menu" != l.data("menu") || !o(".main-menu").hasClass("menu-fixed") || (o(".main-menu-content").css("height", o(s).height() - o(".header-navbar").height() - o(".main-menu-header").outerHeight() - o(".main-menu-footer").outerHeight()), this.update())
            }
        },
        init: function (e) {
            0 < o(".main-menu-content").length && (this.container = o(".main-menu-content"), this.change(e))
        },
        change: function (e) {
            var n = Unison.fetch.now(), a = (this.reset(), l.data("menu"));
            if (n) switch (n.name) {
                case"xl":
                    "vertical-overlay-menu" === a ? this.hide() : !0 === e ? this.collapse(e) : this.expand();
                    break;
                case"lg":
                    "vertical-overlay-menu" === a || "vertical-menu-modern" === a || "horizontal-menu" === a ? this.hide() : this.collapse();
                    break;
                case"md":
                case"sm":
                case"xs":
                    this.hide()
            }
            "vertical-menu" !== a && "vertical-menu-modern" !== a || this.toOverlayMenu(n.name, a), l.is(".horizontal-layout") && !l.hasClass(".horizontal-menu-demo") && (this.changeMenu(n.name), o(".menu-toggle").removeClass("is-active")), "xl" == n.name && o('body[data-open="hover"] .main-menu-content .dropdown').on("mouseenter", function () {
                o(this).hasClass("show") ? o(this).removeClass("show") : o(this).addClass("show")
            }).on("mouseleave", function (e) {
                o(this).removeClass("show")
            }), "sm" == n.name || "xs" == n.name ? o(".header-navbar[data-nav=brand-center]").removeClass("navbar-brand-center") : o(".header-navbar[data-nav=brand-center]").addClass("navbar-brand-center"), "xl" == n.name && "horizontal-menu" == a && o(".main-menu-content").find("li.active").parents("li").addClass("sidebar-group-active active"), "xl" !== n.name && "horizontal-menu" == a && o("#navbar-type").toggleClass("d-none d-xl-block"), o("ul.dropdown-menu [data-bs-toggle=dropdown]").on("click", function (e) {
                0 < o(this).siblings("ul.dropdown-menu").length && e.preventDefault(), e.stopPropagation(), o(this).parent().siblings().removeClass("show"), o(this).parent().toggleClass("show")
            }), "horizontal-menu" == a && (o("li.dropdown-submenu").on("mouseenter", function () {
                o(this).parent(".dropdown").hasClass("show") || o(this).removeClass("openLeft");
                var e, n, a, t, i = o(this).find(".dropdown-menu");
                i && (e = o(s).height(), n = o(this).position().top, a = i.offset().left, t = i.width(), e - n - i.height() - 28 < 1 && (i = e - n - 170, o(this).find(".dropdown-menu").css({
                    "max-height": i + "px",
                    "overflow-y": "auto",
                    "overflow-x": "hidden"
                }), new PerfectScrollbar("li.dropdown-submenu.show .dropdown-menu", {wheelPropagation: !1})), 0 <= a + t - (s.innerWidth - 16)) && o(this).addClass("openLeft")
            }), o(".theme-layouts").find(".semi-dark").hide())
        },
        transit: function (e, n) {
            let a = this;
            l.addClass("changing-menu"), e.call(a), l.hasClass("vertical-layout") && (l.hasClass("menu-open") || l.hasClass("menu-expanded") ? (o(".menu-toggle").addClass("is-active"), "vertical-menu" === l.data("menu") && o(".main-menu-header") && o(".main-menu-header").show()) : (o(".menu-toggle").removeClass("is-active"), "vertical-menu" === l.data("menu") && o(".main-menu-header") && o(".main-menu-header").hide())), setTimeout(function () {
                n.call(a), l.removeClass("changing-menu"), a.update()
            }, 500)
        },
        open: function () {
            this.transit(function () {
                l.removeClass("menu-hide menu-collapsed").addClass("menu-open"), this.hidden = !1, this.expanded = !0, l.hasClass("vertical-overlay-menu") && o(".sidenav-overlay").addClass("show")
            }, function () {
                !o(".main-menu").hasClass("menu-native-scroll") && o(".main-menu").hasClass("menu-fixed") && (this.manualScroller.enable(), o(".main-menu-content").css("height", o(s).height() - o(".header-navbar").height() - o(".main-menu-header").outerHeight() - o(".main-menu-footer").outerHeight())), l.hasClass("vertical-overlay-menu") || o(".sidenav-overlay").removeClass("show")
            })
        },
        hide: function () {
            this.transit(function () {
                l.removeClass("menu-open menu-expanded").addClass("menu-hide"), this.hidden = !0, this.expanded = !1, l.hasClass("vertical-overlay-menu") && o(".sidenav-overlay").removeClass("show")
            }, function () {
                !o(".main-menu").hasClass("menu-native-scroll") && o(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), l.hasClass("vertical-overlay-menu") || o(".sidenav-overlay").removeClass("show")
            })
        },
        expand: function () {
            !1 === this.expanded && ("vertical-menu-modern" == l.data("menu") && o(".modern-nav-toggle").find(".collapse-toggle-icon").replaceWith(feather.icons.disc.toSvg({class: "d-none d-xl-block collapse-toggle-icon primary font-medium-4"})), this.transit(function () {
                l.removeClass("menu-collapsed").addClass("menu-expanded"), this.collapsed = !1, this.expanded = !0, o(".sidenav-overlay").removeClass("show")
            }, function () {
                o(".main-menu").hasClass("menu-native-scroll") || "horizontal-menu" == l.data("menu") ? this.manualScroller.disable() : o(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), "vertical-menu" != l.data("menu") && "vertical-menu-modern" != l.data("menu") || !o(".main-menu").hasClass("menu-fixed") || o(".main-menu-content").css("height", o(s).height() - o(".header-navbar").height() - o(".main-menu-header").outerHeight() - o(".main-menu-footer").outerHeight())
            }))
        },
        collapse: function () {
            !1 === this.collapsed && ("vertical-menu-modern" == l.data("menu") && o(".modern-nav-toggle").find(".collapse-toggle-icon").replaceWith(feather.icons.circle.toSvg({class: "d-none d-xl-block collapse-toggle-icon primary font-medium-4"})), this.transit(function () {
                l.removeClass("menu-expanded").addClass("menu-collapsed"), this.collapsed = !0, this.expanded = !1, o(".content-overlay").removeClass("d-block d-none")
            }, function () {
                "horizontal-menu" == l.data("menu") && l.hasClass("vertical-overlay-menu") && o(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable(), "vertical-menu" != l.data("menu") && "vertical-menu-modern" != l.data("menu") || !o(".main-menu").hasClass("menu-fixed") || o(".main-menu-content").css("height", o(s).height() - o(".header-navbar").height()), "vertical-menu-modern" == l.data("menu") && o(".main-menu").hasClass("menu-fixed") && this.manualScroller.enable()
            }))
        },
        toOverlayMenu: function (e, n) {
            var a = l.data("menu");
            "vertical-menu-modern" == n ? "lg" == e || "md" == e || "sm" == e || "xs" == e ? l.hasClass(a) && l.removeClass(a).addClass("vertical-overlay-menu") : l.hasClass("vertical-overlay-menu") && l.removeClass("vertical-overlay-menu").addClass(a) : "sm" == e || "xs" == e ? l.hasClass(a) && l.removeClass(a).addClass("vertical-overlay-menu") : l.hasClass("vertical-overlay-menu") && l.removeClass("vertical-overlay-menu").addClass(a)
        },
        changeMenu: function (e) {
            o('div[data-menu="menu-wrapper"]').html(""), o('div[data-menu="menu-wrapper"]').html(m);
            var n = o('div[data-menu="menu-wrapper"]'),
                a = (o('div[data-menu="menu-container"]'), o('ul[data-menu="menu-navigation"]')),
                t = o('li[data-menu="dropdown"]'), i = o('li[data-menu="dropdown-submenu"]');
            "xl" === e ? (l.removeClass("vertical-layout vertical-overlay-menu fixed-navbar").addClass(l.data("menu")), o("nav.header-navbar").removeClass("fixed-top"), n.removeClass().addClass(r), o("a.dropdown-item.nav-has-children").on("click", function () {
                event.preventDefault(), event.stopPropagation()
            }), o("a.dropdown-item.nav-has-parent").on("click", function () {
                event.preventDefault(), event.stopPropagation()
            })) : (l.removeClass(l.data("menu")).addClass("vertical-layout vertical-overlay-menu fixed-navbar"), o("nav.header-navbar").addClass("fixed-top"), n.removeClass().addClass("main-menu menu-light menu-fixed menu-shadow"), a.removeClass().addClass("navigation navigation-main"), t.removeClass("dropdown").addClass("has-sub"), t.find("a").removeClass("dropdown-toggle nav-link"), t.find("a").attr("data-bs-toggle", ""), t.children("ul").find("a").removeClass("dropdown-item"), t.find("ul").removeClass("dropdown-menu"), i.removeClass().addClass("has-sub"), o.app.nav.init(), o("ul.dropdown-menu [data-bs-toggle=dropdown]").on("click", function (e) {
                e.preventDefault(), e.stopPropagation(), o(this).parent().siblings().removeClass("open"), o(this).parent().toggleClass("open")
            }), o(".main-menu-content").find("li.active").parents("li").addClass("sidebar-group-active"), o(".main-menu-content").find("li.active").closest("li.nav-item").addClass("open")), feather && feather.replace({
                width: 14,
                height: 14
            })
        },
        toggle: function () {
            var e = Unison.fetch.now(), n = (this.collapsed, this.expanded), a = this.hidden, t = l.data("menu");
            switch (e.name) {
                case"xl":
                    !0 === n ? "vertical-overlay-menu" == t ? this.hide() : this.collapse() : "vertical-overlay-menu" == t ? this.open() : this.expand();
                    break;
                case"lg":
                    !0 === n ? "vertical-overlay-menu" == t || "vertical-menu-modern" == t || "horizontal-menu" == t ? this.hide() : this.collapse() : "vertical-overlay-menu" == t || "vertical-menu-modern" == t || "horizontal-menu" == t ? this.open() : this.expand();
                    break;
                case"md":
                case"sm":
                case"xs":
                    !0 === a ? this.open() : this.hide()
            }
        },
        update: function () {
            this.manualScroller.update()
        },
        reset: function () {
            this.expanded = !1, this.collapsed = !1, this.hidden = !1, l.removeClass("menu-hide menu-open menu-collapsed menu-expanded")
        }
    }, o.app.nav = {
        container: o(".navigation-main"),
        initialized: !1,
        navItem: o(".navigation-main").find("li").not(".navigation-category"),
        TRANSITION_EVENTS: ["transitionend", "webkitTransitionEnd", "oTransitionEnd"],
        TRANSITION_PROPERTIES: ["transition", "MozTransition", "webkitTransition", "WebkitTransition", "OTransition"],
        config: {speed: 300},
        init: function (e) {
            this.initialized = !0, o.extend(this.config, e), this.bind_events()
        },
        bind_events: function () {
            let a = this;
            o(".navigation-main").on("mouseenter.app.menu", "li", function () {
                var t = o(this);
                if (l.hasClass("menu-collapsed") && "vertical-menu-modern" != l.data("menu")) {
                    o(".main-menu-content").children("span.menu-title").remove(), o(".main-menu-content").children("a.menu-title").remove(), o(".main-menu-content").children("ul.menu-content").remove();
                    let e = t.find("span.menu-title").clone(), n, a;
                    t.hasClass("has-sub") || (n = t.find("span.menu-title").text(), a = t.children("a").attr("href"), "" !== n && ((e = o("<a>")).attr("href", a), e.attr("title", n), e.text(n), e.addClass("menu-title"))), t = t.css("border-top") ? t.position().top + parseInt(t.css("border-top"), 10) : t.position().top, "vertical-compact-menu" !== l.data("menu") && e.appendTo(".main-menu-content").css({
                        position: "fixed",
                        top: t
                    })
                }
            }).on("mouseleave.app.menu", "li", function () {
            }).on("active.app.menu", "li", function (e) {
                o(this).addClass("active"), e.stopPropagation()
            }).on("deactive.app.menu", "li.active", function (e) {
                o(this).removeClass("active"), e.stopPropagation()
            }).on("open.app.menu", "li", function (e) {
                var n = o(this);
                if (a.expand(n), o(".main-menu").hasClass("menu-collapsible")) return !1;
                n.siblings(".open").find("li.open").trigger("close.app.menu"), n.siblings(".open").trigger("close.app.menu"), e.stopPropagation()
            }).on("close.app.menu", "li.open", function (e) {
                var n = o(this);
                a.collapse(n), e.stopPropagation()
            }).on("click.app.menu", "li", function (e) {
                var n = o(this);
                n.is(".disabled") || l.hasClass("menu-collapsed") && "vertical-menu-modern" != l.data("menu") ? e.preventDefault() : n.has("ul").length ? n.is(".open") ? n.trigger("close.app.menu") : n.trigger("open.app.menu") : n.is(".active") || (n.siblings(".active").trigger("deactive.app.menu"), n.trigger("active.app.menu")), e.stopPropagation()
            }), o(".navbar-header, .main-menu").on("mouseenter", function () {
                var e;
                "vertical-menu-modern" == l.data("menu") && (o(".main-menu, .navbar-header").addClass("expanded"), l.hasClass("menu-collapsed")) && (0 === o(".main-menu li.open").length && o(".main-menu-content").find("li.active").parents("li").addClass("open"), (e = o(".main-menu li.menu-collapsed-open")).children("ul").hide().slideDown(200, function () {
                    o(this).css("display", "")
                }), e.addClass("open").removeClass("menu-collapsed-open"))
            }).on("mouseleave", function () {
                l.hasClass("menu-collapsed") && "vertical-menu-modern" == l.data("menu") && setTimeout(function () {
                    var e, n;
                    0 === o(".main-menu:hover").length && 0 === o(".navbar-header:hover").length && (o(".main-menu, .navbar-header").removeClass("expanded"), l.hasClass("menu-collapsed")) && (n = (e = o(".main-menu li.open")).children("ul"), e.addClass("menu-collapsed-open"), n.show().slideUp(200, function () {
                        o(this).css("display", "")
                    }), e.removeClass("open"))
                }, 1)
            }), o(".main-menu-content").on("mouseleave", function () {
                l.hasClass("menu-collapsed") && (o(".main-menu-content").children("span.menu-title").remove(), o(".main-menu-content").children("a.menu-title").remove(), o(".main-menu-content").children("ul.menu-content").remove()), o(".hover", ".navigation-main").removeClass("hover")
            }), o(".navigation-main li.has-sub > a").on("click", function (e) {
                e.preventDefault()
            })
        },
        collapse: function (e, n) {
            let a = e.children("ul"), t = e.children().first(), i = o(t).outerHeight();
            e.css({
                height: i + a.outerHeight() + "px",
                overflow: "hidden"
            }), e.addClass("menu-item-animating"), e.addClass("menu-item-closing"), o.app.nav._bindAnimationEndEvent(e, function () {
                e.removeClass("open"), o.app.nav._clearItemStyle(e)
            }), setTimeout(function () {
                e.css({height: i + "px"})
            }, 50)
        },
        expand: function (e, n) {
            let a = e.children("ul"), t = e.children().first(), i = o(t).outerHeight();
            e.addClass("menu-item-animating"), e.css({
                overflow: "hidden",
                height: i + "px"
            }), e.addClass("open"), o.app.nav._bindAnimationEndEvent(e, function () {
                o.app.nav._clearItemStyle(e)
            }), setTimeout(function () {
                e.css({height: i + a.outerHeight() + "px"})
            }, 50)
        },
        _bindAnimationEndEvent(n, a) {
            function e(e) {
                e.target === n && (o.app.nav._unbindAnimationEndEvent(n), a(e))
            }

            n = n[0];
            let t = s.getComputedStyle(n).transitionDuration;
            t = parseFloat(t) * (-1 !== t.indexOf("ms") ? 1 : 1e3), n._menuAnimationEndEventCb = e, o.app.nav.TRANSITION_EVENTS.forEach(function (e) {
                n.addEventListener(e, n._menuAnimationEndEventCb, !1)
            }), n._menuAnimationEndEventTimeout = setTimeout(function () {
                e({target: n})
            }, t + 50)
        },
        _unbindAnimationEndEvent(n) {
            let a = n._menuAnimationEndEventCb;
            n._menuAnimationEndEventTimeout && (clearTimeout(n._menuAnimationEndEventTimeout), n._menuAnimationEndEventTimeout = null), a && (o.app.nav.TRANSITION_EVENTS.forEach(function (e) {
                n.removeEventListener(e, a, !1)
            }), n._menuAnimationEndEventCb = null)
        },
        _clearItemStyle: function (e) {
            e.removeClass("menu-item-animating"), e.removeClass("menu-item-closing"), e.css({overflow: "", height: ""})
        },
        refresh: function () {
            o.app.nav.container.find(".open").removeClass("open")
        }
    }, o(a).on("click", 'a[href="#"]', function (e) {
        e.preventDefault()
    })
}(window, document, jQuery), window.addEventListener("resize", function () {
    var e = .01 * window.innerHeight;
    document.documentElement.style.setProperty("--vh", e + "px")
});