<?php

namespace App\Http\Controllers\Web\Site\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Web\Site\Auth\LoginRequest;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class LoginController extends Controller
{
    public function login()
    {
        return view('web.site.pages.auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(app()->currentLocale() . '/');
        }
        return back()->with('error', __('site/auth/login.credintial_not_found'));
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return back();
    }
}
