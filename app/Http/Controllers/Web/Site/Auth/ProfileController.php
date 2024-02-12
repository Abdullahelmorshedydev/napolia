<?php

namespace App\Http\Controllers\Web\Site\Auth;

use Exception;
use App\Models\City;
use App\Models\User;
use App\Models\State;
use App\Models\Country;
use App\Traits\FilesTrait;
use App\Models\UserProfile;
use App\Enums\CityStatusEnum;
use App\Enums\StateStatusEnum;
use App\Traits\TranslateTrait;
use App\Enums\CountryStatusEnum;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Web\Site\Auth\PersonalProfileRequest;
use App\Http\Requests\Web\Site\Auth\PasswordUpdateProfileRequest;

class ProfileController extends Controller
{
    use FilesTrait, TranslateTrait;

    public function index()
    {
        $countries = Country::where('status', CountryStatusEnum::ACTIVE->value)->has('cities')->get();
        $cities = [];
        $states = [];
        if (isset(auth('web')->user()->profile)) {
            $cities = City::where('country_id', auth('web')->user()->profile->country_id)->where('status', CityStatusEnum::ACTIVE->value)->has('states')->get();
            $states = State::where('city_id', auth('web')->user()->profile->city_id)->where('status', StateStatusEnum::ACTIVE->value)->get();
        }
        return view('web.site.pages.auth.profile', compact('countries', 'cities', 'states'));
    }

    public function updateProfile(PersonalProfileRequest $request)
    {
        $user = User::findOrFail(auth('web')->user()->id)->with('profile')->first();
        $data = $request->validated();
        if (isset($user->profile)) {
            $user->profile->update($data);
        } else {
            $user->profile()->create($data);
        }
        $user->update($data);
        return back()->with('success', __('site/auth/profile.update_success'));
    }

    public function passwordUpdate(PasswordUpdateProfileRequest $request)
    {
        $data = $request->validated();
        if (!Hash::check($data['old_password'], auth('web')->user()->password)) {
            return back()->with('error', __('site/auth/profile.password_wrong'));
        }
        User::findOrFail(auth('web')->user()->id)->update([
            'password' => Hash::make($data['new_password']),
        ]);
        return back()->with('success', __('site/auth/profile.password_success'));
    }
}
