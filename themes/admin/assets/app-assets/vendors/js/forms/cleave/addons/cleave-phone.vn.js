!function(){function n(n,t){var l,e=n.split("."),r=T;e[0]in r||!r.execScript||r.execScript("var "+e[0]);for(;e.length&&(l=e.shift());)e.length||void 0===t?r=r[l]||(r[l]={}):r[l]=t}function t(n,u){function t(){}t.prototype=u.prototype,n.M=u.prototype,n.prototype=new t,(n.prototype.constructor=n).N=function(n,t,l){for(var e=Array(arguments.length-2),r=2;r<arguments.length;r++)e[r-2]=arguments[r];return u.prototype[t].apply(n,e)}}function i(n,t){null!=n&&this.a.apply(this,arguments)}function f(n){n.b=""}function M(n,t){return t<n?1:n<t?-1:0}function G(n,t){this.b=n,this.a={};for(var l=0;l<t.length;l++){var e=t[l];this.a[e.b]=e}}function H(n){return n=function(n){var t,l=[],e=0;for(t in n)l[e++]=n[t];return l}(n.a),t=function(n,t){return n.b-t.b},n.sort(t||M),n;var t}function P(n,t){switch(this.b=n,this.g=!!t.v,this.a=t.c,this.i=t.type,this.h=!1,this.a){case k:case J:case K:case L:case O:case Y:case U:this.h=!0}this.f=t.defaultValue}function e(){this.a={},this.f=this.j().a,this.b=this.g=null}function h(n,t){var l=n.a[t];if(null==l)return null;if(n.g){if(t in n.b)return n.b[t];var e=n.g,r=n.f[t];if(null!=l)if(r.g){for(var u=[],i=0;i<l.length;i++)u[i]=e.b(r,l[i]);l=u}else l=e.b(r,l);return n.b[t]=l}return l}function c(n,t,l){var e=h(n,t);return n.f[t].g?e[l||0]:e}function p(n,t){var l;if(null!=n.a[t])l=c(n,t,void 0);else n:{if(void 0===(l=n.f[t]).f){var e=l.i;if(e===Boolean)l.f=!1;else if(e===Number)l.f=0;else{if(e!==String){l=new e;break n}l.f=l.h?"0":""}}l=l.f}return l}function a(n,t){return n.f[t].g?null!=n.a[t]?n.a[t].length:0:null!=n.a[t]?1:0}function g(n,t,l){n.a[t]=l,n.b&&(n.b[t]=l)}function l(n,t){var l,e=[];for(l in t)0!=l&&e.push(new P(l,t[l]));return new G(n,e)}function r(){e.call(this)}function u(){e.call(this)}function o(){e.call(this)}function s(){}function d(){}function m(){}function b(){this.a={}}function y(n){return 0==n.length||tn.test(n)}function v(n,t){if(null==t)return null;t=t.toUpperCase();var l=n.a[t];if(null==l){if(null==(l=Q[t]))return null;l=(new m).a(o.j(),l),n.a[t]=l}return l}function _(n){return null==(n=z[n])?"ZZ":n[0]}function $(n){this.H=RegExp(" "),this.C="",this.m=new i,this.w="",this.i=new i,this.u=new i,this.l=!0,this.A=this.o=this.F=!1,this.G=b.b(),this.s=0,this.b=new i,this.B=!1,this.h="",this.a=new i,this.f=[],this.D=n,this.J=this.g=S(this,this.D)}function S(n,t){var l;if(null!=t&&isNaN(t)&&t.toUpperCase()in Q){if(null==(l=v(n.G,t)))throw Error("Invalid region code: "+t);l=p(l,10)}else l=0;return null!=(l=v(n.G,_(l)))?l:ln}function w(n){for(var t=n.f.length,l=0;l<t;++l){var e=n.f[l],r=p(e,1);if(n.w==r)return;a=n;var u,i,a,o=e,s=p(o,1);if(a=-1==s.indexOf("|")&&(s=(s=s.replace(en,"\\d")).replace(rn,"\\d"),f(a.m),u=a,o=p(o,2),0<(u=(i="999999999999999".match(s)[0]).length<u.a.b.length?"":(u=i.replace(new RegExp(s,"g"),o)).replace(RegExp("9","g")," ")).length)&&(a.m.a(u),!0))return n.w=r,n.B=an.test(c(e,4)),n.s=0,1}return n.l=!1}function x(n,t){for(var l=[],e=t.length-3,r=n.f.length,u=0;u<r;++u){var i=n.f[u];0!=a(i,3)&&(i=c(i,3,Math.min(e,a(i,3)-1)),0!=t.search(i))||l.push(n.f[u])}n.f=l}function N(n){return n.l=!0,n.A=!1,n.f=[],n.s=0,f(n.m),n.w="",j(n)}function A(n){for(var t=n.a.toString(),l=n.f.length,e=0;e<l;++e){var r=n.f[e],u=p(r,1);if(new RegExp("^(?:"+u+")$").test(t))return n.B=an.test(c(r,4)),E(n,t=t.replace(new RegExp(u,"g"),c(r,2)))}return""}function E(n,t){var l=n.b.b.length;return n.B&&0<l&&" "!=n.b.toString().charAt(l-1)?n.b+" "+t:n.b+t}function j(n){var t=n.a.toString();if(3<=t.length){for(var l=n.o&&0==n.h.length&&0<a(n.g,20)?h(n.g,20)||[]:h(n.g,19)||[],e=l.length,r=0;r<e;++r){var u=l[r];0<n.h.length&&y(p(u,4))&&!c(u,6)&&null==u.a[5]||(0!=n.h.length||n.o||y(p(u,4))||c(u,6))&&un.test(p(u,2))&&n.f.push(u)}return x(n,t),0<(t=A(n)).length?t:w(n)?B(n):n.i.toString()}return E(n,t)}function B(n){var t=n.a.toString(),l=t.length;if(0<l){for(var e="",r=0;r<l;r++)e=q(n,t.charAt(r));return n.l?E(n,e):n.i.toString()}return n.b.toString()}function R(n){var t=n.a.toString(),l=0,e=1==c(n.g,10)&&"1"==(e=n.a.toString()).charAt(0)&&"0"!=e.charAt(1)&&"1"!=e.charAt(1);return e?(l=1,n.b.a("1").a(" "),n.o=!0):null!=n.g.a[15]&&(e=new RegExp("^(?:"+c(n.g,15)+")"),null!=(e=t.match(e)))&&null!=e[0]&&0<e[0].length&&(n.o=!0,l=e[0].length,n.b.a(t.substring(0,l))),f(n.a),n.a.a(t.substring(l)),t.substring(0,l)}function F(n){var t=n.u.toString(),l=new RegExp("^(?:\\+|"+c(n.g,11)+")");return null!=(l=t.match(l))&&null!=l[0]&&0<l[0].length&&(n.o=!0,l=l[0].length,f(n.a),n.a.a(t.substring(l)),f(n.b),n.b.a(t.substring(0,l)),"+"!=t.charAt(0)&&n.b.a(" "),1)}function C(n){if(0!=n.a.b.length){var t,l=new i;n:{if(0!=(t=n.a.toString()).length&&"0"!=t.charAt(0))for(var e,r=t.length,u=1;u<=3&&u<=r;++u)if((e=parseInt(t.substring(0,u),10))in z){l.a(t.substring(u)),t=e;break n}t=0}return 0!=t&&(f(n.a),n.a.a(l.toString()),"001"==(l=_(t))?n.g=v(n.G,""+t):l!=n.D&&(n.g=S(n,l)),n.b.a(""+t).a(" "),n.h="",1)}}function q(n,t){var l,e=n.m.toString();return 0<=e.substring(n.s).search(n.H)?(l=e.search(n.H),e=e.replace(n.H,t),f(n.m),n.m.a(e),n.s=l,e.substring(0,n.s+1)):(1==n.f.length&&(n.l=!1),n.w="",n.i.toString())}var T=this,U=(i.prototype.b="",i.prototype.set=function(n){this.b=""+n},i.prototype.a=function(n,t,l){if(this.b+=String(n),null!=t)for(var e=1;e<arguments.length;e++)this.b+=arguments[e];return this},i.prototype.toString=function(){return this.b},1),Y=2,k=3,J=4,K=6,L=16,O=18,I=(e.prototype.set=function(n,t){g(this,n.b,t)},e.prototype.clone=function(){var n=new this.constructor;return n!=this&&(n.a={},n.b&&(n.b={}),function n(t,l){for(var e=H(t.j()),r=0;r<e.length;r++){var u=(a=e[r]).b;if(null!=l.a[u]){t.b&&delete t.b[a.b];var i=11==a.a||10==a.a;if(a.g)for(var a=h(l,u)||[],o=0;o<a.length;o++){var s=t,f=u,c=i?a[o].clone():a[o];s.a[f]||(s.a[f]=[]),s.a[f].push(c),s.b&&delete s.b[f]}else a=h(l,u),i?(i=h(t,u))?n(i,a):g(t,u,a.clone()):g(t,u,a)}}}(n,this)),n},t(r,e),null),V=(t(u,e),null),D=(t(o,e),null),Z=(r.j=r.prototype.j=function(){var n=I;return I||(I=n=l(r,{0:{name:"NumberFormat",I:"i18n.phonenumbers.NumberFormat"},1:{name:"pattern",required:!0,c:9,type:String},2:{name:"format",required:!0,c:9,type:String},3:{name:"leading_digits_pattern",v:!0,c:9,type:String},4:{name:"national_prefix_formatting_rule",c:9,type:String},6:{name:"national_prefix_optional_when_formatting",c:8,defaultValue:!1,type:Boolean},5:{name:"domestic_carrier_code_formatting_rule",c:9,type:String}})),n},u.j=u.prototype.j=function(){var n=V;return V||(V=n=l(u,{0:{name:"PhoneNumberDesc",I:"i18n.phonenumbers.PhoneNumberDesc"},2:{name:"national_number_pattern",c:9,type:String},9:{name:"possible_length",v:!0,c:5,type:Number},10:{name:"possible_length_local_only",v:!0,c:5,type:Number},6:{name:"example_number",c:9,type:String}})),n},o.j=o.prototype.j=function(){var n=D;return D||(D=n=l(o,{0:{name:"PhoneMetadata",I:"i18n.phonenumbers.PhoneMetadata"},1:{name:"general_desc",c:11,type:u},2:{name:"fixed_line",c:11,type:u},3:{name:"mobile",c:11,type:u},4:{name:"toll_free",c:11,type:u},5:{name:"premium_rate",c:11,type:u},6:{name:"shared_cost",c:11,type:u},7:{name:"personal_number",c:11,type:u},8:{name:"voip",c:11,type:u},21:{name:"pager",c:11,type:u},25:{name:"uan",c:11,type:u},27:{name:"emergency",c:11,type:u},28:{name:"voicemail",c:11,type:u},29:{name:"short_code",c:11,type:u},30:{name:"standard_rate",c:11,type:u},31:{name:"carrier_specific",c:11,type:u},33:{name:"sms_services",c:11,type:u},24:{name:"no_international_dialling",c:11,type:u},9:{name:"id",required:!0,c:9,type:String},10:{name:"country_code",c:5,type:Number},11:{name:"international_prefix",c:9,type:String},17:{name:"preferred_international_prefix",c:9,type:String},12:{name:"national_prefix",c:9,type:String},13:{name:"preferred_extn_prefix",c:9,type:String},15:{name:"national_prefix_for_parsing",c:9,type:String},16:{name:"national_prefix_transform_rule",c:9,type:String},18:{name:"same_mobile_and_fixed_line_pattern",c:8,defaultValue:!1,type:Boolean},19:{name:"number_format",v:!0,c:11,type:r},20:{name:"intl_number_format",v:!0,c:11,type:r},22:{name:"main_country_for_code",c:8,defaultValue:!1,type:Boolean},23:{name:"leading_digits",c:9,type:String},26:{name:"leading_zero_possible",c:8,defaultValue:!1,type:Boolean}})),n},s.prototype.a=function(n){throw new n.b,Error("Unimplemented")},s.prototype.b=function(n,t){if(11==n.a||10==n.a)return t instanceof e?t:this.a(n.i.prototype.j(),t);if(14==n.a){if("string"==typeof t&&Z.test(t)){var l=Number(t);if(0<l)return l}}else if(n.h)if((l=n.i)===String){if("number"==typeof t)return String(t)}else if(l===Number&&"string"==typeof t&&("Infinity"===t||"-Infinity"===t||"NaN"===t||Z.test(t)))return Number(t);return t},/^-?[0-9]+$/),z=(t(d,s),d.prototype.a=function(n,t){n=new n.b;return n.g=this,n.a=t,n.b={},n},t(m,d),m.prototype.b=function(n,t){return 8==n.a?!!t:s.prototype.b.apply(this,arguments)},m.prototype.a=function(n,t){return m.M.a.call(this,n,t)},{84:["VN"]}),Q={VN:[null,[null,null,"[12]\\d{9}|[135-9]\\d{8}|(?:[16]\\d?|[78])\\d{6}",null,null,null,null,null,null,[7,8,9,10]],[null,null,"2(?:0[3-9]|1[0-689]|2[0-25-9]|3[2-9]|4[2-8]|5[124-9]|6[0-39]|7[0-7]|8[2-7]|9[0-4679])\\d{7}",null,null,null,"2101234567",null,null,[10]],[null,null,"(?:(?:3\\d|7[06-9])\\d|5(?:2[238]|[689]\\d)|8(?:[1-58]\\d|6[5689]|9[689])|9(?:[0-8]\\d|9[013-9]))\\d{6}",null,null,null,"912345678",null,null,[9]],[null,null,"1800\\d{4,6}",null,null,null,"1800123456",null,null,[8,9,10]],[null,null,"1900\\d{4,6}",null,null,null,"1900123456",null,null,[8,9,10]],[null,null,null,null,null,null,null,null,null,[-1]],[null,null,null,null,null,null,null,null,null,[-1]],[null,null,"(?:67|99)2\\d{6}",null,null,null,"992012345",null,null,[9]],"VN",84,"00","0",null,null,"0",null,null,null,[[null,"(\\d{2})(\\d{5})","$1 $2",["80"],"0$1",null,1],[null,"(\\d{3})(\\d{4})","$1 $2",["[17]99"],"0$1",null,1],[null,"(\\d{3})(\\d{4,5})","$1 $2",["69"],"0$1",null,1],[null,"(\\d{4})(\\d{4,6})","$1 $2",["1"],null,null,1],[null,"(\\d{2})(\\d{3})(\\d{2})(\\d{2})","$1 $2 $3 $4",["[69]"],"0$1",null,1],[null,"(\\d{3})(\\d{3})(\\d{3})","$1 $2 $3",["[3578]"],"0$1",null,1],[null,"(\\d{2})(\\d{4})(\\d{4})","$1 $2 $3",["2[48]"],"0$1",null,1],[null,"(\\d{3})(\\d{4})(\\d{3})","$1 $2 $3",["2"],"0$1",null,1]],[[null,"(\\d{2})(\\d{5})","$1 $2",["80"],"0$1",null,1],[null,"(\\d{4})(\\d{4,6})","$1 $2",["1"],null,null,1],[null,"(\\d{2})(\\d{3})(\\d{2})(\\d{2})","$1 $2 $3 $4",["[69]"],"0$1",null,1],[null,"(\\d{3})(\\d{3})(\\d{3})","$1 $2 $3",["[3578]"],"0$1",null,1],[null,"(\\d{2})(\\d{4})(\\d{4})","$1 $2 $3",["2[48]"],"0$1",null,1],[null,"(\\d{3})(\\d{4})(\\d{3})","$1 $2 $3",["2"],"0$1",null,1]],[null,null,null,null,null,null,null,null,null,[-1]],null,null,[null,null,"(?:[17]99|69\\d\\d?)\\d{4}",null,null,null,null,null,null,[7,8]],[null,null,"(?:[17]99|69\\d\\d?|80\\d)\\d{4}",null,null,null,"1992000",null,null,[7,8]],null,null,[null,null,null,null,null,null,null,null,null,[-1]]]},W=(b.b=function(){return b.a||(b.a=new b)},{0:"0",1:"1",2:"2",3:"3",4:"4",5:"5",6:"6",7:"7",8:"8",9:"9","０":"0","１":"1","２":"2","３":"3","４":"4","５":"5","６":"6","７":"7","８":"8","９":"9","٠":"0","١":"1","٢":"2","٣":"3","٤":"4","٥":"5","٦":"6","٧":"7","٨":"8","٩":"9","۰":"0","۱":"1","۲":"2","۳":"3","۴":"4","۵":"5","۶":"6","۷":"7","۸":"8","۹":"9"}),X=RegExp("[+＋]+"),nn=RegExp("([0-9０-９٠-٩۰-۹])"),tn=/^\(?\$1\)?$/,ln=new o,en=(g(ln,11,"NA"),/\[([^\[\]])*\]/g),rn=/\d(?=[^,}][^,}])/g,un=RegExp("^[-x‐-―−ー－-／  ­​⁠　()（）［］.\\[\\]/~⁓∼～]*(\\$\\d[-x‐-―−ー－-／  ­​⁠　()（）［］.\\[\\]/~⁓∼～]*)+$"),an=/[- ]/;$.prototype.K=function(){this.C="",f(this.i),f(this.u),f(this.m),this.s=0,this.w="",f(this.b),this.h="",f(this.a),this.l=!0,this.A=this.o=this.F=!1,this.f=[],this.B=!1,this.g!=this.J&&(this.g=S(this,this.D))},$.prototype.L=function(n){return this.C=function(n,t){n.i.a(t);var l,e=t;if(nn.test(e)||1==n.i.b.length&&X.test(e)?("+"==(e=t)?(l=e,n.u.a(e)):(l=W[e],n.u.a(l),n.a.a(l)),t=l):(n.l=!1,n.F=!0),!n.l){if(!n.F)if(F(n)){if(C(n))return N(n)}else if(0<n.h.length&&(e=n.a.toString(),f(n.a),n.a.a(n.h),n.a.a(e),l=(e=n.b.toString()).lastIndexOf(n.h),f(n.b),n.b.a(e.substring(0,l))),n.h!=R(n))return n.b.a(" "),N(n);return n.i.toString()}switch(n.u.b.length){case 0:case 1:case 2:return n.i.toString();case 3:if(!F(n))return n.h=R(n),j(n);n.A=!0;default:return n.A?(C(n)&&(n.A=!1),n.b.toString()+n.a.toString()):0<n.f.length?(e=q(n,t),0<(l=A(n)).length?l:(x(n,n.a.toString()),w(n)?B(n):n.l?E(n,e):n.i.toString())):j(n)}}(this,n)},n("Cleave.AsYouTypeFormatter",$),n("Cleave.AsYouTypeFormatter.prototype.inputDigit",$.prototype.L),n("Cleave.AsYouTypeFormatter.prototype.clear",$.prototype.K)}.call("object"==typeof global&&global?global:window);