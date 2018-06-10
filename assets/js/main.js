/*
 * Name: Violet main js
 * Version: 1.0.1
 * URL: http://schoolz.cf
 * Description: This js file is required for different interactive task
 * Author: Rakib Hossain
 *
 */
(function($) {
    'use strict';

$(document).ready(function($){


    
    //==================Menu Scripts======================
    $("#main-menu").menumaker({
        format: "multitoggle"
    });

    //==================Navigation bar fixed on scroll======================
    var navbar = $('#header'),
        //distance = navbar.offset().top,
        distance = navbar.height(),
        $window = $(window);

    function nav_fixed(){
        if ($window.scrollTop() >= distance) {
            navbar.removeClass('header-fix').addClass('header-fix');
        } else {
            navbar.removeClass('header-fix');
        }        
    }
    
    
    $window.scroll(function() {
        nav_fixed();
    });
    nav_fixed();
    //==================Contact form Scripts======================
    $('.wpcf7-form p').find('.wpcf7-form-control.wpcf7-submit').parent().css({'text-align':'right'});
    
    //==================Same height blog and service Scripts======================
    var serviceHeightMax = getMaxServiceHight();
    $('.service').css({
        'min-height': 60 + serviceHeightMax + 'px'
    });
    
    var singleBlogHeightMax = getMaxsingleBlogHeightMax();
    $('.news-summary-height').css({
        'min-height': singleBlogHeightMax + 'px'
    });

    function getMaxServiceHight() {
        var serviceHeight = $('.service').height();
        var tmp = serviceHeight;

        $('.service').each(function() {
            if ($(this).height() > tmp) {
                tmp = $(this).height();
            }
        });
        return tmp;
    }

    function getMaxsingleBlogHeightMax() {
        var singleBlogHeight = $('.news-summary-height').height();
        var tmp = singleBlogHeight;
        $('.news-summary-height').each(function() {
            if ($(this).height() > tmp) {
                tmp = $(this).height();
            }
        });
        return tmp;
    }

   //=============================MixitUp======================
    $('.items').mixItUp();

    $('.portfolio-item').on( 'mouseleave', function() {
    $('.portfolio-hover').addClass('animated');});
        
    //========CTA Hero=======
     $('.hero-content .hero-cta ul li:odd').addClass('animated fadeInUp');
     $('.hero-content .hero-cta ul li:even').addClass('animated fadeInDown');

    //===========Testimonial Slider=============
    var owl = $('.testimonial-slide');
    owl.owlCarousel({
        loop: true,
        items: 1,
        nav: false,
        navigation: true,
        autoplay:true,
        autoplayTimeout:3500,
        autoplayHoverPause:true,
                    
    });
    owl.on('translate.owl.carousel',function(){
        $('.testimonial .person').removeClass('animated zoomIn').css("opacity","0.2");
    });
    owl.on('translated.owl.carousel',function(){
        $('.testimonial .person').addClass('animated zoomIn').css("opacity","1");
    });



/*
// sticky sidebar script
   var $sidebar   = $(".sidebar_wrapper"), 
        $wrapper   = $(".body_wrapper"), 
        $window    = $(window),
        offset     = $sidebar.offset(),
        topPadding = 15;

    $window.scroll(function() {

        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top + topPadding
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });

*/


//============Partner slider==========  
    $('.partner-slide').owlCarousel({
        center: true,
        items:5,
        loop:true,
        margin:5,
        responsive: { 0: {items: 1}, 600: {items: 3}, 1000: {items: 5} }
    });

    
//===============wow js========== 
    new WOW().init();
  
  
  
//===============counterup==========
    $('.counter').counterUp({
         delay: 10,
         time: 9000
    });
   
//===============UI Top==========
    $().UItoTop({ easingType: 'easeOutQuart' });

//jQuery ready end        
});

$(window).load(function () {
    $(".home-preloder").fadeOut(500);
});

}(jQuery));