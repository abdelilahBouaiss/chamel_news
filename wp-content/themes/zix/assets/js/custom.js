;(function($){
    'use strict';

    var body = $('body');
    if( $(window).width() <= 767 ){
        body.addClass( 'zix_mobile_class' );
    }else {
        body.removeClass('zix_mobile_class');
    }


    /*-------------------------------------------------------------------------------
	  Navbar
	-------------------------------------------------------------------------------*/
    /* Main Slider */
    $('.main_slider').on('init', function (e, slick) {
        var $firstAnimatingElements = $('div .slider_item:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
    });
    $('.main_slider').on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('div .slider_item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
    });

    $('.main_slider').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        dots: false,
        fade: true,
        arrows: true,
        rows: 0
    });

    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }

    //* Navbar Fixed
    function navbarFixed(){
        if ( $('header').length ){
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll){
                    $("header").addClass("navbar_fixed");
                } else {
                    $("header").removeClass("navbar_fixed");
                }
            });
        }
    }
    navbarFixed();

    function offcanvasActivator(){
        if ( $('.mobile-toggle').length ){
            $('.mobile-toggle').on('click', function(){
                $('#menu').toggleClass('show-menu');
            });
            $('.close-menu').on('click',function(){
                $('#menu').removeClass('show-menu');
            });
        }
    }
    offcanvasActivator();

    $('.offcanfas_menu .dropdown').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown(400);
    });
    $('.offcanfas_menu .dropdown').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp(500);
    });


    /* Menu Dropdown support */
    $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
        if (!$(this).next().hasClass('show')) {
          $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');
  
        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
          $('.dropdown-submenu .show').removeClass("show");
        });
  
        return false;
      });




      
    /*===========Portfolio Masonry js===========*/
    function portfolioMasonry(){
        var portfolio = $("#work-portfolio,#project_portfolios");
        if( portfolio.length ){
            portfolio.imagesLoaded( function() {
                // images have loaded
                portfolio.isotope({
                    itemSelector: "",
                    layoutMode: 'masonry',
                });
            });
        }
    }
    portfolioMasonry();


    /*===========Portfolio isotope js===========*/
    function portfolioMasonry_two(){
        var pr_portfolio = $("#project_portfolio");
        if( pr_portfolio.length ){
            pr_portfolio.imagesLoaded( function() {
                // images have loaded
                // Activate isotope in container
                pr_portfolio.isotope({
                    itemSelector: ".pr_portfolio_item,.projects_item",
                    layoutMode: 'masonry',
                    transformsEnabled: true,
                    transitionDuration: "700ms",
                    masonry: {
                        columnWidth: '.grid-sizer'
                    }
                });

                // Add isotope click function
                $("#portfolio_filter div").on('click',function(){
                    $("#portfolio_filter div").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    pr_portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                            animationDuration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                });
            });
        }
    }
    portfolioMasonry_two();




    function team_slider(){
        var team_image = $('.team_slider');
        if(team_image.length){
            team_image.owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots: false,
                thumbs: true,
                thumbImage: true,
            });
        }
    }
    team_slider();

    $('.tips_img_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.business_tips_slider',
        dots: false,
        arrows: false,
        fade: true,
    });
    $('.business_tips_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        asNavFor: '.tips_img_slider'
    });

    if($('select').length > 0){
        $('select').niceSelect();
        $('#rating').niceSelect('destroy');
    }

    /*----------------------------------------------------*/
    /*  Main Slider js
    /*----------------------------------------------------*/
    function client_say_slider(){
        if ( $('#client_says_slider').length ){
            $("#client_says_slider").revolution({
                sliderType:"standard",
                sliderLayout:"auto",
                lazyLoad:"on",
                delay:9000,
                disableProgressBar:"on",
                navigation: {
                    onHoverStop: 'off',
                    touch:{
                        touchenabled:"on"
                    },
                    arrows: {
                        style:"zeus",
                        enable:true,
                        hide_onmobile:true,
                        hide_onleave:false,
                        hide_delay:200,
                        tmp:'<div class="tp-title-wrap"> <div class="tp-arr-imgholder"></div> </div>',
                        left: {
                            h_align:"left",
                            v_align:"center",
                            h_offset:30,
                            v_offset:0
                        },
                        right: {
                            h_align:"right",
                            v_align:"center",
                            h_offset:30,
                            v_offset:0
                        }
                    }
                },
                responsiveLevels:[4096,1199,992,768,480],
                gridwidth:[1400,1300,1170,800,700],
                gridheight:[380,380,480,350,350],
                lazyType:"none",
                shadow:0,
                spinner:"off",
                stopLoop:"on",
                stopAfterLoops:0,
                shuffle:"off",
                autoHeight:"on",
                fullScreenAlignForce:"off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                hideThumbsOnMobile:"off",
                hideSliderAtLimit:0,
                hideCaptionAtLimit:0,
                hideAllCaptionAtLilmit:0,
                debugMode:false,
                fallbacks: {
                    simplifyAll:"off",
                    nextSlideOnWindowFocus:"off",
                    disableFocusListener:false,
                }
            });
        }
    }
    client_say_slider();


    function progressBarConfig () {
        var progressBar = $('.progress-two');
        if(progressBar.length) {
            progressBar.each(function () {
                var Self = $(this);
                Self.appear(function () {
                    var progressValue = Self.data('value');

                    Self.find('.progress-bar').animate({
                        width:progressValue+'%'
                    }, 100);
                });
            });
        }
    }
    progressBarConfig ();

    function counterUp(){
        if ($('.counter').length ){
            $('.counter').counterUp({
                delay: 1,
                time: 500
            });
        }
    }
    counterUp();

    /* ===== Parallax Effect===== */
    function parallaxEffect() {
        if($('.parallax-effect').length){
            $('.parallax-effect').parallax();
        }
    }
    parallaxEffect();

    if ($('.creative_img').length > 0 ) {
        $('.creative_img').parallax();
    }

    if ($('.home_banner_six').length > 0 ) {
        $('.home_banner_six').parallax({
            scalarX: 5.0,
            scalarY: 10.0,
        }); 
	}
    /* ===== Parallax Stellar ===== */

    /*==============home slider js==============*/
    function mainSlider(){
        if($(".default-slider").length){
            $('.default-slider').owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots: true,
                animateOut: 'fadeOut',
                autoplayTimeout: 5000,
                smartSpeed: 1500,
                dotsContainer: '#carousel-custom-dots'
            });
        }
        $('.owl-dot').click(function () {
            owl.trigger('to.owl.carousel', [$(this).index(), 300]);
        });
    }
    mainSlider();
    /*----------------------------------------------------*/
    /*  Flexslider
    /*----------------------------------------------------*/
    function flexSlider(){
        if ( $('.projects_info').length ){
            // Responsive
            function getGridSize() {
                return (window.innerWidth < 400) ? 1 :
                    (window.innerWidth < 700) ? 2 :
                        (window.innerWidth < 1000) ? 3 :
                            (window.innerWidth < 1366) ? 3 : 4;
            }
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav:true,
                animationLoop: false,
                slideshow: true,
                itemWidth: 100,
                asNavFor: '#slider',
                touch: true,
                itemMargin: 0,
                minItems: getGridSize(),
                maxItems: getGridSize(),

            });
            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav:false,
                animationLoop: false,
                slideshow: true,
                touch: true,
            });
        }
    }
    flexSlider();

    function testimonialSlider(){
        if($(".testimonial_info").length){
            $('#sliders').flexslider({
                animation: "slide",
                directionNav:false,
                animationLoop: true,
                manualControls: ".flex-control-nav li",
                slideshow: true,
                touch: true,
            });
        }
    }
    testimonialSlider();

    $('.h_text').textillate({
        selector: '.texts',
        in:{
            delay: 100,
        },
        out:{
            delay: 100,
        },
        loop: true,
        type: 'char'
    });


    $('.search-btn').on('click', function(){
        $('body').addClass('open');
        setTimeout(function () {
            $('.search-input').focus();
        }, 500);
        return false;
    });
    $('.close_icon').on('click', function(){
        $('body').removeClass('open');
        return false;
    });


    /*--------------- End popup-js--------*/
    function popupGallery(){
        if ($(".img_popup").length) {
            $(".img_popup").each(function(){
                $(".img_popup").magnificPopup({
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    removalDelay: 300,
                    mainClass:  'mfp-with-zoom mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image,
                    }
                });
            });
        }
    }
    popupGallery();

    
    // Update cart button
    $('.ar_top').on('click', function () {
        var getID = $(this).next().attr('id');
        var result = document.getElementById(getID);
        var qty = result.value;
        $('.woocommerce-cart-form .update-cart').removeAttr('disabled');
        if( !isNaN( qty ) ) {
            result.value++;
        }else{
            return false;
        }
    });

    $('.ar_down').on('click', function () {
        var getID = $(this).prev().attr('id');
        var result = document.getElementById(getID);
        var qty = result.value;
        $('.woocommerce-cart-form .update-cart').removeAttr('disabled');
        if( !isNaN( qty ) && qty > 0 ) {
            result.value--;
        }else {
            return false;
        }
    });


    /*============== Text Widget class replace ==========*/
    $('.widget_text .f_creative_widget_link').removeClass('f_creative_widget_link').addClass('f_creative_widget_info');

    function tab() {
        var tabItem = $(".img_tabs li");
        if (tabItem.length) {
            tabItem.on('click', function () {
                var currentAttrValue = $(this).attr('data-tabs');
                $('#' + currentAttrValue).show().siblings().hide();
                $(this).addClass('active').siblings().removeClass('active');
                $('#' + currentAttrValue).addClass('active').siblings().removeClass('active');
            });
        }
    }
    tab();


})(jQuery);