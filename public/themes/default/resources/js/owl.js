class owl {
    constructor() {
        this.banner($('.banner__slide>.owl-carousel'));
        this.news($('.owl--news'));
        this.highlight($('.owl-carousel--financial'));
        this.highlight($('.owl--singular'));
        this.garelly($('.owl--garelly'));
        this.milestone($('.owl--linear-gradient'));
    }

    banner(selector) {
        if (selector.length) {
            selector.owlCarousel({
                loop: true,
                autoplay: true,
                margin: 10,
                mouseDrag: false,
                touchDrag: false,
                dots: false,
                items: 1,
                animateIn: 'fadeIn',
                animateOut: 'fadeOut',
                autoplayTimeout: 9000,
                onChanged: animation,
            })
        }

        function animation(event) {

            $('.owl-item .item video').each(function () {
                // pause playing video - after sliding
                $(this).get(0).pause();
                $(this).get(0).currentTime = 0;
            });


            $('.owl-item').children('.item').removeClass('animated animated-10s zoomNonStop');
            $($('.owl-item')[event.item.index]).children('.item').addClass('animated animated-10s zoomNonStop');


            if ($('.owl-item.active').find('video').length !== 0) {
                // play video in active slide
                $('.owl-item.active .item-video video').get(0).play();
            }
        }
    }

    highlight(selector) {
        $(function() {
            if (selector.length) {
                selector.owlCarousel({
                    loop: false,
                    autoplay: true,
                    margin: 10,
                    mouseDrag: false,
                    touchDrag: true,
                    dots: true,
                    items: 1
                })
            }
        })
    }

    news(selector) {
        if (selector.length) {
            selector.owlCarousel({
                loop: false,
                autoplay: true,
                autoplayTimeout: 10000,
                margin: 15,
                mouseDrag: false,
                dots: true,
                touchDrag: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1280: {
                        items: 3,
                    }
                }
            })
        }
    }


    garelly(selector) {
        if (selector.length) {
            selector.owlCarousel({
                loop: false,
                margin: 15,
                dots: false,
                mouseDrag: false,
                touchDrag: true,
                nav: true,
                navText: ['<i class="icon-arrow-left text-green fa-2x"></i>', '<i class="icon-arrow-right text-green fa-2x"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 3,
                    },
                    1280: {
                        items: 6,
                    }
                }
            })
        }
    }

    milestone(selector) {
        if (selector.length) {
            selector.owlCarousel({
                loop: false,
                margin: 0,
                dots: false,
                mouseDrag: false,
                touchDrag: true,
                nav: true,
                navText: ['<i class="icon-arrow-left text-green fa-2x"></i>', '<i class="icon-arrow-right text-green fa-2x"></i>'],
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 3,
                    },
                    1280: {
                        items: 7,
                    }
                },
                onInitialized: toggle,
                onChanged: border,
            })
        }

        function toggle(event) {
            border(event);
            if($('.item').length) {
                $('.item').click(function() {
                    let index = $(this).parent('.owl-item').index();
                    $('.item').removeClass('show');
                    $(this).addClass('show');
                    $('.milestone-lists>.list-group').removeClass('show');
                    $($(`.list-group`)[index]).addClass('show');
                })
            }
        }

        function border(event) {
            if($(event.currentTarget).find('.owl-item.active').length) {
                $(event.currentTarget).find('.owl-item.active').css('border-right', '1px solid white');
                $($('.owl-item')[event.page.size + event.item.index - 1]).css('border', 'none');
            }
        }
    }
}



export default new owl();
