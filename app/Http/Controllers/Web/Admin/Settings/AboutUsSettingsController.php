<?php

namespace App\Http\Controllers\Web\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Web\Admin\Settings\AboutUsSettingsRequest;
use App\Traits\FilesTrait;

class AboutUsSettingsController extends Controller
{
    use FilesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware(['permission:aboutus_settings-list|aboutus_settings-edit'], ['only' => ['index']]);
        // $this->middleware(['permission:aboutus_settings-edit'], ['only' => ['edit']]);
    }


    public function index()
    {
        return view('web.admin.pages.settings.about.index');
    }

    public function update(AboutUsSettingsRequest $request)
    {
        foreach ($request->validated() as $key => $value) {

            if ($request->hasFile($key)) {

                FilesTrait::delete(settings()->get($key));
                $val = FilesTrait::store($request->file($key), 'uploads/settings/');
                Settings::set($key, $val);
            } else {
                Settings::set($key, $value,);
            }
        }
        return back()->with('success', __('admin/settings/about_us/index.success'));
    }
}
