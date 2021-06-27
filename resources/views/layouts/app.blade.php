<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('layout')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('layout')}}/vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('layout')}}/css/style.css">
    <link rel="shortcut icon" href="{{asset('layout')}}/images/favicon.png" />
    @yield('css')
</head>
<body>
    <div class="container-scroller" id="app">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">
            <nav class="navbar top-navbar col-lg-12 col-12 p-0">
            <div class="container-fluid">
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
                <ul class="navbar-nav navbar-nav-left">
                    <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-bell mx-0"></i>
                        <span class="count bg-success">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-success">
                                <i class="mdi mdi-information mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Application Error</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Just now
                            </p>
                        </div>
                        </a>
                        <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-warning">
                                <i class="mdi mdi-settings mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">Settings</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                Private message
                            </p>
                        </div>
                        </a>
                        <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-info">
                                <i class="mdi mdi-account-box mx-0"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <h6 class="preview-subject font-weight-normal">New user registration</h6>
                            <p class="font-weight-light small-text mb-0 text-muted">
                                2 days ago
                            </p>
                        </div>
                        </a>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
                        <i class="mdi mdi-email mx-0"></i>
                        <span class="count bg-primary"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <div id="result">

                        </div>
                    </div>
                    </li>
                    <li class="nav-item dropdown">
                    <a href="#" class="nav-link count-indicator "><i class="mdi mdi-message-reply-text"></i></a>
                    </li>
                    <li class="nav-item nav-search d-none d-lg-block ml-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search">
                    </div>
                    </li>
                </ul>
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo" href="index.html"><img src="{{asset('layout')}}/images/logo.png" alt="logo"/></a>
                    <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('layout')}}/images/logo-mini.svg" alt="logo"/></a>
                </div>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">
                            @if(auth()->user())
                                {{auth()->user()->first_name .' '. auth()->user()->last_name}}
                            @endif
                        </span>
                        <span class="online-status"></span>
                        @if(auth()->user())
                            <img src="{{asset('storage/file/'.auth()->user()->image)}}" alt="profile"/>
                        @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a href="{{route('profile')}}" class="dropdown-item">
                                <i class="mdi mdi-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout text-primary"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                    <span class="mdi mdi-menu"></span>
                </button>
                </div>
            </div>
            </nav>
            <nav class="bottom-navbar">
            <div class="container">
                <ul class="nav page-navigation">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('home')}}">
                            <i class="mdi mdi-home menu-icon"></i>
                            <span class="menu-title">Home Page</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{route('users')}}" class="nav-link">
                            <i class="mdi mdi-account-multiple-outline menu-icon"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('profile')}}" class="nav-link">
                            <i class="mdi mdi-account-box-outline menu-icon"></i>
                            <span class="menu-title">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('tickets')}}" class="nav-link">
                            <i class="mdi mdi-ticket-account"></i>
                            <span class="menu-title">Tickets</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{route('products')}}" class="nav-link">
                            <i class="mdi mdi-file-powerpoint-box menu-icon"></i>
                            <span class="menu-title">Products</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item messages">
                        <a href="{{route('messages')}}" class="nav-link">
                            <i class="mdi mdi-email mx-0"></i>
                            <span class="menu-title">
                                Messages
                                <div class="badge badge-danger" id="msgs_count">

                                </div>
                            </span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            </nav>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="content">
                        {{-- <h1>Welcome Mr. {{auth()->user()->first_name.' '.auth()->user()->last_name}}</h1> --}}
                        <hr class="head-line">
                        @yield('content')
                    </div>
                </div>
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-wrap">
                    <div class="w-100 clearfix">
                        <span class="d-block text-center text-sm-left d-sm-inline-block"
                        >Copyright © 2021
                        <a href="https://www.facebook.com/mahmoud.h.hammad.1/" target="_blank"
                            >Mahmoud Hammad</a
                        >. All rights reserved.</span
                        >
                        <span
                        class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                        >Made with <i class="mdi mdi-heart-outline"></i
                        ></span>
                    </div>
                    </div>
                </footer>
                <!-- partial -->
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="{{asset('layout')}}/vendors/base/vendor.bundle.base.js"></script>
    <script src="{{asset('layout')}}/js/template.js"></script>
    <script src="{{asset('layout')}}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset('layout')}}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset('layout')}}/vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
    <script src="{{asset('layout')}}/vendors/justgage/raphael-2.1.4.min.js"></script>
    <script src="{{asset('layout')}}/vendors/justgage/justgage.js"></script>
    <script src="{{asset('layout')}}/js/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function(){
            $.ajax({
                url:"/admin/get_contacts",
                type: "get",
                success:function(data){
                    console.log(data)
                    var result = ``;
                    if(data.mails.length > 0){
                        data.mails.forEach(function(res){
                            result += `
                                <a class="dropdown-item preview-item ${(res.status == '0')?'new':''}" data-id="${res.id}">
                                    <div class="preview-thumbnail">
                                        <i class="mdi mdi-email text-secondary mx-0"></i>
                                    </div>
                                    <div class="preview-item-content flex-grow">
                                        <h6 class="preview-subject ellipsis font-weight-${(res.status == '0')?'bold':'normal'}">
                                            ${res.name}
                                        </h6>
                                        <p class="font-weight-${(res.status == '0')?'bold':'light'} small-text text-muted mb-0">
                                            ${res.message}
                                        </p>
                                    </div>
                                </a>
                            `;
                        })
                    }else{
                        result += `<p class="dropdown-item preview-item">No Messages</p>`;
                    }
                    $('#result').append(result);
                    $('#msgs_count').append(data.count);
                    $('#messageDropdown .count').text(data.count);
                    if(data.count <= 0){
                        $('#messageDropdown .count, #msgs_count').css('display','none')
                    }
                },
            });
        })

        $(document).on('click', '.dropdown-item.preview-item',function(){
            if($(this).hasClass('new')){
                var id = $(this).attr('data-id');
                console.log(id)
                $.ajax({
                    url:"/admin/open_mail",
                    type: "get",
                    data: {'id': id},
                    success:function(data){

                    },
                });
                if($(this).hasClass('new')){
                    $(this).removeClass('new')
                }
                $(this).children('.preview-item-content').children('.preview-subject').removeClass('font-weight-bold').addClass('font-weight-normal');
                $(this).children('.preview-item-content').children('p.text-muted').removeClass('font-weight-bold').addClass('font-weight-light');
                var count = parseInt($('#messageDropdown .count').text());
                console.log(count)
                $('#messageDropdown .count').text(count-1)
                $('#msgs_count').text(count-1)
                if(count <= 1){
                    $('#messageDropdown .count, #msgs_count').css('display','none')
                }
            }
        })

        // Tooltip
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>
