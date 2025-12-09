@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{ asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('Dashboard/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-o8C/OX1Z..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--Internal   Notify -->
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.Services') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('dashboard.Single Service') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    </script>
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{ __('dashboard.add_Service') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th> {{ __('dashboard.Name') }}</th>
                                    <th> {{ __('dashboard.Price') }}</th>
                                    <th> {{ __('dashboard.Status') }}</th>
                                    <th> {{ __('dashboard.Description') }}</th>
                                    <th>{{ __('dashboard.Created At') }}</th>
                                    <th>{{ __('dashboard.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $service->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{ $service->status == 1 ? __('dashboard.Enabled') : __('dashboard.Not Enabled') }}
                                        </td>
                                        <td> {{ Str::limit($service->description, 50) }}</td>
                                        <td>{{ $service->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-toggle="modal" href="#edit{{ $service->id }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $service->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </a>
                                        </td>

                                    </tr>

                                    @include('Dashboard.Services.SingleService.edit')
                                    @include('Dashboard.Services.SingleService.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

        @include('Dashboard.Services.SingleService.add')
        <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
     <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script> --}}
    <script src="{{ asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    {{-- <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script> --}}
    <script src="{{ asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('Dashboard/js/table-data.js') }}"></script>
@endsection
