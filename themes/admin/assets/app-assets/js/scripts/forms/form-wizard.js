$(function(){"use strict";var n,e,r,t,i=document.querySelectorAll(".bs-stepper"),o=$(".select2"),l=document.querySelector(".horizontal-wizard-example"),c=document.querySelector(".vertical-wizard-example"),d=document.querySelector(".modern-wizard-example"),u=document.querySelector(".modern-vertical-wizard-example");if(null!==i)for(var a=0;a<i.length;++a)i[a].addEventListener("show.bs-stepper",function(e){for(var n=e.detail.indexStep,r=$(e.target).find(".step").length-1,t=$(e.target).find(".step"),i=0;i<n;i++){t[i].classList.add("crossed");for(var o=n;o<r;o++)t[o].classList.remove("crossed")}if(0==e.detail.to){for(var l=n;l<r;l++)t[l].classList.remove("crossed");t[0].classList.remove("crossed")}});o.each(function(){var e=$(this);e.wrap('<div class="position-relative"></div>'),e.select2({placeholder:"Select value",dropdownParent:e.parent()})}),null!==l&&(n=new Stepper(l),$(l).find("form").each(function(){$(this).validate({rules:{username:{required:!0},email:{required:!0},password:{required:!0},"confirm-password":{required:!0,equalTo:"#password"},"first-name":{required:!0},"last-name":{required:!0},address:{required:!0},landmark:{required:!0},country:{required:!0},language:{required:!0},twitter:{required:!0,url:!0},facebook:{required:!0,url:!0},google:{required:!0,url:!0},linkedin:{required:!0,url:!0}}})}),$(l).find(".btn-next").each(function(){$(this).on("click",function(e){$(this).parent().siblings("form").valid()?n.next():e.preventDefault()})}),$(l).find(".btn-prev").on("click",function(){n.previous()}),$(l).find(".btn-submit").on("click",function(){$(this).parent().siblings("form").valid()&&alert("Submitted..!!")})),null!==c&&(e=new Stepper(c,{linear:!1}),$(c).find(".btn-next").on("click",function(){e.next()}),$(c).find(".btn-prev").on("click",function(){e.previous()}),$(c).find(".btn-submit").on("click",function(){alert("Submitted..!!")})),null!==d&&(r=new Stepper(d,{linear:!1}),$(d).find(".btn-next").on("click",function(){r.next()}),$(d).find(".btn-prev").on("click",function(){r.previous()}),$(d).find(".btn-submit").on("click",function(){alert("Submitted..!!")})),null!==u&&(t=new Stepper(u,{linear:!1}),$(u).find(".btn-next").on("click",function(){t.next()}),$(u).find(".btn-prev").on("click",function(){t.previous()}),$(u).find(".btn-submit").on("click",function(){alert("Submitted..!!")}))});