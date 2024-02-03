<?php

namespace App\Http\Controllers\Web\Admin\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Rawilk\Settings\Facades\Settings;
use App\Http\Requests\Web\Admin\Settings\FilesSettingsRequest;
use App\Traits\FilesTrait;

class FilesSettingsController extends Controller
{
    use FilesTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware(['permission:files_settings-list|files_settings-edit'], ['only' => ['index']]);
        // $this->middleware(['permission:files_settings-edit'], ['only' => ['update']]);
    }


    public function index()
    {
        return view('web.admin.pages.settings.files.index');
    }

    public function update(FilesSettingsRequest $request)
    {
        foreach($request->validated() as $key => $value) {
            
            if ($request->hasFile($key)) {
                if (file_exists(asset(settings()->get($key)))) {
                    FilesTrait::delete(settings()->get($key));
                }
                $val = FilesTrait::store($request->file($key), 'uploads/settings/');
                Settings::set($key, $val);
            }
        }
        return back()->with('success', __('admin/settings/files/index.success'));
    }
}
