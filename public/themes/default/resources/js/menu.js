class menu {
    constructor() {
        this.init();
        this.activeMenu();
    }

    init() {
        inactive();

        $(window).on('scroll', function() {
            inactive();
        });

        $('#menu').on('show.bs.collapse', function() {
            headerActive();
        }).on('hidden.bs.collapse', function() {
            inactive();
        })

        $('.dropdown .nav-link').on("click", function(e){
            if(!$(this).parent('.dropdown').hasClass('active')) {

                if($(this).parents('.menu__lv2').length) {
                    inactive(2);
                } else {
                    inactive();
                }

                headerActive();

                $(this).next('.dropdown-menu').toggle();

                if($(this).next('.dropdown-menu').css('display') == 'block') {
                    $(this).parent('.dropdown').addClass('active');
                }
            } else {
                if($(this).parents('.menu__lv2').length) {
                    inactive(2);
                } else {
                    inactive();
                }
            }

            e.stopPropagation();
            // e.preventDefault();
        });

        function headerActive() {
            $('header.header').addClass('active');
        }

        function inactive(level = null) {
            if(level == null) {
                let windowScroll = $(window).scrollTop();
                if(window.location.pathname == '/' || window.location.pathname == '/en' || window.location.pathname == '/th' || window.location.pathname == '/en/home' || window.location.pathname == '/th/home') {
                    if (windowScroll <= 0 && !$('.menu').hasClass('show')){
                        $('header.header').removeClass('active');
                    } else {
                        $('.header').addClass('active');
                    }
                } else {
                    $('.header').addClass('active');
                }
                $('.menu__lv1>.dropdown').removeClass('active');
                $('.menu__lv1>.dropdown>.dropdown-menu').hide();
            } else if(level == 2) {
                $('.menu__lv2').css('height', 'auto');
                $('.menu__lv3').css('height', 'auto');
                $('.menu__lv2 .dropdown').removeClass('active');
                $('.menu__lv2 .menu__lv3').hide();
            }
        }
    }

    activeMenu() {
        var checkLv3 = $('.menu__lv3 .active');
        if(checkLv3.length) {
            var checkLv2 = checkLv3.closest('.dropdown');
            if(checkLv2.length) {
                checkLv3.parent('.menu__lv3').css('display', 'block');
                checkLv2.addClass('active');
            }
        }
    }
}


export default new menu();
