<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public function coupon(){
        return $this->morphTo();
    }

    /**
     * @param $code
     *
     * @return mixed
     *
     * Find Coupon By Code
     */
    public static function findByCode($code){
        return self::where('code', $code)->first();
    }

    /**
     * @param $order
     *
     * @return mixed
     *
     * Get The Discount in a Coupon
     */
    public function discount($order){
        return $this->coupon->discount($order);
    }
}
