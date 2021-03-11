<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-color-07cb79 theme-skin-light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('template')}}/css/plugins/bootstrap.min.css">
    <!-- Lato Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900i" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{asset('template')}}/css/font-awesome.min.css">
    <!-- AOS -->
    <link rel="stylesheet" href="{{asset('template')}}/css/plugins/aos.css">
    <!-- Animate -->
    <link rel="stylesheet" href="{{asset('template')}}/css/plugins/animate.css">
    <!-- BxSlider -->
    <link rel="stylesheet" href="{{asset('template')}}/css/plugins/jquery.bxslider.min.css">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('template/css/app.css')}}/img/m-logo.png" type="image/png"/>
    <!--    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>-->
    <!-- Lightbox Gallery -->
    <link rel="stylesheet" href="{{asset('template')}}/css/plugins/lightbox.css">
    <!-- EmojiOneArea -->
    <link rel="stylesheet" href="{{asset('template')}}/css/plugins/emojionearea.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.1/emojionearea.min.css">
      <!-- Style Sheet -->
      <!-- <link rel="stylesheet" href="css/style.css"> -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{asset('template')}}/css/app.css" />
</head>

<body class="home header-has-img">

    <div class="content" id="app">
        <Resume temp_src="{{ asset('template') }}" public_path="{{asset('storage/file')}}"></Resume>
    </div>

    <!-- JQuery -->
    <script src="{{asset('template')}}/js/plugins/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{asset('template')}}/js/plugins/bootstrap.min.js"></script>
    <!-- Lightbox -->
    <script src="{{asset('template')}}/js/plugins/lightbox.js"></script>
    <!-- BxSlider -->
    <script src="{{asset('template')}}/js/plugins/jquery.bxslider.min.js"></script>
    <!-- AOS -->
    <script src="{{asset('template')}}/js/plugins/aos.js"></script>
    <!-- WOW -->
    <script src="{{asset('template')}}/js/plugins/wow.js"></script>
    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- EmojiOneArea -->
    <script src="{{asset('template')}}/js/plugins/emojionearea.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js"></script>
    <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js"></script>
    <script src="{{asset('template')}}/js/demo.js"></script>
    <script src="{{asset('template')}}/js/main.js"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
