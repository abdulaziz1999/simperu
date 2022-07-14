$(function () {
    let timeFirst = new Date().getTime();
    let timeSecond = new Date(varSecond).getTime();
    let distance = timeSecond - timeFirst;
    let x = setInterval(function () {
        let objTime = {
            'days': Math.floor(distance / (1000 * 60 * 60 * 24)),
            'hours': Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
            'minutes': Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
            'seconds': Math.floor((distance % (1000 * 60)) / 1000)
        };
        distance -= 1000;

        let result = `${objTime.hours} : ${objTime.minutes} : ${objTime.seconds}`;
        if (distance <= 0) {
            clearInterval(x);
            $('#countDown').html('Expired');
        }
        $('#countDown').html(result);
    }, 1000);

    function Sclass(time) {
        let timeSecond = new Date(time).getTime();
        let distance = timeSecond - timeFirst;
        let x = setInterval(function () {
            let objTime = {
                'days': Math.floor(distance / (1000 * 60 * 60 * 24)),
                'hours': Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
                'minutes': Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
                'seconds': Math.floor((distance % (1000 * 60)) / 1000)
            };
            distance -= 1000;

            let result = `${objTime.hours} : ${objTime.minutes} : ${objTime.seconds}`;
            if (distance <= 0) {
                clearInterval(x);
                $(this).html('Expired');
            }
            $(this).html(result);
        }, 1000);
    }
});

(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function () {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
                function () {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function () {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });

    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({

    });

    $('.owl-carousel').owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        nav: true,
        navText: [
            '<button="btn btn-dark text-white"><i class="fas fa-arrow-left"></i></button>',
            '<button="btn btn-dark text-white"><i class="fas fa-arrow-right"></i></button>'
        ],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                loop: true
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        },
    });
})(jQuery);
