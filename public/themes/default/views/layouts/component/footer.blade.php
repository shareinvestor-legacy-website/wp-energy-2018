<footer class="footer">
    <div class="container">
        <div class="row no-gutters">

            <div class="col-8 col-md-10 col-lg-6 order-lg-1">
                <div class="footer__copyright">

                    <p class="footer__copyright--title">
                        {!! t('copyright') !!}
                    </p>

                    @component('component.menu.footer', ['menus'=> $footerMenus]) @endcomponent

                </div>
            </div>

            <div class="col-4 col-md-2 col-lg-1 order-lg-4">
                <div class="ml-auto footer__mascot">
                    <img src="{{theme_url('assets/static/images/default/charactor.png')}}" alt="">
                </div>
            </div>

            <div class="col-8 col-lg-3 order-lg-2 d-flex align-self-center">
                <div class="footer__social">
                    <p class="footer__social--title">{{t('follow.us.on')}}</p>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{t('youtube.url')}}">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{t('facebook.url')}}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-4 col-lg-2 order-lg-3">
                <div class="footer__contact">
                    <p class="footer__contact--title">{{t('call.center')}}</p>
                    <p class="footer__contact--text">{{t('call.center.number')}}</p>
                </div>
            </div>

        </div>
    </div>
</footer>
