(function ($) {
    'use strict';

    AOS.init();

    $(document).ready(function(){
    $(".show-modal").click(function(){
        $("#myModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
});

var $shareBtn = $('.share-btn');
var $shareUrl = $('.share-url');
var $shareContainer = $('.share-container');
var $notificationButton = $('.notification-button');

// set data
var $url = 'https://evolvinglove.customerdevsites.com/shared-profile?formid=Zm9ybWlkNDE2';
var $shared = false;

function shareLink(e){

    // set active class
    $shareBtn.toggleClass('active');
    $shareUrl.toggleClass('active');
    $shareContainer.toggleClass('active');

    if ($shared === false) {

        // trigger notification alert
        $notificationButton.toggleClass('active');
        $shared = true;
        $shareBtn.text('UNSHARE YOUR PROFILE');
        $shareUrl.text($url);

        var range = document.createRange();
        range.selectNode($(this).next()[0]);
        window.getSelection().addRange(range);

        try {
            // Now that we've selected the anchor text, execute the copy command
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copy email command was ' + msg);

        } catch(err) {

            console.log('Oops, unable to copy');

        }

        // Remove the selections - NOTE: Should use
        // removeRange(range) when it is supported
        window.getSelection().removeAllRanges();


    } else {
        $shared = false;
        $shareBtn.text('SHARE YOUR PROFILE');
    }
}

function fadeOutNotification(){
    setTimeout(function(){
        $notificationButton.removeClass('active');
    }, 2000);
}

// bind events
$shareBtn.on('click', shareLink);
$notificationButton.on('transitionend', fadeOutNotification);

$(window).scroll(function(){
  var sticky = $('.site-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed-header');
  else sticky.removeClass('fixed-header');
});


$(window).on('load', function() {
    $('#login').modal('show');
});
    $(window).scroll(function () {
        var scrollHeader = $(window).scrollTop();
        if (scrollHeader >= 10) {
            $('#header').addClass('scrolled');
        } else {
            $('#header').removeClass('scrolled');
        }
    });

    $(document).ready(function () {
        $('.site-hamburgur').click(function () {
            $(this).children('i').toggleClass('fa-bars fa-times');
            $('body').toggleClass('aside_active');
        });

        $('.site-menu li a[href*="#"]').click(function () {
            $('.site-hamburgur').children('i').toggleClass('fa-bars fa-times');
            $('body').removeClass('aside_active');
        });

        $('.overlay-layer').click(function () {
            $('.site-hamburgur').children('i').toggleClass('fa-bars fa-times');
            $('body').removeClass('aside_active');
        });

        $('.site-menu > li > a').on('click', function () {
            $(this).toggleClass('clicked');
            $(this).next('ul').slideToggle();
        });

        $('.site-menu a[href="' + location.pathname.split("/")[location.pathname.split("/").length - 1] + '"]').addClass('active');

        $('.sub-dropdown').each(function () {
            if ($(this).find('a').hasClass('active')) {
                $(this).addClass('open');
            }
        });

        $(".accordion-item .title").click(function () {
            $(".active").not(this).removeClass("active").next().slideUp(300);
            $(this).toggleClass("active").next().slideToggle(300);

            if ($(this).hasClass("active")) {
                $(this).parent().addClass('is_open').siblings().removeClass('is_open');
            }
        });
    });

    $('.dynamic-graphic').each(function () {
        var dynamic_graphic = $(this);
        var firstRow_figcaption_height = dynamic_graphic.find('.first-row figcaption').outerHeight();
        var firstRow_figcaption_height = dynamic_graphic.find('.last-row figcaption').outerHeight();

        var wWidth = $(window).width();
        if ((wWidth >= 768)) {
            var MidRow_figcaptionFirst_size = dynamic_graphic.parents('.small-graphic').find('.mid-row figure:first-child figcaption span').outerWidth() + 20;
            var MidRow_figcaptionLast_size = dynamic_graphic.parents('.small-graphic').find('.mid-row figure:last-child figcaption span').outerWidth() + 20;
        }

        dynamic_graphic.css({
            'padding-top': firstRow_figcaption_height + 'px',
            'padding-bottom': firstRow_figcaption_height + 'px',

            'padding-left': MidRow_figcaptionFirst_size + 'px',
            'padding-right': MidRow_figcaptionLast_size + 'px'
        });
    });

    $(window).on('load resize', function () {
        $('.small-graphic').each(function () {
            var graphic_container = $(this);
            var graphic_container_graphic_height = graphic_container.find('.dynamic-graphic').outerHeight() * 0.6;

            graphic_container.css({
                'height': graphic_container_graphic_height + 'px'
            });
        });

        var wWidth = $(window).width();
        if ((wWidth <= 767.98)) {
            $('.transform-graphic').each(function () {
                var graphic_container = $(this);
                var graphic_container_graphic_height = graphic_container.find('.dynamic-graphic').outerHeight() * 0.6;

                graphic_container.css({
                    'height': graphic_container_graphic_height + 'px'
                });
            });
        }
    });

    var testimonial_swiper = new Swiper(".testimonial-swiper", {
        watchOverflow: true,
        grabCursor: true,
        allowTouchMove: true,
        observer: true,
        observeParents: true,
        observeSlideChildren: true,
        loop: false,
        autoplay: {
            delay: 3000,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: '1',
                spaceBetween: 50,
            },
            768: {
                slidesPerView: '2',
                spaceBetween: 30,
            },
        }
    });
    
})(jQuery);