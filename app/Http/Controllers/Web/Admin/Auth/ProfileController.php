<?php

namespace App\Http\Controllers\Web\Admin\Auth;

use Exception;
use App\Models\Admin;
use App\Traits\FilesTrait;
use App\Models\AdminProfile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Web\Admin\Auth\GeneralStoreProfileRequest;
use App\Http\Requests\Web\Admin\Auth\GeneralUpdateProfileRequest;
use App\Http\Requests\Web\Admin\Auth\PasswordUpdateProfileRequest;
use App\Traits\TranslateTrait;

class ProfileController extends Controller
{
    use FilesTrait, TranslateTrait;

    public function index()
    {
        $admin = AdminProfile::where('admin_id', auth('admin')->user()->id)->first();
        return view('web.admin.pages.auth.profile', compact('admin'));
    }

    public function generalUpdate(GeneralUpdateProfileRequest $request)
    {
        $admin = Admin::findOrFail(auth('admin')->user()->id)->with('profile')->first();
        $data = $request->validated();
        $data['bio'] = TranslateTrait::translate($data['bio_en'], $data['bio_ar']);
        $data['job_title'] = TranslateTrait::translate($data['job_title_en'], $data['job_title_ar']);
        if (isset($admin->profile)) {
            if ($request->hasFile('image')) {
                if (isset($admin->image)) {
                    FilesTrait::delete($admin->image->image);
                    $admin->image->update([
                        'image' => FilesTrait::store($request->file('image'), AdminProfile::$img_path),
                    ]);
                } else {
                    $admin->image()->create([
                        'image' => FilesTrait::store($request->file('image'), AdminProfile::$img_path),
                    ]);
                }
            }
            $admin->profile->update($data);
        } else {
            if ($request->hasFile('image')) {
                $admin->image()->create([
                    'image' => FilesTrait::store($request->file('image'), AdminProfile::$img_path),
                ]);
            }
            $admin->profile()->create($data);
        }
        $admin->update($data);
        return back()->with('success', __('admin/auth/profile.general_success'));
    }

    public function passwordUpdate(PasswordUpdateProfileRequest $request)
    {
        $data = $request->validated();
        if (!Hash::check($data['old_password'], auth('admin')->user()->password)) {
            return back()->with('error', __('admin/auth/profile.password_wrong'));
        }
        Admin::findOrFail(auth('admin')->user()->id)->update([
            'password' => Hash::make($data['new_password']),
        ]);
        return back()->with('success', __('admin/auth/profile.password_success'));
    }
}
