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

    <style>
    table#example1 td, 
    table#example1 th {
        vertical-align: middle !important;
        text-align: center;
        white-space: nowrap;
    }

    /* تقليل ارتفاع الصف */
    table#example1 tr {
        height: 60px;
    }

    /* تصغير حجم ال dropdown & select */
    .table .btn,
    .table select {
        padding: 5px 10px !important;
        font-size: 13px !important;
        height: auto !important;
    }

    /* تثبيت حجم الصورة */
    .doctor-img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
        box-shadow: 0px 0px 3px rgba(0,0,0,0.2);
    }
</style>

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
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createDoctorModal">
                        {{ __('dashboard.Add Doctor+') }}
                    </button>
                    <button type="button" class="btn btn-danger" id="btn_delete_all">
                        {{ __('dashboard.Delete All Doctors') }}
                    </button>

                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-md-nowrap" id="example1">

                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAll" name="select_all"></th>
                                <th>ID</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Image') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Email') }}</th>
                                <th class="wd-5p border-bottom-0">{{ __('dashboard.Phone') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Status') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('dashboard.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($doctors as $item)
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($item->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE))
                                            <img src="{{ $item->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE) }}"
                                                alt="doctor image" class="img-fluid rounded-circle shadow-sm" width="50"
                                                height="50">
                                        @else
                                            <img src="{{ asset('Dashboard/img/download.jfif') }}" alt="no image"
                                                class="img-fluid rounded-circle shadow-sm" width="50" height="50">
                                        @endif
                                    </td>
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

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                class="btn ripple btn-outline-primary btn-sm" data-bs-toggle="dropdown"
                                                type="button">
                                                {{ __('dashboard.Processes') }}
                                                <i class="fas fa-caret-down mr-1"></i>
                                            </button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#showModal-{{ $item->id }}">
                                                    <i class="fa-regular fa-eye"></i>&nbsp;&nbsp;عرض البيانات
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal-{{ $item->id }}">
                                                    <i class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات
                                                </a>

                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#update_password{{ $item->id }}">
                                                    <i class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#update_status{{ $item->id }}">
                                                    <i class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $item->id }}">
                                                    <i class="text-danger ti-trash"></i>&nbsp;&nbsp;حذف البيانات
                                                </a>
                                            </div>
                                        </div>


                                        @include('Dashboard.doctors.update', [
                                            'doctor' => $item,
                                        ])
                                        @include('Dashboard.doctors.delete', [
                                            'doctor' => $item,
                                        ])
                                        @include('Dashboard.doctors.delete_select', [
                                            'doctor' => $item,
                                        ])
                                        @include('Dashboard.doctors.showDetails', [
                                            'doctor' => $item,
                                        ])
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">{{ __('dashboard.no_data') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $doctors->links('pagination::bootstrap-4') }}
                </div>
            </div>
                <a href="{{ route('dashboard.admin') }}" class="btn btn-danger"><span>{{ __('dashboard.Back') }}</span></a>
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
    <script>
        document.getElementById('selectAll').addEventListener('click', function() {
            document.querySelectorAll('input[name="ids[]"]').forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $("#btn_delete_all").click(function() {
                var selected = [];
                $("input[name='ids[]']:checked").each(function() {
                    selected.push($(this).val());
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show');
                    $('#delete_select_id').val(selected); // IDs
                } else {
                    alert('من فضلك اختر دكتور واحد على الأقل للحذف');
                }
            });
        });

        $(document).on('submit', 'form[action*="doctor.delete"]', function() {
            setTimeout(function() {
                location.reload();
            }, 200);
        });
    </script>

@endsection
