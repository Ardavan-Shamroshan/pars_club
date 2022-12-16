$(document).ready(function ($) {
    'use strict'; $(".mainmenu").sticky({ topSpacing: 0 }); $('ul.sf-menu').superfish(); $(document).ready(function () { $('#mobile-nav').mmenu(); });
    $(".single-carousel").slick({ rtl: true, lazyLoad: 'ondemand', infinite: true });
    $("#hero-slider").slick({
        lazyLoad: 'ondemand',
        infinite: true, slidesToScroll: 1, autoplay: true, mobileFirst: true,
        autoplaySpeed: 4000, speed: 200, cssEase: 'linear'
    });

    $("#hero-slider-2").slick({
        lazyLoad: 'ondemand',
        infinite: true, slidesToScroll: 1, autoplay: true, mobileFirst: true,
        autoplaySpeed: 4000, speed: 200, cssEase: 'linear'
    });

    $("#events-carousel").slick({ rtl: true, lazyLoad: 'progressive', arrows: false, infinite: true, slidesToShow: 3, slidesToScroll: 3 });
    $(".sponsors-carousel").slick({ rtl: true, lazyLoad: 'progressive', arrows: true, infinite: true, slidesToShow: 5, slidesToScroll: 1, mobileFirst: true, autoplaySpeed: 3000, autoplay: true, speed: 500, responsive: [{ breakpoint: 1024, settings: { slidesToShow: 5, slidesToScroll: 1 } }, { breakpoint: 900, settings: { slidesToShow: 3, slidesToScroll: 1 } }, { breakpoint: 0, settings: { slidesToShow: 2, slidesToScroll: 1 } }] });
    $(".testimonials-carousel").slick({ rtl: true, lazyLoad: 'progressive', arrows: false, infinite: true, slidesToShow: 3, slidesToScroll: 1, mobileFirst: true, autoplaySpeed: 2500, autoplay: true, speed: 500, responsive: [{ breakpoint: 1024, settings: { slidesToShow: 3, slidesToScroll: 1 } }, { breakpoint: 900, settings: { slidesToShow: 2, slidesToScroll: 1 } }, { breakpoint: 0, settings: { slidesToShow: 1, slidesToScroll: 1 } }] }); $('#event-one').countdown('2018/12/14', function (event) {
        var $this = $(this).html(event.strftime(''
            + '<span>%D <br> <small>days</small></span>  '
            + '<span>%H <br> <small>hr</small> </span>  '
            + '<span>%M <br> <small>min</small> </span>  '
            + '<span>%S <br> <small>sec</small></span> '));
    }); $('.form-theme').submit(function (event) { event.preventDefault(); var url = $(this).attr('action'); var datos = $(this).serialize(); $.get(url, datos, function (resultado) { $('.result').html(resultado); }); }); $('#newsletterForm').submit(function (event) { event.preventDefault(); var url = $(this).attr('action'); var datos = $(this).serialize(); $.get(url, datos, function (resultado) { $('#result-newsletter').html(resultado); }); }); $(document).ready(function () { }); $('.swipebox-ligbox').swipebox({ useCSS: true, useSVG: true, initialIndexOnArray: 0, hideCloseButtonOnMobile: false, removeBarsOnMobile: true, hideBarsDelay: 3000, videoMaxWidth: 1140, beforeOpen: function () { }, afterOpen: null, afterClose: function () { }, loopAtEnd: false }); $(window).load(function () { var $container = $('.portfolioContainer'); $container.isotope({ filter: '*', animationOptions: { duration: 750, easing: 'linear', queue: false } }); $('.portfolioFilter a').click(function () { $('.portfolioFilter .current').removeClass('current'); $(this).addClass('current'); var selector = $(this).attr('data-filter'); $container.isotope({ filter: selector, animationOptions: { duration: 750, easing: 'linear', queue: false } }); return false; }); }); $('[data-toggle="popover"]').popover(); $().UItoTop({ scrollSpeed: 500, easingType: 'linear' }); $('.item-boxed-img').hover(function () { $(this).toggleClass('animated pulse'); }); $('#ri-grid').gridrotator({ rows: 2, columns: 8, w1024: { rows: 2, columns: 6 }, w768: { rows: 2, columns: 5 }, w480: { rows: 2, columns: 4 }, w320: { rows: 2, columns: 3 }, w240: { rows: 2, columns: 3 }, step: 'random', maxStep: 3, preventClick: true, animType: 'random', animSpeed: 600, animEasingOut: 'linear', animEasingIn: 'linear', interval: 2500, slideshow: true, onhover: false, nochange: [] });
});