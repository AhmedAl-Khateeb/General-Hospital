@extends('Dashboard.layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ asset('Dashboard/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ asset('Dashboard/css/style.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header text-center mb-4">
        <div class="left-content">
            <h2 class="main-content-title tx-24">👋 {{ __('dashboard.Admin') }}</h2>
            <p class="text-muted">{{ __('dashboard.Here is an overview of your system performance today') }}</p>
        </div>
    </div>
@endsection

@section('content')
    <div class="row row-sm g-4">
        <!-- Sections -->
        <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
            <div class="card rounded-4 custom-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
                        <h5 class="mb-0">
                            <i class="fa fa-layer-group text-info"></i> {{ __('dashboard.Number of Sections') }}
                        </h5>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('section.index') }}" class="btn btn-success">
                            {{ __('dashboard.Show') }}
                        </a>
                        <h2 class="fw-bold mb-0">{{ $sections }}</h2>
                    </div>
                </div>
            </div>
        </div>


    </div>
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
