<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function applyCoupon(Request $request){
        $coupon = Coupon::findByCode($request->couponCode);
        if(!$coupon){
            return response(null, 412);
        }
        $cart = New Cart();
        return response()->json([
            'code' => $coupon->code,
            'value' => $coupon->discount($cart)
        ]);
    }
}
