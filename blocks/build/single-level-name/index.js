!function(){"use strict";var e,t={123:function(){var e=window.wp.blocks,t=window.wp.element,r=(window.wp.i18n,window.wp.blockEditor),n=JSON.parse('{"u2":"pmpro/single-level-name"}');(0,e.registerBlockType)(n.u2,{edit:function(e){const n=e=>pmpro.all_levels_formatted_text[e]?pmpro.all_levels_formatted_text[e].name:null;return[(0,t.createElement)("div",(0,r.useBlockProps)(),n(e.attributes.selected_level)?(0,t.createElement)("p",null,n(e.attributes.selected_level)):(0,t.createElement)("p",{style:{color:"grey"}},"[Level Name Placeholder]"))]},save:function(e){const n=r.useBlockProps.save();return(0,t.createElement)("div",n,(l=e.attributes.selected_level,pmpro.all_levels_formatted_text[l]?pmpro.all_levels_formatted_text[l].name:""));var l}})}},r={};function n(e){var l=r[e];if(void 0!==l)return l.exports;var o=r[e]={exports:{}};return t[e](o,o.exports,n),o.exports}n.m=t,e=[],n.O=function(t,r,l,o){if(!r){var i=1/0;for(p=0;p<e.length;p++){r=e[p][0],l=e[p][1],o=e[p][2];for(var a=!0,s=0;s<r.length;s++)(!1&o||i>=o)&&Object.keys(n.O).every((function(e){return n.O[e](r[s])}))?r.splice(s--,1):(a=!1,o<i&&(i=o));if(a){e.splice(p--,1);var u=l();void 0!==u&&(t=u)}}return t}o=o||0;for(var p=e.length;p>0&&e[p-1][2]>o;p--)e[p]=e[p-1];e[p]=[r,l,o]},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={480:0,772:0};n.O.j=function(t){return 0===e[t]};var t=function(t,r){var l,o,i=r[0],a=r[1],s=r[2],u=0;if(i.some((function(t){return 0!==e[t]}))){for(l in a)n.o(a,l)&&(n.m[l]=a[l]);if(s)var p=s(n)}for(t&&t(r);u<i.length;u++)o=i[u],n.o(e,o)&&e[o]&&e[o][0](),e[o]=0;return n.O(p)},r=self.webpackChunkpaid_memberships_pro=self.webpackChunkpaid_memberships_pro||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))}();var l=n.O(void 0,[772],(function(){return n(123)}));l=n.O(l)}();