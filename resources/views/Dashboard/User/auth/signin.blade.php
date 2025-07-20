@extends('Dashboard.layouts.master2')
<style>
    select.form-control {
        color: #000 !important;
        background-color: #fff;
    }

    select.form-control option {
        color: #000 !important;
        background-color: #fff;
    }

    .loginform {
        display: none;
    }
</style>
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ asset('Dashboard/img/media/login.png') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}"
                                                class="sign-favicon ht-40" alt="logo"></a>
                                        <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                    </div>
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>Welcome back!</h2>

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Your Role</label>
                                                <select id="sectionChooser" class="form-control">
                                                    <option value="" selected disabled>Choose from the list</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="user">Patient</option>

                                                </select>
                                                </label>
                                            </div>

                                            {{-- form user --}}
                                            <div class="loginform" id="user">
                                                <h5 class="font-weight-semibold mb-4">Login as a Patient</h5>
                                                <form method="POST" action="{{ route('login') }}" class="w-full">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control" type="email"
                                                            name="email" :value="old('email')"
                                                            placeholder="Enter your email" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" type="password"
                                                            name="password" placeholder="Enter your password"
                                                            type="password">

                                                        <div class="block mt-4">
                                                            <label for="remember_me" class="inline-flex items-center">
                                                                <input id="remember_me" type="checkbox"
                                                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                                    name="remember">
                                                                <span
                                                                    class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                            </label>
                                                        </div>


                                                    </div><button class="btn btn-main-primary btn-block">Sign In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>

                                            </div>


                                            {{-- form admin --}}
                                            <div class="loginform" id="admin">
                                                <h5 class="font-weight-semibold mb-4">Login as Admin </h5>
                                                <form method="POST" action="{{ route('admin.login') }}" class="w-full">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>Email</label> <input class="form-control" type="email"
                                                            name="email" :value="old('email')"
                                                            placeholder="Enter your email" type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Password</label> <input class="form-control" type="password"
                                                            name="password" placeholder="Enter your password"
                                                            type="password">

                                                        <div class="block mt-4">
                                                            <label for="remember_me" class="inline-flex items-center">
                                                                <input id="remember_me" type="checkbox"
                                                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                                                    name="remember">
                                                                <span
                                                                    class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                                            </label>
                                                        </div>


                                                    </div><button class="btn btn-main-primary btn-block">Sign In</button>
                                                    <div class="row row-xs">
                                                        <div class="col-sm-6">
                                                            <button class="btn btn-block"><i class="fab fa-facebook-f"></i>
                                                                Signup with Facebook</button>
                                                        </div>
                                                        <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                            <button class="btn btn-info btn-block"><i
                                                                    class="fab fa-twitter"></i> Signup with
                                                                Twitter</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    <p><a href="">Forgot password?</a></p>
                                                    <p>Don't have an account? <a
                                                            href="{{ url('/' . ($page = 'signup')) }}">Create
                                                            an Account</a></p>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#sectionChooser').on('change', function() {
            var myId = $(this).val();
            $('.loginform').each(function() {
                myId === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
