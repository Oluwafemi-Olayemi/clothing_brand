import{u as e}from"./links.CKSg78-h.js";import{C as n}from"./Caret.Cuasz9Up.js";import{y as s,o as c,l as a,d as i}from"./vue.esm-bundler.DzelZkHk.js";import{_ as l}from"./_plugin-vue_export-helper.BN1snXvA.js";const u={setup(){return{rootStore:e()}},components:{CoreAlert:n},data(){return{strings:{unfilteredHtmlError:this.$t.sprintf(this.$t.__("Your user account role does not have access to edit this field. %1$s",this.$td),this.$links.getDocLink(this.$constants.GLOBAL_STRINGS.learnMore,"unfilteredHtml",!0))}}}};function p(_,m,f,t,r,d){const o=s("core-alert");return t.rootStore.aioseo.user.unfilteredHtml?i("",!0):(c(),a(o,{key:0,class:"no-access",type:"red",innerHTML:r.strings.unfilteredHtmlError},null,8,["innerHTML"]))}const H=l(u,[["render",p]]);export{H as C};
