@if(config('app.env') == 'production')

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
