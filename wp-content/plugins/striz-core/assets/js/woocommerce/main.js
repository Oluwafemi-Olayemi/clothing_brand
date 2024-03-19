"use strict";function _classCallCheck(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}var _createClass=function(){function e(e,t){for(var i=0;i<t.length;i++){var a=t[i];a.enumerable=a.enumerable||!1,a.configurable=!0,"value"in a&&(a.writable=!0),Object.defineProperty(e,a.key,a)}}return function(t,i,a){return i&&e(t.prototype,i),a&&e(t,a),t}}();!function(e){var t=function(){function t(){_classCallCheck(this,t),this.initCarousel(),this.addedToCart(),this.initWishlist(),this.initSelectOrder(),this.renderWislistLoading()}return _createClass(t,null,[{key:"getInstance",value:function(){return t.instance||(t.instance=new t),t.instance}}]),_createClass(t,[{key:"initSelectOrder",value:function(){e("body").is(".post-type-archive-product, .tax-product_cat")&&function(){var t=function(e){var t=void 0,i=void 0,a=void 0,n=[];for(t=document.getElementsByClassName("select-items"),i=document.getElementsByClassName("select-selected"),a=0;a<i.length;a++)e==i[a]?n.push(a):i[a].classList.remove("select-arrow-active");for(a=0;a<t.length;a++)n.indexOf(a)&&t[a].classList.add("select-hide")},i=void 0,a=void 0,n=void 0,r=void 0,o=void 0,s=void 0,c=void 0;i=document.getElementsByClassName("woocommerce-ordering");var l=e(".woocommerce-ordering .orderby");for(a=0;a<i.length;a++){for(r=i[a].getElementsByTagName("select")[0],o=document.createElement("DIV"),o.setAttribute("class","select-selected"),o.innerHTML=r.options[r.selectedIndex].innerHTML,i[a].appendChild(o),s=document.createElement("DIV"),s.setAttribute("class","select-items select-hide"),n=1;n<r.length;n++)c=document.createElement("DIV"),c.innerHTML=r.options[n].innerHTML,c.addEventListener("click",function(e){var t=void 0,i=void 0,a=void 0,n=void 0,r=void 0;for(n=this.parentNode.parentNode.getElementsByTagName("select")[0],r=this.parentNode.previousSibling,i=0;i<n.length;i++)if(n.options[i].innerHTML==this.innerHTML){for(n.selectedIndex=i,r.innerHTML=this.innerHTML,t=this.parentNode.getElementsByClassName("same-as-selected"),a=0;a<t.length;a++)t[a].removeAttribute("class");this.setAttribute("class","same-as-selected");break}r.click(),l.trigger("change")}),s.appendChild(c);i[a].appendChild(s),o.addEventListener("click",function(e){e.stopPropagation(),t(this),this.nextSibling.classList.toggle("select-hide"),this.classList.toggle("select-arrow-active")})}document.addEventListener("click",t)}()}},{key:"initSlideProduct",value:function(){var t=this;e(".product-block .product-img-wrap").each(function(i,a){var n=e(a),r=n.closest(".product-block");n.flexslider({selector:".inner > .product-image",animation:"slide",controlNav:!0,directionNav:!0,slideshow:!1,smoothHeight:!1,before:function(e){"next"===e.direction?t.activeGalleryThumbnail(r,e.currentSlide+1):t.activeGalleryThumbnail(r,e.currentSlide-1)},after:function(e){t.activeGalleryThumbnail(r,e.currentSlide)},start:function(){setTimeout(function(){n.addClass("flexslider-loaded"),n.data("flexslider").resize()},500)}}),e(".gallery-nav-next",r).on("click",function(){r.find(".flex-nav-next a").trigger("click")}),e(".gallery-nav-prev",r).on("click",function(){r.find(".flex-nav-prev a").trigger("click")}),e(".gallery_item",r).on("click",function(i){var a=e(i.currentTarget).data("number");n.data("flexslider").flexAnimate(a),t.activeGalleryThumbnail(r,a)})})}},{key:"activeGalleryThumbnail",value:function(t,i){var a=e(".woocommerce-loop-product__gallery",t);e(".gallery_item",a).removeClass("active"),e('.gallery_item[data-number="'+i+'"]',a).addClass("active")}},{key:"initVariableItem",value:function(){e(".otf-wrap-swatches .swatch").on("click",function(t){t.preventDefault();var i=e(t.currentTarget),a=i.closest(".product");if(i.hasClass("checked"))a.removeClass("product-swatched"),i.removeClass("checked"),a.find(".product-image-swatch").remove();else{i.closest(".otf-wrap-swatches").find(".swatch").removeClass("checked"),a.addClass("product-swatched product-swatch-loading"),i.addClass("checked");var n=i.data("image");if(n.src){var r=e("<img />").on("load",function(e){a.find(".product-image-swatch").remove(),a.removeClass("product-swatch-loading"),a.find(".product-image").first().before('<div class="product-image-swatch">'+e.currentTarget.outerHTML+"</div>")}).attr({src:n.src});n.srcset&&r.attr(srcset,n.srcset)}}})}},{key:"initCarousel",value:function(){e(".woocommerce-product-carousel").each(function(t,i){var a=e(i),n=a.data("columns"),r=2,o=n;n>3&&(o=n-1,r=n-2),n<2&&(r=n),a.find("ul.products").owlCarousel({items:n,nav:!0,dots:!1,responsive:{0:{items:1},480:{items:1},768:{items:r},980:{items:o},1200:{items:n}}})})}},{key:"addedToCart",value:function(){var t=void 0;e("body").on("adding_to_cart",function(e,i){t=i.closest(".product")}).on("added_to_cart",function(){var i=t.find("img").first().attr("src"),a=t.find(".woocommerce-loop-product__title").text(),n=wp.template("added-to-cart-template");e("#page-title-bar").after(n({src:i,name:a})),setTimeout(function(){e(".notification-added-to-cart").addClass("hide")},3e3)})}},{key:"initWishlist",value:function(){e(document).on("added_to_wishlist removed_from_wishlist",function(){var t=e(".opal-header-wishlist");e.ajax({url:yith_wcwl_l10n.ajax_url,data:{action:"osf_update_wishlist_count"},dataType:"json",success:function(e){t.find(".count").text(e.count)},beforeSend:function(){},complete:function(){}})}),e("body").on("woosw_change_count",function(t,i){e(".opal-header-wishlist").find(".count").text(i)})}},{key:"renderWislistLoading",value:function(){e("li.product .yith-wcwl-add-button .add_to_wishlist").after("<div class='ajax-loading opal-loading-wislist' style='visibility: hidden'></div>")}}]),t}(),i=function(){function i(){var t=this;_classCallCheck(this,i),this.selectorsClick=[],this.selectorsChange=[],this.selectorsClick=["#secondary .widget .product-categories a","#secondary .widget .product-brands a","#secondary .widget .woocommerce-widget-layered-nav-list a","#secondary .widget.widget_layered_nav_filters a","#secondary .widget.widget_rating_filter a","#secondary .widget_product_tag_cloud a","#opal-canvas-filter .widget .product-categories a","#opal-canvas-filter .widget .product-brands a","#opal-canvas-filter .widget .woocommerce-widget-layered-nav-list a","#opal-canvas-filter .widget.widget_layered_nav_filters a","#opal-canvas-filter .widget.widget_rating_filter a","#opal-canvas-filter .widget_product_tag_cloud a","#main ul.products + .woocommerce-pagination a","#secondary .widget .product-brands a",".otf-active-filters .widget_layered_nav_filters a",".otf-active-filters .clear-all"],this.initDisplayMode(),this.init(),this.initCategoriesDropdown(),this.initRecentlyReviewed(),this.priceSlideChange(),this.initOrdering(),e(window).on("popstate",function(){history.state&&history.state.woofilter&&t.renderHtml(history.state)})}return _createClass(i,[{key:"init",value:function(){var t=this;e("body").on("click",this.selectorsClick.join(","),function(i){i.preventDefault();var a=e(i.currentTarget),n=a.attr("href");t.sendRequest(n)}).on("click",'.display-mode button[type="submit"]',function(i){i.preventDefault();var a=e(i.currentTarget);if(!a.hasClass("active")){var n=a.val(),r=new URL(window.location.href),o=new URLSearchParams(window.location.search);o.set("display",n),r.search=o.toString(),t.sendRequest(r.toString(),!1)}})}},{key:"scrollUp",value:function(){var t=e("#primary").offset().top;e("body").hasClass("opal-header-sticky")&&(t-=e("#opal-header-sticky").outerHeight()),e("#wpadminbar").length>0&&(t-=e("#wpadminbar").outerHeight()),e(window).scrollTop()>t&&e("html, body").animate({scrollTop:t},"slow")}},{key:"replaceUrl",value:function(e){return"list"===this.getCookie("otf_woocommerce_display","grid")&&(-1!==e.indexOf("?")?e+="&display=list":e+="?display=list"),e}},{key:"initDisplayMode",value:function(){if(e("body").hasClass("opal-woocommerce-archive")){if("list"===this.getCookie("otf_woocommerce_display","grid")){var t=window.location.href;new URL(t).searchParams.get("display")||this.sendRequest(t)}}}},{key:"sendRequest",value:function(t){var i=this;(!(arguments.length>1&&void 0!==arguments[1])||arguments[1])&&(t=this.replaceUrl(t)),this.initLoading(!0),e.post(t,function(a){if(a){var n=e(a),r={woofilter:!0,title:n.filter("title").text(),sidebar:n.find("#secondary").html(),content:n.find("#primary").html(),filter:n.find(".opal-canvas-filter-wrap").html()};i.renderHtml(r),window.history.pushState(r,r.title,t)}i.initLoading(!1)})}},{key:"renderHtml",value:function(i){this.scrollUp(),e("head title").text(i.title),e("#primary").html(i.content),e("#secondary").html(i.sidebar),e("#opal-canvas-filter .opal-canvas-filter-wrap").html(i.filter),this.initPriceSlider(),this.initCategoriesDropdown(),this.initOrdering(),this.initLoading(!1),t.getInstance().initSelectOrder()}},{key:"initLoading",value:function(t){t?e("body").addClass("opal-filter-loading").append('<div id="opal-woocommerce-loading"></div>'):(e("body").removeClass("opal-filter-loading"),e("#opal-woocommerce-loading").remove())}},{key:"initRecentlyReviewed",value:function(){var t=e("h2.otf-woocommerce-recently-viewed"),i=e(".otf-product-recently-content");i.hide(),t.on("click",function(a){if(a.stopPropagation(),t.hasClass("active"))i.hide(400),t.removeClass("active");else{i.show(400),t.addClass("active");var n=e(document).height(),r=e(".widget_recently_viewed_products").height();e("html, body").animate({scrollTop:n},r+10)}})}},{key:"initCategoriesDropdown",value:function(){e(".widget_product_categories ul li.cat-item").each(function(){var t=e(this);t.find("ul.children").hide(),t.find(".current-cat").length>0?(t.find("ul.children").show(),e(this).append('<i class="opened fa fa-angle-up"></i>')):t.find("ul.children").length>0&&e(this).append('<i class="closed fa fa-angle-down"></i>')}),e("body").on("click",".widget_product_categories ul li.cat-item .closed",function(){e(this).parent().find("ul.children").first().show(400),e(this).parent().addClass("open"),e(this).removeClass("closed").removeClass("fa-angle-down").addClass("opened").addClass("fa-angle-up")}),e("body").on("click",".widget_product_categories ul li.cat-item .opened",function(){e(this).parent().find("ul.children").first().hide(400),e(this).parent().addClass("close").removeClass("open"),e(this).removeClass("opened").removeClass("fa-angle-up").addClass("closed").addClass("fa-angle-down")})}},{key:"initOrdering",value:function(){var t=this;setTimeout(function(){e(".woocommerce-ordering").off("change"),e(".woocommerce-ordering").on("change",function(i){var a=e(i.currentTarget).find(".orderby"),n=window.location.href.replace(/&orderby(=[^&]*)?|^orderby(=[^&]*)?&?/g,"").replace(/\?orderby(=[^&]*)?|^orderby(=[^&]*)?&?/g,"?").replace(/\?$/g,"");n=-1!==n.indexOf("?")?n+"&orderby="+a.val():n+"?orderby="+a.val(),t.sendRequest(n)})},100)}},{key:"initPriceSlider",value:function(){setTimeout(function(){if(e(".price_slider:not(.ui-slider)").length<=0)return!0;e("input#min_price, input#max_price").hide(),e(".price_slider, .price_label").show();var t=e(".price_slider_amount #min_price").data("min"),i=e(".price_slider_amount #max_price").data("max"),a=e(".price_slider_amount #min_price").val(),n=e(".price_slider_amount #max_price").val();e(".price_slider:not(.ui-slider)").slider({range:!0,animate:!0,min:t,max:i,values:[a,n],create:function(){e(".price_slider_amount #min_price").val(a),e(".price_slider_amount #max_price").val(n),e(document.body).trigger("price_slider_create",[a,n])},slide:function(t,i){e("input#min_price").val(i.values[0]),e("input#max_price").val(i.values[1]),e(document.body).trigger("price_slider_slide",[i.values[0],i.values[1]])},change:function(t,i){e(document.body).trigger("price_slider_change",[i.values[0],i.values[1]])}})},200)}},{key:"priceSlideChange",value:function(){var t=this;e(document.body).bind("price_slider_change",function(e,i,a){var n=window.location.href.replace(/(min_price=\d+\&*|max_price=\d+\&*)/g,"").replace(/\?$/g,"");n=-1!==n.indexOf("?")?n+"&min_price="+i+"&max_price="+a:n+"?min_price="+i+"&max_price="+a,t.sendRequest(n)})}},{key:"getCookie",value:function(e,t){for(var i=e+"=",a=document.cookie.split(";"),n=0;n<a.length;n++){for(var r=a[n];" "===r.charAt(0);)r=r.substring(1);if(0===r.indexOf(i))return r.substring(i.length,r.length)}return""}},{key:"setCookie",value:function(e,t){var i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:10,a=new Date;a.setTime(a.getTime()+24*i*60*60*1e3);var n="expires="+a.toUTCString();document.cookie=e+"="+t+";"+n+";path=/"}}]),i}();e(document).ready(function(){t.getInstance(),new i})}(jQuery);
//# sourceMappingURL=main.js.map
