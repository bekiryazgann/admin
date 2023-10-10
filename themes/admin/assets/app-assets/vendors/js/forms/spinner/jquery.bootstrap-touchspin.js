!function(n){"function"==typeof define&&define.amd?define(["jquery"],n):"object"==typeof module&&module.exports?module.exports=function(t,o){return void 0===o&&(o="undefined"!=typeof window?require("jquery"):require("jquery")(t)),n(o),o}:n(jQuery)}(function(S){"use strict";var T=0;S.fn.TouchSpin=function(M){var P={min:0,max:100,initval:"",replacementval:"",firstclickvalueifempty:null,step:1,decimals:0,stepinterval:100,forcestepdivisibility:"round",stepintervaldelay:500,verticalbuttons:!1,verticalup:"+",verticaldown:"-",verticalupclass:"",verticaldownclass:"",prefix:"",postfix:"",prefix_extraclass:"",postfix_extraclass:"",booster:!0,boostat:10,maxboostedstep:!1,mousewheel:!0,buttondown_class:"btn btn-primary",buttonup_class:"btn btn-primary",buttondown_txt:"-",buttonup_txt:"+",callback_before_calculation:function(t){return t},callback_after_calculation:function(t){return t}},q={min:"min",max:"max",initval:"init-val",replacementval:"replacement-val",firstclickvalueifempty:"first-click-value-if-empty",step:"step",decimals:"decimals",stepinterval:"step-interval",verticalbuttons:"vertical-buttons",verticalupclass:"vertical-up-class",verticaldownclass:"vertical-down-class",forcestepdivisibility:"force-step-divisibility",stepintervaldelay:"step-interval-delay",prefix:"prefix",postfix:"postfix",prefix_extraclass:"prefix-extra-class",postfix_extraclass:"postfix-extra-class",booster:"booster",boostat:"boostat",maxboostedstep:"max-boosted-step",mousewheel:"mouse-wheel",buttondown_class:"button-down-class",buttonup_class:"button-up-class",buttondown_txt:"button-down-txt",buttonup_txt:"button-up-txt"};return this.each(function(){var s,n,a,e,i,t,o,p,u,c,r,l,d,f,b,h,v=S(this),x=v.data(),m=0,g=!1;function w(){""===s.prefix&&(n=e.prefix.detach()),""===s.postfix&&(a=e.postfix.detach())}function _(){var t,o,n;""!==(t=s.callback_before_calculation(v.val()))?0<s.decimals&&"."===t||(o=parseFloat(t),(n=o=isNaN(o)?""!==s.replacementval?s.replacementval:0:o).toString()!==t&&(n=o),null!==s.min&&o<s.min&&(n=s.min),n=function(t){switch(s.forcestepdivisibility){case"round":return(Math.round(t/s.step)*s.step).toFixed(s.decimals);case"floor":return(Math.floor(t/s.step)*s.step).toFixed(s.decimals);case"ceil":return(Math.ceil(t/s.step)*s.step).toFixed(s.decimals);default:return t.toFixed(s.decimals)}}(n=null!==s.max&&o>s.max?s.max:n),Number(t).toString()!==n.toString()&&(v.val(n),v.trigger("change"))):""!==s.replacementval&&(v.val(s.replacementval),v.trigger("change"))}function y(){var t;return s.booster?(t=Math.pow(2,Math.floor(m/s.boostat))*s.step,s.maxboostedstep&&t>s.maxboostedstep&&(t=s.maxboostedstep,i=Math.round(i/t)*t),Math.max(s.step,t)):s.step}function k(){return"number"==typeof s.firstclickvalueifempty?s.firstclickvalueifempty:(s.min+s.max)/2}function C(){_();var t,o=i=parseFloat(s.callback_before_calculation(e.input.val()));isNaN(i)?i=k():(t=y(),i+=t),null!==s.max&&i>s.max&&(i=s.max,v.trigger("touchspin.on.max"),F()),e.input.val(s.callback_after_calculation(Number(i).toFixed(s.decimals))),o!==i&&v.trigger("change")}function j(){_();var t,o=i=parseFloat(s.callback_before_calculation(e.input.val()));isNaN(i)?i=k():(t=y(),i-=t),null!==s.min&&i<s.min&&(i=s.min,v.trigger("touchspin.on.min"),F()),e.input.val(s.callback_after_calculation(Number(i).toFixed(s.decimals))),o!==i&&v.trigger("change")}function D(){F(),m=0,g="down",v.trigger("touchspin.on.startspin"),v.trigger("touchspin.on.startdownspin"),p=setTimeout(function(){t=setInterval(function(){m++,j()},s.stepinterval)},s.stepintervaldelay)}function N(){F(),m=0,g="up",v.trigger("touchspin.on.startspin"),v.trigger("touchspin.on.startupspin"),u=setTimeout(function(){o=setInterval(function(){m++,C()},s.stepinterval)},s.stepintervaldelay)}function F(){switch(clearTimeout(p),clearTimeout(u),clearInterval(t),clearInterval(o),g){case"up":v.trigger("touchspin.on.stopupspin"),v.trigger("touchspin.on.stopspin");break;case"down":v.trigger("touchspin.on.stopdownspin"),v.trigger("touchspin.on.stopspin")}m=0,g=!1}v.data("alreadyinitialized")||(v.data("alreadyinitialized",!0),T+=1,v.data("spinnerid",T),v.is("input")?(""!==(s=S.extend({},P,x,(h={},S.each(q,function(t,o){o="bts-"+o;v.is("[data-"+o+"]")&&(h[t]=v.data(o))}),h),M)).initval&&""===v.val()&&v.val(s.initval),_(),x=v.val(),b=v.parent(),""!==x&&(x=s.callback_after_calculation(Number(x).toFixed(s.decimals))),v.data("initvalue",x).val(x),v.addClass("form-control"),b.hasClass("input-group")?((x=b).addClass("bootstrap-touchspin"),b=v.prev(),l=v.next(),d='<span class="input-group-addon bootstrap-touchspin-prefix bootstrap-touchspin-injected"><span class="input-group-text">'+s.prefix+"</span></span>",f='<span class="input-group-addon bootstrap-touchspin-postfix bootstrap-touchspin-injected"><span class="input-group-text">'+s.postfix+"</span></span>",b.hasClass("input-group-btn")||b.hasClass("input-group-text")?(c='<button class="'+s.buttondown_class+' bootstrap-touchspin-down bootstrap-touchspin-injected" type="button">'+s.buttondown_txt+"</button>",b.append(c)):(c='<span class="input-group-btn bootstrap-touchspin-injected"><button class="'+s.buttondown_class+' bootstrap-touchspin-down" type="button">'+s.buttondown_txt+"</button></span>",S(c).insertBefore(v)),l.hasClass("input-group-btn")||l.hasClass("input-group-text")?(r='<button class="'+s.buttonup_class+' bootstrap-touchspin-up bootstrap-touchspin-injected" type="button">'+s.buttonup_txt+"</button>",l.text(r)):(r='<span class="input-group-btn bootstrap-touchspin-injected"><button class="'+s.buttonup_class+' bootstrap-touchspin-up" type="button">'+s.buttonup_txt+"</button></span>",S(r).insertAfter(v)),S(d).insertBefore(v),S(f).insertAfter(v),c=x):(b="",v.hasClass("input-sm")&&(b="input-group-sm"),v.hasClass("input-lg")&&(b="input-group-lg"),b=s.verticalbuttons?'<div class="input-group '+b+' bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-addon bootstrap-touchspin-prefix"><span class="input-group-text">'+s.prefix+'</span></span><span class="input-group-addon bootstrap-touchspin-postfix"><span class="input-group-text">'+s.postfix+'</span></span><span class="input-group-btn-vertical"><button class="'+s.buttondown_class+" bootstrap-touchspin-up "+s.verticalupclass+'" type="button">'+s.verticalup+'</button><button class="'+s.buttonup_class+" bootstrap-touchspin-down "+s.verticaldownclass+'" type="button">'+s.verticaldown+"</button></span></div>":'<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn"><button class="'+s.buttondown_class+' bootstrap-touchspin-down" type="button">'+s.buttondown_txt+'</button></span><span class="input-group-addon bootstrap-touchspin-prefix"><span class="input-group-text">'+s.prefix+'</span></span><span class="input-group-addon bootstrap-touchspin-postfix"><span class="input-group-text">'+s.postfix+'</span></span><span class="input-group-btn"><button class="'+s.buttonup_class+' bootstrap-touchspin-up" type="button">'+s.buttonup_txt+"</button></span></div>",c=S(b).insertBefore(v),S(".bootstrap-touchspin-prefix",c).after(v),v.hasClass("input-sm")?c.addClass("input-group-sm"):v.hasClass("input-lg")&&c.addClass("input-group-lg")),e={down:S(".bootstrap-touchspin-down",c),up:S(".bootstrap-touchspin-up",c),input:S("input",c),prefix:S(".bootstrap-touchspin-prefix",c).addClass(s.prefix_extraclass),postfix:S(".bootstrap-touchspin-postfix",c).addClass(s.postfix_extraclass)},w(),v.on("keydown.touchspin",function(t){var o=t.keyCode||t.which;38===o?("up"!==g&&(C(),N()),t.preventDefault()):40===o&&("down"!==g&&(j(),D()),t.preventDefault())}),v.on("keyup.touchspin",function(t){t=t.keyCode||t.which;38!==t&&40!==t||F()}),v.on("blur.touchspin",function(){_(),v.val(s.callback_after_calculation(v.val()))}),e.down.on("keydown",function(t){var o=t.keyCode||t.which;32!==o&&13!==o||("down"!==g&&(j(),D()),t.preventDefault())}),e.down.on("keyup.touchspin",function(t){t=t.keyCode||t.which;32!==t&&13!==t||F()}),e.up.on("keydown.touchspin",function(t){var o=t.keyCode||t.which;32!==o&&13!==o||("up"!==g&&(C(),N()),t.preventDefault())}),e.up.on("keyup.touchspin",function(t){t=t.keyCode||t.which;32!==t&&13!==t||F()}),e.down.on("mousedown.touchspin",function(t){e.down.off("touchstart.touchspin"),v.is(":disabled")||(j(),D(),t.preventDefault(),t.stopPropagation())}),e.down.on("touchstart.touchspin",function(t){e.down.off("mousedown.touchspin"),v.is(":disabled")||(j(),D(),t.preventDefault(),t.stopPropagation())}),e.up.on("mousedown.touchspin",function(t){e.up.off("touchstart.touchspin"),v.is(":disabled")||(C(),N(),t.preventDefault(),t.stopPropagation())}),e.up.on("touchstart.touchspin",function(t){e.up.off("mousedown.touchspin"),v.is(":disabled")||(C(),N(),t.preventDefault(),t.stopPropagation())}),e.up.on("mouseup.touchspin mouseout.touchspin touchleave.touchspin touchend.touchspin touchcancel.touchspin",function(t){g&&(t.stopPropagation(),F())}),e.down.on("mouseup.touchspin mouseout.touchspin touchleave.touchspin touchend.touchspin touchcancel.touchspin",function(t){g&&(t.stopPropagation(),F())}),e.down.on("mousemove.touchspin touchmove.touchspin",function(t){g&&(t.stopPropagation(),t.preventDefault())}),e.up.on("mousemove.touchspin touchmove.touchspin",function(t){g&&(t.stopPropagation(),t.preventDefault())}),v.on("mousewheel.touchspin DOMMouseScroll.touchspin",function(t){var o;s.mousewheel&&v.is(":focus")&&(o=t.originalEvent.wheelDelta||-t.originalEvent.deltaY||-t.originalEvent.detail,t.stopPropagation(),t.preventDefault(),(o<0?j:C)())}),v.on("touchspin.destroy",function(){var t;t=v.parent(),F(),v.off(".touchspin"),t.hasClass("bootstrap-touchspin-injected")?(v.siblings().remove(),v.unwrap()):(S(".bootstrap-touchspin-injected",t).remove(),t.removeClass("bootstrap-touchspin")),v.data("alreadyinitialized",!1)}),v.on("touchspin.uponce",function(){F(),C()}),v.on("touchspin.downonce",function(){F(),j()}),v.on("touchspin.startupspin",function(){N()}),v.on("touchspin.startdownspin",function(){D()}),v.on("touchspin.stopspin",function(){F()}),v.on("touchspin.updatesettings",function(t,o){o=o,s=S.extend({},s,o),o.postfix&&(0===v.parent().find(".bootstrap-touchspin-postfix").length&&a.insertAfter(v),v.parent().find(".bootstrap-touchspin-postfix .input-group-text").text(o.postfix)),o.prefix&&(0===v.parent().find(".bootstrap-touchspin-prefix").length&&n.insertBefore(v),v.parent().find(".bootstrap-touchspin-prefix .input-group-text").text(o.prefix)),w(),_(),""!==e.input.val()&&(o=Number(s.callback_before_calculation(e.input.val())),e.input.val(s.callback_after_calculation(Number(o).toFixed(s.decimals))))})):console.log("Must be an input."))})}});