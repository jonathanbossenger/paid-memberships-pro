!function(){"use strict";var e,l={843:function(){var e=window.wp.blocks;function l(){return l=Object.assign?Object.assign.bind():function(e){for(var l=1;l<arguments.length;l++){var t=arguments[l];for(var n in t)Object.prototype.hasOwnProperty.call(t,n)&&(e[n]=t[n])}return e},l.apply(this,arguments)}var t=window.wp.element,n=window.wp.i18n,o=window.wp.blockEditor,r=window.wp.components,c=window.wp.data,p=JSON.parse('{"u2":"pmpro/single-level"}');(0,e.registerBlockType)(p.u2,{edit:function(e){const p=[{value:0,label:(0,n.__)("Choose a level","paid-memberships-pro")}].concat(pmpro.all_level_values_and_labels),{attributes:{selected_level:s},setAttributes:a,isSelected:i}=e;return(0,c.select)("core/block-editor").getBlock(e.clientId).innerBlocks.forEach((e=>{(0,c.dispatch)("core/block-editor").updateBlockAttributes(e.clientId,{selected_level:s})})),[(0,t.createElement)(t.Fragment,null,i&&(0,t.createElement)(o.InspectorControls,null,(0,t.createElement)(r.PanelBody,null,(0,t.createElement)(r.SelectControl,{label:(0,n.__)("Select a level","paid-memberships-pro"),value:s,options:p,onChange:e=>a({selected_level:e})}))),i?(0,t.createElement)("div",l({className:"pmpro-block-require-membership-element"},(0,o.useBlockProps)()),(0,t.createElement)("span",{className:"pmpro-block-title"},(0,n.__)("Individual Membership Level","paid-memberships-pro")),(0,t.createElement)("div",{class:"pmpro-block-inspector"},(0,t.createElement)(o.InnerBlocks,{templateLock:!1,template:[["pmpro/single-level-name",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-price",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-expiration",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-checkout",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-description",{selected_level:s,content:"Example Nested Block Template"}]]}))):(0,t.createElement)("div",l({className:"pmpro-block-require-membership-element"},(0,o.useBlockProps)()),(0,t.createElement)("span",{className:"pmpro-block-title"},(0,n.__)("Membership Level","paid-memberships-pro")),(0,t.createElement)(o.InnerBlocks,{templateLock:!1,template:[["pmpro/single-level-name",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-price",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-expiration",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-checkout",{selected_level:s,content:"Example Nested Block Template"}],["pmpro/single-level-description",{selected_level:s,content:"Example Nested Block Template"}]]})))]},save:function(){const e=o.useBlockProps.save();return(0,t.createElement)("div",e,(0,t.createElement)(o.InnerBlocks.Content,null))}})}},t={};function n(e){var o=t[e];if(void 0!==o)return o.exports;var r=t[e]={exports:{}};return l[e](r,r.exports,n),r.exports}n.m=l,e=[],n.O=function(l,t,o,r){if(!t){var c=1/0;for(i=0;i<e.length;i++){t=e[i][0],o=e[i][1],r=e[i][2];for(var p=!0,s=0;s<t.length;s++)(!1&r||c>=r)&&Object.keys(n.O).every((function(e){return n.O[e](t[s])}))?t.splice(s--,1):(p=!1,r<c&&(c=r));if(p){e.splice(i--,1);var a=o();void 0!==a&&(l=a)}}return l}r=r||0;for(var i=e.length;i>0&&e[i-1][2]>r;i--)e[i]=e[i-1];e[i]=[t,o,r]},n.o=function(e,l){return Object.prototype.hasOwnProperty.call(e,l)},function(){var e={78:0,485:0};n.O.j=function(l){return 0===e[l]};var l=function(l,t){var o,r,c=t[0],p=t[1],s=t[2],a=0;if(c.some((function(l){return 0!==e[l]}))){for(o in p)n.o(p,o)&&(n.m[o]=p[o]);if(s)var i=s(n)}for(l&&l(t);a<c.length;a++)r=c[a],n.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return n.O(i)},t=self.webpackChunkpaid_memberships_pro=self.webpackChunkpaid_memberships_pro||[];t.forEach(l.bind(null,0)),t.push=l.bind(null,t.push.bind(t))}();var o=n.O(void 0,[485],(function(){return n(843)}));o=n.O(o)}();