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
                    <li class="nav-item ml-0 mr-5 d-lg-flex d-none">
                    <a href="#" class="nav-link horizontal-nav-left-menu"><i class="mdi mdi-format-list-bulleted"></i></a>
                    </li>
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
                        <span class="count bg-primary">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
                        <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{{asset('layout')}}/images/faces/face4.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">David Grey
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                The meeting is cancelled
                            </p>
                        </div>
                        </a>
                        <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{{asset('layout')}}/images/faces/face2.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">Tim Cook
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                New product launch
                            </p>
                        </div>
                        </a>
                        <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="{{asset('layout')}}/images/faces/face3.jpg" alt="image" class="profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow">
                            <h6 class="preview-subject ellipsis font-weight-normal">
                                {{-- {{auth()->user()->first_name .' '. auth()->user()->last_name}} --}}
                            </h6>
                            <p class="font-weight-light small-text text-muted mb-0">
                                Upcoming board meeting
                            </p>
                        </div>
                        </a>
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
                    <li class="nav-item dropdown  d-lg-flex d-none">
                        <button type="button" class="btn btn-inverse-primary btn-sm">Product </button>
                    </li>
                    <li class="nav-item dropdown d-lg-flex d-none">
                        <a class="dropdown-toggle show-dropdown-arrow btn btn-inverse-primary btn-sm" id="nreportDropdown" href="#" data-toggle="dropdown">
                        Reports
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="nreportDropdown">
                            <p class="mb-0 font-weight-medium float-left dropdown-header">Reports</p>
                            <a class="dropdown-item">
                            <i class="mdi mdi-file-pdf text-primary"></i>
                            Pdf
                            </a>
                            <a class="dropdown-item">
                            <i class="mdi mdi-file-excel text-primary"></i>
                            Exel
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-lg-flex d-none">
                        <button type="button" class="btn btn-inverse-primary btn-sm">Settings</button>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <span class="nav-profile-name">
                        {{-- {{auth()->user()->first_name .' '. auth()->user()->last_name}} --}}
                        </span>
                        <span class="online-status"></span>
                        <img src="{{asset('storage/file/'.auth()->user()->image)}}" alt="profile"/>
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
                            <i class="mdi mdi-file-document-box menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
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
                    </li>
                </ul>
            </div>
            </nav>
        </div>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row page-head">
                        <div class="col-sm-6 mb-4 mb-xl-0">
                          <div class="d-lg-flex align-items-center">
                            <div>
                              <h3 class="text-dark font-weight-bold mb-2">
                                Hi, welcome back!
                              </h3>
                              <h6 class="font-weight-normal mb-2">
                                Last login was 23 hours ago. View details
                              </h6>
                            </div>
                            <div class="ml-lg-5 d-lg-flex d-none">
                              <button type="button" class="btn bg-white btn-icon">
                                <i class="mdi mdi-view-grid text-success"></i>
                              </button>
                              <button type="button" class="btn bg-white btn-icon ml-2">
                                <i
                                  class="mdi mdi-format-list-bulleted font-weight-bold text-primary"
                                ></i>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="d-flex align-items-center justify-content-md-end">
                            <div class="pr-1 mb-3 mb-xl-0">
                              <button
                                type="button"
                                class="btn btn-outline-inverse-info btn-icon-text"
                              >
                                Feedback
                                <i class="mdi mdi-message-outline btn-icon-append"></i>
                              </button>
                            </div>
                            <div class="pr-1 mb-3 mb-xl-0">
                              <button
                                type="button"
                                class="btn btn-outline-inverse-info btn-icon-text"
                              >
                                Help
                                <i
                                  class="mdi mdi-help-circle-outline btn-icon-append"
                                ></i>
                              </button>
                            </div>
                            <div class="pr-1 mb-3 mb-xl-0">
                              <button
                                type="button"
                                class="btn btn-outline-inverse-info btn-icon-text"
                              >
                                Print
                                <i class="mdi mdi-printer btn-icon-append"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="content">
                          <hr class="head-line">
                          @yield('content')
                      </div>
                </div>
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="footer-wrap">
                    <div class="w-100 clearfix">
                        <span class="d-block text-center text-sm-left d-sm-inline-block"
                        >Copyright © 2018
                        <a href="https://www.bootstrapdash.com/" target="_blank"
                            >bootstrapdash</a
                        >. All rights reserved.</span
                        >
                        <span
                        class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"
                        >Hand-crafted & made with <i class="mdi mdi-heart-outline"></i
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
</body>
</html>
