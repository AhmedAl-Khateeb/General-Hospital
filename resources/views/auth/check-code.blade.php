<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    <!-- Title -->
    <title> Valex - Premium dashboard ui bootstrap rwd admin html5 template </title>

    <!--- Favicon --->
    <link rel="icon" href="{{ asset('Dashboard') }}/img/brand/favicon.png" type="image/x-icon" />

    <!--- Icons css --->
    <link href="{{ asset('Dashboard') }}/css/icons.css" rel="stylesheet">

    <!--- Right-sidemenu css --->
    <link href="{{ asset('Dashboard') }}/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('Dashboard') }}/css-rtl/sidemenu.css">

    <!--- Custom Scroll bar --->
    <link href="{{ asset('Dashboard') }}/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!--- Style css --->
    <link href="{{ asset('Dashboard') }}/css-rtl/style.css" rel="stylesheet">

    <!--- Skinmodes css --->
    <link href="{{ asset('Dashboard') }}/css-rtl/skin-modes.css" rel="stylesheet">

    <!--- Darktheme css --->
    <link href="{{ asset('Dashboard') }}/css-rtl/style-dark.css" rel="stylesheet">

    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ asset('Dashboard') }}/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css"
        rel="stylesheet">

    <!--- Animations css --->
    <link href="{{ asset('Dashboard') }}/css/animate.css" rel="stylesheet">

</head>

<body class="main-body app sidebar-mini">

    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ asset('Dashboard') }}/img/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->

    <!-- Page -->
    <div class="page">

        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ asset('Dashboard') }}/img/media/forgot.png"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <h4 class="mb-2 text-center">{{ __('dashboard.Check the code') }}</h4>
                                    <p class="mb-4 text-center">{{ __('dashboard.Enter the code sent to your email') }}
                                    </p>

                                    @if ($errors->any())
                                        <div class="alert alert-danger mt-2">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form method="POST" action="{{ route('password.verify.code') }}">
                                        @csrf
                                        <input type="hidden" name="email" value="{{ $email }}">

                                        <div class="mb-3">
                                            <label for="code"
                                                class="form-label">{{ __('dashboard.Verification code') }}</label>
                                            <input type="text" name="code" class="form-control" required
                                                placeholder="أدخل الكود المكون من 4 أرقام">
                                        </div>

                                        <button type="submit"
                                            class="btn btn-primary d-grid w-100">{{ __('dashboard.Save') }}</button>
                                    </form>
                                </div>
                            </div><!-- End -->
                        </div>
                    </div><!-- End -->
                </div>
            </div>

        </div>
        <!-- End Page -->

        <!--- JQuery min js --->
        <script src="{{ asset('Dashboard') }}/plugins/jquery/jquery.min.js"></script>

        <!--- Bootstrap Bundle js --->
        <script src="{{ asset('Dashboard') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!--- Ionicons js --->
        <script src="{{ asset('Dashboard') }}/plugins/ionicons/ionicons.js"></script>

        <!--- Moment js --->
        <script src="{{ asset('Dashboard') }}/plugins/moment/moment.js"></script>

        <!--- Eva-icons js --->
        <script src="{{ asset('Dashboard') }}/js/eva-icons.min.js"></script>

        <!--- Rating js --->
        <script src="{{ asset('Dashboard') }}/plugins/rating/jquery.rating-stars.js"></script>
        <script src="{{ asset('Dashboard') }}/plugins/rating/jquery.barrating.js"></script>

        <!--- JQuery sparkline js --->
        <script src="{{ asset('Dashboard') }}/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!--- Custom js --->
        <script src="{{ asset('Dashboard') }}/js/custom.js"></script>

</body>

</html>
