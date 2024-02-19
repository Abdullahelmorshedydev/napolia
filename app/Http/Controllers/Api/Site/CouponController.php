<?php

namespace App\Http\Controllers\Api\Site;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function getCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        $total = 0;
        if ($coupon->min_order_value <= $request->invoiceAmount && $coupon->max_usage > $coupon->number_of_usage && $coupon->expire_date > now()) {
            $total = $coupon->type->calc($request->invoiceAmount, $coupon->value);
        }
        return response()->json(['total' => $total]);
    }
}
