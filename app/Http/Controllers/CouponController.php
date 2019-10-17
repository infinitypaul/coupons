<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;

use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     *
     * Apply Coupon To Cart and Generate Discount
     */
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
