<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('web.admin.pages.index');
    }
}
