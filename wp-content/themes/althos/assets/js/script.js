(function ($) {

    'use strict';

    $('#mobile-menu-active').metisMenu();

    $('#mobile-menu-active .has-dropdown > a').on('click', function (e) {
        var dropdown_link = $(this).attr("href");
        if (dropdown_link === '#') {
            e.preventDefault();
        }
    });

    // $('#mobile-menu-active > li > a').on('click', function (e) {
    //     // var dropdown_link = $(this).attr("href");
    //     // console.log(dropdown_link);
    //     e.preventDefault();
    // });


    $(".open-mobile-menu > a").on("click", function (e) {
        e.preventDefault();
        $(".slide-bar").toggleClass("show");
        $("body").addClass("on-side");
        $('.body-overlay').addClass('active');
        $(this).addClass('active');
    });

    $(".close-mobile-menu > a").on("click", function (e) {
        e.preventDefault();
        $(".slide-bar").removeClass("show");
        $("body").removeClass("on-side");
        $('.body-overlay').removeClass('active');
        $('.open-mobile-menu > a').removeClass('active');
    });

    $('.body-overlay').on('click', function () {
        $(this).removeClass('active');
        $(".slide-bar").removeClass("show");
        $("body").removeClass("on-side");
        $('.open-mobile-menu > a').removeClass('active');
    });


    new VenoBox({
        selector: '.popup-video',
    });


    /*-------------------------------------------
	    Sticky Header
	--------------------------------------------- */

    let win = $(window);
    let sticky_id = $(".header-area");
    win.on('scroll', function () {
        let scroll = win.scrollTop();
        if (scroll < 100) {
            sticky_id.removeClass("sticky-header");
        } else {
            sticky_id.addClass("sticky-header");
        }
    });


    if (jQuery(".working-hero-slider").length > 0) {

        var BasicSlider = $('.working-hero-slider');
        BasicSlider.on('init', function (e, slick) {
            var $firstAnimatingElements = $('.working-slide:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = $('.working-slide[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: true,
            autoplaySpeed: 10000,
            dots: false,
            fade: true,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fal fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fal fa-angle-right"></i></button>',
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
    }

    function startAos() {
        AOS.init({
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 120, // offset (in px) from the original trigger point
            //delay: 0, // values from 0 to 3000, with step 50ms
            // duration: 400, // values from 0 to 3000, with step 50ms
            easing: 'ease', // default easing for AOS animations
            once: true, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
        });
    }

    startAos();

    $('.testimonial-slider').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        centerMode: true,
        centerPadding: 0,
        autoplay: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 560,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/hero.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/service.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/social.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/team.default', startAos);
        elementorFrontend.hooks.addAction('frontend/element_ready/clintlist.default', startAos);
    });


})(jQuery);
