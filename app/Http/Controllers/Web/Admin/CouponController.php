<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Enums\CouponTypeEnum;
use App\Enums\CouponStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Admin\Coupon\StoreCouponRequest;
use App\Http\Requests\Web\Admin\Coupon\UpdateCouponRequest;

class CouponController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['check.admin.permission:coupon-list'], ['only' => ['index', 'show']]);
        $this->middleware(['check.admin.permission:coupon-create'], ['only' => ['create', 'store']]);
        $this->middleware(['check.admin.permission:coupon-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['check.admin.permission:coupon-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::paginate();
        return view('web.admin.pages.coupon.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = CouponTypeEnum::cases();
        return view('web.admin.pages.coupon.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request)
    {
        Coupon::create($request->validated());
        return redirect()->route('admin.coupons.index')->with('success', __('admin/coupon/create.success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        $types = CouponTypeEnum::cases();
        $status = CouponStatusEnum::cases();
        return view('web.admin.pages.coupon.edit', compact('coupon', 'types', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        $coupon->update($request->validated());
        return redirect()->route('admin.coupons.index')->with('success', __('admin/coupon/edit.success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('admin.coupons.index')->with('success', __('admin/coupon/index.success'));
    }
}
