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

class ProfileController extends Controller
{
    use FilesTrait;

    public function index()
    {
        return view('web.admin.pages.auth.profile');
    }

    public function generalStore(GeneralStoreProfileRequest $request)
    {
        $admin = Admin::findOrFail(auth('admin')->user()->id)->with('profile')->first();
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $admin->image()->create([
                'image' => FilesTrait::store($request->file('image'), 'uploads/profiles/'),
            ]);
        }
        $admin->profile()->create([
            'bio' => [
                'en' => $data['bio_en'],
                'ar' => $data['bio_ar']
            ],
            'job_title' => [
                'en' => $data['job_title_en'],
                'ar' => $data['job_title_ar']
            ],
        ]);
        $admin->update($data);
        return back()->with('success', __('admin/auth/profile.general_create_success'));
    }

    public function generalUpdate(GeneralUpdateProfileRequest $request)
    {
        $admin = Admin::findOrFail(auth('admin')->user()->id)->with('profile')->first();
        $data = $request->validated();
        if ($request->hasFile('image')) {
            if (isset($admin->image)) {
                FilesTrait::delete($admin->image->image);
                $admin->image->update([
                    'image' => FilesTrait::store($request->file('image'), 'uploads/profiles/'),
                ]);
            } else {
                $admin->image()->create([
                    'image' => FilesTrait::store($request->file('image'), 'uploads/profiles/'),
                ]);
            }
        }
        $admin->profile->update($data);
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
