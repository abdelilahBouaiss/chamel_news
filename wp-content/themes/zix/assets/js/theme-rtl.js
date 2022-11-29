(function ($) {
    "use strict";

    /*-------------------------------------------------------------------------------
	  Navbar 
	-------------------------------------------------------------------------------*/

    //* Navbar Fixed
    function navbarFixed() {
        if ($("header").length) {
            $(window).scroll(function () {
                var scroll = $(window).scrollTop();
                if (scroll) {
                    $("header").addClass("navbar_fixed");
                } else {
                    $("header").removeClass("navbar_fixed");
                }
            });
        }
    }
    navbarFixed();

    function offcanvasActivator() {
        if ($(".mobile-toggle").length) {
            $(".mobile-toggle").on("click", function () {
                $("#menu").toggleClass("show-menu");
            });
            $(".close-menu").on("click", function () {
                $("#menu").removeClass("show-menu");
            });
        }
    }
    offcanvasActivator();

    $(".offcanfas_menu .dropdown").on("show.bs.dropdown", function (e) {
        $(this).find(".dropdown-menu").first().stop(true, true).slideDown(400);
    });
    $(".offcanfas_menu .dropdown").on("hide.bs.dropdown", function (e) {
        $(this).find(".dropdown-menu").first().stop(true, true).slideUp(500);
    });

    /*----------------------------------------------------*/
    /*  Main Slider js
      /*----------------------------------------------------*/
    $(".main_slider").on("init", function (e, slick) {
        var $firstAnimatingElements = $("div .slider_item:first-child").find(
            "[data-animation]"
        );
        doAnimations($firstAnimatingElements);
    });
    $(".main_slider").on("beforeChange", function (
        e,
        slick,
        currentSlide,
        nextSlide
    ) {
        var $animatingElements = $(
            'div .slider_item[data-slick-index="' + nextSlide + '"]'
        ).find("[data-animation]");
        doAnimations($animatingElements);
    });

    $(".main_slider").slick({
        autoplay: true,
        autoplaySpeed: 5000,
        dots: false,
        fade: true,
        arrows: true,
        rtl: true,
        rows: 0,
    });

    function doAnimations(elements) {
        var animationEndEvents =
            "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data("delay");
            var $animationType = "animated " + $this.data("animation");
            $this.css({
                "animation-delay": $animationDelay,
                "-webkit-animation-delay": $animationDelay,
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }

    /*----------------------------------------------------*/
    /*  Main Slider js
      /*----------------------------------------------------*/

    /*===========Portfolio Masonry js===========*/
    function portfolioMasonry() {
        var portfolio = $("#work-portfolio,#project_portfolios");
        if (portfolio.length) {
            portfolio.imagesLoaded(function () {
                // images have loaded
                portfolio.isotope({
                    itemSelector: "",
                    layoutMode: "masonry",
                });
            });
        }
    }
    portfolioMasonry();

    /*===========Portfolio isotope js===========*/
    function portfolioMasonry_two() {
        var pr_portfolio = $("#project_portfolio");
        if (pr_portfolio.length) {
            pr_portfolio.imagesLoaded(function () {
                pr_portfolio.isotope({
                    itemSelector: ".pr_portfolio_item,.projects_item",
                    layoutMode: "masonry",
                    transformsEnabled: true,
                    transitionDuration: "700ms",
                    masonry: {
                        columnWidth: ".grid-sizer",
                    },
                });

                // Add isotope click function
                $("#portfolio_filter div").on("click", function () {
                    $("#portfolio_filter div").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    pr_portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                            animationDuration: 750,
                            easing: "linear",
                            queue: false,
                        },
                    });
                    return false;
                });
            });
        }
    }
    portfolioMasonry_two();

    $(".ar_top").on("click", function () {
        var getID = $(this).next().attr("id");
        var result = document.getElementById(getID);
        var qty = result.value;
        $(".proceed_to_checkout .update-cart").removeAttr("disabled");
        if (!isNaN(qty)) {
            result.value++;
        } else {
            return false;
        }
    });

    $(".ar_down").on("click", function () {
        var getID = $(this).prev().attr("id");
        var result = document.getElementById(getID);
        var qty = result.value;
        $(".proceed_to_checkout .update-cart").removeAttr("disabled");
        if (!isNaN(qty) && qty > 0) {
            result.value--;
        } else {
            return false;
        }
    });

    function team_slider() {
        var team_image = $(".team_slider");
        if (team_image.length) {
            team_image.owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots: false,
                thumbs: true,
                rtl: true,
                thumbImage: true,
            });
        }
    }
    team_slider();

    if ($(".tips_img_slider").length > 0) {
        $(".tips_img_slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: ".business_tips_slider",
            dots: false,
            arrows: false,
            rtl: true,
            fade: true,
        });
    }
    if ($(".business_tips_slider").length > 0) {
        $(".business_tips_slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            rtl: true,
            asNavFor: ".tips_img_slider",
        });
    }

    if ($(".selectpickers").length > 0) {
        $(".selectpickers").niceSelect();
    }

    function paymentDropdown() {
        $(".methods li label").on("click", function (event) {
            $(this).parent().find("div").first().toggle(700);
            $(this).parent().siblings().find("div").hide(700);
        });
    }
    paymentDropdown();

    /*--------------- mobile dropdown js--------*/
    if ($(window).width() < 991) {
        function active_dropdown2() {
            $(".menu > li.submenu > a").after(
                '<span class="ti-angle-right mobile_dropdown_icon"/>'
            );
            $(".menu > li .mobile_dropdown_icon").on("click", function () {
                $(this).parent().find("> ul").first().slideToggle(300);
                $(this).parent().siblings().find("> ul").hide(300);
                return false;
            });
        }
        active_dropdown2();
    }

    /*----------------------------------------------------*/
    /*  Main Slider js
      /*----------------------------------------------------*/
    //    function client_say_slider() {
    //        if ($("#client_says_slider").length) {
    //            $("#client_says_slider").revolution({
    //                sliderType: "standard",
    //                sliderLayout: "auto",
    //                lazyLoad: "on",
    //                delay: 9000,
    //                disableProgressBar: "on",
    //                navigation: {
    //                    onHoverStop: "off",
    //                    touch: {
    //                        touchenabled: "on",
    //                    },
    //                    arrows: {
    //                        style: "zeus",
    //                        enable: true,
    //                        hide_onmobile: true,
    //                        hide_onleave: false,
    //                        hide_delay: 200,
    //                        tmp: '<div class="tp-title-wrap"> <div class="tp-arr-imgholder"></div> </div>',
    //                        left: {
    //                            h_align: "left",
    //                            v_align: "center",
    //                            h_offset: 30,
    //                            v_offset: 0,
    //                        },
    //                        right: {
    //                            h_align: "right",
    //                            v_align: "center",
    //                            h_offset: 30,
    //                            v_offset: 0,
    //                        },
    //                    },
    //                },
    //                responsiveLevels: [4096, 1199, 992, 768, 480],
    //                gridwidth: [1400, 1300, 1170, 800, 700],
    //                gridheight: [380, 380, 480, 350, 350],
    //                lazyType: "none",
    //                shadow: 0,
    //                spinner: "off",
    //                stopLoop: "on",
    //                stopAfterLoops: 0,
    //                shuffle: "off",
    //                autoHeight: "on",
    //                fullScreenAlignForce: "off",
    //                fullScreenOffsetContainer: "",
    //                fullScreenOffset: "",
    //                hideThumbsOnMobile: "off",
    //                hideSliderAtLimit: 0,
    //                hideCaptionAtLimit: 0,
    //                hideAllCaptionAtLilmit: 0,
    //                debugMode: false,
    //                fallbacks: {
    //                    simplifyAll: "off",
    //                    nextSlideOnWindowFocus: "off",
    //                    disableFocusListener: false,
    //                },
    //            });
    //        }
    //    }
    //    client_say_slider();

    function progressBarConfig() {
        var progressBar = $(".progress-two");
        if (progressBar.length) {
            progressBar.each(function () {
                var Self = $(this);
                Self.appear(function () {
                    var progressValue = Self.data("value");

                    Self.find(".progress-bar").animate({
                            width: progressValue + "%",
                        },
                        100
                    );
                });
            });
        }
    }
    progressBarConfig();

    function counterUp() {
        if ($(".counter").length) {
            $(".counter").counterUp({
                delay: 1,
                time: 500,
            });
        }
    }
    counterUp();

    /* ===== Parallax Effect===== */
    function parallaxEffect() {
        if ($(".parallax-effect").length) {
            $(".parallax-effect").parallax();
        }
    }
    parallaxEffect();

    if ($(".creative_img").length > 0) {
        $(".creative_img").parallax();
    }

    if ($(".home_banner_six").length > 0) {
        $(".home_banner_six").parallax({
            scalarX: 5.0,
            scalarY: 10.0,
        });
    }

    /* ===== Parallax Stellar ===== */

    /*==============home slider js==============*/
    function mainSlider() {
        if ($(".default-slider").length) {
            $(".default-slider").owlCarousel({
                loop: true,
                items: 1,
                autoplay: true,
                dots: true,
                rtl: true,
                animateOut: "fadeOut",
                autoplayTimeout: 5000,
                smartSpeed: 1500,
                dotsContainer: "#carousel-custom-dots",
            });
        }
        $(".owl-dot").click(function () {
            owl.trigger("to.owl.carousel", [$(this).index(), 300]);
        });
    }
    mainSlider();
    /*----------------------------------------------------*/
    /*  Flexslider 
      /*----------------------------------------------------*/
    function flexSlider() {
        if ($(".projects_info").length) {
            // Responsive
            function getGridSize() {
                return window.innerWidth < 400 ?
                    1 :
                    window.innerWidth < 700 ?
                    2 :
                    window.innerWidth < 1000 ?
                    3 :
                    window.innerWidth < 1366 ?
                    3 :
                    4;
            }
            $("#carousel").flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: true,
                animationLoop: false,
                slideshow: true,
                itemWidth: 100,
                maxItems: 4,
                asNavFor: "#slider",
                touch: true,
                itemMargin: 0,
                minItems: getGridSize(),
                maxItems: getGridSize(),
            });
            $("#slider").flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: true,
                touch: true,
            });
        }
    }
    flexSlider();

    function testimonialSlider() {
        if ($(".testimonial_info").length) {
            $("#sliders").flexslider({
                animation: "slide",
                directionNav: false,
                animationLoop: true,
                manualControls: ".flex-control-nav li",
                slideshow: true,
                touch: true,
            });
        }
    }
    testimonialSlider();

    $(".h_text").textillate({
        selector: ".texts",
        in: {
            delay: 100,
        },
        out: {
            delay: 100,
        },
        loop: true,
        type: "char",
    });

    $(".search-btn").on("click", function () {
        $("body").addClass("open");
        setTimeout(function () {
            $(".search-input").focus();
        }, 500);
        return false;
    });
    $(".close_icon").on("click", function () {
        $("body").removeClass("open");
        return false;
    });

    /*--------------- End popup-js--------*/
    function popupGallery() {
        if ($(".img_popup").length) {
            $(".img_popup").each(function () {
                $(".img_popup").magnificPopup({
                    type: "image",
                    tLoading: "Loading image #%curr%...",
                    removalDelay: 300,
                    mainClass: "mfp-with-zoom mfp-img-mobile",
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0, 1], // Will preload 0 - before current, and 1 after the current image,
                    },
                });
            });
        }
        if ($(".popup-youtube").length) {
            $(".popup-youtube").magnificPopup({
                disableOn: 700,
                type: "iframe",
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
                mainClass: "mfp-with-zoom mfp-img-mobile",
            });
        }
    }
    popupGallery();

    /*----------------------------------------------------*/
    /*  Google map Two js
      /*----------------------------------------------------*/

    if ($("#mapBox").length) {
        var $lat = $("#mapBox").data("lat");
        var $lon = $("#mapBox").data("lon");
        var $zoom = $("#mapBox").data("zoom");
        var $marker = $("#mapBox").data("marker");
        var $info = $("#mapBox").data("info");
        var $markerLat = $("#mapBox").data("mlat");
        var $markerLon = $("#mapBox").data("mlon");
        var map = new GMaps({
            el: "#mapBox",
            lat: $lat,
            lng: $lon,
            scrollwheel: false,
            scaleControl: true,
            streetViewControl: false,
            panControl: true,
            disableDoubleClickZoom: true,
            mapTypeControl: false,
            zoom: $zoom,
            styles: [
                {
                    featureType: "all",
                    elementType: "labels.text.fill",
                    stylers: [
                        {
                            saturation: 36,
            },
                        {
                            color: "#000000",
            },
                        {
                            lightness: 40,
            },
          ],
        },
                {
                    featureType: "all",
                    elementType: "labels.text.stroke",
                    stylers: [
                        {
                            visibility: "on",
            },
                        {
                            color: "#000000",
            },
                        {
                            lightness: 16,
            },
          ],
        },
                {
                    featureType: "all",
                    elementType: "labels.icon",
                    stylers: [
                        {
                            visibility: "off",
            },
          ],
        },
                {
                    featureType: "administrative",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 20,
            },
          ],
        },
                {
                    featureType: "administrative",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 17,
            },
                        {
                            weight: 1.2,
            },
          ],
        },
                {
                    featureType: "landscape",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 20,
            },
          ],
        },
                {
                    featureType: "poi",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 21,
            },
          ],
        },
                {
                    featureType: "road.highway",
                    elementType: "geometry.fill",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 17,
            },
          ],
        },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 29,
            },
                        {
                            weight: 0.2,
            },
          ],
        },
                {
                    featureType: "road.arterial",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 18,
            },
          ],
        },
                {
                    featureType: "road.local",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 16,
            },
          ],
        },
                {
                    featureType: "transit",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 19,
            },
          ],
        },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [
                        {
                            color: "#000000",
            },
                        {
                            lightness: 17,
            },
          ],
        },
      ],
        });

        map.addMarker({
            lat: $markerLat,
            lng: $markerLon,
            icon: $marker,
            infoWindow: {
                content: $info,
            },
        });
    }

    /*--------- WOW js-----------*/

        new WOW({
            boxClass: "wow",
            animateClass: "animated",
            offset: 250,
            mobile: true,
            live: true,
        }).init();


        $("#preloader").addClass("load_coplate");
        $(".product_name").addClass("load_coplate");
        $(".creative_banner_text h2").addClass("load_coplate");


    /*---------  SPLITTING TEXT -----------*/
    Splitting();
})(jQuery);