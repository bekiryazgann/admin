$(function(){"use strict";var n,t="rtl"===$("html").attr("data-textdirection"),r=$(".basic-ratings"),a=$(".custom-svg-ratings"),e=$(".multi-color-ratings"),i=$(".half-star-ratings"),l=$(".full-star-ratings"),o=$(".read-only-ratings"),s=$(".onset-event-ratings"),g=$(".onChange-event-ratings"),h=$(".methods-ratings"),c=$(".btn-initialize"),d=$(".btn-destroy"),u=$(".btn-get-rating"),w=$(".btn-set-rating");r.length&&r.rateYo({rating:3.6,rtl:t}),a.length&&a.rateYo({rating:3.2,starSvg:"<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M12 6.76l1.379 4.246h4.465l-3.612 2.625 1.379 4.246-3.611-2.625-3.612 2.625 1.379-4.246-3.612-2.625h4.465l1.38-4.246zm0-6.472l-2.833 8.718h-9.167l7.416 5.389-2.833 8.718 7.417-5.388 7.416 5.388-2.833-8.718 7.417-5.389h-9.167l-2.833-8.718z'-></path>",rtl:t}),e.length&&e.rateYo({rtl:t,multiColor:{startColor:"#ea5455",endColor:"#7367f0"}}),i.length&&i.rateYo({rtl:t,rating:2}),l.length&&l.rateYo({rtl:t,rating:2}),o.length&&o.rateYo({rating:2,rtl:t}),s.length&&s.rateYo({rtl:t}).on("rateyo.set",function(t,n){alert("The rating is set to "+n.rating+"!")}),g.length&&g.rateYo({rtl:t}).on("rateyo.change",function(t,n){n=n.rating,$(this).parent().find(".counter").text(n)}),h.length&&(n=h.rateYo({rtl:t}),c.length&&c.on("click",function(){n.rateYo({rtl:t})}),d.length&&d.on("click",function(){n.hasClass("jq-ry-container")?n.rateYo("destroy"):window.alert("Please Initialize Ratings First")}),u.length&&u.on("click",function(){var t;n.hasClass("jq-ry-container")?(t=n.rateYo("rating"),window.alert("Current Ratings are "+t)):window.alert("Please Initialize Ratings First")}),w.length)&&w.on("click",function(){n.hasClass("jq-ry-container")?n.rateYo("rating",1):window.alert("Please Initialize Ratings First")})});