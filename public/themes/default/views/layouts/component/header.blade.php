<header class="header fixed-top">
    <div class="container">

        <nav class="navbar navbar-expand-xl">

            <a class="navbar-brand" href="{{localized_url('home')}}">
                <img src="{{theme_url('assets/static/images/logo.svg')}}" alt="logo">
            </a>

            <div class="navbar--menu">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @if(locale() == 'en')
                <a class="circle" href="{{localized_url(null,null,null,'th')}}" class="topnav-item">TH</a>
                @else
                <a class="circle" href="{{localized_url(null,null,null,'en')}}" class="topnav-item">EN</a>
                @endif

            </div>

            <div class="collapse navbar-collapse menu" id="menu">

                @component('component.menu.header', ['menus'=> $menus]) @endcomponent

            </div>
        </nav>
    </div>
</header>
