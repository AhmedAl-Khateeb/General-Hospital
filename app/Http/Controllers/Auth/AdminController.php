<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Mail\OTPEmail;
use App\Models\Admin;
use App\Models\Otp;
use App\Providers\RouteServiceProvider;
use App\Traits\HttpResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    use HttpResponse;

    public function store(AdminLoginRequest $request)
    {
        try {
            $request->authenticate();
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::ADMIN);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ]);
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $user = Admin::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'البريد الإلكتروني غير صحيح.'])->withInput();
        }
        $code = mt_rand(1000, 9999);
        Otp::updateOrCreate(
            ['email' => $request->email],
            [
                'code' => $code,
                'expire_at' => now()->addHours(2),
            ]
        );
        Mail::to($request->email)->send(new OTPEmail($code));
        return redirect()->route('password.check.code.form', ['email' => $request->email]);
    }


    public function forgotPasswordForm()
    {
        return view('email.otp');
    }


    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|digits:4',
        ]);
        $otp = Otp::where('email', $request->email)->first();
        if (!$otp || $otp->expire_at < Carbon::now()) {
            return redirect()
                ->route('password.check.code.form')
                ->withErrors(['code' => 'انتهت صلاحية الكود. يرجى طلب كود جديد.'])
                ->with('email', $request->email);
        }
        if ($otp->code !== $request->code) {
            return back()->withErrors(['code' => 'الكود غير صحيح.']);
        }
        $otp->delete();
        return redirect()->route('password.reset.form', ['email' => $request->email]);
    }




    public function resetPasswordForm(Request $request)
    {
        $email = $request->email;
        return view('auth.reset-password', compact('email'));
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = Admin::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.login')->with('success', 'تم تعيين كلمة المرور الجديدة. يمكنك تسجيل الدخول الآن.');
    }
}
