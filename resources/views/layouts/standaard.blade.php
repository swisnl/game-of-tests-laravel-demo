<!DOCTYPE html>
<!--[if lte IE 8]>
<html class="no-js ie8" lang="nl"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="nl"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" media="screen">
    <script src="{{ mix('/js/app.js') }}"></script>
    <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
</head>
<body id="layout-standaard">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="https://www.swis.nl/"><img src="https://www.swis.nl/images/swis-logo.svg"
                                                                     alt="SWIS logo"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @if(Request::url() == route('game-of-tests'))class="active"@endif><a href="{{ route('game-of-tests') }}" title="Game of Tests}">Game of Tests</a></li>
                <li @if(Request::url() == route('faq'))class="active"@endif><a href="{{ route('faq') }}" title="FAQ}">FAQ</a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-md-12">
            @yield('fullWidth')
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-md-4">
            {!! @$leftColumn !!}
            @yield('leftColumn')
        </div>
        <div class="col-xs-12 col-md-4">
            @yield('middleColumn')
        </div>
        <div class="col-xs-12 col-md-4">
            @yield('rightColumn')
        </div>
    </div>
</div>

@if( env('APP_ENV', false) === 'production')
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', env('GOOGLE_ANALYTTICS'), 'auto');
        ga('send', 'pageview');

    </script>
@endif
</body>
</html>