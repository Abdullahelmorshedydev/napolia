<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Events\Admin\ResetPasswordEvent;
use App\Mail\Web\Admin\ResetPasswordMail;
use App\Http\Requests\Web\Admin\Auth\ResetPasswordRequest;
use App\Http\Requests\Web\Admin\Auth\ForgetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function index()
    {
        return view('web.admin.pages.auth.forgetPassword');
    }

    public function send(ForgetPasswordRequest $request)
    {
        event(new ResetPasswordEvent($request->email));
        return redirect()->route('admin.auth.login.show');
    }

    public function update($email)
    {
        return view('web.admin.pages.auth.resetPassword', compact('email'));
    }

    public function reset(ResetPasswordRequest $request)
    {
        Admin::where('email', $request->email)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('admin.auth.login.show');
    }
}
