jQuery(function ($) {

    $('.vl-ticker .owl-carousel').owlCarousel({
        rtl: JSON.parse(viral_localize.is_rtl),
        margin: 10,
        loop: true,
        mouseDrag: false,
        autoplay: true,
        nav: true,
        dots: false,
        navText: ['<i class="mdi-chevron-left"></i>', '<i class="mdi-chevron-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.vl-toggle-menu').click(function () {
        $('.vl-main-navigation .vl-menu').slideToggle();
        viralKeyboardLoop($('.vl-menu'));
        return false;
    });

    $('.vl-menu > ul').superfish({
        delay: 500,
        animation: {opacity: 'show', height: 'show'},
        speed: 'fast'
    });

    $('#secondary').theiaStickySidebar({
        additionalMarginTop: 20,
        additionalMarginBottom: 20
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('#vl-back-top').removeClass('vl-hide');
        } else {
            $('#vl-back-top').addClass('vl-hide');
        }
    });

    $('#vl-back-top').click(function () {
        $('html,body').animate({scrollTop: 0}, 800);
    });

    var viralKeyboardLoop = function (elem) {

        var tabbable = elem.find('select, input, textarea, button, a').filter(':visible');

        var firstTabbable = tabbable.first();
        var lastTabbable = tabbable.last();
        /*set focus on first input*/
        firstTabbable.focus();

        /*redirect last tab to first input*/
        lastTabbable.on('keydown', function (e) {
            if ((e.which === 9 && !e.shiftKey)) {
                e.preventDefault();
                firstTabbable.focus();
            }
        });

        /*redirect first shift+tab to last input*/
        firstTabbable.on('keydown', function (e) {
            if ((e.which === 9 && e.shiftKey)) {
                e.preventDefault();
                lastTabbable.focus();
            }
        });

        /* allow escape key to close insiders div */
        elem.on('keyup', function (e) {
            if (e.keyCode === 27) {
                elem.hide();
            }
            ;
        });
    };

});