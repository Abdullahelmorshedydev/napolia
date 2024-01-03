<?php

namespace App\Http\Controllers\Web\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Web\Admin\Settings\ContactSettingsRequest;

class ContactSettingsController extends Controller
{
    public function index()
    {
        return view('web.admin.pages.settings.contact.index');
    }

    public function update(ContactSettingsRequest $request)
    {
        foreach ($request->validated() as $key => $value) {

            Settings::set($key, $value,);
        }
        return back()->with('success', __('admin/settings/contact/index.success'));
    }
}
