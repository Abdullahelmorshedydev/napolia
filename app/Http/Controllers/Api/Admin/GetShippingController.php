<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetShippingController extends Controller
{
    public function getShipping($id)
    {
        $shipping = Shipping::where('state_id', $id)->first();
        $price = $shipping->price_type->calc($shipping->price, settings()->get('dollar_price'));
        $total_price = auth('web')->user()->cart->total + (auth('web')->user()->cart->total * (settings()->get('tax') / 100)) + $price;
        return response()->json(['shipping_price' => $price, 'total_price' => $total_price]);
    }
}
