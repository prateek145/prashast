jQuery(window).scroll(function () {

    var scroll = jQuery(window).scrollTop();

    if (scroll >= 100) {

        jQuery("#header3").addClass("header-scrolled");
        jQuery("#header").addClass("header-scrolled");

    } else {

        jQuery("#header3").removeClass("header-scrolled");
        jQuery("#header").removeClass("header-scrolled");

    }

});

jQuery(document).ready(function () {



    jQuery(".lightbox").click(function () {
        event.preventDefault();
        var imgsrc = jQuery(this).attr('href');
        jQuery("body").append("<div class='img-popup'><span class='close-lightbox'><i class='fas fa-times'></span><img src='" + imgsrc + "'></div>");
        jQuery(".close-lightbox, .img-popup").click(function () {
            jQuery(".img-popup").fadeOut(500, function () {
                jQuery(this).remove();
            }).addClass("lightboxfadeout");
        });

    });
    jQuery(".lightbox").click(function () {
        jQuery(".img-popup").fadeIn(500);
    });



    jQuery("#testiTab li").each(function () {
        jQuery(this).on("mouseover", function () {
            jQuery(this).children().trigger("click");
        });
    });



    (function ($) {
        "use strict";
        /*------------------------------    
        Go Top
        ------------------------------*/
        jQuery('a[href="#top"]').on('click', function () {
            jQuery('html, body').animate({ scrollTop: 0 }, 800);
            return false
        });

        /*------------------------------    
        Shortcodes
        ------------------------------*/
        jQuery('span[data-toggle="tooltip"]').tooltip();
        jQuery('span[data-toggle="tooltip"][data-placement="top"]').tooltip('show');

        /*------------------------------    
        Search Filter
        ------------------------------*/
        jQuery('.searchFilters .dropdown-menu').find('a').on("click", function (e) {
            e.preventDefault();
            var param = $(this).attr("href").replace("#", "");
            var concept = $(this).text();
            jQuery('.searchFilters span#searchFilterValue').text(concept);
            jQuery('.input-group #search_param').val(param);
        });


        /*------------------------------    
        Partner And Testimonial
        ------------------------------*/
        jQuery('.ptTabNavs').on('click', '.prevTab', function () {
            jQuery('.ptTab_nav > .active').prev('li').find('a').trigger('click')
        });

        jQuery('.ptTabNavs').on('click', '.nextTab', function () {
            jQuery('.ptTab_nav > .active').next('li').find('a').trigger('click')
        });

        /*------------------------------    
        Gallery Slider
        ------------------------------*/
        jQuery('.slider_1').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
            autoplay: true,
            animateOut: 'fadeOut',
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 1,
                    nav: true
                }
            }
        });
        jQuery('.featureCats').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
            autoplay: false,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true
                }
            }
        });
        jQuery('.d-carousel-cener').owlCarousel({
            center: true,
            items: 5,
            loop: true,
            nav: true,
            margin: 10,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true
                }
            }
        });


        jQuery('.nac-carousel').owlCarousel({
            loop: true,
            nav: true,
            center: true,
            rtl: false,
            autoplay: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            margin: 30,
            dotsData: true,
            autoplayTimeout: 2000,
            smartSpeed: 900,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 2
                },
                960: {
                    items: 2
                },
                1200: {
                    items: 4
                }
            }
        });


        jQuery(function () { // wait for document ready
            // init controller
            var controller = new ScrollMagic.Controller();

            // show pin state
            function updateBox(e) {
                if (e.type == "enter") {
                    jQuery("#pin p").text("Pinned.");
                } else {
                    jQuery("#pin p").text("Unpinned.");
                }
            }

            // build scenes
            new ScrollMagic.Scene({ triggerElement: "#trigger", duration: 150 })
                .setPin("#pin")
                .setClassToggle("#pin", "one")
                .on("enter leave", updateBox)
                .addIndicators() // add indicators (requires plugin)
                .addTo(controller);

            new ScrollMagic.Scene({ triggerElement: "#trigger", duration: 150 })
                .setPin("#pin-2")
                .setClassToggle("#pin", "green")
                .on("enter leave", updateBox)
                .addIndicators() // add indicators (requires plugin)
                .addTo(controller);

        });
        /*----------------------------------------------------*/
        /*  Count Up
        /*----------------------------------------------------*/
        jQuery('.counter').counterUp({
            delay: 15,
            time: 1500
        });

        /*----------------------------------------------------*/
        /*  Spinner
        /*----------------------------------------------------*/
        jQuery('.spinner .btn:first-of-type').on('click', function () {
            jQuery('.spinner input').val(parseInt($('.spinner input').val(), 10) + 1);
        });
        jQuery('.spinner .btn:last-of-type').on('click', function () {
            jQuery('.spinner input').val(parseInt($('.spinner input').val(), 10) - 1);
        });

        /*----------------------------------------------------*/
        /*  Shipping Address
        /*----------------------------------------------------*/
        jQuery('#shippingAddressEscape').on('click', function () {
            var isChecked = $('#shippingAddressEscape').is(':checked');
            if (isChecked)
                jQuery("#shippingAddress").find(':input').attr('disabled', 'disabled');
            else
                jQuery("#shippingAddress").find(':input').removeAttr('disabled', 'disabled')
        });

        /*------------------------------    
        Team Member Slider
        ------------------------------*/
        jQuery('.ourTeamSlide').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            nav: true,
            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: true
                },
                1000: {
                    items: 2,
                    nav: true
                }
            }
        })

    })(jQuery)
});

