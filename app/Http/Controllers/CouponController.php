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
            return false;
        }
        $cart = New Cart();
        return response()->json([
            'code' => $coupon->code,
            'value' => $coupon->discount($cart)
        ]);
//        return dd(Cart::query()
//            ->selectSub('carts.quantity * products.price','product_sum')
//            ->leftjoin('products','carts.product_id','=','products.id')
//            ->groupBy('product_sum')
//            ->toSql());
//        return Cart::query()
//            ->select(DB::raw('SUM(carts.quantity * products.price) as product_sum'))
//            ->leftjoin('products','carts.product_id','=','products.id')
//            ->first();
//            ->sum('product_sum');
//        return response()->json([
//            'code' => $coupon->code,
//            'discount' => $coupon->discount()
//        ]);
//        return DB::table('carts')
//            ->select(DB::raw('(carts.quantity * products.price) as productSum'))
//            ->leftjoin('products','carts.product_id','=','products.id')
//            ->get();

    }
}
