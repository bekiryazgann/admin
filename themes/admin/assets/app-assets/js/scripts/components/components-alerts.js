!function(n){"use strict";var a=n(".alert-validation"),i=/^[0-9]+$/,t=n(".alert-validation-msg");a.on("input",function(){a.val().match(i)?t.css("display","none"):t.css("display","block")})}((window,document,jQuery));