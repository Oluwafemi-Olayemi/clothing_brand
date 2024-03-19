import{f as V,a as B,u as D}from"./links.CKSg78-h.js";import{v as I}from"./isArrayLikeObject.CkjpbQo7.js";import{B as x}from"./Checkbox.CfGJSeWE.js";import{B as G}from"./RadioToggle.XiBFFWmC.js";import{C as E}from"./Caret.Cuasz9Up.js";import{C as K}from"./Card.C6Yzm1Gr.js";import{C as P}from"./PostTypeOptions.CpDFp6IT.js";import{C as N}from"./ProBadge.Dgq0taM8.js";import{C as R}from"./SettingsRow.B0N4hwjp.js";import{C as W}from"./Tooltip.DcUmvaHX.js";import{G as z,a as H}from"./Row.ou4tdPuA.js";import{a as Y}from"./index.DX4OhBfI.js";import{y as p,c as y,D as n,m as s,o as l,a as r,t as i,E as h,l as u,d,F as q,L as F}from"./vue.esm-bundler.DzelZkHk.js";import{_ as j}from"./_plugin-vue_export-helper.BN1snXvA.js";import"./default-i18n.BtxsUzQk.js";import"./Checkmark.Du5wcsnR.js";import"./Slide.BfXXFx9A.js";import"./HighlightToggle.BLZDQLdT.js";import"./PostTypes.Cef6XkQ_.js";const Q={setup(){return{licenseStore:V(),optionsStore:B(),rootStore:D()}},components:{BaseCheckbox:x,BaseRadioToggle:G,CoreAlert:E,CoreCard:K,CorePostTypeOptions:P,CoreProBadge:N,CoreSettingsRow:R,CoreTooltip:W,GridColumn:z,GridRow:H,SvgCircleQuestionMark:Y},data(){return{openAiKeyInvalid:!1,strings:{advanced:this.$t.__("Advanced Settings",this.$td),truSeo:this.$t.__("TruSEO Score & Content",this.$td),truSeoDescription:this.$t.__("Enable our TruSEO score to help you optimize your content for maximum traffic.",this.$td),headlineAnalyzer:this.$t.__("Headline Analyzer",this.$td),headlineAnalyzerDescription:this.$t.__("Enable our Headline Analyzer to help you write irresistible headlines and rank better in search results.",this.$td),seoAnalysis:this.$t.__("SEO Analysis",this.$td),postTypeColumns:this.$t.__("Post Type Columns",this.$td),includeAllPostTypes:this.$t.__("Include All Post Types",this.$td),selectPostTypes:this.$t.sprintf(this.$t.__("Select which Post Types you want to use the %1$s columns with.",this.$td),"AIOSEO"),usageTracking:this.$t.__("Usage Tracking",this.$td),adminBarMenu:this.$t.__("Admin Bar Menu",this.$td),adminBarMenuDescription:this.$t.sprintf(this.$t.__("This adds %1$s to the admin toolbar for easy access to your SEO settings.",this.$td),"AIOSEO"),dashboardWidgets:this.$t.__("Dashboard Widgets",this.$td),dashboardWidgetsDescription:this.$t.sprintf(this.$t.__("Select which %1$s widgets to display on the dashboard.",this.$td),"AIOSEO"),announcements:this.$t.__("Announcements",this.$td),announcementsDescription:this.$t.__("This allows you to hide plugin announcements and update details in the Notification Center.",this.$td),automaticUpdates:this.$t.__("Automatic Updates",this.$td),all:this.$t.__("All (recommended)",this.$td),allDescription:this.$t.__("You are getting the latest features, bugfixes, and security updates as they are released.",this.$td),minor:this.$t.__("Minor Only",this.$td),minorDescription:this.$t.__("You are getting bugfixes and security updates, but not major features.",this.$td),none:this.$t.__("None",this.$td),noneDescription:this.$t.__("You will need to manually update everything.",this.$td),usageTrackingDescription:this.$t.__("By allowing us to track usage data we can better help you as we will know which WordPress configurations, themes and plugins we should test.",this.$td),usageTrackingTooltip:this.$t.sprintf(this.$t.__("Complete documentation on usage tracking is available %1$shere%2$s.",this.$td),this.$t.sprintf('<strong><a href="%1$s" target="_blank">',this.$links.getDocUrl("usageTracking")),"</a></strong>"),adminBarMenuUpsell:this.$t.sprintf(this.$t.__("Admin Bar Menu is a %1$s feature. %2$s",this.$td),"PRO",this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"admin-bar-menu",!0)),dashboardWidgetsUpsell:this.$t.sprintf(this.$t.__("Dashboard Widgets is a %1$s feature. %2$s",this.$td),"PRO",this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"dashboard-widget",!0)),taxonomyColumns:this.$t.__("Taxonomy Columns",this.$td),includeAllTaxonomies:this.$t.__("Include All Taxonomies",this.$td),selectTaxonomies:this.$t.sprintf(this.$t.__("Select which Taxonomies you want to use the %1$s columns with.",this.$td),"AIOSEO"),taxonomyColumnsUpsell:this.$t.sprintf(this.$t.__("Taxonomy Columns is a %1$s feature. %2$s",this.$td),"PRO",this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"taxonomy-columns",!0)),uninstallAioseo:this.$t.sprintf(this.$t.__("Uninstall %1$s",this.$td),"AIOSEO"),uninstallAioseoDescription:this.$t.sprintf(this.$t.__("Check this if you would like to remove ALL %1$s data upon plugin deletion. All settings and SEO data will be unrecoverable.",this.$td),"AIOSEO"),openAiKey:this.$t.__("OpenAI API Key",this.$td),openAiKeyDescription:this.$t.sprintf(this.$t.__("Enter an OpenAI API key in order to automatically generate SEO titles and meta descriptions for your pages. %1$s",this.$td),this.$links.getDocLink(this.$constants.GLOBAL_STRINGS.learnMore,"openAi",!0)),openAiKeyUpsell:this.$t.sprintf(this.$t.__("OpenAI Integration is a %1$s feature. %2$s",this.$td),"PRO",this.$links.getUpsellLink("general-settings-advanced",this.$constants.GLOBAL_STRINGS.learnMore,"open-ai",!0)),openAiKeyInvalid:this.$t.__("The API key you have entered is invalid. Please check your API key and try again.",this.$td)}}},computed:{adminBarMenu:{get(){return this.licenseStore.isUnlicensed?!0:this.optionsStore.options.advanced.adminBarMenu},set(c){this.optionsStore.options.advanced.adminBarMenu=c}},widgets(){return[{key:"seoSetup",label:this.$t.__("SEO Setup Wizard",this.$td),tooltip:this.$t.__("Our SEO Setup Wizard dashboard widget helps you remember to finish setting up some initial crucial settings for your site to help you rank higher in search results. Once the setup wizard is completed this widget will automatically disappear.",this.$td)},{key:"seoOverview",label:this.$t.__("SEO Overview",this.$td),tooltip:this.$t.__("Our SEO Overview widget helps you determine which posts or pages you should focus on for content updates to help you rank higher in search results.",this.$td)},{key:"seoNews",label:this.$t.__("SEO News",this.$td),tooltip:this.$t.__("Our SEO News widget provides helpful links that enable you to get the most out of your SEO and help you continue to rank higher than your competitors in search results.",this.$td)}]}},methods:{versionCompare:I,updateDashboardWidgets(c,a){if(c){const e=this.optionsStore.options.advanced.dashboardWidgets;e.push(a.key),this.optionsStore.options.advanced.dashboardWidgets=e;return}const A=this.optionsStore.options.advanced.dashboardWidgets.findIndex(e=>e===a.key);A!==-1&&this.optionsStore.options.advanced.dashboardWidgets.splice(A,1)},isDashboardWidgetChecked(c){return this.licenseStore.isUnlicensed?!0:this.optionsStore.options.advanced.dashboardWidgets.includes(c.key)},validateOpenAiKey(){this.optionsStore.options.advanced.openAiKey&&this.optionsStore.options.advanced.openAiKey.match(/^sk-[a-zA-Z0-9]{48}$/)===null?this.openAiKeyInvalid=!0:this.openAiKeyInvalid=!1}},beforeMount(){this.validateOpenAiKey()}},Z={class:"aioseo-advanced"},J={class:"aioseo-description"},X={class:"aioseo-description"},ee={class:"aioseo-description"},te=["innerHTML"],se={class:"aioseo-description"},ne=["innerHTML"],oe=["innerHTML"],ie={class:"aioseo-description"},ae=["innerHTML"],le={class:"aioseo-description"},re=["innerHTML"],de={class:"aioseo-description"},ce={class:"aioseo-description"},ue={key:0},pe={key:1},he={key:2},me=["innerHTML"],_e={class:"aioseo-description"},ge=["innerHTML"],ye=["innerHTML"],Se={class:"aioseo-description"};function ve(c,a,A,e,t,_){const S=p("base-toggle"),m=p("core-settings-row"),v=p("base-checkbox"),b=p("core-post-type-options"),f=p("core-pro-badge"),g=p("core-alert"),k=p("base-radio-toggle"),T=p("svg-circle-question-mark"),O=p("core-tooltip"),$=p("grid-column"),U=p("grid-row"),L=p("base-input"),w=p("core-card");return l(),y("div",Z,[n(w,{slug:"advanced","header-text":t.strings.advanced},{default:s(()=>[n(m,{name:t.strings.truSeo},{content:s(()=>[n(S,{modelValue:e.optionsStore.options.advanced.truSeo,"onUpdate:modelValue":a[0]||(a[0]=o=>e.optionsStore.options.advanced.truSeo=o)},null,8,["modelValue"]),r("div",J,i(t.strings.truSeoDescription),1)]),_:1},8,["name"]),n(m,{name:t.strings.headlineAnalyzer},{content:s(()=>[n(S,{modelValue:e.optionsStore.options.advanced.headlineAnalyzer,"onUpdate:modelValue":a[1]||(a[1]=o=>e.optionsStore.options.advanced.headlineAnalyzer=o)},null,8,["modelValue"]),r("div",X,i(t.strings.headlineAnalyzerDescription),1)]),_:1},8,["name"]),n(m,{name:t.strings.postTypeColumns},{content:s(()=>[n(v,{size:"medium",modelValue:e.optionsStore.options.advanced.postTypes.all,"onUpdate:modelValue":a[2]||(a[2]=o=>e.optionsStore.options.advanced.postTypes.all=o)},{default:s(()=>[h(i(t.strings.includeAllPostTypes),1)]),_:1},8,["modelValue"]),e.optionsStore.options.advanced.postTypes.all?d("",!0):(l(),u(b,{key:0,options:e.optionsStore.options.advanced,type:"postTypes"},null,8,["options"])),r("div",ee,[h(i(t.strings.selectPostTypes)+" ",1),r("span",{innerHTML:c.$links.getDocLink(c.$constants.GLOBAL_STRINGS.learnMore,"selectPostTypesColumns",!0)},null,8,te)])]),_:1},8,["name"]),n(m,null,{name:s(()=>[h(i(t.strings.taxonomyColumns)+" ",1),e.licenseStore.isUnlicensed?(l(),u(f,{key:0})):d("",!0)]),content:s(()=>[e.licenseStore.isUnlicensed?(l(),u(v,{key:0,disabled:"",size:"medium",modelValue:!0},{default:s(()=>[h(i(t.strings.includeAllTaxonomies),1)]),_:1})):d("",!0),e.licenseStore.isUnlicensed?d("",!0):(l(),u(v,{key:1,size:"medium",modelValue:e.optionsStore.options.advanced.taxonomies.all,"onUpdate:modelValue":a[3]||(a[3]=o=>e.optionsStore.options.advanced.taxonomies.all=o)},{default:s(()=>[h(i(t.strings.includeAllTaxonomies),1)]),_:1},8,["modelValue"])),!e.optionsStore.options.advanced.taxonomies.all&&!e.licenseStore.isUnlicensed?(l(),u(b,{key:2,options:e.optionsStore.options.advanced,type:"taxonomies"},null,8,["options"])):d("",!0),r("div",se,[h(i(t.strings.selectTaxonomies)+" ",1),r("span",{innerHTML:c.$links.getDocLink(c.$constants.GLOBAL_STRINGS.learnMore,"selectTaxonomiesColumns",!0)},null,8,ne)]),e.licenseStore.isUnlicensed?(l(),u(g,{key:3,class:"inline-upsell",type:"blue"},{default:s(()=>[r("div",{innerHTML:t.strings.taxonomyColumnsUpsell},null,8,oe)]),_:1})):d("",!0)]),_:1}),n(m,null,{name:s(()=>[h(i(t.strings.adminBarMenu)+" ",1),e.licenseStore.isUnlicensed?(l(),u(f,{key:0})):d("",!0)]),content:s(()=>[n(k,{disabled:e.licenseStore.isUnlicensed,modelValue:_.adminBarMenu,"onUpdate:modelValue":a[4]||(a[4]=o=>_.adminBarMenu=o),name:"adminBarMenu",options:[{label:c.$constants.GLOBAL_STRINGS.hide,value:!1,activeClass:"dark"},{label:c.$constants.GLOBAL_STRINGS.show,value:!0}]},null,8,["disabled","modelValue","options"]),r("div",ie,i(t.strings.adminBarMenuDescription),1),e.licenseStore.isUnlicensed?(l(),u(g,{key:0,class:"inline-upsell",type:"blue"},{default:s(()=>[r("div",{innerHTML:t.strings.adminBarMenuUpsell},null,8,ae)]),_:1})):d("",!0)]),_:1}),n(m,null,{name:s(()=>[h(i(t.strings.dashboardWidgets)+" ",1),e.licenseStore.isUnlicensed?(l(),u(f,{key:0})):d("",!0)]),content:s(()=>[n(U,null,{default:s(()=>[(l(!0),y(q,null,F(_.widgets,(o,C)=>(l(),u($,{key:C},{default:s(()=>[n(v,{size:"medium",disabled:e.licenseStore.isUnlicensed,modelValue:_.isDashboardWidgetChecked(o),"onUpdate:modelValue":M=>_.updateDashboardWidgets(M,o)},{default:s(()=>[h(i(o.label)+" ",1),n(O,null,{tooltip:s(()=>[h(i(o.tooltip),1)]),default:s(()=>[n(T)]),_:2},1024)]),_:2},1032,["disabled","modelValue","onUpdate:modelValue"])]),_:2},1024))),128))]),_:1}),r("div",le,i(t.strings.dashboardWidgetsDescription),1),e.licenseStore.isUnlicensed?(l(),u(g,{key:0,class:"inline-upsell",type:"blue"},{default:s(()=>[r("div",{innerHTML:t.strings.dashboardWidgetsUpsell},null,8,re)]),_:1})):d("",!0)]),_:1}),n(m,{name:t.strings.announcements},{content:s(()=>[n(k,{modelValue:e.optionsStore.options.advanced.announcements,"onUpdate:modelValue":a[5]||(a[5]=o=>e.optionsStore.options.advanced.announcements=o),name:"announcements",options:[{label:c.$constants.GLOBAL_STRINGS.hide,value:!1,activeClass:"dark"},{label:c.$constants.GLOBAL_STRINGS.show,value:!0}]},null,8,["modelValue","options"]),r("div",de,i(t.strings.announcementsDescription),1)]),_:1},8,["name"]),n(m,null,{name:s(()=>[h(i(t.strings.automaticUpdates),1)]),content:s(()=>[n(k,{modelValue:e.optionsStore.options.advanced.autoUpdates,"onUpdate:modelValue":a[6]||(a[6]=o=>e.optionsStore.options.advanced.autoUpdates=o),name:"autoUpdates",options:[{label:t.strings.all,value:"all"},{label:t.strings.minor,value:"minor"},{label:t.strings.none,value:"none",activeClass:"dark"}]},null,8,["modelValue","options"]),r("div",ce,[e.optionsStore.options.advanced.autoUpdates==="all"?(l(),y("span",ue,i(t.strings.allDescription),1)):d("",!0),e.optionsStore.options.advanced.autoUpdates==="minor"?(l(),y("span",pe,i(t.strings.minorDescription),1)):d("",!0),e.optionsStore.options.advanced.autoUpdates==="none"?(l(),y("span",he,i(t.strings.noneDescription),1)):d("",!0)])]),_:1}),c.$isPro?d("",!0):(l(),u(m,{key:0},{name:s(()=>[h(i(t.strings.usageTracking)+" ",1),n(O,null,{tooltip:s(()=>[r("div",{innerHTML:t.strings.usageTrackingTooltip},null,8,me)]),default:s(()=>[n(T)]),_:1})]),content:s(()=>[n(S,{modelValue:e.optionsStore.options.advanced.usageTracking,"onUpdate:modelValue":a[7]||(a[7]=o=>e.optionsStore.options.advanced.usageTracking=o)},null,8,["modelValue"]),r("div",_e,i(t.strings.usageTrackingDescription),1)]),_:1})),n(m,{id:"aioseo-open-ai-api-key",name:t.strings.openAiKey},{name:s(()=>[h(i(t.strings.openAiKey)+" ",1),e.licenseStore.isUnlicensed?(l(),u(f,{key:0})):d("",!0)]),content:s(()=>[n(L,{class:"openAiKey",type:"text",size:"medium",modelValue:e.optionsStore.options.advanced.openAiKey,"onUpdate:modelValue":a[8]||(a[8]=o=>e.optionsStore.options.advanced.openAiKey=o),disabled:e.licenseStore.isUnlicensed,onBlur:_.validateOpenAiKey},null,8,["modelValue","disabled","onBlur"]),r("div",{class:"aioseo-description",innerHTML:t.strings.openAiKeyDescription},null,8,ge),!e.licenseStore.isUnlicensed&&e.optionsStore.options.advanced.openAiKey&&t.openAiKeyInvalid?(l(),u(g,{key:0,class:"inline-upsell",type:"red"},{default:s(()=>[r("div",null,i(t.strings.openAiKeyInvalid),1)]),_:1})):d("",!0),e.licenseStore.isUnlicensed?(l(),u(g,{key:1,class:"inline-upsell",type:"blue"},{default:s(()=>[r("div",{innerHTML:t.strings.openAiKeyUpsell},null,8,ye)]),_:1})):d("",!0)]),_:1},8,["name"]),n(m,{name:t.strings.uninstallAioseo},{content:s(()=>[n(S,{modelValue:e.optionsStore.options.advanced.uninstall,"onUpdate:modelValue":a[9]||(a[9]=o=>e.optionsStore.options.advanced.uninstall=o)},null,8,["modelValue"]),r("div",Se,i(t.strings.uninstallAioseoDescription),1)]),_:1},8,["name"])]),_:1},8,["header-text"])])}const Ke=j(Q,[["render",ve]]);export{Ke as default};
