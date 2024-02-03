<?php

namespace App\Http\Controllers\Web\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Web\Admin\Settings\ReturnExchangeSettingsRequest;

class ReturnExchangeSettingsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware(['permission:return_exchange_settings-list|return_exchange_settings-edit'], ['only' => ['index']]);
        // $this->middleware(['permission:return_exchange_settings-edit'], ['only' => ['update']]);
    }

    public function index()
    {
        return view('web.admin.pages.settings.return_exchange.index');
    }

    public function update(ReturnExchangeSettingsRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Settings::set($key, $value,);
        }
        return back()->with('success', __('admin/settings/return_exchange/index.success'));
    }
}
