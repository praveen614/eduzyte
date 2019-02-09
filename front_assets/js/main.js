/* ================================================

Template Name: APPAI 

Description: Creative App Landing HTML5 Template

Template URI: https://themeforest.net/item/appai-creative-app-landing-html5-template/19533013

Author: Marvel_Theme

Author URI: https://themeforest.net/user/marvel_theme

Version: 1.1.0

================================================ */



(function($) {

    'use strict';



    // scrollspy

    $('body').scrollspy({ target: '#navigation' });



    // smooth scrolling

    $(function() {

        $(".navbar-nav a, .scroll-icon a, .appai-preview .button-group a").bind('click', function(event) {

            var $anchor = $(this);

            $('html, body').stop().animate({

                scrollTop: $($anchor.attr('href')).offset().top

            }, 1000, 'easeInOutExpo');

            event.preventDefault();

        });

    });



    // Navigation hide on scroll on mobile screen

    $(window).on('scroll', function() {

        $('.navbar-collapse').collapse('hide')

    });



    // carousel one

    $('.slider-wrapper').slick({

        arrows: false,

        dots: false,

        infinite: true,

        speed: 500,

        fade: true,

        cssEase: 'ease',

        autoplay: true,

        autoplaySpeed: 3000,

    });



    // app screenshot carousel

    $('.slider-wrapper-2').slick({

        autoplay: true,

        autoplaySpeed: 2000,

        arrows: false,

        dots: true,

        cssEase: 'ease',

        infinite: true,

        slidesToShow: 3,

        slidesToScroll: 3,

        responsive: [{
                breakpoint: 991,

                settings: {

                    slidesToShow: 1,

                    slidesToScroll: 1

                }

            }, {

                breakpoint: 480,

                settings: {

                    slidesToShow: 1,

                    slidesToScroll: 1

                }

            }

        ]

    });



    // testimonial carousel

    $('.slider-wrapper-3').slick({

        arrows: false,

        dots: true,

        cssEase: 'ease',

        slidesToShow: 1,

        slidesToScroll: 1,

    });



    // testimonial carousel home 2

    $('.testimonial-slider-2').slick({

        centerMode: true,

        centerPadding: '480px',

        slidesToShow: 1,

        arrows: true,

        dots: true,

        responsive: [{

            breakpoint: 1367,

            settings: {

                arrows: true,

                centerMode: true,

                centerPadding: '200px',

                slidesToShow: 1

            }

        }, {

            breakpoint: 769,

            settings: {

                arrows: false,

                centerMode: true,

                centerPadding: '40px',

                slidesToShow: 1

            }

        }, {

            breakpoint: 480,

            settings: {

                arrows: false,

                centerMode: true,

                centerPadding: '20px',

                slidesToShow: 1

            }

        }]

    });



    // counter up

    $('.counter').counterUp({

        delay: 10,

        time: 1000

    });



    // Magnific Popup js

    $('.video-play-icon a').magnificPopup({

        type: 'iframe',

        removalDelay: 300,

        mainClass: 'mfp-fade'

    });



    $('.preview-icon a').magnificPopup({

        type: 'image',

        removalDelay: 300,

        mainClass: 'mfp-fade',

        gallery: {

            enabled: true

        }

    });



    // comming soon countdown

    $('[data-countdown]').each(function() {

        var $this = $(this),

            finalDate = $(this).data('countdown');

        $this.countdown(finalDate, function(event) {

            $this.html(event.strftime(

                '<div class="cdown"><span class="days"><strong>%-D</strong><p>Days.</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours.</p></span></div> <div class="cdown"><span class="minutes"><strong>%M</strong> <p>MINUTES.</p></span></div><div class="cdown"><span class="second"><strong> %S</strong><p>SECONDS.</p></span></div>'

            ));

        });

    });



    // parallax

    $('#slider-area.home-style-2').parallax("50%", 0.3);





   setRandomClass();

setInterval(function() {

    setRandomClass();

}, 1000);



function setRandomClass() {

    var ul = $(".dots");

    var items = ul.find("span");

    var number = items.length;

    var random = Math.floor((Math.random() * number));

    items.removeClass("animated");

    items.eq(random).addClass("animated");

}









    // preloader

    $(window).on('load', function() {

        // $('.preloader-wave-effect').fadeOut();

        $('#preloader-wrapper').delay(5000).fadeOut('slow');

    });



    // YOUTUBE VIDEO BACKGROUND

    $('#video-background').YTPlayer({

        videoId: '74kPEJWpCD4',

        fitToBackground: false,

        mute: true,

        pauseOnScroll: false,

        playerVars: {

            modestbranding: 0,

            autoplay: 1,

            controls: 1,

            showinfo: 0,

            wmode: 'transparent',

            branding: 0,

            rel: 0,

            autohide: 0,

            origin: window.location.origin

        }

    });

function resize_section() {

// extended-instruction



    //setTimeout(function(){
//    var h1 = jQuery(".tier-intervention-block").outerHeight();
//    jQuery(".extended-instruction-intro .title-block .title").height(h1);
    //},10);


    if (jQuery(window).width() >= 1199) {

        var header_height = jQuery("header").outerHeight();

        var ht = jQuery(window).height();

        var ht_video = ht - header_height;

        jQuery(".video").animate({'height': ht_video + 'px'}, 100);

        jQuery(".main-container .whatisit-section").animate({'height': ht + 'px'}, 100);

        jQuery(".main-container .counter-section").animate({'height': ht + 'px'}, 100);

        jQuery(".main-container .livesession-section").animate({'height': ht + 'px'}, 100);

    } else {
        jQuery(".video").css("height", "");

        jQuery(".main-container .whatisit-section").css("height", "");

        jQuery(".main-container .counter-section").css("height", "");

        jQuery(".main-container .livesession-section").css("height", "");
    }

    

}


})(jQuery);










