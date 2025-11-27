@extends('Dashboard.layouts.master')

@section('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-o8C/OX1Z..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* حل ظهور الدروب داخل الجدول */
        .table-responsive {
            overflow: visible !important;
        }

        .dropdown-menu {
            position: absolute !important;
            z-index: 1060 !important;
        }

        td,
        th {
            position: relative;
        }
    </style>
@endsection

@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ $section->name }}</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('dashboard.Name') }}</th>
                                    <th>{{ __('dashboard.Email') }}</th>
                                    <th>{{ __('dashboard.Section') }}</th>
                                    <th>{{ __('dashboard.Phone') }}</th>
                                    <th>{{ __('dashboard.Appointments') }}</th>
                                    <th>{{ __('dashboard.Status') }}</th>
                                    <th>{{ __('dashboard.Processes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->section->name }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>
                                            @if ($doctor->appointments->isNotEmpty())
                                                {{ $doctor->appointments->map(fn($app) => $app->getTranslation('name', app()->getLocale()))->implode(' - ') }}
                                            @else
                                                <span class="text-muted">{{ __('dashboard.No Appointments') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('doctor.changeStatus', $doctor->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="form-select form-select-sm text-center"
                                                    style="color: {{ $doctor->status ? 'green' : 'red' }}"
                                                    onchange="this.style.color = (this.value == 1 ? 'green' : 'red'); this.form.submit();">
                                                    <option disabled>{{ __('dashboard.Change Status') }}</option>
                                                    <option value="1" {{ $doctor->status ? 'selected' : '' }}>مفعل
                                                    </option>
                                                    <option value="0" {{ !$doctor->status ? 'selected' : '' }}>غير
                                                        مفعل
                                                    </option>
                                                </select>
                                            </form>
                                        </td>

                                        <td>
                                            <div class="dropdown text-center">
                                                <button class="btn btn-outline-primary btn-sm dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    {{ __('dashboard.Processes') }}
                                                </button>
                                                <div class="dropdown-menu  text-center">
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#showModal-{{ $doctor->id }}">
                                                        <i class="fa-regular fa-eye text-info"></i>
                                                        {{ __('dashboard.Show') }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#updateModal-{{ $doctor->id }}">
                                                        <i class="fa-regular fa-pen-to-square text-success"></i>
                                                        {{ __('dashboard.Edit') }}
                                                    </a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                        data-bs-target="#deleteModal-{{ $doctor->id }}">
                                                        <i
                                                            class="fa-solid fa-trash text-danger"></i>{{ __('dashboard.Delete') }}
                                                    </a>
                                                </div>
                                            </div>

                                            @include('Dashboard.doctors.update', ['doctor' => $doctor])
                                            @include('Dashboard.doctors.delete', ['doctor' => $doctor])
                                            @include('Dashboard.doctors.delete_select', [
                                                'doctor' => $doctor,
                                            ])
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd --> <br>
                    <a href="{{ route('section.index') }}" class="btn btn-secondary"><span>{{ __('dashboard.Back') }}</span></a>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
