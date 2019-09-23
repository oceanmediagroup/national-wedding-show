$(document).ready(function () {

    if ($('.owl-header-simple').length) {
        // Homepage -> Slider

        const $carousel = $('.owl-header-simple');

        $carousel.owlCarousel({
            loop: false,
            margin: 0,
            dots: false,
            nav: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 10000,
            responsive: {
                0: {
                    items: 1
                }
            }
        });

        const video = $('.owl-header-simple .item.video').parent();

        if (video.length) {
            if (video.find('iframe').attr('src')) {
                if (video.find('iframe').attr('src').indexOf('vimeo') !== -1) {
                    const player = new Vimeo.Player(video);

                    $carousel.on('changed.owl.carousel', function (event) {
                        if (video.hasClass("active")) {
                            player.play();
                        } else {
                            player.pause();
                        }
                    });
                }
            }
        }

    }


    if ($('.owl-pages-cards').length) {
        // Homepage -> Slider

        const $carousel = $('.owl-pages-cards');

        $carousel.owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 10000,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true
                },
                768: {
                    items: 2,
                    margin: 30
                },
                992: {
                    items: 3,
                    margin: 30,
                    autoplay: false,
                    dots: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false
                }
            }
        });
    }

    if ($('.owl-inpiration-cards').length) {
        // Homepage -> Slider

        const $carousel = $('.owl-inpiration-cards');

        $carousel.owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 10000,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true
                },
                992: {
                    items: 3,
                    autoplay: false,
                    dots: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false
                }
            }
        });

    }


    if ($('.owl-shows-calendar').length) {
        // Homepage -> Slider

        const $carousel = $('.owl-shows-calendar');

        $carousel.owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayHoverPause: true,
            autoplayTimeout: 10000,
            responsive: {
                0: {
                    items: 1,
                    autoplay: true
                },
                768: {
                    items: 3
                },
                992: {
                    items: 5,
                    margin: 0,
                    autoplay: false,
                    dots: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false
                }
            }
        });

    }


    if ($('.owl-adverts').length) {
        const $carousel = $('.owl-adverts');

        $carousel.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2,
                    autoplay: false,
                    dots: false,
                    mouseDrag: false,
                    touchDrag: false,
                    pullDrag: false
                }
            }
        });
    }


    // CLients logos
    if ($('.owl-clients').length) {
        const $carousel = $('.owl-clients');

        $carousel.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: true,
            navText: ["<span class='clients-carousel__arrow clients-carousel__arrow--left'>&#x276f;</span>", "<span class='clients-carousel__arrow clients-carousel__arrow--right'>&#x276f;</span>"],
            navContainer: '#clientsOutsideNav',
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 5
                }
            }
        });
    }


    if ($('.owl-network').length) {
        const $carousel = $('.owl-network');

        $carousel.owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 3
                },
                992: {
                    items: 5
                }
            }
        })
    }

    if ($('.owl-testimonials').length) {
        const $carousel = $('.owl-testimonials');

        $carousel.owlCarousel({
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                }
            }
        })
    }


    if ($('.owl-official-partners').length) {
        const $carousel = $('.owl-official-partners');

        $carousel.owlCarousel({
            loop: false,
            margin: 30,
            dots: false,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 6
                }
            }
        });

        if ($(".owl-official-partners .owl-item").not('.cloned').length < 6 && $(window).width() > 991) {
            $carousel.data('owl.carousel').options.loop = false;
            $carousel.data('owl.carousel').options.autoplay = false;
            $carousel.trigger('refresh.owl.carousel');
        }

    }

    if ($('.owl-other-partners').length) {
        const $carousel = $('.owl-other-partners');

        $carousel.owlCarousel({
            loop: false,
            margin: 30,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3,
                    dots: false
                },
                992: {
                    items: 6,
                    dots: false
                }
            }
        });
    }

    if (jQuery('.owl-sponsors-additional').length) {
        jQuery('.owl-sponsors-additional').owlCarousel({
            loop: true,
            margin: 30,
            dots: true,
            nav: false,
            autoplay: true,
            autoplayTimeout: 5000,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3,
                    dots: false
                },
                992: {
                    items: 6
                }
            }
        });
    }

    if ( /Android|webOS|iPhone|iPod|Blackberry|Windows Phone/i.test(navigator.userAgent)){
        var onchange=["if ($(this).val()!=''){"];
        onchange.push("        window.location = $(this).val();");
        onchange.push("}");
        $('select[name="sort_by"]').each(function(){
            $(this).attr("onchange", onchange.join(''));
        })
    }

});