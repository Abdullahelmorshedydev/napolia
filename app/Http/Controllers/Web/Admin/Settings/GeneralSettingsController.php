<?php

namespace App\Http\Controllers\Web\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Web\Admin\Settings\GeneralSettingsRequest;

class GeneralSettingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:general_settings-list|general_settings-edit'], ['only' => ['index']]);
        $this->middleware(['permission:general_settings-edit'], ['only' => ['update']]);
    }

    public function index()
    {
        return view('web.admin.pages.settings.general.index');
    }

    public function update(GeneralSettingsRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Settings::set($key, $value,);
        }
        return back()->with('success', __('admin/settings/general/index.success'));
    }
}
