jQuery(document).ready(function(){
jQuery(window).load(function(){
  var speed = jQuery("#inner_slidespeed").val();
    if ( jQuery('.fadein-slider .slide-item').length > 1 ) {
        jQuery('.fadein-slider .slide-item:gt(0)').hide();
        setInterval(function(){
            jQuery('.fadein-slider :first-child').fadeOut(2000).next('.slide-item').fadeIn(2000).end().appendTo('.fadein-slider');
        }, speed);
    }
});   

// overlay search
  jQuery('#close-btn').click(function() {
   jQuery('#search-overlay').fadeOut();
   jQuery('#search-btn').show();
   jQuery('html').css("overflow", function(_,val){ 
           return val == "auto" ? "scroll" : "auto";
      });
  });
  jQuery('#search-btn').click(function() {
        jQuery('#search-overlay').fadeIn(400);
        jQuery('html').css("overflow", function(_,val){ 
           return val == "hidden" ? "scroll" : "hidden";
      });
  });
///-----------------------///   
/*Menus*/
///-----------------------///    
    function thDropdownMenu() {
        var wWidth = jQuery(window).width();
        if(wWidth > 1024) {
            jQuery('.navigation ul.sub-menu, .navigation ul.children').hide();
            // mega-menu
            jQuery('.navigation li.mega-sub-item ul.sub-menu, .navigation li.mega-sub-item ul.children').show();
            var timer;
            var delay = 100;
            jQuery('.navigation li').hover( 
              function() {
                var $this = jQuery(this);
                timer = setTimeout(function() {
                    $this.children('ul.sub-menu, ul.children').slideDown('fast');
                }, delay);
              },
              function() {
                jQuery(this).children('ul.sub-menu, ul.children').hide();
                // mega-menu
                jQuery(this).children('li.mega-sub-item ul.sub-menu, li.mega-sub-item ul.children').show();
                clearTimeout(timer);
              }
            );
        } else {
            jQuery('.navigation li').unbind('hover');
            jQuery('.navigation li.active > ul.sub-menu, .navigation li.active > ul.children').show();
            // mega-menu
            jQuery('li.mega-sub-item ul.sub-menu').hide();
        }
    }
    thDropdownMenu();
    jQuery(window).resize(function() {
        thDropdownMenu();
    });
 ///-----------------------///    
 /* Vertical menus toggles*/
 ///-----------------------/// 
    jQuery('.widget .menu-menu-1-container, .navigation .menu').addClass('toggle-menu');
    jQuery('.toggle-menu ul.sub-menu, .toggle-menu ul.children').addClass('toggle-submenu');
    jQuery('.toggle-menu ul.sub-menu').parent().addClass('toggle-menu-item-parent');
    jQuery('.toggle-menu .toggle-menu-item-parent').append('<span class="toggle-caret"><i class="fa fa-plus"></i></span>');
    jQuery('.toggle-caret').click(function(e) {
        e.preventDefault();
        jQuery(this).parent().toggleClass('active').children('.toggle-submenu').slideToggle('fast');
    });
///-----------------------///    
// Responsive Navigation
///-----------------------/// 
var themehunk_customscript = {"responsive":"1","nav_menu":"secondary"};

if (themehunk_customscript.responsive && themehunk_customscript.nav_menu != 'none') {
    jQuery(document).ready(function($){
        // merge if two menus exist
        if (themehunk_customscript.nav_menu == 'both') {
            jQuery('.navigation').not('.mobile-menu-wrapper').find('.menu').clone().appendTo('.mobile-menu-wrapper').hide();
        }    
        jQuery('.toggle-mobile-menu').click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            jQuery('body').toggleClass('mobile-menu-active');
            jQuery('html').css("overflow", function(_,val){ 
            return val == "hidden" ? "scroll" : "hidden";
            });
        });
        
        // prevent propagation of scroll event to parent
        jQuery(document).on('DOMMouseScroll mousewheel', '.mobile-menu-wrapper', function(ev) {
            var $this = jQuery(this),
                scrollTop = this.scrollTop,
                scrollHeight = this.scrollHeight,
                height = $this.height(),
                delta = (ev.type == 'DOMMouseScroll' ?
                    ev.originalEvent.detail * -40 :
                    ev.originalEvent.wheelDelta),
                up = delta > 0;
        
            var prevent = function() {
                ev.stopPropagation();
                ev.preventDefault();
                ev.returnValue = false;
                return false;
            }

            // if ( jQuery('a#pull').css('display') !== 'none' ) { // if toggle menu button is visible ( small screens )
            // if (!up && -delta > scrollHeight - height - scrollTop) {
            //       // Scrolling down, but this will take us past the bottom.
            //       $this.scrollTop(scrollHeight);
            //       return prevent();
            //   } else if (up && delta > scrollTop) {
            //       // Scrolling up, but this will take us past the top.
            //       $this.scrollTop(0);
            //       return prevent();
            //   }
            // }
        });
    }).on('click', function(event){
        var $target = jQuery(event.target);
        if ( ( $target.hasClass("fa") && $target.parent().hasClass("toggle-caret") ) ||  $target.hasClass("toggle-caret") ) {// allow clicking on menu toggles
            return;
        }
        // jQuery('body').removeClass('mobile-menu-active');
    });
}  
function validUrlCheck(url){
  var url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
 return url_validate;
}
if(jQuery("#back-to-top").val()=='on'){
// Show-hide Scroll to top & move-to-top arrow
  jQuery("body").prepend("<a id='move-to-top' class='animate hiding' href='#shopmain'><i class='fa fa-angle-up'></i></a>");  
  var scrollDes = 'html,body';  
  /*Opera does a strange thing if we use 'html' and 'body' together so my solution is to do the UA sniffing thing*/
  if(navigator.userAgent.match(/opera/i)){
    scrollDes = 'html';
  }
  //show ,hide
       jQuery(window).scroll(function(){
            if (jQuery(this).scrollTop() > 100) {
                jQuery('#move-to-top').fadeIn();
            } else {
                jQuery('#move-to-top').fadeOut();
            }
        }); 
        jQuery('#move-to-top').click(function(){
            jQuery("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
}
///-----------------------/// 
// section scroll Menu active
///-----------------------/// 
if ( jQuery( ".home" ).length ) {
  jQuery('.menu li a:first').addClass('active');
  jQuery(window).scroll(function(event){
  var scrollPos = jQuery(document).scrollTop();
    if (scrollPos >= 100) {
        jQuery('ul#menu > li > a').each(function () {
        var currLink = jQuery(this);
        var url =currLink.attr("href");
        var url_validate = validUrlCheck(url);
      if(!url_validate.test(url)){
         var refElement = jQuery(currLink.attr("href"));
        if ( jQuery(url).length ) {
          if (refElement.position().top - 100 <= scrollPos && refElement.position().top - 100 + refElement.height() > scrollPos) {
            jQuery('.menu li a').removeClass('active');
            currLink.addClass("active");
          }
        }
      }
    });
} else {
    jQuery('.menu li a').removeClass('active');
    jQuery('.menu li a:first').addClass('active');
    }
})
}
///-----------------------/// 
// section scroll ease function
///-----------------------/// 
jQuery('ul#menu li a').bind('click', function(event) {
            var $anchor = jQuery(this);
            var url = $anchor.attr('href');
            var url_validate = validUrlCheck(url);
            if(!url_validate.test(url)){
            if ( jQuery( url ).length ) {
            var headr_h = jQuery("header").height();
            jQuery('html, body').stop().animate({
            scrollTop: jQuery(url).offset().top - headr_h
        }, 2000, 'easeInOutExpo');
        event.preventDefault();
       }
      }
    });
});
///-----------------------/// 
// header fixed function
///-----------------------/// 
(function(jQuery){
    'use strict';
  if ((jQuery('#wpadminbar').length)!==''){ 
    jQuery(document).ready(function() {
        // if adminbar exist (should check for visible?) then add margin to our navbar
        var $wpAdminBar = jQuery('#wpadminbar');
        if ($wpAdminBar.length) {
          jQuery('.home header.hdr-transparent,header.hdr-intrnl-transparent').css('margin-top',$wpAdminBar.height()+'px');  
        }
    });
    } 
 jQuery(document).on("scroll", function(){
    if
      (jQuery(document).scrollTop() > 80){
      jQuery("header").addClass("shrink");
      jQuery("header.header-static").removeClass("shrink");
    }
    else
    {
      jQuery("header").removeClass("shrink");
      jQuery("header.header-static").removeClass("shrink");
    }
  });   
})(jQuery);

///-----------------------/// 
// home-page cart-box
///-----------------------/// 
function openNav(){
document.getElementById("mySidenav").style.display = "block";
}
function closeNav(){
document.getElementById("mySidenav").style.display = "none";
}
var $crtscroll = jQuery('#mySidenav');
jQuery(document).scroll(function() {
    $crtscroll.css({display:"none"});
});
///-----------------------/// 
//page header image.
///-----------------------/// 
// (function(jQuery){
//     'use strict';
//   if ((jQuery('header').length)!==''){ 
//     jQuery(window).bind('resize load',function (){
//         // if adminbar exist (should check for visible?) then add margin to our navbar
//         var $header = jQuery('header');
//         if ($header.length) {
//             jQuery('.page-head-image').bind('load resize').css('margin-top',$header.height()+'px');
//         }
//     });
//     } 
// })(jQuery);
///-----------------------/// 
// product isotope filter 
///-----------------------/// 
jQuery(window).load(function() {
jQuery('.featured-filter li a:first').addClass('current');
var filterVal = jQuery('.button.current').attr('data-filter');
var $grid = jQuery('.featured-block').isotope({
  itemSelector: '.featured-isotope',
  transitionDuration: '1s',
  filter:filterVal,
  layoutMode: 'fitRows',
});
// bind filter button click
jQuery(document).on( 'click','.featured-filter a', function() {
var filterValue = jQuery(this).attr('data-filter');
// use filterFn if matches value
$grid.isotope({ filter: filterValue });
});
// change is-checked class on buttons
jQuery('.button-group').each( function( i, buttonGroup ) {
  var $buttonGroup = jQuery( buttonGroup );
  $buttonGroup.on( 'click', 'a', function() {
  $buttonGroup.find('.current').removeClass('current');
  jQuery(this).addClass('current');
  });
});
});

///-----------------------/// 
// Noraml slider slider 
///-----------------------///
jQuery(window).load(function(){
var norspeed = jQuery("#nor_slidespeed").val();
if(jQuery(window).width() <= 650) {
jQuery('.flexslider').flexslider({
         animation: "fade",
         fadeFirstSlide: false,
         slide_easing: 'easeInOutCubic',
         slideshowSpeed: norspeed,
         animationSpeed: 2000,
         controlNav: true,
         video: true,
         slideshow: true, 
         pauseOnHover: true, 
         prevText: "",           //String: Set the text for the "previous" directionNav item
         nextText: "", 
         direction: "horizontal",
      });
}else{
jQuery('.flexslider').flexslider({
         animation: "fade",
         fadeFirstSlide: false,
         slide_easing: 'easeInOutCubic',
         slideshowSpeed: norspeed,
         animationSpeed: 2000,
         controlNav: true,
         video: true,
         slideshow: true, 
         pauseOnHover: true, 
         prevText: "",           //String: Set the text for the "previous" directionNav item
         nextText: "",
         drag: true,
         direction: "horizontal",
      });
    } 
///-----------------------///  
// *animation on scroll*
///-----------------------///
 if ( jQuery( "#animate-css" ).length ) {
wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
         // console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
}
});
///-----------------------/// 
// owl-category slider 
///-----------------------/// 
var cat_slidr_spd = jQuery("#cat_slidr_spd").val();
var cat_ply = jQuery("#cat_ply").val();
if(cat_ply =='true'){
jQuery('.home-imagecat .owl-carousel').owlCarousel({
    loop:true,
    margin:40,
    nav:false,
    autoplay:true,
    autoplayTimeout:cat_slidr_spd, 
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        480:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
}else{
  jQuery('.home-imagecat .owl-carousel').owlCarousel({
    loop:false,
    margin:40,
    nav:false,
    autoplaySpeed:1000,
    smartSpeed:1000,
    autoplay:false,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        480:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
}
///-----------------------/// 
// owl-testimonial slider 
///-----------------------/// 
var testm_slidr_spd = jQuery("#testm_slidr_spd").val();
var testm_ply = jQuery("#testm_ply").val();
if(testm_ply =='true'){
jQuery('.testimonial-wrap.owl-carousel').owlCarousel({
    loop:true,
    margin:40,
    nav:false,
    autoplay:true,
    autoplayTimeout:testm_slidr_spd, 
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        480:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
}else{
jQuery('.testimonial-wrap.owl-carousel').owlCarousel({
    loop:false,
    margin:40,
    nav:false,
    autoplay:false,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        480:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
}
///-----------------------///
// owl-latest-blog
///-----------------------/// 
var blog_slidr_spd = jQuery("#blog_slidr_spd").val();
var blog_play = jQuery("#blog_ply").val();
if(blog_play =='true'){
jQuery('#owl-blog.owl-carousel').owlCarousel({
    loop:true,
    margin:40,
    nav:false,
    autoplay:true,
    autoplayTimeout:blog_slidr_spd, 
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        480:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
}else{
  jQuery('#owl-blog.owl-carousel').owlCarousel({
    loop:false,
    margin:40,
    nav:false,
    autoplay:false,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsive:{
        0:{
            items:1,
            margin:10,
        },
        480:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})
}
///-----------------------///
// owl-brand
///-----------------------///
var brand_slidr_spd = jQuery("#brand_slidr_spd").val();
var brand_ply = jQuery("#brand_ply").val();
if(brand_ply=='true'){
jQuery('#owl-brnd.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    autoplay:true,
    autoplayTimeout:brand_slidr_spd,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsiveClass:true,
    pagination : false,    
    nav:false,
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:4
        },
        1000:{
            items:7
        }
    }
})
}else{
jQuery('#owl-brnd.owl-carousel').owlCarousel({
    loop:false,
    margin:20,
    autoplay:true,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsiveClass:true,
    pagination : false,    
    nav:false,
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        600:{
            items:4
        },
        1000:{
            items:7
        }
    }
})
}
///-----------------------///
// product layout1
///-----------------------///
var _ply = jQuery("#_ply").val();
var _slidr_spd = jQuery("#_slidr_spd").val();
if(_ply=='true'){
jQuery('.product-one.owl-carousel').owlCarousel({  
    loop:true,
    margin:20,
    autoplay:true,
    autoplayTimeout:_slidr_spd,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsiveClass:true,
    pagination : false,    
    nav:false,
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        769:{
            items:3
        },
        1024:{
            items:3
        },
        1025:{
            items:4
        }
    }
})
}else{
jQuery('.product-one.owl-carousel').owlCarousel({
    loop:true,
    margin:20,
    autoplay:false,
    autoplayTimeout:_slidr_spd,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsiveClass:true,
    pagination : false,    
    nav:false,
    responsive:{
        0:{
            items:2,
            margin:10,
        },
        550:{
            items:2,
            margin:10,
        },
        769:{
            items:3
        },
        1024:{
            items:3
        },
        1025:{
            items:4
        }
    }
})
}
///-----------------------///
// product layout1
///-----------------------///
///-----------------------/// 
// service slider 
///-----------------------///
jQuery('.services-list.owl-carousel').owlCarousel({  
    loop:false,
    margin:10,
    autoplay:true,
    autoplaySpeed:1000,
    smartSpeed:1000,
    responsiveClass:true,
    pagination : false,    
    nav:false,
    responsive:{
        0:{
            items:1,
        },
        480:{
            items:2,
            margin:10,
        },
        769:{
            items:3
        },
        1024:{
            items:3
        },
        1025:{
            items:5
        }
    }
})

///-----------------------///
// masnory category layout
///-----------------------///
var $container = jQuery('.cat-masnory');
$container.imagesLoaded( function(){
$container.masonry({
itemSelector : '.catli'
  });
});
/* woo, wc_add_to_cart_params */
  // if ( typeof wc_add_to_cart_params === 'undefined' ) {
  //     return false;
  // }
  // Ajax remove cart item
  jQuery( document ).on( 'click', 'a.remove', function(e) { // Remove button selector
      e.preventDefault();
      // AJAX add to cart request

      var $thisbutton = jQuery( this );
      if ( $thisbutton.is( '.remove' ) ) {
          //Check if the button has a product ID
          if ( ! $thisbutton.attr( 'data-product_id' ) ) { 
              return true;
          }
        }
        $product_id = $thisbutton.attr( 'data-product_id' );
          var data = {'product_id':$product_id,
           'action': 'shopline_product_remove'
         };
         jQuery.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response){
            jQuery('.sidebar-quickcart').html(response);

        var data = {
           'action': 'shopline_product_count_update'
         };
         jQuery.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response_data){
            jQuery('.cart-contents').html(response_data);
           }
         );

           }
         );

      return false;
      // return true;
  });
///-----------------------///
// comment form placeholder
// label value shown in placeholder
///-----------------------///
jQuery("#commentform label").each(function() {
    var label = jQuery(this);
    var placeholder = label.text();
    label.next("#commentform input, #commentform textarea").attr("placeholder", placeholder).val("").focus().blur();
});
///-----------------------///
///start section pallaxx
///-----------------------///
 jQuery(function() {
     if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
         (function(n) {
             n.viewportSize = {}, n.viewportSize.getHeight = function() {
                 return t("Height")
             }, n.viewportSize.getWidth = function() {
                 return t("Width")
             };
             var t = function(t) {
                 var f, o = t.toLowerCase(),
                     e = n.document,
                     i = e.documentElement,
                     r, u;
                 return n["inner" + t] === undefined ? f = i["client" + t] : n["inner" + t] != i["client" + t] ? (r = e.createElement("body"), r.id = "vpw-test-b", r.style.cssText = "overflow:scroll", u = e.createElement("div"), u.id = "vpw-test-d", u.style.cssText = "position:absolute;top:-1000px", u.innerHTML = "<style>@media(" + o + ":" + i["client" + t] + "px){body#vpw-test-b div#vpw-test-d{" + o + ":7px!important}}<\/style>", r.appendChild(u), i.insertBefore(r, e.head), f = u["offset" + t] == 7 ? i["client" + t] : n["inner" + t], i.removeChild(r)) : f = n["inner" + t], f
             }
         })(this);
         (function($){
             // Setup variables
             $window = $(window);
             $body = $('body');

             //FadeIn all sections   

             function adjustWindow() {

                 // Init Skrollr
                 var s = skrollr.init({
                     render: function(data) {

                         //Debugging - Log the current scroll position.
                         //console.log(data.curTop);
                     }
                 });

                 // Get window size
                 winH = $window.height();

                 // Keep minimum height 550
                 if (winH <= 550) {
                     winH = 550;
                 }


             }

         })(jQuery);
     } else {
         (function(n) {
             n.viewportSize = {}, n.viewportSize.getHeight = function() {
                 return t("Height")
             }, n.viewportSize.getWidth = function() {
                 return t("Width")
             };
             var t = function(t) {
                 var f, o = t.toLowerCase(),
                     e = n.document,
                     i = e.documentElement,
                     r, u;
                 return n["inner" + t] === undefined ? f = i["client" + t] : n["inner" + t] != i["client" + t] ? (r = e.createElement("body"), r.id = "vpw-test-b", r.style.cssText = "overflow:scroll", u = e.createElement("div"), u.id = "vpw-test-d", u.style.cssText = "position:absolute;top:-1000px", u.innerHTML = "<style>@media(" + o + ":" + i["client" + t] + "px){body#vpw-test-b div#vpw-test-d{" + o + ":7px!important}}<\/style>", r.appendChild(u), i.insertBefore(r, e.head), f = u["offset" + t] == 7 ? i["client" + t] : n["inner" + t], i.removeChild(r)) : f = n["inner" + t], f
             }
         })(this);


         (function($) {
             // Setup variables
             $window = $(window);
             $body = $('body');
             //FadeIn all sections   
             $body.imagesLoaded(function() {
                 setTimeout(function() {

                     // Resize sections
                     adjustWindow();

                     // Fade in sections
                     $body.removeClass('loading').addClass('loaded');

                 }, 800);
             });

             function adjustWindow() {

                 // Init Skrollr
                 var s = skrollr.init({
                     render: function(data) {

                         //Debugging - Log the current scroll position.
                         //console.log(data.curTop);
                     }
                 });

                 // Get window size
                 winH = $window.height();
                 // Keep minimum height 550
                 if (winH <= 550) {
                     winH = 550;
                 }
             }
         })(jQuery);
     }
 });
//-----------------------//
// page click scrol to top
//-----------------------//
// to top right away
if ( window.location.hash ) scroll(0,0);
// void some browsers issue
setTimeout( function() { scroll(0,0); }, 5);
//-----------------------//
// page click scrol to top
//-----------------------//
jQuery(document).ready(function() { 
function ShoplinePopupAjaxRequest(data, method) {
    return jQuery.ajax({
        url: woocommerce_params.ajax_url,
        type: method,
        data: data,
        cache: false
    });
}
//function thPopupShow(popup){
  jQuery('.quickview').click(function () {
    jQuery( ".overlayloader,.pre-loader" ).show();
      // fadeOut complete. Remove the loading div
     //makes page more lightweight
  var popup = jQuery(this).attr('popupid');
  jQuery( "#shopline-popup-boxes" ).remove();
  $popup_sc = "popup="+popup+"&action=shopline_popup_product";
  ShoplinePopupAjaxRequest($popup_sc, 'POST').success(function(response) {
  jQuery("body").append(response);
    jQuery( ".overlayloader,pre-loader" ).hide();
// add quantitiy

  jQuery( '.quantity .qty' ).on( 'change', function() {
      var qty = jQuery( this ),
        atc = jQuery( this ).next( '.add_to_cart_button' );
        jQuery( '.add_to_cart_button' ).attr( 'data-quantity', qty.val() );
    });

   //document.body.innerHTML =response;
        var id = '#dialog';
  
          //transition effect
      jQuery('#mask').fadeTo("slow",0.9); 
      jQuery(id).fadeIn(1000);  
      jQuery(id).addClass('animated fadeInDown');

    //if close button is clicked
    jQuery('.window .close').click(function (e) {
    //Cancel the link behavior
    e.preventDefault();

      jQuery('.window').addClass('animated fadeOutDown');
      jQuery('#mask').fadeOut(800);  

      });   

  //if mask is clicked
  jQuery('#mask').click(function () {
      jQuery('.window').addClass('animated fadeOutDown');
     jQuery('#mask').fadeOut(800);  
  }); 
});
if(jQuery(window).width() < 601) {
   var prdid= "post-"+popup+"";
   var pophref=jQuery("#"+prdid+".featured-isotope a ").attr("href");
   jQuery(".featured-isotope a.quickview").attr("href",pophref);
}
});
});

//-----------------------//
// loader
//-----------------------//
jQuery(window).on('load', function(){
setTimeout(removeLoader, 1000); //wait for page load PLUS two seconds.
});
function removeLoader(){
    jQuery( ".overlayloader" ).fadeOut(700, function() {
      // fadeOut complete. Remove the loading div
    jQuery( ".pre-loader" ).hide(); //makes page more lightweight
});  
}

///-----------------------/// 
// Filter Cat slider 
///-----------------------///
(function(jQuery){
'use strict';
jQuery(window).bind('load resize',function (){
if(jQuery(window).width() < 600) {
jQuery('#featured_product_section .featured-filter ul').addClass('owl-carousel');
jQuery('.featured-filter ul.owl-carousel').owlCarousel({
    loop:true,
    items:1,
    margin:0,
    nav:true,
    autoplay:false,
    autoWidth:true,
    dots:false,
});
}
else{
 var owl='';
 owl = jQuery('.featured-filter ul.owl-carousel');
 owl.trigger('destroy.owl.carousel').removeClass('owl-carousel owl-loaded');
 owl.find('.owl-stage-outer').children().unwrap();
}

});
})(jQuery);