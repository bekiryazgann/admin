import extend from"extend";import Delta from"rich-text/lib/delta";import Emitter from"../core/emitter";import Keyboard from"../modules/keyboard";import Theme from"../core/theme";import ColorPicker from"../ui/color-picker";import IconPicker from"../ui/icon-picker";import Picker from"../ui/picker";import Tooltip from"../ui/tooltip";import icons from"../ui/icons";const ALIGNS=[!1,"center","right","justify"],COLORS=["#000000","#e60000","#ff9900","#ffff00","#008a00","#0066cc","#9933ff","#ffffff","#facccc","#ffebcc","#ffffcc","#cce8cc","#cce0f5","#ebd6ff","#bbbbbb","#f06666","#ffc266","#ffff66","#66b966","#66a3e0","#c285ff","#888888","#a10000","#b26b00","#b2b200","#006100","#0047b2","#6b24b2","#444444","#5c0000","#663d00","#666600","#003700","#002966","#3d1466"],FONTS=[!1,"serif","monospace"],HEADERS=["1","2","3",!1],SIZES=["small",!1,"large","huge"];class BaseTheme extends Theme{constructor(t,e){super(t,e);let i=e=>{if(!document.body.contains(t.root))return document.body.removeEventListener("click",i);null==this.tooltip||this.tooltip.root.contains(e.target)||document.activeElement===this.tooltip.textbox||this.quill.hasFocus()||this.tooltip.hide(),null!=this.pickers&&this.pickers.forEach(function(t){t.container.contains(e.target)||t.close()})};document.body.addEventListener("click",i)}addModule(t){var e=super.addModule(t);return"toolbar"===t&&this.extendToolbar(e),e}buildButtons(t){t.forEach(i=>{(i.getAttribute("class")||"").split(/\s+/).forEach(t=>{var e;t.startsWith("ql-")&&(t=t.slice("ql-".length),null!=icons[t])&&("direction"===t?i.innerHTML=icons[t][""]+icons[t].rtl:"string"==typeof icons[t]?i.innerHTML=icons[t]:null!=(e=i.value||"")&&icons[t][e]&&(i.innerHTML=icons[t][e]))})})}buildPickers(t){this.pickers=t.map(t=>{var e;return t.classList.contains("ql-align")?(null==t.querySelector("option")&&fillSelect(t,ALIGNS),new IconPicker(t,icons.align)):t.classList.contains("ql-background")||t.classList.contains("ql-color")?(e=t.classList.contains("ql-background")?"background":"color",null==t.querySelector("option")&&fillSelect(t,COLORS,"background"==e?"#ffffff":"#000000"),new ColorPicker(t,icons[e])):(null==t.querySelector("option")&&(t.classList.contains("ql-font")?fillSelect(t,FONTS):t.classList.contains("ql-header")?fillSelect(t,HEADERS):t.classList.contains("ql-size")&&fillSelect(t,SIZES)),new Picker(t))});t=()=>{this.pickers.forEach(function(t){t.update()})};this.quill.on(Emitter.events.SELECTION_CHANGE,t).on(Emitter.events.SCROLL_OPTIMIZE,t)}}BaseTheme.DEFAULTS=extend(!0,{},Theme.DEFAULTS,{modules:{toolbar:{handlers:{formula:function(t){this.quill.theme.tooltip.edit("formula")},image:function(t){let i=this.container.querySelector("input.ql-image[type=file]");null==i&&((i=document.createElement("input")).setAttribute("type","file"),i.setAttribute("accept","image/*"),i.classList.add("ql-image"),i.addEventListener("change",()=>{var t;null!=i.files&&null!=i.files[0]&&((t=new FileReader).onload=t=>{var e=this.quill.getSelection(!0);this.quill.updateContents((new Delta).retain(e.index).delete(e.length).insert({image:t.target.result}),Emitter.sources.USER),i.value=""},t.readAsDataURL(i.files[0]))}),this.container.appendChild(i)),i.click()},video:function(t){this.quill.theme.tooltip.edit("video")}}}}});class BaseTooltip extends Tooltip{constructor(t,e){super(t,e),this.textbox=this.root.querySelector('input[type="text"]'),this.listen()}listen(){this.textbox.addEventListener("keydown",t=>{Keyboard.match(t,"enter")?(this.save(),t.preventDefault()):Keyboard.match(t,"escape")&&(this.cancel(),t.preventDefault())})}cancel(){this.hide()}edit(t="link",e=null){this.root.classList.remove("ql-hidden"),this.root.classList.add("ql-editing"),null!=e?this.textbox.value=e:t!==this.root.getAttribute("data-mode")&&(this.textbox.value=""),this.position(this.quill.getBounds(this.quill.selection.savedRange)),this.textbox.select(),this.textbox.setAttribute("placeholder",this.textbox.getAttribute("data-"+t)||""),this.root.setAttribute("data-mode",t)}restoreFocus(){var t=this.quill.root.scrollTop;this.quill.focus(),this.quill.root.scrollTop=t}save(){let t=this.textbox.value;switch(this.root.getAttribute("data-mode")){case"link":var e=this.quill.root.scrollTop;this.linkRange?(this.quill.formatText(this.linkRange,"link",t,Emitter.sources.USER),delete this.linkRange):(this.restoreFocus(),this.quill.format("link",t,Emitter.sources.USER)),this.quill.root.scrollTop=e;break;case"video":e=t.match(/^(https?):\/\/(www\.)?youtube\.com\/watch.*v=([a-zA-Z0-9_-]+)/)||t.match(/^(https?):\/\/(www\.)?youtu\.be\/([a-zA-Z0-9_-]+)/);e?t=e[1]+"://www.youtube.com/embed/"+e[3]+"?showinfo=0":(e=t.match(/^(https?):\/\/(www\.)?vimeo\.com\/(\d+)/))&&(t=e[1]+"://player.vimeo.com/video/"+e[3]+"/");case"formula":var e=this.quill.getSelection(!0),i=e.index+e.length;null!=e&&(this.quill.insertEmbed(i,this.root.getAttribute("data-mode"),t,Emitter.sources.USER),"formula"===this.root.getAttribute("data-mode")&&this.quill.insertText(i+1," ",Emitter.sources.USER),this.quill.setSelection(i+2,Emitter.sources.USER))}this.textbox.value="",this.hide()}}function fillSelect(i,t,o=!1){t.forEach(function(t){var e=document.createElement("option");t===o?e.setAttribute("selected","selected"):e.setAttribute("value",t),i.appendChild(e)})}export{BaseTooltip,BaseTheme as default};