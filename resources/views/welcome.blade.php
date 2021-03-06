<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-color-07cb79 theme-skin-light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <link rel="shortcut icon" type="image/ico" href="{{ asset('template/') }}/img/favicon.png" />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic">

    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/fonts/map-icons/css/map-icons.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/fonts/icomoon/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.bxslider/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.customscroll/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.mediaelement/mediaelementplayer.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.fancybox/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.owlcarousel/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.owlcarousel/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/js/plugins/jquery.optionpanel/option-panel.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/main.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/') }}/colors/theme-color.css">

    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
    <script type="text/javascript" src="{{ asset('template/') }}/js/libs/modernizr.js"></script>

    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '{{asset("template/js/analytics.js")}}', 'ga');

        ga('create', 'UA-71657642-1', 'auto');
        ga('send', 'pageview');

    </script>
</head>

<body class="home header-has-img">

    <div class="content" id="app">
        <Resume temp_src="{{ asset('template') }}" public_path="{{asset('storage/file')}}"></Resume>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSY7srof-VKCaAdb4vVkYJf1vx1D6mkNc&callback=initMap"></script>
    <script type="text/javascript" src="{{ asset('template/js/site.js') }}"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        window.alert = function(){}
        function initMap(){
            var location = {lat:29.586726, lng:31.303586};
            var map = new google.maps.Map(document.getElementById("map"),{
                zoom: 4,
                center: location
            })
        }
    </script>
</body>

</html>
