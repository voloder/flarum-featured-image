(()=>{var t={649:function(){(function(){var t=[].slice;String.prototype.autoLink=function(){var e,o,r,n,a,u;return a=/(^|[\s\n]|<[A-Za-z]*\/?>)((?:https?|ftp):\/\/[\-A-Z0-9+\u0026\u2019@#\/%?=()~_|!:,.;]*[\-A-Z0-9+\u0026@#\/%=~()_|])/gi,0<(n=1<=arguments.length?t.call(arguments,0):[]).length?(r=n[0],o=function(){var t;for(e in t=[],r)u=r[e],"callback"!==e&&t.push(" "+e+"='"+u+"'");return t}().join(""),this.replace(a,(function(t,e,n){return""+e+(("function"==typeof r.callback?r.callback(n):void 0)||"<a href='"+n+"'"+o+">"+n+"</a>")}))):this.replace(a,"$1<a href='$2'>$2</a>")}}).call(this)}},e={};function o(r){var n=e[r];if(void 0!==n)return n.exports;var a=e[r]={exports:{}};return t[r].call(a.exports,a,a.exports,o),a.exports}o.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return o.d(e,{a:e}),e},o.d=(t,e)=>{for(var r in e)o.o(e,r)&&!o.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:e[r]})},o.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),(()=>{"use strict";const t=flarum.core.compat["forum/app"];var e=o.n(t);const r=flarum.core.compat["common/extend"];o(649);const n=flarum.core.compat["forum/components/UserCard"];var a=o.n(n);const u=flarum.core.compat["common/models/User"];var c=o.n(u);const i=flarum.core.compat["common/Model"];var p=o.n(i);function l(t,e){return l=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(t,e){return t.__proto__=e,t},l(t,e)}const s=flarum.core.compat["common/Component"];var f=function(t){function o(){return t.apply(this,arguments)||this}var r,n;n=t,(r=o).prototype=Object.create(n.prototype),r.prototype.constructor=r,l(r,n);var a=o.prototype;return a.view=function(){return m("button",{className:"Button",type:"button",name:"add-featured-image",onclick:this.uploadButtonClicked.bind(this)},m("span",{className:"Button-label"},"Select Featured Image..."),m("form",{style:"display: none;"},m("input",{type:"file",multiple:!1,onchange:this.uploadImage.bind(this)})))},a.uploadButtonClicked=function(t){this.$("input").click()},a.uploadImage=function(){var t=new FormData;t.append("featuredImage",this.$("input").prop("files")[0]),e().request({url:e().forum.attribute("apiUrl")+"/featured-image/upload",method:"POST",serialize:function(t){return t},body:t}).then((function(t){return t.json()}))},o}(o.n(s)());e().initializers.add("flarum-featured-image",(function(){c().prototype.featuredImage=p().attribute("featuredImage"),(0,r.extend)(a().prototype,"view",(function(t){console.log(t);var e=this.attrs.user;e.featuredImage&&(t.attrs.style.backgroundImage="url("+e.featuredImage+")")})),(0,r.extend)(a().prototype,"infoItems",(function(t){t.add("add-featured-image",m(f,null," "),-100)}))}))})(),module.exports={}})();
//# sourceMappingURL=forum.js.map