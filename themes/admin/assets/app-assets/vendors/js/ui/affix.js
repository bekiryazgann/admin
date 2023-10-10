!function(s){"use strict";function a(t,i){this.options=s.extend({},a.DEFAULTS,i),this.$target=s(this.options.target).on("scroll.bs.affix.data-api",s.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",s.proxy(this.checkPositionWithEventLoop,this)),this.$element=s(t),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()}function e(e){return this.each(function(){var t=s(this),i=t.data("bs.affix");i||t.data("bs.affix",i=new a(this,"object"==typeof e&&e)),"string"==typeof e&&i[e]()})}a.VERSION="3.3.7",a.RESET="affix affix-top affix-bottom",a.DEFAULTS={offset:0,target:window},a.prototype.getState=function(t,i,e,o){var f,n=this.$target.scrollTop(),s=this.$element.offset(),a=this.$target.height();return null!=e&&"top"==this.affixed?n<e&&"top":"bottom"==this.affixed?null!=e?!(n+this.unpin<=s.top)&&"bottom":!(n+a<=t-o)&&"bottom":(s=(f=null==this.affixed)?n:s.top,null!=e&&n<=e?"top":null!=o&&t-o<=s+(f?a:i)&&"bottom")},a.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(a.RESET).addClass("affix");var t=this.$target.scrollTop(),i=this.$element.offset();return this.pinnedOffset=i.top-t},a.prototype.checkPositionWithEventLoop=function(){setTimeout(s.proxy(this.checkPosition,this),1)},a.prototype.checkPosition=function(){if(this.$element.is(":visible")){var t=this.$element.height(),i=this.options.offset,e=i.top,o=i.bottom,f=Math.max(s(document).height(),s(document.body).height()),i=("object"!=typeof i&&(o=e=i),"function"==typeof e&&(e=i.top(this.$element)),"function"==typeof o&&(o=i.bottom(this.$element)),this.getState(f,t,e,o));if(this.affixed!=i){null!=this.unpin&&this.$element.css("top","");var e="affix"+(i?"-"+i:""),n=s.Event(e+".bs.affix");if(this.$element.trigger(n),n.isDefaultPrevented())return;this.affixed=i,this.unpin="bottom"==i?this.getPinnedOffset():null,this.$element.removeClass(a.RESET).addClass(e).trigger(e.replace("affix","affixed")+".bs.affix")}"bottom"==i&&this.$element.offset({top:f-t-o})}};var t=s.fn.affix;s.fn.affix=e,s.fn.affix.Constructor=a,s.fn.affix.noConflict=function(){return s.fn.affix=t,this},s(window).on("load",function(){s('[data-spy="affix"]').each(function(){var t=s(this),i=t.data();i.offset=i.offset||{},null!=i.offsetBottom&&(i.offset.bottom=i.offsetBottom),null!=i.offsetTop&&(i.offset.top=i.offsetTop),e.call(t,i)})})}(jQuery);