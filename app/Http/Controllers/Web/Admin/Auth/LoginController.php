<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Web\Admin\Auth\LoginRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LoginController extends Controller
{
    public function login()
    {
        return view('web.admin.pages.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.index');
        }
        return back()->with('error', __('admin/auth/login.credintial_not_found'));
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return back();
    }
}
