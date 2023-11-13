!function(){"use strict";var e=window.wp.blocks;function n(){return n=Object.assign?Object.assign.bind():function(e){for(var n=1;n<arguments.length;n++){var o=arguments[n];for(var t in o)Object.prototype.hasOwnProperty.call(o,t)&&(e[t]=o[t])}return e},n.apply(this,arguments)}var o=window.wp.element,t=window.wp.i18n,l=window.wp.blockEditor,r=window.wp.components,i=JSON.parse('{"u2":"pmpro/login-form"}');(0,e.registerBlockType)(i.u2,{icon:{background:"#FFFFFF",foreground:"#658B24",src:"unlock"},edit:function(e){let{attributes:i,setAttributes:s}=e;const a=(0,l.useBlockProps)(),{display_if_logged_in:p,show_menu:c,show_logout_link:m,location:g}=i;return(0,o.createElement)(o.Fragment,null,(0,o.createElement)(l.InspectorControls,null,(0,o.createElement)(r.PanelBody,null,(0,o.createElement)(r.ToggleControl,{label:(0,t.__)("Display 'Welcome' content when logged in.","paid-memberships-pro"),checked:p,onChange:e=>{s({display_if_logged_in:e})}}),(0,o.createElement)(r.ToggleControl,{label:(0,t.__)("Display the 'Log In Widget' menu in the 'Welcome' content.","paid-memberships-pro"),help:(0,t.__)("Assign the menu under Appearance > Menus.","paid-memberships-pro"),checked:c,onChange:e=>{s({show_menu:e})}}),(0,o.createElement)(r.ToggleControl,{label:(0,t.__)("Display a 'Log Out' link in the 'Welcome' content.","paid-memberships-pro"),checked:m,onChange:e=>{s({show_logout_link:e})}}))),(0,o.createElement)("div",n({className:"pmpro-block-element"},a),(0,o.createElement)("span",{className:"pmpro-block-title"},(0,t.__)("Paid Memberships Pro","paid-memberships-pro")),(0,o.createElement)("span",{className:"pmpro-block-subtitle"},(0,t.__)("Log in Form","paid-memberships-pro"))))}})}();