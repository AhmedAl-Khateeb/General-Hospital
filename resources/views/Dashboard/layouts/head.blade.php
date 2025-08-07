<!-- Title -->
<title> Hospital </title>
<!-- Favicon -->


<!--- Style css -->
@if (app()->getLocale() == 'ar')
    <link rel="icon" href="{{ asset('Dashboard/img/brand/favicon.png') }}" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ asset('Dashboard/css-rtl/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Sidebar css -->
    <link href="{{ asset('Dashboard/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('Dashboard/css-rtl/sidemenu.css') }}">
    @yield('css')
    <link href="{{ asset('Dashboard/css-rtl/style.css') }}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{ asset('Dashboard/css-rtl/style-dark.css') }}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{ asset('Dashboard/css-rtl/skin-modes.css') }}" rel="stylesheet">
@else
    <link rel="icon" href="{{ asset('Dashboard/img/brand/favicon.png') }}" type="image/x-icon" />
    <!-- Icons css -->
    <link href="{{ asset('Dashboard/css/icons.css') }}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{ asset('Dashboard/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Right-sidemenu css -->
    <link href="{{ asset('Dashboard/plugins/sidebar/sidebar.css') }}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{ asset('Dashboard/css/sidemenu.css') }}">
    @yield('css')
    <!-- Maps css -->
    <link href="{{ asset('Dashboard/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
    <!-- style css -->
    <link href="{{ asset('Dashboard/css/style.css') }}" rel="stylesheet">

    {{-- <link href="{{ asset('Dashboard/css/style-dark.css') }}" rel="stylesheet"> --}}
    <!---Skinmodes css-->
    <link href="{{ asset('Dashboard/css/skin-modes.css') }}" rel="stylesheet" />
@endif
