"use strict";$(function(){var t,s=!1,e=("rtl"==(t="rtl"==$("html").data("textdirection")?"rtl":"ltr")&&(s=!0),$(".sidebar-shop")),o=$(".btn-cart"),a=$(".body-content-overlay"),i=$(".shop-sidebar-toggler"),n=$(".grid-view-btn"),l=$(".list-view-btn"),r=document.getElementById("price-slider"),d=$("#ecommerce-products"),c=$(".dropdown-sort .dropdown-item"),m=$(".dropdown-toggle .active-sorting"),v=$(".btn-wishlist"),h="app-ecommerce-checkout.html";"laravel"===$("body").attr("data-framework")&&(h=$("body").attr("data-asset-path")+"app/ecommerce/checkout"),c.length&&c.on("click",function(){var t=$(this).text();m.text(t)}),i.length&&i.on("click",function(){e.toggleClass("show"),a.toggleClass("show"),$("body").addClass("modal-open")}),a.length&&a.on("click",function(t){e.removeClass("show"),a.removeClass("show"),$("body").removeClass("modal-open")}),null!==r&&noUiSlider.create(r,{start:[1500,3500],direction:t,connect:!0,tooltips:[!0,!0],format:wNumb({decimals:0}),range:{min:51,max:5e3}}),n.length&&n.on("click",function(){d.removeClass("list-view").addClass("grid-view"),l.removeClass("active"),n.addClass("active")}),l.length&&l.on("click",function(){d.removeClass("grid-view").addClass("list-view"),n.removeClass("active"),l.addClass("active")}),o.length&&o.on("click",function(t){var e=$(this),o=e.find(".add-to-cart");0<o.length&&t.preventDefault(),o.text("View In Cart").removeClass("add-to-cart").addClass("view-in-cart"),e.attr("href",h),toastr.success("","Added Item In Your Cart 🛒",{closeButton:!0,tapToDismiss:!1,rtl:s})}),v.length&&v.on("click",function(){var t=$(this);t.find("svg").toggleClass("text-danger"),t.find("svg").hasClass("text-danger")&&toastr.success("","Added to wishlist ❤️",{closeButton:!0,tapToDismiss:!1,rtl:s})})}),$(window).on("resize",function(){991<=$(window).outerWidth()&&($(".sidebar-shop").removeClass("show"),$(".body-content-overlay").removeClass("show"))});