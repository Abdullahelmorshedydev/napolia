<?php

namespace App\Http\Controllers\Web\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Web\Admin\Settings\LinksSettingsRequest;

class LinksSettingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['permission:links_settings-list|links_settings-edit'], ['only' => ['index']]);
        $this->middleware(['permission:links_settings-edit'], ['only' => ['update']]);
    }

    public function index()
    {
        return view('web.admin.pages.settings.links.index');
    }

    public function update(LinksSettingsRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Settings::set($key, $value,);
        }
        return back()->with('success', __('admin/settings/links/index.success'));
    }
}
