@extends('Dashboard.layouts.master')
@section('doctor_active', 'active')
@section('doctor_open', 'open')
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
                            data-bs-target="#createDoctorModal">
                            {{ __('dashboard.Add Doctor+') }}
                        </button>
                        <a href="{{ route('dashboard.admin') }}" class="btn btn-secondary">{{ __('dashboard.Back') }}</a>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-md-nowrap" id="example1">

                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">ID</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Email') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Phone') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Status') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($doctors as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->getTranslation('name', app()->getLocale()) }}</td>

                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        <form action="{{ route('doctor.changeStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control text-center"
                                                style="font-size: 15px; height: 40px; {{ $item->status == 1 ? 'color: green;' : 'color: red;' }}"
                                                onchange="this.style.color = (this.value == 1 ? 'green' : 'red'); this.form.submit();">
                                                <option value="" disabled>{{ __('dashboard.Change Status') }}
                                                </option>
                                                <option value="1" {{ $item->status == 1 ? 'selected' : '' }}>مفعل
                                                </option>
                                                <option value="0" {{ $item->status == 0 ? 'selected' : '' }}>غير مفعل
                                                </option>
                                            </select>

                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                            data-bs-target="#showModal-{{ $item->id }}">
                                            <i class="fa-regular fa-eye"></i>
                                        </button>

                                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateModal-{{ $item->id }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>

                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $item->id }}">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                        @include('Dashboard.doctors.update', [
                                            'doctor' => $item,
                                        ])
                                        @include('Dashboard.doctors.delete', [
                                            'doctor' => $item,
                                        ])
                                        @include('Dashboard.doctors.showDetails', [
                                            'doctor' => $item,
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
                    {{ $doctors->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <!--/div-->


    </div>

    @include('Dashboard.doctors.create')

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
