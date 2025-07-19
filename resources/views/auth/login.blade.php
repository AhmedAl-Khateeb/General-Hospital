<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <title>تسجيل الدخول</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('template/css/login.css') }}">
</head>

<body>

    <div class="login-page bg-light min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 offset-lg-1">
                    <h3 class="mb-3 text-center">{{ __('menu.Login') }}</h3>
                    <div style="margin: 50px 0;" class="bg-white shadow rounded">
                        <div style="height: 450px;" class="row justify-content-center ">
                            <div class="col-md-6 ps-0 mt-5">
                                <div class="form-left h-100 py-5 px-5">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif


                                    <form action="{{ route('admin.login.submit') }}" method="POST" class="row g-4">
                                        @csrf
                                        <div class="col-12">
                                            <label>{{ __('menu.Email') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="{{ __('menu.Enter Your Email') }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label>{{ __('menu.Password') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" id="password" name="password"
                                                    class="form-control"
                                                    placeholder="{{ __('menu.Enter Your Password') }}">
                                                <button class="btn btn-outline-secondary" type="button"
                                                    id="togglePassword">
                                                    <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <div
                                            class="col-12 d-flex flex-row-reverse justify-content-between align-items-center mt-4">
                                            <button type="submit" class="btn btn-login px-4">
                                                {{ __('menu.Login') }}
                                            </button>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" style="accent-color: #0d6efd;">
                                                <!-- يدعمها معظم المتصفحات -->
                                                <label class="form-check-label btn btn-login" for="remember">
                                                    {{ __('menu.Remember My') }}
                                                </label>
                                            </div>

                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 pe-0 d-none d-md-block ">
                                <div class="form-right h-100 bg-login text-white text-center pt-5">
                                    <img src="{{ asset('template/images/swc.png') }}" width="150px" alt="">
                                    <h2 class="fs-1 mt-4">{{ __('menu.Welcome Back') }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript لإظهار/إخفاء كلمة المرور -->
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        togglePassword.addEventListener('click', () => {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // تغيير الأيقونة
            toggleIcon.classList.toggle('bi-eye');
            toggleIcon.classList.toggle('bi-eye-slash');
        });
    </script>

</body>

</html>
