(()=>{var t={649:function(){(function(){var t=[].slice;String.prototype.autoLink=function(){var e,o,r,a,n,c;return n=/(^|[\s\n]|<[A-Za-z]*\/?>)((?:https?|ftp):\/\/[\-A-Z0-9+\u0026\u2019@#\/%?=()~_|!:,.;]*[\-A-Z0-9+\u0026@#\/%=~()_|])/gi,0<(a=1<=arguments.length?t.call(arguments,0):[]).length?(r=a[0],o=function(){var t;for(e in t=[],r)c=r[e],"callback"!==e&&t.push(" "+e+"='"+c+"'");return t}().join(""),this.replace(n,(function(t,e,a){return""+e+(("function"==typeof r.callback?r.callback(a):void 0)||"<a href='"+a+"'"+o+">"+a+"</a>")}))):this.replace(n,"$1<a href='$2'>$2</a>")}}).call(this)}},e={};function o(r){var a=e[r];if(void 0!==a)return a.exports;var n=e[r]={exports:{}};return t[r].call(n.exports,n,n.exports,o),n.exports}o.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return o.d(e,{a:e}),e},o.d=(t,e)=>{for(var r in e)o.o(e,r)&&!o.o(t,r)&&Object.defineProperty(t,r,{enumerable:!0,get:e[r]})},o.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),(()=>{"use strict";const t=flarum.core.compat["forum/app"];var e=o.n(t);const r=flarum.core.compat["common/extend"];o(649);const a=flarum.core.compat["forum/components/UserCard"];var n=o.n(a);flarum.core.compat["common/models/User"],flarum.core.compat["common/Model"];var c=function(){function t(){}return t.prototype.view=function(){return m("button",{className:"Button",type:"button",name:"add-featured-image"},m("span",{className:"Button-label"},"Choose an Image..."))},t}();e().initializers.add("flarum-featured-image",(function(){(0,r.extend)(n().prototype,"infoItems",(function(t){t.add("add-featured-image",m(c,null," "),-100)}))}))})(),module.exports={}})();
//# sourceMappingURL=forum.js.map