<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Web\Admin\Admin\StoreAdminRequest;
use App\Http\Requests\Web\Admin\Admin\UpdateAdminRequest;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.admin.permission:admin-list'], ['only' => ['index']]);
        $this->middleware(['check.admin.permission:admin-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.admin.permission:admin-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.admin.permission:admin-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate();
        return view('web.admin.pages.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::get();
        return view('web.admin.pages.admin.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $data = $request->validated();
        $data['email_verified_at'] = now();
        $admin = Admin::create($data);
        $admin->assignRole($data['roles']);
        return redirect()->route('admin.admins.index')->with('success', __('admin/admin/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        $roles = Role::get();
        $adminRole = $admin->roles->all();
        return view('web.admin.pages.admin.edit', compact('admin', 'roles', 'adminRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $data = $request->validated();
        $admin->update($data);
        DB::table('model_has_roles')->where('model_id', $admin->id)->delete();
        $admin->assignRole($data['roles']);
        return redirect()->route('admin.admins.index')->with('success', __('admin/admin/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        if (auth('admin')->user()->id == $admin->id) {
            $admin->delete();
            auth()->guard('admin')->logout();
            return back();
        }
        $admin->delete();
        return back()->with('success', __('admin/admin/index.success'));
    }
}
