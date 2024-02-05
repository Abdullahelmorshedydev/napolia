<?php

namespace App\Http\Controllers\Web\Site\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsSettingsController extends Controller
{
    public function __invoke()
    {
        return view('web.site.pages.settings.terms');
    }
}
