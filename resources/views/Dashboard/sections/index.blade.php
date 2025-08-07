@extends('Dashboard.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('dashboard.Show') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
      
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('dashboard.Sections') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">ID</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.Name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('dashboard.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sections as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <a href="{{ route('section.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('section.delete', $item->id) }}" method="POST"
                                                class="d-inline-block">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('{{ __('messages.confirm_delete') }}')"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
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
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script src="{{asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{asset('Dashboard/js/table-data.js')}}"></script>
@endsection
