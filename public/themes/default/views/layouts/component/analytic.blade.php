@if(config('app.env') == 'production')

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5M77GMP');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5M77GMP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @if (setting('general.analytic.google') !== '')

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{setting('general.analytic.google')}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', "{{setting('general.analytic.google')}}");
        </script>

    @endif

    @if (setting('general.analytic.piwik') !== '')
        <script>
            //webstates
            var _paq = _paq || [];
            _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
            _paq.push(["trackPageView"]);
            _paq.push(["enableLinkTracking"]);
            (function () {
                var u = (("https:" == document.location.protocol) ? "https" : "http") + "://webstats.shareinvestor.co.th/";
                _paq.push(["setTrackerUrl", u + "piwik.php"]);
                _paq.push(["setSiteId", "{{setting('general.analytic.piwik')}}"]);
                var d = document,
                    g = d.createElement("script"),
                    s = d.getElementsByTagName("script")[0];
                g.type = "text/javascript";
                g.defer = true;
                g.async = true;
                g.src = u + "piwik.js";
                s.parentNode.insertBefore(g, s);
            })();


        </script>
    @endif
@endif
