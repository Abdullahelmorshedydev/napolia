<?php

namespace App\Http\Controllers\Web\Site\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Site\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('web.site.pages.auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        Auth::guard('web')->login($user);
        return redirect()->route('index');
    }
}
