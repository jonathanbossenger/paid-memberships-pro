!function(){"use strict";var e,r={996:function(){var e=window.wp.blocks;function r(){return r=Object.assign?Object.assign.bind():function(e){for(var r=1;r<arguments.length;r++){var t=arguments[r];for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(e[n]=t[n])}return e},r.apply(this,arguments)}var t=window.wp.element,n=window.wp.i18n,o=window.wp.blockEditor,i=JSON.parse('{"u2":"pmpro/account-links-section"}');(0,e.registerBlockType)(i.u2,{edit:function(e){let{attributes:i,setAttributes:s}=e;const p=(0,o.useBlockProps)({});return[(0,t.createElement)("div",r({className:"pmpro-block-element"},p),(0,t.createElement)("span",{className:"pmpro-block-title"},(0,n.__)("Paid Memberships Pro","paid-memberships-pro")),(0,t.createElement)("span",{className:"pmpro-block-subtitle"},(0,n.__)("Membership Account: Member Links","paid-memberships-pro")),(0,t.createElement)("input",{placeholder:(0,n.__)("No title will be shown.","paid-memberships-pro"),type:"text",value:i.title,class:"block-editor-plain-text",onChange:e=>{s({title:e.target.value})}}))]}})}},t={};function n(e){var o=t[e];if(void 0!==o)return o.exports;var i=t[e]={exports:{}};return r[e](i,i.exports,n),i.exports}n.m=r,e=[],n.O=function(r,t,o,i){if(!t){var s=1/0;for(l=0;l<e.length;l++){t=e[l][0],o=e[l][1],i=e[l][2];for(var p=!0,a=0;a<t.length;a++)(!1&i||s>=i)&&Object.keys(n.O).every((function(e){return n.O[e](t[a])}))?t.splice(a--,1):(p=!1,i<s&&(s=i));if(p){e.splice(l--,1);var c=o();void 0!==c&&(r=c)}}return r}i=i||0;for(var l=e.length;l>0&&e[l-1][2]>i;l--)e[l]=e[l-1];e[l]=[t,o,i]},n.o=function(e,r){return Object.prototype.hasOwnProperty.call(e,r)},function(){var e={34:0,41:0};n.O.j=function(r){return 0===e[r]};var r=function(r,t){var o,i,s=t[0],p=t[1],a=t[2],c=0;if(s.some((function(r){return 0!==e[r]}))){for(o in p)n.o(p,o)&&(n.m[o]=p[o]);if(a)var l=a(n)}for(r&&r(t);c<s.length;c++)i=s[c],n.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return n.O(l)},t=self.webpackChunkpaid_memberships_pro=self.webpackChunkpaid_memberships_pro||[];t.forEach(r.bind(null,0)),t.push=r.bind(null,t.push.bind(t))}();var o=n.O(void 0,[41],(function(){return n(996)}));o=n.O(o)}();