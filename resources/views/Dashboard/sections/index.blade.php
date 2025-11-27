@extends('Dashboard.layouts.master')
@section('section_active', 'active')
@section('section_open', 'open')
@section('css')
    <!-- Internal Data table css -->
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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.Show') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- Flash Messages -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    </script>

    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        {{ __('dashboard.Add Section+') }}
                    </button>
                    <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">{{ __('dashboard.Back') }}</a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-md-nowrap" id="example1">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ __('dashboard.Name') }}</th>
                                <th>{{ __('dashboard.Description') }}</th>
                                <th>{{ __('dashboard.Created At') }}</th>
                                <th>{{ __('dashboard.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sections as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('section.show', $item->id) }}">{{ $item->name }}</a></td>
                                    <td>{{ Str::limit($item->description, '50') }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateModal-{{ $item->id }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $item->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        @include('Dashboard.sections.update', [
                                            'section' => $item,
                                        ])
                                        @include('Dashboard.sections.delete', [
                                            'section' => $item,
                                        ])
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">{{ __('dashboard.no_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $sections->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!--/div-->


    </div>

    @include('Dashboard.sections.create')

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- jQuery (اختياري إذا كنت مش عايز تعمل native JS) -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
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
    <script src="{{ asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ asset('Dashboard/js/table-data.js') }}"></script>
@endsection
