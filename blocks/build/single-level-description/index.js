!function(){"use strict";var e,t={417:function(){var e=window.wp.blocks,t=window.wp.element,r=(window.wp.i18n,window.wp.blockEditor),n=JSON.parse('{"u2":"pmpro/single-level-description"}');(0,e.registerBlockType)(n.u2,{edit:function(e){const n=e=>pmpro.all_levels_formatted_text[e]?pmpro.all_levels_formatted_text[e].description:null;return[(0,t.createElement)("div",(0,r.useBlockProps)(),n(e.attributes.selected_level)?(0,t.createElement)("p",null,n(e.attributes.selected_level)):(0,t.createElement)("p",{style:{color:"grey"}},"[Level Description Placeholder]"))]},save:function(e){const n=r.useBlockProps.save();return(0,t.createElement)("div",n,(o=e.attributes.selected_level,pmpro.all_levels_formatted_text[o]?pmpro.all_levels_formatted_text[o].description:""));var o}})}},r={};function n(e){var o=r[e];if(void 0!==o)return o.exports;var l=r[e]={exports:{}};return t[e](l,l.exports,n),l.exports}n.m=t,e=[],n.O=function(t,r,o,l){if(!r){var i=1/0;for(a=0;a<e.length;a++){r=e[a][0],o=e[a][1],l=e[a][2];for(var s=!0,p=0;p<r.length;p++)(!1&l||i>=l)&&Object.keys(n.O).every((function(e){return n.O[e](r[p])}))?r.splice(p--,1):(s=!1,l<i&&(i=l));if(s){e.splice(a--,1);var c=o();void 0!==c&&(t=c)}}return t}l=l||0;for(var a=e.length;a>0&&e[a-1][2]>l;a--)e[a]=e[a-1];e[a]=[r,o,l]},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={399:0,250:0};n.O.j=function(t){return 0===e[t]};var t=function(t,r){var o,l,i=r[0],s=r[1],p=r[2],c=0;if(i.some((function(t){return 0!==e[t]}))){for(o in s)n.o(s,o)&&(n.m[o]=s[o]);if(p)var a=p(n)}for(t&&t(r);c<i.length;c++)l=i[c],n.o(e,l)&&e[l]&&e[l][0](),e[l]=0;return n.O(a)},r=self.webpackChunkpaid_memberships_pro=self.webpackChunkpaid_memberships_pro||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))}();var o=n.O(void 0,[250],(function(){return n(417)}));o=n.O(o)}();