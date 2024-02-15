<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function getCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        $total = $coupon->type->calc($request->invoiceAmount, $coupon->value);
        return response()->json(['total' => $total]);
    }
}
