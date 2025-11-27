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
        /* مظهر موحد للجدول */
        table td,
        table th {
            vertical-align: middle;
            text-align: center;
        }

        /* حجم الصف في الشاشات الكبيرة */
        table tr {
            height: 60px;
        }

        /* حجم الأزرار داخل الجدول */
        .table .btn,
        .table select {
            padding: 5px 10px !important;
            font-size: 13px !important;
        }

        /* صورة الطبيب */
        .doctor-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* إلغاء الـ scrollbar العرضي */
        .table-responsive {
            overflow-x: hidden !important;
            -webkit-overflow-scrolling: touch;
        }

        /* تحسين التصميم على الشاشات الصغيرة */
        @media (max-width: 768px) {

            table tr {
                height: auto !important;
            }

            table td,
            table th {
                font-size: 13px;
                padding: 6px 4px;
                white-space: normal !important;
                /* مهم */
                word-wrap: break-word;
            }

            .doctor-img {
                width: 35px !important;
                height: 35px !important;
            }

            .dropdown .btn {
                font-size: 12px !important;
                padding: 4px 6px !important;
            }

            /* لو عايز تصغر عرض الأعمدة */
            .truncate-text {
                max-width: 120px !important;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                display: inline-block;
            }

            .card-header .d-flex {
                flex-direction: column;
                width: 100%;
                gap: 8px;
            }

            .card-header form {
                width: 100% !important;
            }

            .card-header .btn {
                width: 100% !important;
            }
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
                <div class="card-header">

                    <div class="row g-2">
                        <!-- أزرار التحكم -->
                        <div class="col-12 col-md-auto d-flex gap-2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createDoctorModal">
                                {{ __('dashboard.Add Doctor+') }}
                            </button>

                            <button type="button" class="btn btn-danger" id="btn_delete_all">
                                {{ __('dashboard.Delete All Doctors') }}
                            </button>
                        </div>

                        <!-- مربع البحث -->
                        <div class="col-12 col-md-4">
                            <form method="GET" action="{{ route('doctor.index') }}">
                                <div class="input-group">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input type="text" name="search" class="form-control"
                                        placeholder="{{ app()->getLocale() === 'ar' ? 'ابحث بالاسم، القسم أو المواعيد' : 'Search by name, section or appointments' }}"
                                        value="{{ request('search') }}">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th><input type="checkbox" id="selectAll"></th>
                                <th>#</th>
                                <th>{{ __('dashboard.Image') }}</th>
                                <th>{{ __('dashboard.Name') }}</th>
                                <th>{{ __('dashboard.Email') }}</th>
                                <th>{{ __('dashboard.Phone') }}</th>
                                <th>{{ __('dashboard.Section') }}</th>
                                <th>{{ __('dashboard.Appointments') }}</th>
                                <th>{{ __('dashboard.Status') }}</th>
                                <th>{{ __('dashboard.Action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($doctors as $item)
                                <tr>
                                    <!-- Checkbox -->
                                    <td><input type="checkbox" name="ids[]" value="{{ $item->id }}"></td>

                                    <td>{{ $item->id }}</td>

                                    <!-- صورة الدكتور -->
                                    <td class="text-center">
                                        <img src="{{ $item->getFirstMediaUrl(\App\Enums\PhotoEnum::IMAGE) ?: asset('Dashboard/img/download.jfif') }}"
                                            alt="doctor image" class="rounded-circle shadow-sm"
                                            style="width:45px;height:45px;object-fit:cover;">
                                    </td>

                                    <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                        title="{{ $item->getTranslation('name', app()->getLocale()) }}">
                                        {{ $item->getTranslation('name', app()->getLocale()) }}
                                    </td>
                                    <td>{{ $item->email }}</td>

                                    <td dir="ltr">{{ $item->phone }}</td>

                                    <td style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                                        title="{{ $item->section?->getTranslation('name', app()->getLocale()) }}">
                                        {{ $item->section?->getTranslation('name', app()->getLocale()) }}
                                    </td>
                                    <!-- عرض المواعيد -->
                                    <td>
                                        @if ($item->appointments->isNotEmpty())
                                            {{ $item->appointments->map(fn($app) => $app->getTranslation('name', app()->getLocale()))->implode(' - ') }}
                                        @else
                                            <span class="text-muted">{{ __('dashboard.No Appointments') }}</span>
                                        @endif
                                    </td>

                                    <td>{{ $item->status }}</td>
                                    <!-- عمليات -->
                                    <td>
                                        <div class="dropdown text-center">
                                            <button class="btn btn-outline-primary btn-sm dropdown-toggle"
                                                data-bs-toggle="dropdown">
                                                {{ __('dashboard.Processes') }}
                                            </button>
                                            <div class="dropdown-menu  text-center">
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#showModal-{{ $item->id }}">
                                                    <i class="fa-regular fa-eye text-info"></i> {{ __('dashboard.Show') }}
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal-{{ $item->id }}">
                                                    <i class="fa-regular fa-pen-to-square text-success"></i>
                                                    {{ __('dashboard.Edit') }}
                                                </a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal-{{ $item->id }}">
                                                    <i
                                                        class="fa-solid fa-trash text-danger"></i>{{ __('dashboard.Delete') }}
                                                </a>
                                            </div>
                                        </div>

                                        @include('Dashboard.doctors.update', ['doctor' => $item])
                                        @include('Dashboard.doctors.delete', ['doctor' => $item])
                                        @include('Dashboard.doctors.delete_select', ['doctor' => $item])
                                        @include('Dashboard.doctors.showDetails', ['doctor' => $item])
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="10">{{ __('dashboard.no_data') }}</td>
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
