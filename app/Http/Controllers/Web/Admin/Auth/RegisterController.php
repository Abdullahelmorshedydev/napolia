<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Web\Admin\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function register()
    {
        return view('web.admin.pages.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $admin = Admin::create($request->validated());
        Auth::guard('admin')->login($admin);
        return redirect(app()->currentLocale() . RouteServiceProvider::ADMIN);
    }
}
