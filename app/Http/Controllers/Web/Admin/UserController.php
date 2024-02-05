<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\User\StoreUserRequest;
use App\Http\Requests\Web\Admin\User\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.admin.permission:user-list'], ['only' => ['index']]);
        $this->middleware(['check.admin.permission:user-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.admin.permission:user-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.admin.permission:user-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Admin::paginate();
        return view('web.admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('web.admin.pages.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['email_verified_at'] = now();
        $admin = Admin::create($data);
        $admin->assignRole($data['roles']);
        return redirect()->route('admin.users.index')->with('success', __('admin/user/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $user)
    {
        $roles = Role::get();
        $adminRole = $user->roles->all();
        return view('web.admin.pages.user.edit', compact('user', 'roles', 'adminRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $admin->update($data);

        DB::table('model_has_roles')->where('model_id', $admin->id)->delete();
        $admin->assignRole($data['roles']);
        return redirect()->route('admin.users.index')->with('success', __('admin/user/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $user)
    {
        if (auth('admin')->user()->id == $user->id) {
            $user->delete();
            auth()->guard('admin')->logout();
            return back();
        }
        $user->delete();
        return back()->with('success', __('admin/user/index.success'));
    }
}