function getGridSize() {
    return (window.innerWidth < 600) ? 2 :
        (window.innerWidth < 900) ? 3 : 4;
}

jQuery(window).load(function () {

    /*------------------------------    
    Sinlge Prodcut Slider
    ------------------------------*/
    jQuery('#productImageSliderNav').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        directionNav: true,
        slideshow: false,
        itemWidth: 130,
        itemMargin: 10,
        asNavFor: '#productImageSlider',
        prevText: '<i class="fas fa-angle-left"></i>',
        nextText: '<i class="fas fa-angle-right"></i>',
    });

    jQuery('#productImageSlider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        directionNav: false,
        slideshow: false,
        sync: "#productImageSliderNav"
    });

    /*------------------------------    
    Main Slider
    ------------------------------*/
    jQuery('.sliderCont.vertical').flexslider({
        animation: "slide",
        // Primary Controls
        direction: "vertical",               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
        prevText: '   <span class="material-icons">arrow_upward</span>',           //String: Set the text for the "previous" directionNav item
        nextText: '<span class="material-icons">arrow_downward</span>',               //String: Set the text for the "next" directionNav item
    });

    jQuery('.sliderCont').flexslider({
        animation: "fade",
        // Primary Controls
        controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
        directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
        prevText: '<i class="fas fa-angle-left"></i>',           //String: Set the text for the "previous" directionNav item
        nextText: '<i class="fas fa-angle-right"></i>',               //String: Set the text for the "next" directionNav item
    });



    jQuery('#carousel-thum').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 100,
        maxItems: 4,
        itemMargin: 0,
        asNavFor: '#slider-thum',
        prevText: '<span class="material-icons">arrow_back</span>',
        nextText: '<span class="material-icons">arrow_forward</span>',
        minItems: getGridSize(),
        maxItems: getGridSize()

    });

    jQuery('#slider-thum').flexslider({
        animation: "slide",
        controlNav: false,
        itemWidth: 841,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel-thum",
        prevText: '<span class="material-icons">arrow_back</span>',
        nextText: '<span class="material-icons">arrow_forward</span>',

    });


});



if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
}




$(window).on(" load", function () {


    $("li.h_cart").on("click", function () {
        if ($(window).width() <= 768) {
            $(this).children(".hclist").slideToggle();

        }
    });


});