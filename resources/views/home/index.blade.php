<style>
    .custom-card {
        min-height: 100px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        font-size: 18px;
    }
</style>

@extends('Admin.layouts.app')

@section('title', 'لوحة التحكم')
@section('content')
    {{-- <br> --}}
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row">

                <!-- Users -->
                {{-- <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                    <div class="card rounded-4 custom-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center gap-3 mb-2">
                                <h5 class="mb-0">
                                    <i class="fa fa-users text-primary"></i> {{ __('menu.Number of Users') }}
                                </h5>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <a href="#"
                                    class="btn btn-success">{{ __('menu.Show') }}</a>
                                <h2 class="fw-bold mb-0">{{ $user }}</h2>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>

    </main>
@endsection
