@extends('Dashboard.layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ asset('Dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    {{-- <link href="{{ asset('Dashboard/css/style.css') }}" rel="stylesheet"> --}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Hi, welcome back User</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">

    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">

    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">

    </div>
    <!-- row close -->

    <!-- row opened -->
    <div class="row row-sm row-deck">

    </div>
    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ asset('Dashboard/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ asset('Dashboard/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ asset('Dashboard/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('Dashboard/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ asset('Dashboard/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ asset('Dashboard/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ asset('Dashboard/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('Dashboard/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ asset('Dashboard/js/index.js') }}"></script>
    <script src="{{ asset('Dashboard/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
